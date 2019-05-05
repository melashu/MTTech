<?php
require_once "dbConnection-class.php";
class VideoPost extends dbConnection {
    private $con = '';
    //or put as $GLOBALS['con'];
    public function __construct() {

        $this->con = parent::connect();
    }
    public function updateBlogPost(array $para, $data) {
        $result;
        $sql = "UPDATE videopost SET poststatus=:post WHERE vid=:vid";
        $stat = $this->con->prepare($sql);
        foreach ($para as $row) {
            $stat->bindValue('vid', $row);
            $stat->bindValue('post', $data);
            $result = $stat->execute();
        }
        if ($result) {
            echo "update";
        } else {
            echo 'fail';
        }
    }
    public function deleteVideoPost(array $para) {
        $result;
        $sql = "DELETE FROM videopost WHERE vid=:vid";
        $stat = $this->con->prepare($sql);
        foreach ($para as $row) {
            $stat->bindValue('vid', $row);
            $result = $stat->execute();
            //echo $row;
        }
        if ($result) {
            echo "delete";
        } else {
            echo 'fail';
        }
    }
    public function getVideoCat() {
        $sql = "select DISTINCT categorie from videopost";
        $result = $this->con->query($sql);
        return $result;
    }
    public function getVideoPost($para) {
        if ($para == 'no') {
            $sql = "select * from videopost";
            $stat = $this->con->prepare($sql);
            $stat->execute();
            $row = $stat->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($row);
        } else {
            $sql = "select * from videopost where vid=:vid";
            $stat = $this->con->prepare($sql);
            $stat->bindValue('vid', $para);
            $chk = $stat->execute();
            if ($chk >= 1) {
                $row = $stat->fetch(PDO::FETCH_ASSOC);
                echo json_encode($row);
            }else{
                echo "no view";
            }
        }
    }
    public function insertVideo($title, $poststatus, $image, $videotype, $categorie, $username, $video, $prices, $desic) {
        try {
            //  $sql = "insert into " . TBL_VIDEOPOST . " (titlt,poststatus,coverpage,videotype,postdate,categorie,username,content,prices,desic) values(:1,:2,:3,:4,:5,:6,:7,:8,:9,:10)";
            $sql = "insert into " . TBL_VIDEOPOST . " (title,poststatus,coverpage,videotype,postdate,categorie,username,content,prices,desic,viewstatus) values (:1,:2,:3,:4,curdate(),:6,:7,:8,:9,:10,:11)";
            $stat = $this->con->prepare($sql);
            $stat->bindValue(":1", $title);
            $stat->bindValue(":2", $poststatus);
            $stat->bindValue(":3", $image);
            $stat->bindValue(":4", $videotype);
            //  $stat->bindValue(', '');
            $stat->bindValue(":6", $categorie);
            $stat->bindValue(":7", $username);
            $stat->bindValue(":8", $video);
            $stat->bindValue(":9", $prices);
            $stat->bindValue(":10", $desic);
            $stat->bindValue(":11", '0');

            $res = $stat->execute();
            if (!$res) {
                echo "fail";
            } else {
                echo "ok";
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }
}

$videoPost = new VideoPost;
if (isset($_POST['role']) and ($_POST['role'] === 'delete')) {
    $data = json_decode($_POST['row']);
    $videoPost->deleteVideoPost($data);
} else if (isset($_POST['role']) and ($_POST['role'] !== 'delete')) {
    $data = json_decode($_POST['row']);
    $videoPost->updateBlogPost($data, $_POST['role']);
}

if (isset($_POST['viewVideo'])) {
    $videoPost->getVideoPost('no');
}

if (isset($_POST['preview']) and ($_POST['preview'] === 'view')) {
    $videoPost->getVideoPost($_POST['row']);
}

if (isset($_POST['upload'])) {
    $title = trim($_POST['title']);
    $cat = trim($_POST['cat']);
    $status = trim($_POST['status']);
    $content = trim($_POST['content']);
    $username = trim($_POST['username']);
    $type = trim($_POST['type']);
    $prices = trim($_POST['price']);
    $check = true;
    $imageDir = '';
    $videoDir = '';

    if (!empty($_FILES['photo']['name']) and !empty($_FILES['video']['name'])) {
        $photo = $_FILES['photo'];
        $video = $_FILES['video'];
        $checkVideoExtension = false;
        $checkImageExtenstion = false;
        $imageFileName = basename($_FILES['photo']['name']);
        $videoFileName = basename($_FILES['video']['name']);
        $imageDir = 'image/' . $imageFileName;
        $videoDir = 'video/' . $videoFileName;
        $imageFileType = pathinfo($imageDir, PATHINFO_EXTENSION);
        $videoFileType = pathinfo($videoDir, PATHINFO_EXTENSION);
        $allowImageType = ['jpg', 'png', 'gif'];
        $allowVideoType = ['mp4', 'webm'];
        if (in_array($imageFileType, $allowImageType)) { //check image file type
            $checkImageExtenstion = true;
        }
        if (in_array($videoFileType, $allowVideoType)) { //check video file type
            $checkVideoExtension = true;
        }
        if ($checkImageExtenstion and $checkVideoExtension) {
            move_uploaded_file($_FILES['photo']['tmp_name'], $imageDir);
            move_uploaded_file($_FILES['video']['tmp_name'], $videoDir);
            $videoPost->insertVideo($title, $status, $imageDir, $type, $cat, $username, $videoDir, $prices, $content);
        } else if (!$checkImageExtenstion) {
            echo "image"; //return image to inform the users uploaded image is wrong
        } else {
            echo 'video'; //return video to inform the users uploaded video is wrong
        }
    } else {
        echo "file"; //return  file to inform the user either file is empty
    }

}
?>