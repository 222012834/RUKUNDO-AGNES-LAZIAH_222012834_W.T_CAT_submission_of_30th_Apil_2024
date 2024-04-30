<?php
include "databaseconnection.php";
if ($_SEVER['REQUEST_METHOD'] == 'POST') {
	$Transaction_name=$_POST['Transaction_name'];
	$amount=$_POST['Amount'];
	$Date=$_POST['Date'];
	$sql="INSERT INTO payments (payment_id,Transaction_name,Amount,Date,) VALUES('$payment_id','$Transction_name','$Amount','$Date')";
		$result=$connection->query($sql);
	if ($result) {
		echo"Inserted Successfully";
		//header("location:viewpayments.php");
		//exit();
	}else{
		echo "Inserted fail";
	}

}

?>


