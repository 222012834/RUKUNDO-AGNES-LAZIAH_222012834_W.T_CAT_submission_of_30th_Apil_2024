<?php
session_start();
include "databaseconnection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT email FROM user WHERE email = '$email' AND password = '$password'";
    $result = $connection->query($sql);

    if ($result->num_rows == 1) {
        // Fetch the ID from the query result
        $row = $result->fetch_assoc();
        $user_id = $row['id'];
        
        // Store both email and ID in the session
        $_SESSION['user_id'] = $user_id;
        $_SESSION['email'] = $email;
        
        header("Location: home.html"); 
        exit();
    } else {
        echo "Invalid email or password";
        exit;
    }
}

$conn->close();
?>

