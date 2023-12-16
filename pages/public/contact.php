<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="../../assets/style.css">
    <link rel="stylesheet" href="../../assets/footer.css">
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap");

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Montserrat", sans-serif;
        }

        .wrapper {
            background-color: #f4f4f4;
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
            width: 60%;
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
                    <input type="text" name="fname" placeholder="Enter Your Name" />
                </div>
                <div class="input-grp">
                    <i class="fa-solid fa-envelope"></i>
                    <label for="email">Email</label>
                    <input type="email" placeholder="Enter Your Email" />

                </div>
                <div class="input-grp">
                    <i class="fa-solid fa-question"></i>
                    <label for="Isuue">Choose Your Issue</label>
                    <select name="issue" id="">
                        <option value="issue">Choose Your Issue</option>
                        <option value="issue">Choose Your Issue</option>
                        <option value="issue">Choose Your Issue</option>
                    </select>


                </div>
                <div class="input-grp">
                    <i class="fa-solid fa-message"></i>
                    <label for="password">Message</label>
                    <textarea name="message" id="" cols="30" rows="10"
                        placeholder="Let us know what you need help with.."></textarea>

                </div>


                <button type="submit" name="login">Send Message</button>

            </form>
        </div>
    </div>

    <?php include("footer.php")?>


    <script src="../../assets/script.js"></script>
    <script src="https://kit.fontawesome.com/acc534193e.js" crossorigin="anonymous"></script>
</body>

</html>