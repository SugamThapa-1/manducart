<?php
session_start();
include("db_connection.php");

$page = "customerdashboard.php";
if (!isset($_SESSION['logged_in'])) {
    header("location: login.php?page=$page");

} else {

    $customer_id = $_SESSION['customer_id'];

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Dashboard</title>
    <link rel="stylesheet" href="../../assets/footer.css">
    <link rel="stylesheet" href="../../assets/customerdashboard.css">

</head>

<body>
<nav>
    <div class="nav">
      <div class="logo">
        <i class="fa-brands fa-opencart"></i>
        <h1 id="logo-text">Mandu Cart <span id="last-word">.</span> </h1>
      </div>
      <ul class="nav-links">
        <li type="none"><a href="index.php">Home</a></li>
        <li type="none"><a href="mens.php">Men's</a></li>
        <li type="none"><a href="womens.php">Women's</a></li>
        <li type="none"><a href="shop.php">Shop</a></li>
        <li type="none"><a href="contact.php">Contact</a></li>
      </ul>
      <div class="icons">
      <a href="search.php"><i class="fa-solid fa-magnifying-glass"></i></a>
       <a href="wishlist.php"> <i class="fa-solid fa-heart"></i></a>
        <a href="cart.php"><i class="fa-solid fa-cart-shopping"
            id="nav-cart-icon"></i></a>
        <a href="customerdashboard.php"> <i class="fa-solid fa-user"></i></a>
      </div>
    </div>
  </nav>
    <div class="wrapper">
        <div class="heading">
            <h2>Welcome to Customer Dashboard</h2>
        </div>
        <div class="container">
            <div class="card">
                <div class="items">
                    <h2>My Orders</h2>
                    <a href="customerorders.php" class="link">See More</a>
                </div>
            </div>
            <div class="card">
                <div class="items">
                    <h2>History</h2>
                    <a href="#" class="link">See More</a>
                </div>
            </div>
            <div class="card">
                <div class="items">
                    <h2>Track Orders</h2>
                    <a href="trackorder.php" class="link">See More</a>
                </div>
            </div>
            <div class="card">
                <div class="items">
                    <h2>User Profile</h2>
                    <a href="customeraccount.php" class="link">See More</a>
                </div>
            </div>

        </div>
    </div>

    <?php include("footer.php"); ?>
    <script src="https://kit.fontawesome.com/acc534193e.js" crossorigin="anonymous"></script>
    <script>
    if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.href);
    }
  </script>
</body>

</html>