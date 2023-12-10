<?php
session_start();
include("db_connection.php");

$counter = 0;

$sql = "SELECT * FROM tbl_products";
$result = mysqli_query($connection, $sql);

$updated_message = isset($_SESSION['updated_message']) ? $_SESSION['updated_message'] : false;

if($updated_message){
    echo "<script>alert('Product updated Sucessfully')</script>";
    unset($_SESSION['updated_message']);
}
$delete_message = isset($_SESSION['delete_message']) ? $_SESSION['delete_message'] : false;
if($delete_message){
    echo "<script>alert('Product deleted Sucessfully')</script>";
    unset($_SESSION['delete_message']);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Products</title>
    <link rel="stylesheet" href="../../assets/table.css">
    <link rel="stylesheet" href="../../assets/signup.css">
</head>

<body>

    <?php if ($result): ?>
        <table id="table">
            <thead>
                <tr>
                    <td>SN</td>
                    <td>Product Image</td>
                    <td>Product Name</td>
                    <td>Product Category</td>
                    <td>Product Color</td>
                    <td>Product Size</td>
                    <td>Product Details</td>
                    <td>Product Quantity</td>
                    <td>Product Price</td>
                    <td>Manage</td>
                </tr>

            </thead>

            <tbody>
                <?php while ($db_data = mysqli_fetch_assoc($result)): ?>
                    <?php
                    $category_id = $db_data['category_id'];
                    $sql_cat = "SELECT * FROM tbl_categories WHERE category_id=$category_id";
                    $result_cat = mysqli_query($connection, $sql_cat);
                    $db_data_cat = mysqli_fetch_assoc($result_cat)
                        ?>
                    <tr>
                        <td>
                            <?php echo ++$counter; ?>
                        </td>
                        <td> <img src="../../images/<?php echo $db_data['product_image']; ?>" alt=""
                                style="width:50px; height: 100%;"></td>
                        <td>
                            <?php echo $db_data['product_name']; ?>
                        </td>
                        <td>
                            <?php echo $db_data_cat['product_category']; ?>
                        </td>
                        <td>
                            <?php echo $db_data_cat['product_color']; ?>
                        </td>
                        <td>
                            <?php echo $db_data_cat['product_size']; ?>
                        </td>
                        <td>
                            <?php echo $db_data['product_details']; ?>
                        </td>
                        <td>
                            <?php echo $db_data['product_quantity']; ?>
                        </td>
                        <td>
                            <?php echo $db_data['product_price']; ?>
                        </td>

                        <td> <a href="deleteproduct.php? product_id='<?php echo $db_data['product_id']; ?>'"
                                title="Delete">Delete</a></td>
                        <td> <a href="editproduct.php? product_id='<?php echo $db_data['product_id']; ?>'&category_id='<?php echo $db_data['category_id']; ?>'" title="Edit">Edit</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Data not found!</p>
    <?php endif; ?>
    <form action="adminpanel.php" method="post" class="">
        <button type="submit" name="back">back</button>
    </form>
</body>

</html>