<?php
if (isset($_GET["sup_id"])) {
   $sup_id=$_GET["sup_id"];
   //call file that contain database connection
include "databaseconnection.php";
$sql="DELETE FROM suppliers WHERE sup_id=$sup_id";
if ($connection->query($sql)) {
    echo "Record deleted successfully";
    header("location:viewsuppliers.php");
    exit;
}else{
    echo "Error deleting record: " . $connection->error;
}
$connection->close();
}

?>

 