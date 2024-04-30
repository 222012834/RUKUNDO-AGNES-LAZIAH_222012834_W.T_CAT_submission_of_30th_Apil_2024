<?php 
include "databaseconnection.php";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (!isset($_GET["payment_id"])) {
        header("location: viewpayments.php");
        exit;
    }

    $payment_id = $_GET["payment_id"];

    $sql = "SELECT * FROM payments WHERE payment_id = ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("i", $payment_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $Transaction_name = $row["Transaction_name"];
        $Amount = $row["Amount"];
        $Date = $row["Date"];
    } else {
        header("location:viewpayments.php");
        exit;
    }
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $payment_id = $_POST["payment_id"];
    $Transaction_name = $_POST["Transaction_name"];
    $Amount = $_POST["Amount"];
    $Date = $_POST["Date"];
    if (empty($payment_id) ||  empty($Transaction_name) || empty($Amount) || empty($Date)) {
        echo "All fields are required!";
    } else {
        $sql = "UPDATE payments SET Transaction_name=?, Amount=?, Date=? WHERE payment_id=?";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("sdsi", $Transaction_name, $Amount, $Date, $payment_id);

        if ($stmt->execute()) {
            echo "Information updated successfully";
            header("location:viewpayments.php");
            exit;
        } else {
            echo "Error updating record: " . $connection->error;
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FURNITURE MANAGEMENT SYSTEM</title>
     <script >
        function confirmUpdate(){
        return confirm('Do you want to update this record');
               }

    </script>
    <style>
        h2 {
            font-family: Castellar;
            color: darkblue;
        }
        label {
            font-family: elephant;
            font-size: 20px;
        }
        .sb {
            font-family: Georgia;
            padding: 10px;
            border-color: blue;
            background-color: skyblue;
            width: 200px;
            margin-top: 5px;
            border-radius: 12px;
            font-weight: bold;
            color: blue;
        }
        .input {
            width: 350px;
            height: 35px;
            border-radius: 12px;
            border-color: green;
        }
    </style>
</head>
<body>
    <center>
        <h2>FURNITURE MANAGEMENT SYSTEM</h2>
        <h3 style="color:green;">UPDATE PAYMENTS HERE</h3>
        <section class="forms">
            <form method="POST" onsubmit="return confirmUpdate();">
                <label>payment_id</label><br>
                <input type="text" name="payment_id" readonly  value="<?php echo $payment_id; ?>"><br>
                <label>Transaction_name</label><br>
                <input type="text" name="Transaction_name"  value="<?php echo $Transaction_name; ?>"><br> 
                <label>Amount</label><br>
                <input type="text" name="Amount" value="<?php echo $Amount; ?>" ><br> 
                <label>date</label><br>
                <input type="text" name="Date" value="<?php echo $Date; ?>" ><br>
                <input type="submit" name="submit" value="Update" class="sb">
            </form>
        </section>
    </center>
    <footer>
        <p style="color:blue; text-align: center; margin-top:40px;"><marquee> &copy; copy right&reg; LAZIAH_222012834_CBE_BIT_Year2_Group_2.</marquee> </p>
    </footer>
</body>
</html>

