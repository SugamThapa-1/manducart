<?php 
session_start();
include("db_connection.php");


if(!isset($_SESSION['logged_in'])){
    $page = "contact.php";
    header("location: login.php?page='$page'");
}

$customer_id = isset($_SESSION['customer_id']) ? $_SESSION['customer_id'] : header("location: login.php");

$sql_select = "SELECT * FROM tbl_customers WHERE customer_id=$customer_id";
$result_select = mysqli_query($connection, $sql_select);
$db_data = mysqli_fetch_assoc($result_select);

if(isset($_POST['send_message'])){
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $issue = $_POST['issue'];
    $message = $_POST['message'];

    $sql_insert_contact = "INSERT INTO tbl_contact (customer_id,fullname,email,issue,message) VALUES ('$customer_id','$fullname','$email', '$issue','$message')";
    $result_insert = mysqli_query($connection, $sql_insert_contact);
    if($result_insert){
        echo '<script>alert("Issue Reported")</script>';
    }

}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <!-- <link rel="stylesheet" href="../../assets/style.css"> -->
    <link rel="stylesheet" href="../../assets/footer.css">
<<<<<<< Updated upstream
    <link rel="stylesheet" href="../../assets/contact.css">
=======
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap");

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Montserrat", sans-serif;
        }

        .wrapper {
            /* background-color: #f4f4f4; */
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        #title {
            font-size: 30px;
            margin-top: 30px;
            margin-bottom: 30px;
        }

        .container {
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 70%;
            padding: 30px;
            text-align: center;
        }

        label {
            float: left;
        }

        input {
            margin-top: 5px;
            margin-bottom: 20px;

            width: 100%;
            padding: 12px 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        select {
            margin-top: 5px;
            margin-bottom: 20px;

            width: 100%;
            padding: 12px 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        textarea {
            margin-top: 5px;
            margin-bottom: 20px;

            width: 100%;
            padding: 12px 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        button {
            background-color: #f13c3c;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 12px 20px;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.2s;
            margin-top: 20px;
            margin-bottom: 20px;
        }

        button:hover {
            background-color: #555555;
            box-shadow: 5px 5px 0px;
            transition: all ease 0.5s;
        }

        .input-grp i {
            color: #555555;
            padding-right: 5px;
            padding-top: 1px;
            margin-left: 2px;
            font-size: 15px;
            float: left;
        }

        .input-grp label {
            color: #555555;
            font-size: 15px;
            font-weight: 600;
        }

        a {
            text-decoration: none;
        }
    </style>
>>>>>>> Stashed changes
</head>

<body>
<?php include("nav.php")?>

    <div class="wrapper">
        <div class="container">
            <form action="#" method="post" class="form">

                <div>
                    <h1 id="title">Contact</h1>

                </div>
                <div class="input-grp">
                    <i class="fa-solid fa-user"></i>
                    <label for="fname">Full Name</label>
                    <input type="text" name="fullname" placeholder="Enter Your Name" value="<?php echo $db_data['fullname'] ?>" required/>
                </div>
                <div class="input-grp">
                    <i class="fa-solid fa-envelope"></i>
                    <label for="email">Email</label>
                    <input type="email" placeholder="Enter Your Email" name="email" value="<?php echo $db_data['email'] ?>" required/>

                </div>
                <div class="input-grp">
                    <i class="fa-solid fa-question"></i>
                    <label for="Isuue">Choose Your Issue</label>
                    <select name="issue" id="">
                        <option value="Payment Problems">Payment Problems</option>
                        <option value="Wrong Product and Quality Issue">Wrong Product and Quality Issue</option>
                        <option value="Delayed/Not Delivery">Delayed/Not Delivery</option>
                        <option value="Security Concerns">Security Concerns</option>
                        <option value="Technical Glitches">Technical Glitches</option>
                        <option value="Inappropriate Content or Behavior">Inappropriate Content or Behavior</option>
                        <option value="Security Concerns">Security Concerns</option>
                        <option value="Security Concerns">Others</option>
                    </select>


                </div>
                <div class="input-grp">
                    <i class="fa-solid fa-message"></i>
                    <label for="password">Message</label>
                    <textarea name="message" id="" cols="30" rows="10"
                        placeholder="Let us know what you need help with.." required></textarea>

                </div>


                <button type="submit" name="send_message">Send Message</button>

            </form>
        </div>
    </div>

    <?php include("footer.php")?>


    <script src="../../assets/script.js"></script>
    <script src="https://kit.fontawesome.com/acc534193e.js" crossorigin="anonymous"></script>
    <script>
    if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.href);
    }
  </script>
</body>

</html>