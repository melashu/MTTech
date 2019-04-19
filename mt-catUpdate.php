<?php
require_once 'dbConnection-class.php';
class updateCategorie extends dbConnection{
     public function updateCat($cname, $cid) {
        try {
            $con = parent::connect();
            $sql = "update " . TBL_CATEGORIE . " set cname=:cname where cid=:cid";
            $stat = $con->prepare($sql);
            $stat->bindValue("cname", $cname);
            $stat->bindValue("cid", $cid);
            $check = $stat->execute();
            if ($check) {
                echo "ok";
            } else {
                echo "fail";
            }
        } catch (PDOException $ex) {
            die($e->getMessage());
            parent::disConnect($con);
        }
    }
}

$updateCategorie = new updateCategorie();
if (isset($_POST['cname']) and isset($_POST['cid'])) {
    $updateCategorie->updateCat($_POST['cname'], $_POST['cid']);
    //  echo $_POST['cname'];
}

?>