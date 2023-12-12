<?php
include("db_connection.php");
session_start();
$page = 'customerdashboard.php';
$customer_id = isset($_SESSION['customer_id']) ? $_SESSION['customer_id'] : header("location: login.php?page=$page");


$sql_select = "SELECT * FROM tbl_customers WHERE customer_id=$customer_id";
$sql_result = mysqli_query($connection, $sql_select);

$fetch_data = mysqli_fetch_assoc($sql_result);


$full_name = isset($fetch_data['fullname']) ? $fetch_data['fullname'] : '';
$email = isset($fetch_data['email']) ? $fetch_data['email'] : '';
$phone = isset($fetch_data['phone']) ? $fetch_data['phone'] : '';
$oldpwd = isset($fetch_data['password']) ? $fetch_data['password'] : '';

if (isset($_POST['submit'])) {
$full_name = $_POST['fname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$old_pwd = $_POST['old_pwd'];
$new_pwd = $_POST['new_pwd'];
$conf_pwd = $_POST['cnewpwd'];
$hash_pass = sha1($new_pwd);

    if($oldpwd==sha1($old_pwd)){
      if ($new_pwd == $conf_pwd) {

        $sql = "UPDATE tbl_customers SET fullname = '$full_name', email = '$email',phone = '$phone', password = '$hash_pass' WHERE customer_id=$customer_id";
        $result = mysqli_query($connection, $sql);
        
        if ($result) {
            echo '<script>alert("Account Updated")</script>';
        }
    }else{
      echo '<script>alert("New Password and confirm password is not same")</script>';
    }
    }else{
      echo '<script>alert("Old password is not correct")</script>';
    }
    header("location: customerdashboard.php?");
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
          <h2 id="signup-text" >Update User Info</h2>
  
        </div>
        
        <div class="input-grp">
          <i class="fa-solid fa-user"></i>
          <label for="fullname">Full Name</label>
          <input type="text" name="fname" value="<?php echo $full_name; ?>" required />
        </div>

        <div class="input-grp">
          <i class="fa-solid fa-envelope"></i>
          <label for="email">Email</label>
          <input type="email" name="email" value="<?php echo $email; ?>" id="" required/>
        </div>
        <div class="input-grp">
          <i class="fa-solid fa-square-phone"></i>
          <label for="phone">Phone</label>
          <input type="text" name="phone" value="<?php echo $phone; ?>" required />
        </div>

        <div class="input-grp">
          <i class="fa-solid fa-unlock"></i>
          <label for="password">Old Password</label>
          <input type="password" name="old_pwd" id="" required/>
        </div>

        <div class="input-grp">
          <i class="fa-solid fa-unlock"></i>
          <label for="password">New Password</label>
          <input type="password" name="new_pwd" id="" required/>
        </div>
        <div class="input-grp">
          <i class="fa-solid fa-unlock"></i>
          <label for="password">Confirm New Password</label>
          <input type="password" name="cnewpwd" id=""  required/>
        </div>

        <button type="submit" name="submit">Update</button>
    
      </form>
    </div>
  </div>
  <script src="https://kit.fontawesome.com/acc534193e.js" crossorigin="anonymous"></script>
</body>

</html>
