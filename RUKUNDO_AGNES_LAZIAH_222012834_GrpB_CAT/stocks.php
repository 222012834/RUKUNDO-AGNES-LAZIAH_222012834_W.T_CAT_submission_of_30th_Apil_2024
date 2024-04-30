<?php
include "databaseconnection.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product_id=$_POST['product_id'];
    $quantity_in=$_POST['quantity_in'];
    $quantity_out=$_POST['quantity_out'];
    $sql="INSERT INTO stocks (stock_id,product_id,quantity_in,quantity_out) VALUES('$stock_id','$product_id','$quantity_in','$quantity_out')";
        $result=$connection->query($sql);
    if ($result) {
        echo"Inserted Successfully";
        header("location:viewstocks.php");
        exit();
    }else{
        echo "Inserted fail";
    }

}

?>

