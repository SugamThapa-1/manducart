<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Thank you Page</title>
  <link rel="stylesheet" href="../../assets/style.css" />
  <link rel="stylesheet" href="../../assets/footer.css" />
  <style>
    @import url("https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap");

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Montserrat", sans-serif;
    }

    .image {
      height: 300px;
      padding: 0%;
      margin: 40px 40px 0px 40px;
      text-align: center;

    }

    .wrapper {
      align-items: center;
      text-align: center;
      /* margin: 30px; */
    }

    .cont {
      margin-top: 40px;
      margin-left: 100px;
      justify-content: space-around;
    }

    .return {
      color: #fffbfb;
      padding: 10px;
      text-align: center;
      cursor: pointer;
      background-color: black;
      font-size: 15px;
      transition: all ease 0.2s;
      margin-top: 40px;
      margin-left: 100px;
      margin-bottom: 20px;

    }

    .return:hover {
      color: white;
      background-color: rgb(56, 56, 56);
    scale: 1.03;
    }
  </style>
</head>

<body>
  <?php
  include("nav.php");
  ?>

  <div class="image">
    <img src="../../images/thankyou.jpg" title="" alt="" height="261px" width="1174px">
  </div>

  <div class="wrapper">
    <div class="cont">
      <h1 class="paragraph" style=" margin-bottom: 10px;">Thank You! </h1>
      <br>
      <p> <br>
        Payment done Successfully</p>
      <br>
      <p class="paragraph1"> Thank you for shopping with Mandu Cart. Your order will be
        delivered to your doorstep.</p>
    </div>

    <div>
      <form action="index.php" method="post">
        <button class="return">Continue to Shopping</button>
      </form>
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
            <li><a href="index.php">Home</a></li>
            <li><a href="mens.php">Men's</a></li>
            <li><a href="womens.php">Women's</a></li>
            <li><a href="shop.php">Shop</a></li>
          </ul>
        </div>
        <div class="footer-center">
          <ul>
            <li><a href="aboutus.php" target="/">About Us</a></li>
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