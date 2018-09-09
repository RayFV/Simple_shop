<?php

 $dbhost = "localhost";
 $dbuser = "root";
 $dbpass = "";
 $db = "b10423056hw2";

$conn = mysqli_connect($dbhost, $dbuser, $dbpass,$db);

if(!$conn){
	die("Connection Failed:" . mysqli_connect_error());
}
 
?>