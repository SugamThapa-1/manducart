<?php
session_start();
include("db_connection.php");


$sql_select = "SELECT * FROM tbl_customers ORDER BY customer_id DESC";
$result_select = mysqli_query($connection, $sql_select);

$i = 1;

$delete_message = isset($_SESSION['delete_message']) ? $_SESSION['delete_message'] : false;

if ($delete_message) {
    echo "<script>alert('Product deleted Sucessfully')</script>";
    unset($_SESSION['delete_message']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Customers</title>
    <link rel="stylesheet" href="../../assets/adminpanel.css">
    <link rel="stylesheet" href="../../assets/adminnav.css">
</head>

<body>
    <?php
    include("adminnav.php");
    ?>
    <form action="adminpanel.php" method="post" class="">
        <button type="submit" name="back"><i class="fa-solid fa-angle-left"></i> Back</button>
    </form>
    <div class="table-wrapper">
        <table id="table">
            <div class="table-head">
                <tr id="table-titles">
                    <td>SN</td>
                    <td>Full Name</td>
                    <td>Email</td>
                    <td>Phone</td>
                    <td>Manage</td>
                </tr>

            </div>
            <?php if ($result_select): ?>
                <tbody>
                    <?php while ($db_data = mysqli_fetch_assoc($result_select)):

                        $customer_id = $db_data['customer_id'];
                        $customer_name = $db_data['fullname'];
                        $email = $db_data['email'];
                        $phone = $db_data['phone'];

                        ?>

                        <tr>
                            <td>
                                <?php echo "$i" ?>
                            </td>
                            <td>
                                <?php echo "$customer_name" ?>
                            </td>
                            <td>
                                <?php echo "$email" ?>
                            </td>
                            <td>
                                <?php echo "$phone" ?>
                            </td>
                            <td>
                                <a id="cust-delete-btn" href="deletecustomer.php?customer_id=<?php echo $customer_id; ?>"
                                    title="Delete"><i class="fa-solid fa-trash" style="margin-left: 25px; color:black;"></i>
                                </a>
                            </td>
                        </tr>
                        <?php $i++; endwhile; ?>
                </tbody>
            </table>

        <?php else: ?>
            <p>Data not found!</p>
        <?php endif; ?>
    </div>

</body>

</html>