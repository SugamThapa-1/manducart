<?php
session_start();
include("db_connection.php");


$sql_select = "SELECT * FROM tbl_contact ORDER BY id DESC";
$result_select = mysqli_query($connection, $sql_select);

$i = 1;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Issue</title>
    <link rel="stylesheet" href="../../assets/adminpanel.css">
    <link rel="stylesheet" href="../../assets/adminnav.css">
</head>

<body>
    <?php
    include("adminnav.php");
    ?>
    <form action="adminpanel.php" method="post" class="">
        <button type="submit" name="back"><i class="fa-solid fa-angle-left"></i> Back</button>
    </form>
    <div class="table-wrapper">
        <table id="table">
            <div class="table-head">
                <tr id="table-titles">
                    <td>SN</td>
                    <td>Full Name</td>
                    <td>Email</td>
                    <td>Issue</td>
                    <td>Message</td>
                    <td>Issue Date</td>
                    <td>Manage</td>
                </tr>

            </div>
            <?php if ($result_select): ?>
                <tbody>
                    <?php while ($db_data = mysqli_fetch_assoc($result_select)):

                        $customer_id = $db_data['customer_id'];
                    
                        ?>

                        <tr>
                            <td>
                                <?php echo "$i" ?>
                            </td>
                            <td>
                                <?php echo $db_data['fullname']; ?>
                            </td>
                            <td>
                                <?php echo $db_data['email']; ?>
                            </td>
                            
                            <td>
                                <?php echo  $db_data['issue']; ?>
                            </td>
                            <td>
                                <?php echo  $db_data['message']; ?>
                            </td>
                            <td>
                                <?php echo  $db_data['created_at']; ?>
                            </td>
                            <td>
                                <button name="delete_issue"><i class="fa-solid fa-trash" style="margin-left: 25px; color:black;"></button>
                                </a>
                            </td>
                        </tr>
                        <?php $i++; endwhile; ?>
                </tbody>
            </table>

        <?php else: ?>
            <p>Data not found!</p>
        <?php endif; ?>
    </div>

    <script src="https://kit.fontawesome.com/acc534193e.js" crossorigin="anonymous"></script>
</body>

</html>