<?php
session_start();
include("db_connection.php");

$counter = 0;

$sql = "SELECT * FROM tbl_order_details";
$result = mysqli_query($connection, $sql);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders</title>
    <link rel="stylesheet" href="../../assets/adminpanel.css">


</head>

<body>
    <?php
    include("adminnav.php");
    ?>
    <form action="adminpanel.php" method="post">
        <button type="submit" name="back"><i class="fa-solid fa-angle-left"></i> Back</button>
    </form>

    <?php if ($result): ?>
        <div class="table-wrapper">
            <table id="table" style="table-layout: unset;">
                <div class="table-head">
                    <tr id="table-titles">
                        <td>SN</td>
                        <td>Customer Name</td>
                        <td>Product Image</td>
                        <td>Name</td>
                        <td>Quantity</td>
                        <td>Total Price</td>
                        <td>Payment Method</td>
                        <td>Address</td>
                        <td>Manage</td>
                    </tr>
                </div>
                <tbody>

                    <?php while ($db_data = mysqli_fetch_assoc($result)):
                        $order_id = $db_data['order_id'];

                        $product_id = $db_data['product_id'];

                        $sql3 = "SELECT * FROM tbl_products WHERE product_id = $product_id";
                        $result3 = mysqli_query($connection, $sql3);
                        $db_data3 = mysqli_fetch_assoc($result3);

                        $sql4 = "SELECT * FROM tbl_shippings WHERE order_id = $order_id";
                        $result4 = mysqli_query($connection, $sql4);
                        $db_data4 = mysqli_fetch_assoc($result4);


                        $total_price = $db_data['order_quantity'] * $db_data3['product_price'];
                        ?>

                        <tr>

                            <td>
                                <?php echo ++$counter; ?>
                            </td>
                            <td>
                                <?php echo $db_data4['customer_name']; ?>
                            </td>
                            <td> <img src="../../images/<?php echo $db_data3['product_image']; ?>" alt=""
                                    style="width:50px; height: 100%; margin-left:25px;"></td>
                            <td>
                                <?php echo $db_data3['product_name']; ?>
                            </td>
                            <td>
                                <?php echo $db_data['order_quantity']; ?>
                            </td>
                            <td>
                                <?php echo $total_price ?>
                            </td>
                            <td>
                                <?php echo $db_data['payment_method']; ?>
                            </td>
                            <td>
                                <?php echo $db_data4['address']; ?>
                            </td>
                            <td> <a href="ordersdelete.php? order_id= <?php echo $order_id; ?>" title="Delete"><i
                                        class="fa-solid fa-trash" style="margin-left: 25px;"></i></a></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    <?php else: ?>
        <p>Data not found!</p>
    <?php endif;

    if (isset($_SESSION['order_delete_message'])) {
        session_destroy();
    } ?>

    <script src="https://kit.fontawesome.com/acc534193e.js" crossorigin="anonymous"></script>
</body>

</html>