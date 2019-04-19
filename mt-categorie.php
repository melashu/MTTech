<?php
require_once 'dbConnection-class.php';
class categorie extends dbConnection {
    private $_cname;
    public function __construct($name) {
        $this->_cname = $name;
    }
    public function insertValue() {
        try {
            $con = parent::connect();
            $sql = "insert into " . TBL_CATEGORIE . "(cname) values(:cat)";
            $stat = $con->prepare($sql); //parace the query once
            $stat->bindValue(":cat", $this->_cname);
            $res = $stat->execute();
            if (!$res) {
                echo "Fail";
                parent::disConnect($con);
            } else {
                echo "ok";
                parent::disConnect($con);
            }
        } catch (PDOExcption $ex) {
            parent::disConnect($con);
            echo $ex->getMessage();
        }
    }
}
if (isset($_POST['categorie']) and !empty($_POST['categorie'])) {
    $newCat = new categorie($_POST['categorie']);
    $newCat->insertValue();
}

class ShowCat extends dbConnection {
    public function getCat($para) {
        try {
            $con = parent::connect();
            if ($para != "") {
                $sql = "select * from " . TBL_CATEGORIE . " where cid=:para";
                $stst = $con->prepare($sql);
                $stst->bindValue("para", $para);
                $stst->execute();
                $result = $stst->fetch();
                parent::disConnect($con);

                return $result;
            } else {
                $sql = "select * from " . TBL_CATEGORIE . " ORDER BY cid";
                $result = $con->query($sql);
                parent::disConnect($con);

                return $result;
            }

            //  }

        } catch (PDOException $e) {
            echo $e->getMessage();
            parent::disConnect($con);
        }
    }
    public function deleteCat($para){
         $con = parent::connect();
            $sql = "DELETE FROM " . TBL_CATEGORIE . " where cid=:cid";
            $stat = $con->prepare($sql);
            $stat->bindValue("cid", $para);
            $check = $stat->execute();
            return $check;
    }
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

$showCat = new ShowCat();
if (isset($_POST['cname']) and isset($_POST['cid'])) {
    $showCat->updateCat($_POST['cname'], $_POST['cid']);
    //  echo $_POST['cname'];
}

?>