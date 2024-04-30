<?php
include "databaseconnection.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$productname=$_POST['productname'];
	$quantity=$_POST['quantity'];
	$unitprice=$_POST['unitprice'];
	$totalprice=$_POST['totalprice'];
	$description=$_POST['description'];
	$sql="INSERT INTO products (productname,quantity,unitprice,totalprice,description) VALUES('$productname','$quantity','$unitprice','$totalprice','$description')";
		$result=$connection->query($sql);
	if ($result) {
		echo"Inserted Successfully";
		header("location:viewproduct.php");
		exit();
	}else{
		echo "Inserted fail";
	}

}

?>
