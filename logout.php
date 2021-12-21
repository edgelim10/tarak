<?php
$username=$_SESSION['username'];
$idd=$_SESSION['id'];
	$host="localhost";
$user="root";
$pass="rootroot";
$db="db_pdo_search2";
$con=mysql_connect($host,$user,$pass);
if (!$con){
	echo"cant connect to database";
}
$connectdb=mysql_select_db($db, $con);
if (!$connectdb){
	echo"no database found";
}
session_start();
session_destroy();
header("location: ../search2");
?>