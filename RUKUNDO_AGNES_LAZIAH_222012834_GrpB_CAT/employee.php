<?php
include "databaseconnection.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$emp_name=$_POST['emp_name'];
	$phone=$_POST['phone'];
	$salary=$_POST['salary'];
	$position=$_POST['position'];
	$sql="INSERT INTO employee (emp_name,phone,salary,position) VALUES('$emp_name','$phone','$salary','$position')";
		$result=$connection->query($sql);
	if ($result) {
		echo"Inserted Successfully";
		header("location:viewemployee.php");
		exit();
	}else{
		echo "Inserted fail";
	}

}

?>
