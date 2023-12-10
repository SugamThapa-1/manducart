<?php
session_start();
include "db_connection.php";

$form_page = $_GET['form_page'];

$customer_id = $_SESSION['customer_id'];
$product_id = $_GET['product_id'];
$cart = "cart";
if ($form_page === "cart") {

    $select_sql = "SELECT * FROM tbl_carts WHERE product_id=$product_id AND customer_id=$customer_id";

    $select_res = mysqli_query($connection, $select_sql);

    if (!$select_res) {
        echo "query not send";
    }
    $data = mysqli_fetch_assoc($select_res);
    $product_quantity = isset($data['quantity']) ? $data['quantity'] : 1;
} else {

    $product_quantity = $_GET['quantity'];
    $form_page = 'buy_now';

}
$select_sql1 = "SELECT * FROM tbl_customers WHERE customer_id = $customer_id";
$select_res1 = mysqli_query($connection, $select_sql1);
$db_data = mysqli_fetch_assoc($select_res1);

$fullname = isset($db_data['fullname']) ? $db_data['fullname'] : '';
$email = isset($db_data['email']) ? $db_data['email'] : '';
$phone = isset($db_data['phone']) ? $db_data['phone'] : '';


$select_sql2 = "SELECT * FROM tbl_products WHERE product_id = $product_id";
$select_res2 = mysqli_query($connection, $select_sql2);
$db_data2 = mysqli_fetch_assoc($select_res2);

$product_name = isset($db_data2['product_name']) ? $db_data2['product_name'] : '';
$product_price = isset($db_data2['product_price']) ? $db_data2['product_price'] : '';

$total_price = $product_price * $product_quantity;



if (isset($_POST['checkout'])) {
    $fullname = isset($_POST['fullname']) ? $_POST['fullname'] : $db_data['fullname'];
    $phone = isset($_POST['phone']) ? $_POST['phone'] : $db_data['phone'];
    $email = isset($_POST['email']) ? $_POST['email'] : $db_data['email'];
    $address = $_POST['address'];

    $sql4 = "INSERT INTO tbl_orders(customer_id) VALUES ('$customer_id')";

    if ($connection->query($sql4) === TRUE) {
        $latest_id = $connection->insert_id;
    } else {
        echo "Error: " . $sql4 . "<br>" . $connection->error;
    }


    $sql5 = "INSERT INTO tbl_shippings (order_id,customer_name, email, phone, address)VALUES($latest_id,'$fullname', '$email', '$phone','$address')";

    $select_res5 = mysqli_query($connection, $sql5);

    // print_r($sql3);
    if (!$select_res5) {
        echo "Query not sent" . mysqli_error($connection);
    }

    // header("location:payment.php?order_id=$latest_id&product_id = $id ");
    header("location:payment.php?order_id=$latest_id&form_page=$form_page&order_quantity=$product_quantity&product_id=$product_id");
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/checkout.css">
    <link rel="stylesheet" href="../../assets/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Payment Page</title>

</head>

<body>
    <?php include "nav.php";

    ?>
    <div class="wrapper">

        <form action="#" method="post">
            <h2 class="title">Checkout Details</h2>
            <div class="container">
                <div class="row1" id="row1">
                    <div class="col">

                    </div>
                </div>
                <div class="row2">
                    <div class="left">
                        <div class="margin">
                            <i class="fa-solid fa-user"></i>
                            <label for="">Fullname</label>
                        </div>
                        <div class="margin">
                            <input class="input-field" type="text" name="fullname" value="<?php echo $fullname; ?>"
                                required>
                        </div>
                        <div class="margin">
                            <i class="fa-solid fa-envelope"></i>
                            <label for="">Email</label>
                        </div>
                        <div class="margin">
                            <input class="input-field" type="text" name="email" value="<?php echo $email; ?>" required>
                        </div>
                        <div class="margin">
                            <i class="fa-solid fa-phone"></i>
                            <label for="">Phone</label>
                        </div>
                        <div class="margin">
                            <input class="input-field" type="text" name="phone" value="<?php echo $phone; ?>" required>
                        </div>
                    </div class="margin">

                    <div class="right">
                        <div class="margin">
                            <i class="fa-solid fa-address-book"></i>
                            <label for="">Address</label>
                        </div>
                        <div class="margin">
                            <input class="input-field" type="text" name="address" required>
                        </div>

                        <button type="submit" value="submit" class="button" name="checkout">Proceed to Checkout</button>


                    </div>




                </div>
        </form>
    </div>

</body>

</html>