<?php
require_once "dbconfig.php";
abstract class dbConnection {
    /**
     * 
     * <b>This method llow as to create database connection object</b>
     */
 public function connect() {
  try {
   $con = new PDO(DSN, USERNAME, PASSWORD);
   $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   $con->setAttribute(PDO::ATTR_PERSISTENT, true);
   if ($con) {
    return $con;
   }
  } catch (PDOException $ex) {
   die($ex->getMessage());
  }
 }

 public function disConnect($obj) {
  reset($obj);
 }
}