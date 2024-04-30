<?php
include "databaseconnection.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username=$_POST['username'];
    $phone=$_POST['phone'];
    $email=$_POST['email'];
    $gender=$_POST['Gender'];
    $Date=$_POST['Date'];
     $password=$_POST['password'];
      $Activation_code=$_POST['Activation_code'];
    $sql="INSERT INTO user (username,phone,email,gender,Date,password,Activation_code) VALUES('$username','$phone','$email','$gender','$Date','$password','$Activation_code')";
        $result=$connection->query($sql);
    if ($result) {
        echo"Inserted Successfully";
        header("location:login.html");
        exit();
    }else{
        echo "Inserted fail";
    }

}

?>