<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Furniture Management System</title>
    <!-- here we use bootstrap inorder to make good appearance of this table-->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<center>
    <div class="container">
        <h2 style="text-align: center; font-family: century; font-weight: bold; color: green;">FURNITURE MANAGEMENT SYSTEM</h2>
        <h4 style="text-align: center; font-family: century; font-weight: bold; color:blue;">THIS TABLE SHOWS ALL PAYMENTS IN THIS SYSTEM </h4>
        <a href="payments.html" class="btn btn-primary" style="margin-top: 0px;">New payments</a>
        <a href="home.html" class="btn btn-secondary" style="margin-left: 20px;">Back Home</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>payment_id</th>
                    <th>Transaction_name</th>
                    <th>Amount</th>
                    <th>Date</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                // Call the file that contains database connection
                include "databaseconnection.php";
                $sql = "SELECT * FROM payments";
                $result = $connection->query($sql);
                if (!$result) {
                    echo "Invalid query!!" . $connection->error;
                }
                while ($row = $result->fetch_assoc()) {
                    echo "
                    <tr>
                        <td>{$row['payment_id']}</td>
                        <td>{$row['Transaction_name']}</td> 
                        <td>{$row['Amount']}</td>
                        <td>{$row['Date']}</td>
                        <td>
                            <a href='updatepayments.php?payment_id={$row['payment_id']}' class='btn btn-primary btn-sm'>Update</a></td>
                            <td>
                            <a href='deletepayments.php?payment_id={$row['payment_id']}' class='btn btn-danger btn-sm'>Delete</a>
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

