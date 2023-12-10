<?php
include("db_connection.php");

if (isset($_POST['submit'])) {
  $full_name = $_POST['fname'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $pwd = $_POST['pwd'];
  $conf_pwd = $_POST['cpwd'];
  $hash_pass = sha1($pwd);

  if ($pwd == $conf_pwd) {
    $sql = "INSERT INTO tbl_customers (fullname, email, phone, password) VALUES('$full_name', '$email', '$phone', '$hash_pass')";
    $result = mysqli_query($connection, $sql);
    if ($result) {
      echo '<script>alert("Account Created")</script>';
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Signup</title>
  <link rel="stylesheet" href="../../assets/signup.css" />
</head>

<body>
  <div class="container">
    <div>
      <form action="#" method="post">
        <div class="logo">
          <i class="fa-brands fa-opencart"></i>
          <h1>Mandu Cart.</h1>
        </div>
        <div>
          <h1 id="signup-text">Signup</h1>
        </div>

        <div class="input-grp">
          <i class="fa-solid fa-user"></i>
          <label for="fullname">Full Name</label>
          <input type="text" name="fname" />
        </div>

        <div class="input-grp">
          <i class="fa-solid fa-envelope"></i>
          <label for="email">Email</label>
          <input type="email" name="email" id="" />
        </div>
        <div class="input-grp">
          <i class="fa-solid fa-square-phone"></i>
          <label for="phone">Phone</label>
          <input type="text" name="phone" />
        </div>

        <div class="input-grp">
          <i class="fa-solid fa-unlock"></i>
          <label for="password">Create Password</label>
          <input type="password" name="pwd" id="" />
        </div>
        <div class="input-grp">
          <i class="fa-solid fa-unlock"></i>
          <label for="password">Confirm Password</label>
          <input type="password" name="cpwd" id="" />
        </div>

        <button type="submit" name="submit">Signup</button>
        <p>Already Have an Account?</p>
        <a href="login.php" style="text-decoration: none; color: rgb(255, 0, 0);font-weight:500;">Login</a>
      </form>
    </div>
  </div>
  <script src="https://kit.fontawesome.com/acc534193e.js" crossorigin="anonymous"></script>
</body>

</html>