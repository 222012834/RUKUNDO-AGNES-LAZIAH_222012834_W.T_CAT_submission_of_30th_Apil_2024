<?php
include "databaseconnection.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$customer_name=$_POST['customer_name'];
	$product_name=$_POST['product_name'];
	$quantity=$_POST['quantity'];
	$amounts=$_POST['amounts'];
	$Dateorder=$_POST['Dateorder'];
	$phone=$_POST['phone'];
	$sql="INSERT INTO customer_orders (customer_name,product_name,quantity,amounts,Dateorder,phone) VALUES('$customer_name','$product_name','$quantity','$amounts','$Dateorder','$phone')";
		$result=$connection->query($sql);
	if ($result) {
		echo"Inserted Successfully";
		header("location:viewcustomer_orders.php");
		exit();
	}else{
		echo "Inserted fail";
	}

}

?>

