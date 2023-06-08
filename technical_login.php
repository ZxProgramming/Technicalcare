<?php
session_start();
include 'conn.php';
include 'validation_technical.php';

if (isset($_POST['submit'])) {
    $f_name = $l_name = $num = $email = $pass = $typeof = '';


    $f_name = htmlspecialchars(strip_tags($_POST['f_name']));
    $l_name = htmlspecialchars(strip_tags($_POST['l_name']));
    $num = $_POST['num'];
    $email = $_POST['email'];
    $pass = md5($_POST['pass']);
    $typeof = $_POST['typeof'];
    $error = [];

    // validation first and last Name

    if (empty($f_name)) {
        $error['f_name'] = " The Name Is Required";
    } elseif (empty($l_name)) {
        $error['l_name'] = " The Last Name Is Required";
    } else {
        $f_name = htmlspecialchars(strip_tags($_POST['f_name']));
    }
    // validation first and last Name


    // validation Number
    if (empty($num)) {
        $error['num'] = " The Number Is Required";
    } elseif (strlen($num) < 11 || strlen($num) > 11) {
        $error['num'] = "Please Enter More Than 11 Char";
    }
    // validation Number
    // validation email

    if (empty($email)) {
        $error['email'] = " The Email Is Required";
    } elseif (filter_var($email, FILTER_VALIDATE_EMAIL, FILTER_SANITIZE_EMAIL) == false) {
        $error['email'] = " The Email Is Not Valid";
    }
    // check The Email Is Exist  
    $sql = "SELECT email FROM `technical` WHERE `email`= '$email'";
    $q = $conn->prepare($sql);
    $q->execute();
    $data = $q->fetchAll();
    if ($data) {
        $error['email'] = " email exists in database";
    }
    // validation email
    // validation Password
    if (empty($pass)) {
        $error['pass'] = " The Password Is Required";
    } elseif (strlen($pass) < 10) {
        $error['pass'] = "You must type a more complex password";
    }
    // validation password
    // Upload Images
    $fileName = $_FILES["upload"]["name"];
    $tempName = $_FILES["upload"]["tmp_name"];
    $image_error = $_FILES["upload"]["error"];
    $folder = "image/" . $fileName;
    "<img src='$folder' width ='100px' height='100px'>";
    move_uploaded_file($tempName, $folder);

    // Validation  Upload Images

    // Validation  Upload Images


    // Upload Images

    if (empty($error)) {
        $sql = "INSERT INTO `technical`( `firstName`, `lastName`, `email`, `pass`,  `type_of`,`phone`,`image`,`status`) VALUES ('$f_name','$l_name','$email','$pass','$typeof','$num','$folder','Available')";
        $conn->exec($sql);;

        $_SESSION['technical'] = [
            "f_name" => $f_name,
            "l_name" => $l_name,
            "email" => $email,
            "num" => $num,

        ];
    } else {
        $error["forms"] = "All Forms Require";
    }
} //End Of Post Check
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="Images/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="css/style_login.css">
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <!-- script Captcha  -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <!-- script Captcha  -->
    <title>الفني المتنوع</title>


    <style>
        .selected_work {
            display: flex;
            justify-content: center;
            position: relative;
            min-width: 250px;
            height: 40px;
            margin-top: 5px;
        }

        .select-box {
            border: none;
            appearance: none;
            padding: 0 30px 0 15px;
            width: 100%;
            color: white;
            background-color: #001e5747;
            text-align: center;
            font-size: 20px;
            font-family: fantasy;
            font-weight: 600;
        }

        .selected_work .icon-container {
            width: 50px;
            height: 100%;
            position: absolute;
            right: -35px;
        }

        .errors {
            color: red;
            text-align: center;
            font-size: 15px;
            margin: 0px;
        }

        body {
            background-repeat: no-repeat;
            background-size: cover;
            max-height: 100%;
            max-width: 100%;
            background: url(./Images/3.jpg);
        }

        .card-front,
        .card-back {
            position: absolute;
            width: 100%;
            height: 115%;
            background-position: center;
            background-size: cover;
            background-image: linear-gradient(rgba(1, 47, 81, 1), rgba(73, 115, 255, 0.7)), url(./Images/4.jpg);
            padding: 55px;
            max-width: 100%;
            max-height: 115%;
            box-sizing: border-box;
            backface-visibility: hidden;
        }

        .previous {
            text-decoration: none;
            display: inline-block;
            padding: 8px 8px;
            background-color: #f1f1f1;
            color: black;
            transition: .4s all;


        }

        .previous:hover {
            background-color: #2963b17a;
            color: white;
        }


        .round {
            border-radius: 50%;
        }
    </style>

</head>

<body>
    <span class="material-symbols-outlined">

        <a href="index.php" class="previous round">
            arrow_back
        </a>

    </span>

    <div class="container">
        <div class="card">
            <div class="inner-box" id="card">
                <!-- Start LogIn -->

                <div class="card-front">

                    <h2>LogIn For Technical</h2>
                    <form action="technical_login.php" method="POST">

                        <div class="input_1">
                            <input type="email" name="login_email" placeholder="Enter Your Email" class="input-box" required>

                            <?php
                            if (isset($error['login_email'])) {

                                echo "<div class='errors'>" . $error['login_email'] . "</div>";
                            };        ?>
                        </div>
                        <div class="input_2">
                            <input type="password" name="login_pass" placeholder="Enter Your password" class="input-box" required>
                            <?php
                            if (isset($error['login_pass'])) {

                                echo "<div class='errors'>" . $error['login_pass'] . "</div>";
                            };        ?>
                        </div>
                        <button type="submit" name="submit_login" class="submit-btn">Submit</button>

                        <!-- Important connect with methods -->

                        <!-- Important connect with methods -->

                    </form>
                    <button type="button" class="btn" onclick="openRegister()">I'm New Here</button>
                    <a href="">Forget Password</a>
                </div>
                <!-- End LogIn -->

                <!-- Start Client Register -->
                <div class="card-back">
                    <?php
                    if (isset($error['forms'])) {

                        echo "<div class='errors'>" . $error['forms'] . "</div>";
                    };        ?>
                    <h2>Register For Technical</h2>
                    <form action="technical_login.php" method="POST" enctype="multipart/form-data">
                        <div class="input_1">
                            <input type="text" name="f_name" placeholder="Enter Your Name" class="input-box">
                            <?php
                            if (isset($error['f_name'])) {

                                echo "<div class='errors'>" . $error['f_name'] . "</div>";
                            };        ?>
                        </div>

                        <div class="input_2">
                            <input type="text" name="l_name" placeholder="Enter Your Last Name" class="input-box">
                            <?php
                            if (isset($error['l_name'])) {

                                echo "<div class='errors'>" . $error['l_name'] . "</div>";
                            };        ?>
                        </div>

                        <div class="input_3">
                            <input type="email" name="email" placeholder="Enter Your Email" class="input-box">
                            <?php
                            if (isset($error['email'])) {

                                echo "<div class='errors'>" . $error['email'] . "</div>";
                            };        ?>
                        </div>

                        <div class="input_4">
                            <input type="number" name="num" placeholder="Enter Your Number" class="input-box">
                            <?php
                            if (isset($error['num'])) {

                                echo "<div class='errors'>" . $error['num'] . "</div>";
                            };        ?>
                        </div>

                        <div class="input_5">
                            <input type="password" name="pass" placeholder="Enter Your password" class="input-box">
                        </div>
                        <div class="input_5">
                            <input type="file" name="upload" placeholder="" class="">
                            <?php
                            if (isset($error['image'])) {

                                echo "<div class='errors'>" . $error['image'] . "</div>";
                            };        ?>
                        </div>



                        <div class="selected_work" id="select">
                            <select name="typeof" class="select-box">
                                <option value="قسم النقاشه">قسم النقاشه</option>
                                <option value="قسم النجاره"> قسم النجاره</option>
                                <option value="قسم الوميتال"> قسم الوميتال</option>
                                <option value="قسم المحاره"> قسم المحاره</option>
                                <option value="قسم الكهرباء"> قسم الكهرباء </option>
                                <option value="قسم السيراميك"> قسم السيراميك</option>
                                <option value="قسم السباكه">قسم السباكه</option>
                                <option value="قسم الرخام">قسم الرخام</option>
                                <option value="قسم الجبس">قسم الجبس</option>
                            </select>
                            <div class="icon-container" id="btn">
                                <i class="fa-solid fa-circle-chevron-down"></i>
                            </div>
                        </div>




                        <button type="submit" name="submit" class="submit-btn">Submit</button>


                    </form>
                    <button type="button" class="btn" onclick="openLogin()">I've an account</button>
                    <a href="">Forget Password</a>

                </div>
                <!-- Start Client Register -->

            </div>
        </div>

    </div>


    <script src="js/action.js"></script>























</body>


</html>