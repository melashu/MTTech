<?php
require_once "dbConnection-class.php";
class BlogPost extends dbConnection {
    private $con = '';
    public function __construct() {
        $this->con = parent::connect();
    }
    public function updateBlogPost(array $para, $data) {
        $result;
        $sql = "UPDATE blogpost set poststatus=:post WHERE pid=:pid";
        $stat = $this->con->prepare($sql);
        foreach ($para as $row) {
            $stat->bindValue('pid', $row);
            $stat->bindValue('post', $data);
            $result = $stat->execute();
        }
        if ($result) {
            echo "update";
        } else {
            echo $para;
        }
    }
    public function deleteBlogPost(array $para) {
        $result;
        $sql = "DELETE FROM blogpost WHERE pid=:pid";
        $stat = $this->con->prepare($sql);
        foreach ($para as $row) {
            $stat->bindValue('pid', $row);
            $result = $stat->execute();
        }
        if ($result) {
            echo "delete";
        } else {
            echo 'fail';
        }
    }

    public function getBlogPost($para) {
        if ($para == 'no') {
            $sql = "SELECT * from blogpost";
            $stat = $this->con->prepare($sql);
            $stat->execute();
            $row = $stat->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($row);
        } else {
            $sql = "select * from blogpost where pid=:pid";
            $stat = $this->con->prepare($sql);
            $stat->bindValue('pid', $para);
            $chk = $stat->execute();
            if ($chk) {
                $row = $stat->fetch(PDO::FETCH_ASSOC);
                echo json_encode($row);
            } else {
                echo 'noEdit';
            }
            //  echo json_encode($row);
            // return $row;
        }
    }
    public function updateSingleBlog($title, $cat, $photo, $content, $status, $pid) {
        $result;
        $sql = "UPDATE blogpost set poststatus=:post,title=:title,categorie=:cat,coverpage=:photo,content:=content WHERE pid=:pid";
        $stat = $this->con->prepare($sql);
        $stat->bindValue(':post', $status);
        $stat->bindValue(':title', $title);
        $stat->bindValue(':cat', $cat);        
        $stat->bindValue(':photo', $photo);
        $stat->bindValue(':content', $content);
        $stat->bindValue(':pid', $pid);
        $result = $stat->execute();
        if ($result) {
            echo "ok";
        } else {
            echo 'fail';
        }
    }
    public function getBlogCat() {
        $sql = "SELECT DISTINCT categorie from blogpost";
        $result = $this->con->query($sql);
        return $result;
    }
    public function insertData($title, $cat, $photo, $content, $username, $status) {
        try {
            $con = parent::connect();
            $sql = "insert into " . TBL_BLOGPOST . " (username,title,poststatus,categorie,postdate,coverpage,content,viewstatus) values(:un,:title,:poststatus,:cat,curdate(),:cover,:content,:viewstatus)";
            $stat = $con->prepare($sql);
            $stat->bindValue("un", $username);
            $stat->bindValue("title", $title);
            $stat->bindValue("poststatus", $status);
            $stat->bindValue("cat", $cat);
            $stat->bindValue("cover", $photo);
            $stat->bindValue("content", $content);
            $stat->bindValue("viewstatus", '0');
            $res = $stat->execute();
            if (!$res) {
                echo "Fail bad sql";
                parent::disConnect($con);
            } else {
                echo "ok";
                parent::disConnect($con);
            }
        } catch (PDOException $ex) {
            echo $ex->getMessage() . " and " . $content;
            parent::disConnect($con);

        }
    }

}
/**
 * Get all value posted from ajax request
 */
function getValue($para) {
    return trim($_POST[$para]);
}

$blogpost = new BlogPost;
if (isset($_POST['role']) and ($_POST['role']) !== 'delete') {
    $row = json_decode($_POST['row']);
    $blogpost->updateBlogPost($row, $_POST['role']);
}
/***To get blog post by id  */
if (isset($_POST['data']) and $_POST['data'] === 'edit') {
    $blogpost->getBlogPost($_POST['row']);

}

if (isset($_POST['viewBlog'])) {
    $blogpost->getBlogPost('no');
}
if (isset($_POST['role']) and ($_POST['role'] === 'delete')) {
    $data = json_decode($_POST['row']);
    $blogpost->deleteBlogPost($data);
}

if (isset($_POST['blog'])) {
    //put blog for ajax
    // echo okay
    // $title = trim($_POST['title']);
    // $cat = trim($_POST['cat']);
    // $status = trim($_POST['status']);
    // $content = nl2br(trim($_POST['content']));
    // $username = trim($_POST['username']);
    $targetDir = "no";
    $check = true; //check weather it is ready to save it to database
    if ($_POST['blog'] === 'insert') {
        if (!empty($_FILES['photo']['name'])) {
            $photo = $_FILES['photo'];
            $fileName = basename($_FILES['photo']['name']);
            $targetDir = "image/" . $fileName;
            $fileType = pathinfo($targetDir, PATHINFO_EXTENSION);
            $allowType = ['jpg', 'png', 'gif'];
            //  $blogpost->insertData($title,$cat,$targetDir,$content,$username,$status);
            if (in_array($fileType, $allowType)) {
                move_uploaded_file($photo['tmp_name'], $targetDir);
            } else {
                $check = false;
                echo "image";
            }
        }
        if ($check) {
            // $blogpost->insertData($title, $cat, $targetDir, $content, $username, $status);
            $blogpost->insertData(getValue('title'), getValue('cat'), $targetDir, nl2br(getValue('content')), getValue('username'), getValue('status'));
        }
    } else if ($_POST['blog'] === 'update') {
        if (!empty($_FILES['photo']['name'])) {
            $photo = $_FILES['photo'];
            $fileName = basename($_FILES['photo']['name']);
            $targetDir = "image/" . $fileName;
            if (file_exists($targetDir)) {
                unlink($targetDir);
            }

            $fileType = pathinfo($targetDir, PATHINFO_EXTENSION);
            $allowType = ['jpg', 'png', 'gif'];
            //  $blogpost->insertData($title,$cat,$targetDir,$content,$username,$status);
            if (in_array($fileType, $allowType)) {
                move_uploaded_file($photo['tmp_name'], $targetDir);
            } else {
                $check = false;
                echo "image";
            }
        }
        if ($check) {
            // $blogpost->insertData($title, $cat, $targetDir, $content, $username, $status);
            $blogpost->updateSingleBlog(getValue('title'), getValue('cat'), $targetDir, nl2br(getValue('content')), getValue('status'), getValue('pid'));
        }
    }
}

?>