<?php
require_once 'dbConnection-class.php';
class register extends dbConnection {
 private $__fullName;
 private $__email;
 private $__sex;
 private $__phone;
 private $__username;
 private $__password;
 public function __construct($__fullName, $__email, $__sex, $__phone, $__username, $__password) {
  $this->__fullName = $__fullName;
  $this->__email    = $__email;
  $this->__sex      = $__sex;
  $this->__phone    = $__phone;
  $this->__username = $__username;
  $this->__password = $__password;

 }
 public function insertValue() {

  try {
   $con  = parent::connect();
   $sql  = "insert into " . TBL_USERACCOUNT . "(fullName,emailaddress,phonenumber,username,pass,sex,usertype) values (:fullName,:email,:phone,:username,:password,:sex,:userType)";
   $stat = $con->prepare($sql);//parace the query once  
   $stat->bindValue(":fullName", $this->__fullName);
   $stat->bindValue(":email", $this->__email);
   $stat->bindValue(":phone", $this->__phone);
   $stat->bindValue(":username", $this->__username);
   $stat->bindValue(":password", $this->__password);
   $stat->bindValue(":sex", $this->__sex);
   $stat->bindValue(":userType", "Student");
   $res = $stat->execute();
   if (!$res) {
    echo "Fail to insert";
    parent::disConnect($con);
   } else {
    echo "ok";
parent::disConnect($con);

   }
  } catch (PDOException $ex) {
     parent::disConnect($con);
   echo $ex->getMessage();
  }
 }
}
$newUser = new register($_POST['fullName'], $_POST['email'], $_POST['sex'], $_POST['phone'], $_POST['username'], $_POST['password']);
$newUser->insertValue();