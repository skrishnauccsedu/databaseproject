<?php
function OpenCon()
 {
 $dbhost = "localhost:3306";
 $dbuser = "group4";
 $dbpass = "STUgroup4";
 $db = "group4";
 $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
 
 return $conn;
 }
 
function CloseCon($conn)
 {
 $conn -> close();
 }
   
?>