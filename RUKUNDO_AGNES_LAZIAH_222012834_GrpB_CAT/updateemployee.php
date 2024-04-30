<?php 
include "databaseconnection.php";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (!isset($_GET["emp_id"])) {
        header("location: viewemployee.php");
        exit;
    }

    $emp_id = $_GET["emp_id"];

    $sql = "SELECT * FROM employee WHERE emp_id = ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("i", $emp_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $emp_name = $row["emp_name"];
        $phone = $row["phone"];
        $salary = $row["salary"];
        $position = $row["position"];
    } else {
        header("location:viewemployee.php");
        exit;
    }
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $emp_id = $_POST["emp_id"];
    $emp_name = $_POST["emp_name"];
    $phone = $_POST["phone"];
    $salary = $_POST["salary"];
    $position = $_POST["position"];
    if (empty($emp_id) ||  empty($emp_name)  ||  empty($phone)  ||  empty($salary)  ||  empty($position)) {
        echo "All fields are required!";
    } else {
        $sql = "UPDATE employee SET emp_name='$emp_name', phone= '$phone', salary='$salary', position='$position' WHERE emp_id='$emp_id'";
        if ($connection->query($sql) === TRUE) {
            echo "Information upsalaryd successfully";
            header("location:viewemployee.php");
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
        <h3 style="color:green;">UPdate EMPLOYEES HERE</h3>
        <section class="forms">
            <form method="POST" onsubmit="return confirmUpdate();">
                <label>emp_id</label><br>
                <input type="text" name="emp_id" readonly  value="<?php echo $emp_id; ?>"><br>
                <label>emp_name</label><br>
                <input type="text" name="emp_name"  value="<?php echo $emp_name; ?>"><br> 
                <label>phone</label><br>
                <input type="phone" name="phone" value="<?php echo $phone; ?>" ><br> 
                <label>salary</label><br>
                <input type="text" name="salary" value="<?php echo $salary; ?>" ><br>
                 <label>position</label><br>
                <input type="text" name="position" value="<?php echo $position; ?>" ><br>
                <input type="submit" name="submit" value="Update" class="sb">
            </form>
        </section>
    </center>
    <footer>
        <p style="color:blue; text-align: center; margin-top:40px;"><marquee> &copy; copy right&reg; LAZIAH_222012834_CBE_BIT_Year2_Group_2.</marquee> </p>
    </footer>
</body>
</html>


