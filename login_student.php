<?php
session_start();
include "db.php";

if(isset($_POST['submit'])){
    $rollNo = $_POST['rollNo'];
    $rollNo = mysqli_real_escape_string($conn, $rollNo);
    $rollNo = htmlentities($rollNo);

    $select_student = "SELECT rollNo FROM student WHERE rollNo='$rollNo'";
    $select_student_query = mysqli_query($conn, $select_student);
    if(mysqli_num_rows($select_student_query) > 0){
        $row = mysqli_fetch_assoc($select_student_query);
        $_SESSION['login'] = "student";
        $_SESSION['loginid'] = $row['rollNo'];
        header('Location: students/dash.php');
    }
    else{
        $_SESSION['loginmsg'] = "Incorrect Roll Number";
    }
}
?>
<html>
<head>
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Student Login</title>
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
        }

        form.form1 {
            padding-top: 10px;
        }

        .submit {
            cursor: pointer;
            border-radius: 10em;
            color: #000000;
            background: linear-gradient(to right, #d2b48c, #bc987e);
            border: 0;
            padding: 10px 40px;
            margin-top: -10px;
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
        .logo{
            margin-top: -10px;
            margin-left: 130px;
        }
    </style>
</head>

<body>
    <h1>Indira Gandhi Delhi Technical University for Women</h1>
    <h2>ProctorPlanner: Exam Seating Management & Seat Locator</h2>
    <div class="main">
        <p class="sign" align="center">STUDENT LOGIN</p>
        <div class="logo"><img src="igdtuw_logo.png" height=100px width=120px ></div>
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
            <input class="name" name="rollNo" type="text" align="center" placeholder="Enter Roll Number">
            <button class="submit" name="submit" type="submit" align="center">CHECK</button>
            <p align=center class="role-msg">Are you an admin? <a href="login_admin.php">Login Here</a></p>
        </form>
    </div>
</body>
</html>