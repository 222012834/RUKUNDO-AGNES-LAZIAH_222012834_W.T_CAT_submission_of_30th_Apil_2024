<?php
if (isset($_GET["emp_id"])) {
   $emp_id=$_GET["emp_id"];
   //call file that contain database connection
include "databaseconnection.php";
$sql="DELETE FROM employee WHERE emp_id=$emp_id";
if ($connection->query($sql)) {
    echo "Record deleted successfully";
    header("location:viewemployee.php");
    exit;
}else{
    echo "Error deleting record: " . $connection->error;
}
$connection->close();
}

?>

 