<?php
include("db_connection.php");
session_start();


$admin_id = isset($_SESSION['admin_id']) ? $_SESSION['admin_id'] : header("location: vendorlogin.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Profile</title>
    <link rel="stylesheet" href="../../assets/customeracc.css">
    <link rel="stylesheet" href="../../assets/footer.css">
</head>

<body>
    <?php include("nav.php"); ?>
    <div class="profile-wrapper">
        <div class="profile-heading">
            <!-- <h2>Welcome to Customer Profile</h2> -->
        </div>
        <div class="profile-container">
            <div class="profile-card">
                <div id="profile-items">
                    <form action="adminaccountupdate.php" method="post">
                        <button name="update_acc"><i class="fa-solid fa-pen-nib"></i> Update Account</button>
                    </form>
                    <form action="adminchangepassword.php" method="post">
                        <button name="change_pwd"><i class="fa-solid fa-key"></i> Change Password</button>
                    </form>
                    <form action="adminaccountdelete.php" method="post">
                        <button name="delete_acc"><i class="fa-solid fa-delete-left"></i> Delete Account</button>
                    </form>
                    <form action="../public/logout.php" method="post">
                        <button name="logout"><i class="fa-solid fa-right-from-bracket"></i> Log Out</button>

                    </form>





                </div>
            </div>

        </div>
    </div>
    <?php
    // include("footer.php");
    ?>
</body>

</html>