<?php
session_start();
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="Images/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="css/style2.css">
    <link rel="stylesheet" href="css/remine.css">
    <title>الفني المتنوع</title>
    <link rel="stylesheet" href="css/style.css">

    <style>
        .wrapper .caption h1 {
            text-transform: uppercase;
            letter-spacing: 0px;
            background: linear-gradient(90deg, white, white, #1f2a32, white, white);
            background-size: 400%;
            -webkit-text-fill-color: transparent;
            -webkit-background-clip: text;
            animation: animation 5s linear infinite;
            font-family: serif;
            font-weight: revert;

        }

        @keyframes animation {
            0% {
                background-position: 400%;
            }

            50% {
                transform: 300px;
            }

            100% {
                background-position: 0%;
            }
        }
    </style>

</head>

<body>



    <div class="wrapper">
        <!-- Start Left Side Customer -->

        <div class="side left">

            <div class="image customer"></div>
            <div class="caption">
                <h1>Client</h1>
                <a href="client_login.php">
                    <span>Client Log In</span>
                    <div class="liquid"></div>

                </a>
            </div>
        </div>
        <!-- End Left Side Customer  -->
        <!-- Start right Side Technician -->
        <div class="side right">

            <div class="image technician"></div>
            <div class="caption">
                <h1>Technical</h1>
                <a href="technical_login.php">
                    <span>Technician Log In</span>
                    <div class="liquid"></div>

                </a>
            </div>

        </div>
        <!-- End right Side Technician -->
        <script src="js/action.js"></script>

    </div>














</body>

</html>