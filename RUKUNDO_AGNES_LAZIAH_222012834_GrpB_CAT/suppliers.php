<?php
//call the file that contain database connection
include "databaseconnection.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$sup_id=$_POST['sup_id'];
	$name=$_POST['name'];
	$telephone=$_POST['telephone'];
	$quantity=$_POST['quantity'];
	$product_id=$_POST['product_id'];
	$stock_id=$_POST['stock_id'];
	$sql="INSERT INTO suppliers(sup_id,name,telephone,quantity,product_id,stock_id) VALUES('$sup_id','$name','$telephone','$quantity','$product_id','$stock_id')";
	$result=$connection->query($sql);
	if ($result) {
		echo"Inserted Successfully";
		header("location:viewsuppliers.php");
		exit();
	}else{
		echo "Inserted fail";
	}

}

  ?>
