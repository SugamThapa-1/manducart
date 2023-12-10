<?php
include("db_connection.php");
session_start();

    
$customer_id = isset($_SESSION['customer_id']) ? $_SESSION['customer_id'] : header("location: login.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Account</title>
</head>
<body>
    <?php include("nav.php");?>
    <a href="customeraccountdelete.php">Delete Account</a>
    <a href="customeraccountupdate.php">Update Account</a>
</body>
</html>