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
        <h4 style="text-align: center; font-family: century; font-weight: bold; color:blue;">THIS TABLE SHOWS ALL STOCKS IN THIS SYSTEM </h4>
        <a href="stocks.html" class="btn btn-primary" style="margin-top: 0px;">New stocks</a>
        <a href="home.html" class="btn btn-secondary" style="margin-left: 1000px;">Back Home</a>
        <table border="2">
            <thead>
                <tr>
                    <th>stock_id</th>
                    <th>product_id</th>
                    <th>quantity_in</th>
                    <th>quantity_out</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                //call the file that contain database connection
                include "databaseconnection.php";
                $sql = "SELECT * FROM stocks";
                $result = $connection->query($sql);
                if (!$result) {
                    echo "Invalid query!!" . $connection->error;
                }
                while ($row = $result->fetch_assoc()) {
                    echo "
                         <td>{$row['stock_id']}</td>
                        <td>{$row['product_id']}</td> 
                        <td>{$row['quantity_in']}</td>
                        <td>{$row['quantity_out']}</td>
                        <td>
                            <a href='/RUKUNDO_AGNES_LAZIAH_222012834_GrpB_CAT /updatestocks.php?stock_id={$row['product_id']}' class='btn btn-primary btn-sm'>Update</a></td>
                            <td>
                            <a href='/RUKUNDO_AGNES_LAZIAH_222012834_GrpB_CAT/deletestocks.php?stock_id={$row['stock_id']}' class='btn btn-danger btn-sm'>Delete</a>
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


