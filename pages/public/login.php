<?php
session_start();
include "db_connection.php";
$page = isset($_GET['page']) ? $_GET['page'] : "index.php";

if(isset($_POST['login'])) {
  $email = $_POST['email'];
  $pwd = sha1($_POST['pwd']);

  $select_user = "SELECT * FROM tbl_customers WHERE email='$email'";
  $select_user_result = mysqli_query($connection, $select_user);

  $dbemail = '';
  $dbpass = '';
  $customer_id='';
  while($data = mysqli_fetch_assoc($select_user_result)) {
    $dbemail = $data['email'];
    $dbpass = $data['password'];
    $customer_id = $data['customer_id'];
  }

  // if($email != $dbemail) {
  //   $errEmail = "email not matched!";
  // } 

  // if($pwd!= $dbpass) {
  //   $errPass = "Password not matched"; 
  // } 

  if($email == $dbemail && $pwd == $dbpass) {
    $_SESSION['logged_in'] = true;
    $_SESSION['customer_id'] = $customer_id;
    header("location: $page");
    // header("location: $page?customer_id=$customer_id");
  }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link rel="stylesheet" href="../../assets/login.css" />
  </head>
  <body>
    <div class="container">
      <form action="#" method="post" class="form">
        <div class="logo">
          <i class="fa-brands fa-opencart"></i>
          <h1>Mandu Cart.</h1>
        </div>
        <div>
          <h1 id="login-text">Login</h1>
          <h5 style="margin-left: 200px; margin-bottom: 2px;padding: 3px;"><a style="text-decoration: none; color: rgb(44, 44, 44);" href="../admin/vendorlogin.php">Login as Admin</a></h5>
        </div>
        <div class="input-grp">
          <i class="fa-solid fa-user"></i>
          <label for="email">Email</label>
          <input type="email" name="email" />
        </div>
        <div class="input-grp">
          <i class="fa-solid fa-unlock"></i>
          <label for="password">Password</label>
          <input type="password" name="pwd" />
          <h5>
          <a style="color: red; margin-left: 200px; font-size: 12px" href="forgotpassword.php">Forgot Password?</a>
          </h5>
        </div>
        <button type="submit" name="login">Login</button>
        <p>Don't have an Account?</p>
        <a
          href="signup.php"
          style="text-decoration: none; color: rgb(255, 2, 2); font-weight:500;"
          >Signup</a
        >
 
      </form>
    </div>
    <script
      src="https://kit.fontawesome.com/acc534193e.js"
      crossorigin="anonymous"
    ></script>
  </body>
</html>