<?php 
include "databaseconnection.php";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (!isset($_GET["stock_id"])) {
        header("location: viewstocks.php");
        exit;
    }

    $stock_id = $_GET["stock_id"];

    $sql = "SELECT * FROM stocks WHERE stock_id = ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("i", $stock_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $product_id = $row["product_id"];
        $quantity_in = $row["quantity_in"];
        $quantity_out = $row["quantity_out"];
    } else {
        header("location:viewstocks.php");
        exit;
    }
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $stock_id = $_POST["stock_id"];
    $product_id = $_POST["product_id"];
    $quantity_in = $_POST["quantity_in"];
    $quantity_out = $_POST["quantity_out"];
    if (empty($stock_id) ||  empty($product_id) || empty($quantity_in) || empty($quantity_out)) {
        echo "All fields are required!";
    } else {
       $sql = "UPDATE stocks SET product_id='$product_id', quantity_in= '$quantity_in', quantity_out='$quantity_out' WHERE stock_id='$stock_id'";
    
        if ($connection->query($sql) === TRUE) {

        
            echo "Information upquantity_outd successfully";
            header("location:viewstocks.php");
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
        <h3 style="color:green;">UPDATE STOCKS HERE</h3>
        <section class="forms">
            <form method="POST" onsubmit="return confirmUpdate();">
                <label>stock_id</label><br>
                <input type="text" name="stock_id" readonly  value="<?php echo $stock_id; ?>"><br>
                <label>product_id</label><br>
                <input type="text" name="product_id"  value="<?php echo $product_id; ?>"><br> 
                <label>quantity_in</label><br>
                <input type="text" name="quantity_in" value="<?php echo $quantity_in; ?>" ><br> 
                <label>quantity_out</label><br>
                <input type="text" name="quantity_out" value="<?php echo $quantity_out; ?>" ><br>
                <input type="submit" name="submit" value="Update" class="sb">
            </form>
        </section>
    </center>
    <footer>
        <p style="color:blue; text-align: center; margin-top:40px;"><marquee> &copy; copy right&reg; LAZIAH_222012834_CBE_BIT_Year2_Group_2.</marquee> </p>
    </footer>
</body>
</html>



