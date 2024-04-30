<?php
$sever="localhost";
$username="222012834";
$password="222012834";
$database="furnituremanagementsystems";
$connection=new mysqli($sever,$username,$password,$database);
if ($connection->connect_error) {
	die("connection failed.".$connection->connect_error);
}

?>