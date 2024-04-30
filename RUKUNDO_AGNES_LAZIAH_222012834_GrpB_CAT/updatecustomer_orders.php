<?php 
include "databaseconnection.php";
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (!isset($_GET["order_id"])) {
        header("location: viewcustomer_orders.php");
        exit;
    }

    $order_id = $_GET["order_id"];

    $sql = "SELECT * FROM customer_orders WHERE order_id = $order_id";
    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $customer_name = $row["customer_name"];
        $product_name = $row["product_name"];
        $quantity = $row["quantity"];
        $amounts = $row["amounts"];
        $Dateorder = $row["Dateorder"];
        $phone = $row["phone"];
    } else {
        header("location:viewcustomer_orders.php");
        exit;
    }
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $order_id = $_POST["order_id"];
    $customer_name = $_POST["customer_name"];
    $product_name = $_POST["product_name"];
    $quantity = $_POST["quantity"];
    $amounts = $_POST['amounts'];
    $Dateorder = $_POST['Dateorder'];
    $phone =$_POST['phone'];

    if (empty($order_id) ||  empty($customer_name) || empty($product_name) || empty($quantity) || empty($amounts) || empty($Dateorder)  ||  empty($phone)) {
        echo "All fields are required!";
    } else {
        $sql = "UPDATE customer_orders SET customer_name='$customer_name', product_name= '$product_name', quantity='$quantity', amounts='$amounts', Dateorder='$Dateorder',phone='$phone' WHERE order_id='$order_id'";
    
        if ($connection->query($sql) ==TRUE) {
            echo "Information updated successfully";
            header("location:viewcustomer_orders.php");
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
        <h3 style="color:green;">UPDATE CUSTOMER ORDERS HERE</h3>
        <section class="forms">
            <form method="POST" onsubmit="return confirmUpdate();">
                <label>order_id</label><br>
                <input type="text" name="order_id" readonly  value="<?php echo $order_id; ?>"><br>
                <label>customer_name</label><br>
                <input type="text" name="customer_name"  value="<?php echo $customer_name; ?>"><br> 
                <label>product_name</label><br>
                <input type="text" name="product_name" value="<?php echo $product_name; ?>" ><br> 
                <label>quantity</label><br>
                <input type="text" name="quantity"  value="<?php echo $quantity; ?>"><br>
                <label>amounts</label><br>
                <input type="text" name="amounts"  value="<?php echo $amounts; ?>"><br> 
                <label>Dateorder</label><br>
                <input type="text" name="Dateorder"  value="<?php echo $Dateorder; ?>"><br>  
                <label>phone</label><br>
                <input type="text" name="phone"  value="<?php echo $phone; ?>"><br> 
                <input type="submit" name="submit" value="Update" class="sb">
            </form>
        </section>
    </center>
    <footer>
        <p style="color:blue; text-align: center; margin-top:40px;"><marquee> &copy; copy right&reg; LAZIAH_222012834_CBE_BIT_Year2_Group_2.</marquee> </p>
    </footer>
</body>
</html>

 