<?php
if (isset($_GET["productid"])) {
   $productid=$_GET["productid"];
   //call file that contain database connection
include "databaseconnection.php";
$sql="DELETE FROM products WHERE productid=$productid";
if ($connection->query($sql)) {
    echo "Record deleted successfully";
    header("location:viewproduct.php");
    exit;
}else{
    echo "Error deleting record: " . $connection->error;
}
$connection->close();
}

?>
 