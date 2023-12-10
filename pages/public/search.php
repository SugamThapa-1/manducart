<?php 
include("db_connection.php");

$i = 0;

if(isset($_GET['price'])){
    $filter_by_price_min = isset($_POST['filter_by_price_min']) ? $_POST['filter_by_price_min'] : true;
    $filter_by_price_max = isset($_POST['filter_by_price_max']) ? $_POST['filter_by_price_max'] : true;

    $sql_search_product = "SELECT product_price FROM tbl_products WHERE product_price >= $filter_by_price_min AND product_price <= $filter_by_price_max";
    $result_search_product = mysqli_query($connection, $sql_search_product);
}

if(isset($_GET['search'])){
    $from_search = $_GET['search'];
    $sql_search_product = "SELECT * FROM tbl_products WHERE CONCAT(product_name, product_details) LIKE '%$from_search%'";
    $result_search_product = mysqli_query($connection, $sql_search_product);

}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Search</title>
    <link rel="stylesheet" href="../../assets/search.css" />
    <link rel="stylesheet" href="../../assets/footer.css" />
</head>

<body>
   <?php 
        include("nav.php");
   ?>
    <div class="text">
        <h3>Search Clothes from ManduCart</h3>
    </div>
    <div class="wrapper">

        <form action="" method="get" class="search-bar">
            <div class="input-group">
                <input type="text" name="search" placeholder="Search..." value="<?php if (isset($_GET['search'])) {
                    echo $_GET['search'];
                } ?>" class="form-control" placeholder="Search data">
                <button type="submit" class="fa-solid fa-magnifying-glass"></button>
            </div>

        </form>

    </div>
    <div class="container-search">
        

            <div class="sidebar">

                <div class="sidebar-left">
                <form action="#" method="post">
                    <div class="filter">
                        <h3>Filter By Price </h3>
                        <label for="">Lowest Price</label>
                        <input type="number" value="1" name="min_value" id="quantity1" min="1">
                        <label for="">Higest Price</label>
                        <input type="number" value="1" name="max_value" id="quantity2" min="1">
                        <button type="submit" method="post" name="price">Filter</button>
                    </div>

                    </form>

                    <form action="#" method="post">

                        <div class="filter">
                            <h3>Filter By Size</h3>
                            <label for="size">Size</label>
                            <select name="size" id="size-filter">
                                <option value="">XL</option>
                                <option value="">XL</option>
                                <option value="">XL</option>
                            </select>
                            <button type="submit" method="post" >Filter</button>
                        </div>
                    </form>
                    
                </div>

            </div>

        


        <div class="sidebar-right">
            <div class="body">

                <?php if ($result_search_product):?>
                <?php while ($db_data_product = mysqli_fetch_assoc($result_search_product)):

                    $product_id = $db_data_product['product_id'];
                    $category_id = $db_data_product['category_id'];

                    $sql_search_category = "SELECT * FROM tbl_categories WHERE category_id = $category_id ";
                    $result_search_category = mysqli_query($connection, $sql_search_category);
                    $db_data_category = mysqli_fetch_assoc($result_search_category);
                    ?>

                    <div class="card-wrapper">
                        <div class="card">
                            <a href="productdetail.php?product_id=<?php echo $product_id; ?>"><img
                                    src="../../images/<?php echo $db_data_product['product_image']; ?>" alt=""></a>
                            <div>
                                <div class="product-image">
                                    <a href="productdetail.php?product_id=<?php echo $product_id; ?>"
                                        alt="product-image"></a>
                                </div>
                                <div class="btn">
                                    <form action="#" method="post">
                                        <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
                                        <button type="submit" name="buy_now"><i class="fa-solid fa-bag-shopping"
                                                id="cart-button"></i></button>
                                    </form>


                                    <form action="#" method="post">
                                        <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
                                        <button type="submit" name="add_to_cart"><i class="fa-solid fa-cart-plus"></i></button>
                                    </form>

                                </div>
                            </div>
                        </div>
                        <div class="pro_info">
                            <p style="text-transform:uppercase">
                                <?php echo $db_data_category['product_category']; ?>
                            </p>
                            <h2>
                                <?php echo $db_data_product['product_name']; ?>
                            </h2>
                            <h2>
                                <?php echo $db_data_product['product_price']; ?>
                            </h2>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php
         endif; ?>
                
            
                
            </div>
        </div>
    </div>
    <footer>
        <div class="main-div">
            <div class="footer-container">
                <div class="footer-left">
                    <div class="logo">
                        <i class="fa-brands fa-opencart"></i>
                        <h1 id="logo-text">Mandu Cart <span id="last-word">.</span> </h1>
                    </div>
                    <p>Tinkune, Kathmandu</p>
                </div>
                <div class="footer-center">
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="mens.php">Men's</a></li>
                        <li><a href="womens.php">Women's</a></li>
                        <li><a href="shop.php">Shop</a></li>
                    </ul>
                </div>
                <div class="footer-center">
                    <ul>
                        <li><a href="aboutus.php" target="_blank">About Us</a></li>
                        <li><a href="#" target="_blank">Terms & Conditions</a></li>
                        <li><a href="#" target="_blank">Customer Service</a></li>
                    </ul>
                </div>
                <div class="footer-right">
                    <ul>
                        <h3>Connect with us</h3>
                        <i class="fa-brands fa-facebook"></i>
                        <i class="fa-brands fa-instagram"></i>
                        <i class="fa-brands fa-square-x-twitter"></i>
                        <i class="fa-brands fa-youtube"></i>

                    </ul>
                </div>
            </div>
            <div class="footer-bottom">
                <p>Copyright &copy; 2023 | Mandu Cart | This is Assignment Work</p>
            </div>
        </div>
    </footer>
    <script>
        jQuery("#quantity1").on("change", function () {
      $.ajax({
        url: "http://localhost/finalexp/pages/public/quantity.php",
        type: "POST",
        data: { id: quantity1.value },
        dataType: "TEXT",
        success: function (resp) {
          $("#filter_by_price_min").val(resp);

        }
      }).done(function () {
        console.log($("#filter_by_price_min").val());

      });
    })
  </script>
  <script>
        jQuery("#quantity2").on("change", function () {
      $.ajax({
        url: "http://localhost/finalexp/pages/public/quantity.php",
        type: "POST",
        data: { id: quantity2.value },
        dataType: "TEXT",
        success: function (resp) {
          $("#filter_by_price_max").val(resp);
        }
      }).done(function () {
        console.log($("#filter_by_price_max").val());
      });
    })
  </script>
  <script>
    if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.href);
    }
  </script>
    <script src="https://kit.fontawesome.com/acc534193e.js" crossorigin="anonymous"></script>
</body>

</html>