<?php
if (isset($_GET["stock_id"])) {
   $stock_id=$_GET["stock_id"];
   //call file that contain database connection
include "databaseconnection.php";
$sql="DELETE FROM stocks WHERE stock_id=$stock_id";
if ($connection->query($sql)) {
    echo "Record deleted successfully";
    header("location:viewstocks.php");
    exit;
}else{
    echo "Error deleting record: " . $connection->error;
}
$connection->close();
}

?>
 
 
 