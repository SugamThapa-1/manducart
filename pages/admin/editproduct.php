<?php
session_start();
$admin_id = $_SESSION['admin_id'];
// if(!$_SESSION['logged_in']) {
//     header("location: /projectbit/login.php");
// }

include "db_connection.php";
$product_id = $_GET['product_id'];
$category_id = $_GET['category_id'];
$select_sql = "SELECT * FROM tbl_products WHERE product_id=$product_id";
$select_res = mysqli_query($connection, $select_sql);

if (isset($_POST['back'])) {
  header("location: manageproduct.php");
}


if (isset($_POST['update_product'])) {
  $product_name = $_POST['product_name'];

  $product_details = $_POST['product_details'];

  $product_quantity = $_POST['product_quantity'];
  $product_price = $_POST['product_price'];


  $product_category = $_POST['product_category'];
  $product_color = $_POST['product_color'];
  $product_size = $_POST['product_size'];

  //check image name unlink image.......


 
  if(isset($_FILES['$product_image'])){
    $product_image = $_FILES['product_image'];

    if ( $file['error'] == 0 ) {
      if ( $file['size'] < 300000 ) {
          $file_types = [ 'image/jpg', 'image/jpeg', 'image/png', 'image/gif' ];
          $file_ext   = in_array( $file['type'], $file_types );
          if ( $file_ext) {
              $target_dir = '../images/';
              $filename   = uniqid( $file_ext ); 
              $org_fileext = explode( ".", $photo);
              $photo_name = $filename . '.' . end($org_fileext); //move_uploaded_file(tem_name, fullpath_image)
              if ( move_uploaded_file( $file['tmp_name'], $target_dir . $photo_name  ) ) {
                  $confirmation_msg = "File uploaded successfully.";
              } else {
                  $confirmation_msg = "File upload failed.";
              }
          } else {
              $confirmation_msg = "This file is not supported.";
          }
      } else {
          $confirmation_msg = "File size must be less than 3MB.";
      }
  } else {
      $confirmation_msg = 'Please choose your file to upload.';
  }

    $sql = "UPDATE tbl_products SET product_name = '$product_name', product_details = '$product_details', product_image = '$photo_name', product_quantity = '$product_quantity', product_price = '$product_price',updated_by = '$admin_id' WHERE product_id=$product_id";
  }
  else{
    $sql = "UPDATE tbl_products SET product_name = '$product_name', product_details = '$product_details', product_quantity = '$product_quantity', product_price = '$product_price',updated_by = '$admin_id' WHERE product_id=$product_id";
  }
  
  
  $sql_cat = "UPDATE tbl_categories SET product_color = '$product_color', product_category = '$product_category', product_size = '$product_size', updated_by = '$admin_id' WHERE category_id=$category_id";
  // $result = mysqli_query($connection, $sql);
  // $result_cat = mysqli_query($connection, $sql_cat);


  if ($connection->query($sql) === true && $connection->query($sql_cat) === true) {
    $_SESSION['updated_message'] = true;
  } else {
    echo "Error: " . $sql . "<br>" . $connection->error;
    echo "Error: " . $sql_cat . "<br>" . $connection->error;
    $_SESSION['updated_message'] = true;

  }


  header("location: manageproduct.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Product</title>
  <link rel="stylesheet" href="../../assets/addproduct.css">
</head>

<body>
  <?php if ($select_res) :
    while ($old = mysqli_fetch_assoc($select_res)) :

      $category_id = $old['category_id'];

      $select_sql_cat = "SELECT * FROM tbl_categories WHERE category_id=$category_id";
      $select_res_cat = mysqli_query($connection, $select_sql_cat);
      $old_cat = mysqli_fetch_assoc($select_res_cat);
      $product_name = isset($old['product_name']) ? $old['product_name'] : '';
      $product_details = isset($old['product_details']) ? $old['product_details'] : '';
      $product_image = isset($old['product_image']) ? $old['product_image'] : '';
      $product_quantity = isset($old['product_quantity']) ? $old['product_quantity'] : '';
      $product_price = isset($old['product_price']) ? $old['product_price'] : '';


      $product_category = isset($old_cat['product_category']) ? $old_cat['product_category'] : '';
      $product_color = isset($old_cat['product_color']) ? $old_cat['product_color'] : '';
      $product_size = isset($old_cat['product_size']) ? $old_cat['product_size'] : '';

  ?>


      <form action="#" method="post">
        <label for="product_name">Product Name</label>
        <input type="text" name="product_name" value="<?php echo $product_name; ?>" required>

        <label for="product_category">Product Category</label>
        <input type="text" name="product_category" value="<?php echo $product_category; ?>" required>

        <label for="product_category">Product Category</label>
        <select name="product_category" id="product_category">
        <option><?php echo $old_cat['product_category']; ?> </option>
          <option value="Mens">Mens</option>
          <option value="Womens">Womens</option>
          <option value="Unisex">Unisex</option>
        </select>

        <label for="product_details">Product Details</label>
        <textarea type="text" name="product_details"><?php echo $product_details; ?></textarea>

        <label for="product_color">Available Colors</label>
        <select name="product_color" id="product_color">
          <option><?php echo $old_cat['product_color']; ?> </option>
          <option value="Black">Black</option>
          <option value="White">White</option>
          <option value="Blue">Blue</option>
          <option value="All of Above">All of Above</option>

        </select>
        <label for="product_size">Select Size</label>
        <select name="product_size" id="product_size">
        <option><?php echo $old_cat['product_size']; ?> </option>
          <option value="x">X</option>
          <option value="xl">XL</option>
          <option value="xxl">XXL</option>
          <option value="All of Above">All of Above</option>

    
        </select>
        <label for="product_image">Product Image</label>
        <input type="file" name="product_image">

        <label for="quantity">Quantity</label>
        <input type="number" name="product_quantity" value="<?php echo $product_quantity; ?>" required>

        <label for="product_price">Price</label>
        <input type="text" name="product_price" value="<?php echo $product_price; ?>" required>

        <button type="submit" name="update_product">Update Product</button>
        <button type="submit" name="back">Back</button>
      </form>
  <?php endwhile;
  endif; ?>
</body>

</html>