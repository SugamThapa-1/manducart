<?php
include("db_connection.php");
session_start();
$product_id = $_GET['product_id'];
// echo"product id is $product_id";
$order_id = $_GET['order_id'];
$form_page = $_GET['form_page'];

if ($form_page === 'cart') {
    $sql_select = "SELECT * FROM tbl_orders WHERE id = $order_id";
    $result_selc = mysqli_query($connection, $sql_select);
    $order_data = mysqli_fetch_assoc($result_selc);
    $customer_id = $order_data['customer_id'];


    $sql_select2 = "SELECT * FROM tbl_carts WHERE customer_id = $customer_id AND product_id = $product_id ";
    $result_selc2 = mysqli_query($connection, $sql_select2);
    $fetch_data = mysqli_fetch_assoc($result_selc2);

    $order_quantity = $fetch_data['quantity'];
}
if ($form_page === 'buy_now') {
    $order_quantity = $_GET['order_quantity'];
}


if (isset($_POST['payment'])) {
    $payment_method = $_POST['payment-method'];

    $sql = "INSERT INTO tbl_order_details (order_id,product_id,order_quantity,payment_method) VALUES ('$order_id','$product_id','$order_quantity','$payment_method')";
    $result = mysqli_query($connection, $sql);
    if (!$result) {
        echo "Data not inserted";
    }
    $sql_select = "SELECT * FROM tbl_products WHERE product_id = $product_id";
    $result_selc = mysqli_query($connection, $sql_select);

    $fetch_data_select = mysqli_fetch_assoc($result_selc);
    $in_stock = $fetch_data_select["product_quantity"];

    $stock_after_purchase = $in_stock - $order_quantity;

    $update_sql = "UPDATE tbl_products SET product_quantity = $stock_after_purchase WHERE product_id=$product_id";
    $update_result = mysqli_query($connection, $update_sql);


    header("location:thankyou.php");
}


if (isset($_POST['payment_option'])) {
    echo '<script>alert("API Under Development")</script>';
}




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ecommerce Home Page</title>
    <link rel="stylesheet" href="../../assets/payment.css" />
</head>

<body>

<?php include("nav.php")?>
    <!-- for payment page  -->

    <div class="main">
        <div class="container">
            <div>
                <form action="#" method="post">

                    <h3 style="margin-bottom: 30px;">Payment Option</h3>
                    <button type="submit" name="payment_option">Esewa</button>
                    <p style="display: inline; font-size:20px">or</p>
                    <button type="submit" name="payment_option">Khalti</button>
                    <select name="payment-method" required>
                        <option value="cash-on-delivery">Cash On Delivery</option>
                    </select>
                    <button type="submit" name="payment">Confirm Payment</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://kit.fontawesome.com/acc534193e.js" crossorigin="anonymous"></script>
</body>

</html>