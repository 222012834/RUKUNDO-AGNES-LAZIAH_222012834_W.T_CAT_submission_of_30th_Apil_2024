<?php 
include "databaseconnection.php";
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (!isset($_GET["sup_id"])) {
        header("location: viewsuppliers.php");
        exit;
    }

    $sup_id = $_GET["sup_id"];

    $sql = "SELECT * FROM suppliers WHERE sup_id = $sup_id";
    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $name = $row["name"];
        $telephone = $row["telephone"];
        $quantity = $row["quantity"];
        $product_id = $row["product_id"];
        $stock_id = $row["stock_id"];
    } else {
        header("location:viewsuppliers.php");
        exit;
    }
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $sup_id = $_POST["sup_id"];
    $name = $_POST["name"];
    $telephone = $_POST["telephone"];
    $quantity = $_POST["quantity"];
    $product_id = $_POST['product_id'];
    $stock_id = $_POST['stock_id'];

    if (empty($sup_id) ||  empty($name) || empty($telephone) || empty($quantity) || empty($product_id) || empty($stock_id)) {
        echo "All fields are required!";
    } else {
        $sql = "UPDATE suppliers SET name='$name', telephone= '$telephone', quantity='$quantity', product_id='$product_id', stock_id='$stock_id' WHERE sup_id='$sup_id'";
    
        if ($connection->query($sql) === TRUE) {
            echo "Information updated successfully";
            header("location:viewsuppliers.php");
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
        <h3 style="color:green;">UPDATE SUPPLIERS HERE</h3>
        <section class="forms">
            <form method="POST" onsubmit="return confirmUpdate();">
                <label>sup_id</label><br>
                <input type="text" name="sup_id" readonly  value="<?php echo $sup_id; ?>"><br>
                <label>name</label><br>
                <input type="text" name="name"  value="<?php echo $name; ?>"><br> 
                <label>telephone</label><br>
                <input type="text" name="telephone" value="<?php echo $telephone; ?>" ><br> 
                <label>Unit Price</label><br>
                <input type="text" name="quantity" value="<?php echo $quantity; ?>" ><br>
                <label>Total Price</label><br>
                <input type="text" name="product_id"  value="<?php echo $product_id; ?>"><br>  
                <label>stock_id</label><br>
                <input type="text" name="stock_id"  value="<?php echo $stock_id; ?>"><br>
                
                <input type="submit" name="submit" value="Update" class="sb">
            </form>
        </section>
    </center>
    <footer>
        <p style="color:blue; text-align: center; margin-top:40px;"><marquee> &copy; copy right&reg; LAZIAH_222012834_CBE_BIT_Year2_Group_2.</marquee> </p>
    </footer>
</body>
</html>

 