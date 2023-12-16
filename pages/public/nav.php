<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nav</title>
  <link rel="stylesheet" href="../../assets/style.css">
</head>

<body>
  <nav>
    <div class="nav">
      <div class="logo">
        <i class="fa-brands fa-opencart"></i>
        <a href="index.php">
          <h1 id="logo-text">Mandu Cart <span id="last-word">.</span> </h1>
        </a>
      </div>

      <div class="nav-links" id="nav-links">
        <li type="none">
          <a href="index.php" class="link">Home</a>
        </li>
        <li type="none">
          <a href="mens.php" class="link">Men's</a>
        </li>
        <li type="none">
          <a href="womens.php" class="link">Women's</a>
        </li>
        <li type="none">
          <a href="shop.php" class="link">Shop</a>
        </li>
        <li type="none">
          <a href="contact.php" class="link">Contact</a>
        </li>
      </div>

      <div class="icons">
        <a href="search.php"><i class="fa-solid fa-magnifying-glass"></i></a>
        <a href="wishlist.php"> <i class="fa-solid fa-heart"></i></a>
        <a href="cart.php"><i class="fa-solid fa-cart-shopping" id="nav-cart-icon">
            <span id="cart-no">9</span>
          </i>

        </a>
        <a href="customerdashboard.php"> <i class="fa-solid fa-user"></i></a>
      </div>
    </div>
  </nav>

  <script>
    const currentUrl = window.location.href;
    const links = document.querySelectorAll('.link');

    links.forEach(link => {
      if (link.href === currentUrl) {
        link.classList.add('active-link');
      }
    });
  </script>

  <script src="https://kit.fontawesome.com/acc534193e.js" crossorigin="anonymous"></script>
</body>

</html>