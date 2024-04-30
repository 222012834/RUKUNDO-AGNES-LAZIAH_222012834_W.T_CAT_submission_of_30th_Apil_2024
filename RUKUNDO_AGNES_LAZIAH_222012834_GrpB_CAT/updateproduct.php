<?php 
include "databaseconnection.php";
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (!isset($_GET["productid"])) {
        header("location: viewproduct.php");
        exit;
    }

    $productid = $_GET["productid"];

    $sql = "SELECT * FROM products WHERE productid = $productid";
    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $productname = $row["productname"];
        $quantity = $row["quantity"];
        $Unitprice = $row["Unitprice"];
        $totalprice = $row["totalprice"];
        $description = $row["description"];
    } else {
        header("location:viewproduct.php");
        exit;
    }
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $productid = $_POST["productid"];
    $productname = $_POST["productname"];
    $quantity = $_POST["quantity"];
    $Unitprice = $_POST["Unitprice"];
    $totalprice = $_POST['totalprice'];
    $description = $_POST['description'];

    if (empty($productid) ||  empty($productname) || empty($quantity) || empty($Unitprice) || empty($totalprice) || empty($description)) {
        echo "All fields are required!";
    } else {
        $sql = "UPDATE products SET productname='$productname', quantity= '$quantity', Unitprice='$Unitprice', totalprice='$totalprice', description='$description' WHERE productid='$productid'";
    
        if ($connection->query($sql) === TRUE) {
            echo "Information updated successfully";
            header("location:viewproduct.php");
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
        <h3 style="color:green;">UPDATE PRODUCTS HERE</h3>
        <section class="forms">
            <form method="POST" onsubmit="return confirmUpdate();">
                <label>productid</label><br>
                <input type="text" name="productid" readonly  value="<?php echo $productid; ?>"><br>
                <label>productname</label><br>
                <input type="text" name="productname"  value="<?php echo $productname; ?>"><br> 
                <label>quantity</label><br>
                <input type="text" name="quantity" value="<?php echo $quantity; ?>" ><br> 
                <label>Unit Price</label><br>
                <input type="text" name="Unitprice" value="<?php echo $Unitprice; ?>" ><br>
                <label>Total Price</label><br>
                <input type="text" name="totalprice"  value="<?php echo $totalprice; ?>"><br>  
                <label>Description</label><br>
                <textarea name="description" ><?php echo $description; ?></textarea><br>
                <input type="submit" name="submit" value="Update" class="sb">
            </form>
        </section>
    </center>
    <footer>
        <p style="color:blue; text-align: center; margin-top:40px;"><marquee> &copy; copy right&reg; LAZIAH_222012834_CBE_BIT_Year2_Group_2.</marquee> </p>
    </footer>
</body>
</html>

 