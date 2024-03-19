<?php 
$host="localhost"; 
$database="makale"; 
$username="root"; 
$password=""; 

try {
	$db=new PDO("mysql:host=$host;dbname=$database;charset=utf8",$username,$password);
}
catch (PDOExpception $e) {
	echo $e->getMessage();
}
?>