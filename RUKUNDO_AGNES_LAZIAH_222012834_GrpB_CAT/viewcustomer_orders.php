<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>furniture management system</title>
    <!-- here we use bootstrap inorder to make good apperance of this table-->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<center>
    <div class="container">
        <h2 style="text-align: center; font-family: century; font-weight: bold; color: green;">FURNITURE MANAGEMENT SYSTEM</h2>
        <h4 style="text-align: center; font-family: century; font-weight: bold; color:blue;">THIS TABLE SHOWS ALL CUSTOMER ORDERS IN THIS SYSTEM </h4>
        <a href="customer_orders.html" class="btn btn-primary" style="margin-top: 0px;">New orders</a>
        <a href="home.html" class="btn btn-secondary" style="margin-left: 1000px;">Back Home</a>
        <table border="2">
            <thead>
                <tr>
                    <th>order Id</th>
                    <th>customername</th>
                    <th>product name</th>
                    <th>quantity</th>
                    <th>amounts</th>
                    <th>Dateorder</th>
                     <th>phone</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                include "databaseconnection.php";
                $sql = "SELECT * FROM customer_orders";
                $result = $connection->query($sql);
                if (!$result) {
                    echo "Invalid query!!" . $connection->error;
                }
                while ($row = $result->fetch_assoc()) {
                    echo "
                    <tr>
                        <td>{$row['order_id']}</td>
                        <td>{$row['customer_name']}</td> 
                        <td>{$row['product_name']}</td>
                        <td>{$row['quantity']}</td>
                        <td>{$row['amounts']}</td>
                        <td>{$row['Dateorder']}</td>
                        <td>{$row['phone']}</td>
                        <td>
                            <a href='/RUKUNDO_AGNES_LAZIAH_222012834_GrpB_CAT/updatecustomer_orders.php?order_id={$row['order_id']}' class='btn btn-primary btn-sm'>Update</a></td>
                            <td>
                            <a href='/RUKUNDO_AGNES_LAZIAH_222012834_GrpB_CAT/deletecustomer_orders.php?order_id={$row['order_id']}' class='btn btn-danger btn-sm'>Delete</a>
                        </td>
                    </tr>
                    ";
                }
                ?>
            </tbody>
        </table>
    </div>
    </center>
</body>
</html>


