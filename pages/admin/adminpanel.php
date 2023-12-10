<?php
session_start();
include("db_connection.php");


if (!$_SESSION['admin_logged_in']) {

    header("location: vendorlogin.php");
} else {
    $admin_id = $_SESSION['admin_id'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="../../assets/adminpanel.css">
</head>

<body>
    <nav>
        <div class="nav">
            <div class="logo">
                <i class="fa-brands fa-opencart"></i>
                <h1 id="logo-text">Mandu Cart <span id="last-word">.</span> </h1>
                <p class="admin_txt" style="color:red; font-size: 10px;">ADMIN</p>
            </div>
            <ul class="nav-links">
                <li type="none"><a href="adminpanel.php">Dashboard</a></li>
                <li type="none"><a href="manageproducts.php">Catalog</a></li>
                <li type="none"><a href="managecustomers.php">Customers</a></li>
                <li type="none"><a href="#">Analytics</a></li>
                <li type="none"><a href="manageorders.php">Orders</a></li>

            </ul>
            <div class="icons">
                <i class="fa-solid fa-magnifying-glass"></i>
                <i class="fa-solid fa-bell"></i>
                <a href="adminprofile.php"> <i class="fa-solid fa-user-gear"></i></a>
            </div>
        </div>
    </nav>
    <div class="wrapper">
        <div class="heading">
            <h2>Welcome to Admin Panel</h2>
        </div>
        <div class="container">
            <div class="card">
                <div class="items">
                    <h2>View Products</h2>
                    <a href="manageproducts.php" class="link">See More</a>
                </div>
            </div>
            <div class="card">
                <div class="items">
                    <h2>Add Products</h2>
                    <a href="addproduct.php" class="link">See More</a>
                </div>
            </div>
            <div class="card">
                <div class="items">
                    <h2>View Orders</h2>
                    <a href="manageorders.php" class="link">See More</a>
                </div>
            </div>
            <div class="card">
                <div class="items">
                    <h2>Manage Customers</h2>
                    <a href="managecustomers.php" class="link">See More</a>
                </div>
            </div>
        </div>
    </div>
    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
    <script src="https://kit.fontawesome.com/acc534193e.js" crossorigin="anonymous"></script>
</body>

</html>