<?php
include("db_connection.php");
session_start();

$product_id = $_GET['product_id'];
$sql = "SELECT * FROM tbl_products WHERE product_id = $product_id";
$result = mysqli_query($connection, $sql);
$product_quantity = isset($_POST['updated_prod_qty']) ? $_POST['updated_prod_qty'] : 1;


if (isset($_POST['add_to_cart'])) {

  if (isset($_SESSION['logged_in'])) {

    $product_id = $_POST['product_id'];
    $customer_id = isset($_SESSION['customer_id']) ? $_SESSION['customer_id'] : '';

    $query = "SELECT * FROM tbl_carts WHERE product_id=$product_id AND customer_id =$customer_id";
    $data = mysqli_query($connection, $query);

    if (mysqli_num_rows($data) >= 1) {
      echo '<script>alert("Product Already Added")</script>';
    } else {

      $sql1 = "INSERT INTO tbl_carts (product_id,customer_id, quantity) VALUES($product_id,$customer_id,$product_quantity)";
      $result1 = mysqli_query($connection, $sql1);

      if ($result1) {
        echo '<script>alert("Product Added to Cart")</script>';
      }
    }
  } else {
    $page = "productdetail.php";
    $_SESSION["product_id"] = $_GET['product_id'];
    header("location: login.php?page = $page");
  }
}

if (isset($_POST['buy_now'])) {
  if (isset($_SESSION['logged_in'])) {
    $product_id = $_POST['product_id'];
    $customer_id = isset($_SESSION['customer_id']) ? $_SESSION['customer_id'] : "";
    $product_quantity_buy = isset($_POST['updated_prod_qty_buy']) ? $_POST['updated_prod_qty_buy'] : 1;

    $form_page = "buy";
    header("location:checkout.php?product_id=$product_id&customer_id=$customer_id&quantity=$product_quantity_buy&form_page=$form_page");

  } else {
    $_SESSION["product_id"] = $_POST['product_id'];
    $page = "productdetail.php";
    header("location:login.php?page =$page");
  }
}


// session_destroy();
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
    integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
  <link rel="stylesheet" href="../../assets/productdetail.css">
  <link rel="stylesheet" href="../../assets/style.css">
  <link rel="stylesheet" href="../../assets/footer.css">
  <script src="../../assets/jquery-3.7.1.min.js"></script>
  <title>Product Details</title>
</head>

<body>
  <?php include("nav.php") ?>

  <section>
    <?php while ($db_data = mysqli_fetch_assoc($result)): ?>


      <?php
      $category_id = $db_data['category_id'];
      $sql_cat = "SELECT * FROM tbl_categories WHERE category_id=$category_id";
      $result_cat = mysqli_query($connection, $sql_cat);
      $db_data_cat = mysqli_fetch_assoc($result_cat);
      ?>
      <div class="product-detail-container flex">
        <div class="left">
          <div class="main_image">
            <img src="../../images/<?php echo $db_data['product_image']; ?>" class="slide">
          </div>
          <div class="option flex">
            <img src="../../images/<?php echo $db_data['product_image']; ?>"
              onclick="img('../../images/<?php echo $db_data['product_image']; ?>')">
            <img src="../../images/<?php echo $db_data['product_image2']; ?>"
              onclick="img('../../images/<?php echo $db_data['product_image2']; ?>')">
            <img src="../../images/<?php echo $db_data['product_image3']; ?>"
              onclick="img('../../images/<?php echo $db_data['product_image3']; ?>')">
            <img src="../../images/<?php echo $db_data['product_image4']; ?>"
              onclick="img('../../images/<?php echo $db_data['product_image4']; ?>')">

          </div>
          <br>
          <br>
          <div class="review-cont">

          <p>Review 1</p>
          <p>Review 2</p>
          <p>Review 3</p>
          <br>
<h1>Add Review</h1>
            <input type="checkbox">
            <i class="fa-solid fa-star" style="color:rgb(248, 203, 0);"></i>

            <input type="checkbox">
            <i class="fa-solid fa-star" style="color:rgb(248, 203, 0);"></i>

            <input type="checkbox">
            <i class="fa-solid fa-star" style="color:rgb(248, 203, 0);"></i>

            <input type="checkbox">
            <i class="fa-solid fa-star" style="color:rgb(248, 203, 0);"></i>

            <input type="checkbox">
            <i class="fa-solid fa-star" style="color:rgb(248, 203, 0);"></i>


            <!-- <textarea name="reviews" id="reviews" cols="30" rows="10"
                placeholder="write reviews about product"></textarea> -->
            </p>
          </div>
        </div>
        <div class="right">
          <h3 style="margin-bottom: 10px;">
            <?php echo $db_data['product_name']; ?>
          </h3>
          <h4 style="margin-bottom: 10px;"> Rs.
            <?php echo $db_data['product_price']; ?><span> & Free Shipping</span>
          </h4>
          <p style="margin:10px auto;">
            <i class="fa-solid fa-star" style="color:rgb(248, 203, 0);"></i>
            <i class="fa-solid fa-star" style="color:rgb(248, 203, 0);"></i>
            <i class="fa-solid fa-star" style="color:rgb(248, 203, 0);"></i>
            <i class="fa-solid fa-star" style="color:rgb(248, 203, 0);"></i>
            <i class="fa-solid fa-star" style="color:rgb(248, 203, 0);"></i>

          </p>
          <p style="margin-bottom: 15px;">
            <?php echo $db_data['product_details']; ?>
          </p>
          <h5>Color</h5>
          <div class="color flex1">
            <span></span>
            <span></span>
            <span></span>
          </div>

          <div class="size-cont">
            <h5>Size</h5>
            <div class="size-disp">

              <p>X</p>

            </div>
          </div>
          <h5 style="margin-bottom: 10px;">Quantity</h5>
          <div class="add flex1">
            <form action="#" method="post">
              <input name="product_quantity" class="counter" id="quantity" type="number" value="1" min="1" required>
            </form>
          </div>


          <p style="margin-top: 10px;">SKU:
            <?php echo $db_data['product_quantity']; ?> Category:
            <?php echo $db_data_cat['product_category']; ?>
          </p>

          <div class="button">
            <form action="#" method="POST">
              <input type="hidden" name="product_id" id="" value="<?php echo $product_id; ?>">
              <input type="hidden" name="updated_prod_qty_buy" id="updated_prod_qty_buy" value="1">
              <button type="submit" class="buy-now" name="buy_now">Buy Now</button>

            </form>

            <form action="#" method="POST">
              <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
              <input type="hidden" name="updated_prod_qty" id="updated_prod_qty" value="1">
              <button type="submit" class="cart" name="add_to_cart">Add to Cart</button>
            </form>
          </div>



        </div>
      </div>
    <?php endwhile; ?>
  </section>


  <?php include("footer.php") ?>



  <script>
    jQuery("#quantity").on("change", function () {
      $.ajax({
        url: "http://localhost/finalexp/pages/public/quantity.php",
        type: "POST",
        data: { id: quantity.value },
        dataType: "TEXT",
        success: function (resp) {
          $("#updated_prod_qty").val(resp);
          $("#updated_prod_qty_buy").val(resp);
        }
      }).done(function () {
        console.log($("#updated_prod_qty").val());
        console.log($("#updated_prod_qty_buy").val());
      });
    })
  </script>
  <script>

    // for Image
    function img(anything) {
      document.querySelector('.slide').src = anything;
    }

    function change(change) {
      const line = document.querySelector('.home');
      line.style.background = change;
    }
  </script>
  <script src="https://kit.fontawesome.com/acc534193e.js" crossorigin="anonymous"></script>
</body>

</html>