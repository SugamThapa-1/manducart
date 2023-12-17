<?php
session_start();
include "db_connection.php";

if (isset($_POST['login_admin'])) {
  $email = $_POST['email'];
  $pwd = sha1($_POST['pwd']);

  $select_user = "SELECT * FROM tbl_admins WHERE email='$email'";
  $select_user_result = mysqli_query($connection, $select_user);

  $dbemail = '';
  $dbpass = '';
  while ($data = mysqli_fetch_assoc($select_user_result)) {
    $dbemail = $data['email'];
    $dbpass = $data['password'];
    $admin_id = $data['admin_id'];
  }

  // if($email != $dbemail) {
  //   $errEmail = "email not matched!";
  // } 

  // if($pwd!= $dbpass) {
  //   $errPass = "Password not matched"; 
  // } 

  if ($email == $dbemail && $pwd == $dbpass) {
    $_SESSION['admin_logged_in'] = true;
    $_SESSION['admin_id'] = $admin_id;
    header("location: adminpanel.php");
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Vendor Login</title>
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
        <h3 id="login-text">Login as Admin</h3>
      </div>
      <div class="input-grp">
        <i class="fa-solid fa-user"></i>
        <label for="email">Email/Username</label>
        <input type="email" name="email" required />
      </div>
      <div class="input-grp">
        <i class="fa-solid fa-unlock"></i>
        <label for="password">Password</label>
        <input type="password" name="pwd" required />
        <h5>
          <a style="color: red; margin-left: 200px; font-size: 12px" href="adminforgotpassword.php">Forgot Password?</a>
        </h5>
      </div>
      <button type="submit" name="login_admin">Login</button>
      <p></p>
      <a href="../public/login.php" style="text-decoration: none; color: rgb(255, 2, 2)">Login as Customer</a>
    </form>
  </div>
  <script src="https://kit.fontawesome.com/acc534193e.js" crossorigin="anonymous"></script>
</body>

</html>