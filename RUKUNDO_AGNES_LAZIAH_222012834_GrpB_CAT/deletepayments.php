<?php
if (isset($_GET["payment_id	"])) {
   $payment_id	=$_GET["payment_id	"];
   //call file that contain database connection
include "databaseconnection.php";
$sql="DELETE FROM payments WHERE payment_id	=$payment_id	";
if ($connection->query($sql)) {
    echo "Record deleted successfully";
    header("location:viewpayments.php");  
    exit;
}else{
    echo "Error deleting record: " . $connection->error;
}
$connection->close();
}

?>
 
 