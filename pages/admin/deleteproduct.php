<?php
session_start();
include "db_connection.php";

$product_id = $_GET['product_id'];

$sql_select = "SELECT * FROM tbl_products WHERE product_id=$product_id ";
$result_select = mysqli_query($connection, $sql_select);
$db_data = mysqli_fetch_assoc($result_select);
$category_id = $db_data['category_id'];
$product_name = $db_data['product_name'];

$sql = "DELETE FROM tbl_products WHERE product_id=$product_id";

$result = mysqli_query($connection, $sql);



$sql_category = "DELETE FROM tbl_categories WHERE category_id=$category_id";
$result_category = mysqli_query($connection, $sql_category);


if ($result && $result_category) {
    $_SESSION['delete_message'] = true;
} else {
    $_SESSION['delete_message'] = true;
}

header("location: manageproduct.php");