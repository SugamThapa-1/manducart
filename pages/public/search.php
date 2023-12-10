<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Search</title>
    <link rel="stylesheet" href="../../assets/search.css" />
    <link rel="stylesheet" href="../../assets/style.css" />
    <link rel="stylesheet" href="../../assets/footer.css" />
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
                <i class="fa-solid fa-heart"></i>
                <a href="cart.php"><i class="fa-solid fa-cart-shopping" id="nav-cart-icon"></i></a>
                <a href="customerdashboard.php"> <i class="fa-solid fa-user"></i></a>
            </div>
        </div>
    </nav>
    <div class="text">
        <h3>Search Clothes from ManduCart</h3>
    </div>
    <div class="wrapper">

        <form action="" method="GET" class="search-bar">
            <div class="input-group mb-3">
                <input type="text" placeholder="search" required value="<?php if (isset($_GET['search'])) {
                    echo $_GET['search'];
                } ?>" class="form-control" placeholder="Search data">
                <button type="submit" class="fa-solid fa-magnifying-glass"></button>
            </div>

        </form>

    </div>
    <div class="container-search">
        <div class="sidebar">

            <div class="sidebody">
                <div class="filter">
                    <h3>Filter Products</h3>
                    <label for="">Lowest Price</label>
                    <input type="number">
                    <label for="">Higest Price</label>
                    <input type="number">
                    <button>Filter</button>
                </div>
                <div class="filter">
                    <label for="size">Size</label>
                    <select name="size" id="size-filter">
                        <option value="">XL</option>
                        <option value="">XL</option>
                        <option value="">XL</option>
                    </select>
                    <button>Filter</button>
                </div>
            </div>

        </div>
        <div class="data">
            <div class="body">
                <div class="card-wrapper">
                    <div class="card" style="height: 300px;">
                        <img src="../../images/8.jpg" alt="">
                        <div>
                            <div class="product-image">
                                <a href="productdetail.html" style="width:100%; height: 100%;" alt="product-image"></a>
                            </div>
                            <div class="btn">
                                <button type="submit" name="buy-now"><i class="fa-solid fa-bag-shopping"
                                        id="cart-button"></i></button>
                                <button type="submit" name="add-to-cart"><i class="fa-solid fa-cart-plus"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="pro_info">
                        <p>MENS</p>
                        <h2>Product name</h2>
                        <h2>Rs.0.00</h2>
                    </div>
                </div>
                <div class="card-wrapper">
                    <div class="card" style="height: 300px;">
                        <img src="../../images/8.jpg" alt="">
                        <div>
                            <div class="product-image">
                                <a href="productdetail.html" style="width:100%; height: 100%;" alt="product-image"></a>
                            </div>
                            <div class="btn">
                                <button type="submit" name="buy-now"><i class="fa-solid fa-bag-shopping"
                                        id="cart-button"></i></button>
                                <button type="submit" name="add-to-cart"><i class="fa-solid fa-cart-plus"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="pro_info">
                        <p>MENS</p>
                        <h2>Product name</h2>
                        <h2>Rs.0.00</h2>
                    </div>
                </div>
                <div class="card-wrapper">
                    <div class="card" style="height: 300px;">
                        <img src="../../images/8.jpg" alt="">
                        <div>
                            <div class="product-image">
                                <a href="productdetail.html" style="width:100%; height: 100%;" alt="product-image"></a>
                            </div>
                            <div class="btn">
                                <button type="submit" name="buy-now"><i class="fa-solid fa-bag-shopping"
                                        id="cart-button"></i></button>
                                <button type="submit" name="add-to-cart"><i class="fa-solid fa-cart-plus"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="pro_info">
                        <p>MENS</p>
                        <h2>Product name</h2>
                        <h2>Rs.0.00</h2>
                    </div>
                </div>
                <div class="card-wrapper">
                    <div class="card" style="height: 300px;">
                        <img src="../../images/8.jpg" alt="">
                        <div>
                            <div class="product-image">
                                <a href="productdetail.html" style="width:100%; height: 100%;" alt="product-image"></a>
                            </div>
                            <div class="btn">
                                <button type="submit" name="buy-now"><i class="fa-solid fa-bag-shopping"
                                        id="cart-button"></i></button>
                                <button type="submit" name="add-to-cart"><i class="fa-solid fa-cart-plus"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="pro_info">
                        <p>MENS</p>
                        <h2>Product name</h2>
                        <h2>Rs.0.00</h2>
                    </div>
                </div>
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
    <script src="https://kit.fontawesome.com/acc534193e.js" crossorigin="anonymous"></script>
</body>

</html>