<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alert</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: sans-serif;
        }


        .modal-wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .modal-wrapper .modal-container .modal-box {
            background: #fff;
            padding: 30px 30px 20px 20px;
            text-align: center;
            border-radius: 5px;
            box-shadow: 0 0 4px rgba(0, 0, 0, .4);
        }

        .modal-wrapper .modal-container .modal-box i {
            color: #e74c3c;
            width: 50px;
            height: 50px;
            border: 2px solid #e74c3c;
            text-align: center;
            line-height: 50px;
            border-radius: 50%;
            font-size: 20px;
            margin-bottom: 20px;
        }

        .modal-wrapper .modal-container .modal-box h4 {
            font-size: 20px;
            margin-bottom: 20px;
        }

        .modal-wrapper .modal-container .modal-box span {
            font-size: 17px;
            font-weight: 500;
        }

        .modal-wrapper .modal-container .modal-box a {
            font-size: 17px;
            font-weight: 500;
            text-decoration: none;
            color: #fff;
            padding: 8px 20px;
            background: #e74c3c;
            border-radius: 20px;
        }

        .modal-wrapper .modal-container .modal-box {
            transform: scale(0);
            transition: all 0.2s ease;
        }

        .modal-wrapper .modal-container .modal-box.active {
            transform: scale(1);
        }

        .modal-wrapper .modal-container .modal-button {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .modal-wrapper .modal-container .modal-button button {
            width: 180px;
            height: 34px;
            outline: none;
            border: none;
            background: #fff;
            font-size: 16px;
            color: #007bff;
            border-radius: 5px;
            cursor: pointer;
        }

        .modal-wrapper .modal-container .modal-button button:hover {
            box-shadow: 0 0 4px rgba(0, 0, 0, .4);
        }
    </style>
</head>

<body>
    <div class="modal-wrapper">
        <div class="modal-container">
            <div class="modal-button">
                <button id="modal-button">View Modal</button>
            </div>
            <div class="modal-box" id="modal-box">
                <i class="fa fa-exclamation"></i>
                <h4>Product added to Cart</h4>
                <a href="#">Refresh Page</a>
            </div>
        </div>
    </div>

    <script>
        let modalBox = document.getElementById("modal-box");
        let modalButton = document.getElementById("modal-button");

        modalButton.onclick = function () {
            modalBox.classList.add("active");

            setTimeout(() => {
                modalBox.classList.remove("active");
            }, 5000);
        }
    </script>
</body>

</html>