<?php
session_start();
include "db.php";

if(isset($_POST['submit'])){
    $username = $_POST['username']; 
    $username = mysqli_real_escape_string($conn, $username);
    $username = htmlentities($username);
    $password = $_POST['password'];
    $password = mysqli_real_escape_string($conn, $password);
    $password = htmlentities($password);

    $select_admin = "SELECT username, password FROM admin WHERE username='$username' AND password='$password'"; // Changed 'name' to 'username'
    $select_admin_query = mysqli_query($conn, $select_admin);
    if(mysqli_num_rows($select_admin_query)>0){
        $_SESSION['login'] = "admin";
        header('Location: admin/dashboard.php');
        exit();
    }
    else{
        $_SESSION['loginmsg'] = "Incorrect Credentials";
    }
}
?>

<html>
<head>
    <link rel="stylesheet" href="css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Log in</title>
    <style>
        body {
            background-color: #195905;
            font-family: 'Ubuntu', sans-serif;
        }

        .main {
            background-color: #8fbc8f;
            width: 400px;
            height: 400px;
            margin: 5em auto;
            border-radius: 1.5em;
            box-shadow: 0px 11px 35px 2px rgba(0, 0, 0, 0.14);
        }

        .sign {
            padding-top: 50px;
            color: #006600;
            font-weight: bold;
            font-size: 23px;
            
        }

        .name {
            width: 76%;
            color: rgb(38, 50, 56);
            font-weight: 700;
            font-size: 14px;
            letter-spacing: 1px;
            background: rgba(136, 126, 126, 0.04);
            padding: 10px 20px;
            border: none;
            outline: none;
            box-sizing: border-box;
            border: 2px solid rgba(0, 0, 0, 0.02);
            border-radius: 20px;
            margin-left: 46px;
            text-align: center;
            margin-bottom: 27px;
            margin-top: -40px;
        }

        form.form1 {
            padding-top: 10px;
        }

        .pass {
            width: 76%;
            color: rgb(38, 50, 56);
            font-weight: 700;
            font-size: 14px;
            letter-spacing: 1px;
            background: rgba(136, 126, 126, 0.04);
            padding: 10px 20px;
            border: none;
            border-radius: 20px;
            outline: none;
            box-sizing: border-box;
            border: 2px solid rgba(0, 0, 0, 0.02);
            margin-bottom: 50px;
            margin-left: 46px;
            text-align: center;
            margin-bottom: 27px;
            margin-top: -20px;
        }

        .name:focus,
        .pass:focus {
            border: 2px solid rgba(0, 0, 0, 0.18) !important;

        }

        .submit {
            cursor: pointer;
            border-radius: 10em;
            color: #000000;
            background: linear-gradient(to right, #d2b48c, #bc987e);
            border: 0;
            padding: 10px 40px;
            margin-top: 10px;
            margin-left: 35%;
            font-size: 13px;
            box-shadow: 0 0 20px 1px rgba(0, 0, 0, 0.04);
            text-shadow: 0px 0px 3px rgba(117, 117, 117, 0.12);
            color: #000000;
        }
        h1{
            text-align: center;
            color: #f0e68c;
            padding-top: 30px;
            font-family: "Poppins", sans-serif;
            font-weight: 500;
            font-style: normal;
        }
        h2{
            text-align: center;
            color: #e1c0b6;
            padding-top: -30px;
            font-family: "Poppins", sans-serif;
            font-weight: 500;
            font-style: normal;
        }
        .logo{
            margin-left: 130px;
            margin-top: -10px;
        }
        .login-div{
            height: 30px;
        }
        .loginmsg{
            text-align: center;
            font-family: Georgia, serif;
            color: red;
        }
        .role-msg{
            font-family: Georgia, serif;
            font-size: 0.9rem;
        }
    </style>
</head>

<body>
    <h1>Indira Gandhi Delhi Technical University for Women</h1>
    <h2>ProctorPlanner: Exam Seating Management & Seat Locator</h2>
    
    
    <div class="main">
    
        <p class="sign" align="center">ADMIN LOGIN</p>
        <div class="logo"><img src="igdtuw_logo.png" height=90px width=120px ></div>
        <div class="login-div">
            <p class="loginmsg">
                <?php
                if(isset($_SESSION['loginmsg'])){
                    echo $_SESSION['loginmsg'];
                    unset($_SESSION['loginmsg']);
                }
                ?>
            </p>
        </div>
        <form class="form1" method="post">
        
            <input class="name" name="username" type="text" align="center" placeholder="Enter Username">
            <input class="pass" name="password" type="password" align="center" placeholder="Password">
            <button class="submit" name="submit" type="submit" align="center">LOGIN</button>
            <p align=center class="role-msg">Are you a student? <a href="login_student.php">Login Here</a></p>
    </div>
</body>
</html>