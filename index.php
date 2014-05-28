<?php
    ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Log In</title>
    <link href='http://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
    <script type="text/javascript" src="scripts/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="transition.js"></script>
    <style>
        body {
            margin:0;
            padding:0;
            background-image:url(images/login.jpeg);
            background-repeat:no-repeat;
            background-size: 100% 100%;
            -webkit-touch-callout: none;
            -webkit-user-select: none;
            -khtml-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }
        h1 {
            font-family: 'Ubuntu', sans-serif;
            font-size: 16px;
            font-weight:bold;
            color: #fff;
            padding: 0;
        }
        .container {
            width: 100vw;
            height: 100vh;
            display: table;
        }
        header {
            width: 100%;
            text-align: center;
        }
        table {
            width:400px;
            margin: auto;
            background-color: #6B8EA7;
            vertical-align: middle;
            padding-top: 20px;
            padding-bottom: 20px;
            opacity:0.93;
        }
        tr td:nth-child(1) {
            text-align: right;
            width: 150px;
            font-family: 'Ubuntu', sans-serif;
            font-size: 14px;
            font-weight:bold;
            color: #fff;
            padding:5px;
        }
        tr td:nth-child(2) {
            text-align: left;
            width: 250px;
            padding:5px;
        }
        form {
            width: 400px;
            display: table-cell;
            vertical-align: middle;
        }
        input {
            font-family: 'Ubuntu', sans-serif;
            font-size: 12px;
            color: #333;
            border:0;
            padding:6px;
            border-width:1px;
            border-style:solid;
            border-radius:5px;
            border-color:#333;
        }
        select {
            font-family: 'Ubuntu', sans-serif;
            font-size: 12px;
            color: #000;
            padding:4px;
            background-color:#fff;
            border-width:1px;
            border-style:solid;
            border-radius:5px;
            border-color:#333;
        }
        #button {
            cursor:pointer;
            width:100px;
        }
        a{
            font-family: 'Ubuntu', sans-serif;
            font-size: 12px;
            color:#fff;
            font-weight:bold;
            display:block;
        }
       a:link {
            color:#fff;
        }
        a:visited {
            color:#fff;
        }
        a:hover {
            color:#ccc;
        }
        a:active {
            color:#fff;
        }
        .full {
            width:100vw;
            height:100vh;
            position:fixed;
            top:0;
            left:0;
            background-color:rgba(51, 51, 51, 0.9); ;
            z-index:8;
            display:none;
        }
        .alert{
            width:350px;
            height:200px;
            background-color:#637365;
            position:absolute;
            top:50%;
            left:50%;
            margin-left:-180px;
            margin-top:-100px;
            border-width:5px;
            border-style:solid;
            border-radius:15px;
            border-color:#B0BFB2;
        }
        .alertin {
            width:300px;
            padding-top:40px;
            padding-bottom:30px;
            font-family: 'Ubuntu', sans-serif;
            text-align:center;
            font-size: 18px;
            color:#fff;
            font-weight:bold;
            margin:auto;
            
        }
        .alert_button {
            width:100px;
            background-color:#ccc;
            font-family: 'Ubuntu', sans-serif;
            text-align:center;
            font-size: 16px;
            color:#333;
            font-weight:bold;
            margin:auto;
            padding:10px;
            border-width:2px;
            border-style:solid;
            border-radius:5px;
            border-color:#333;
            cursor:pointer;
            -webkit-transition: background-color 0.5s linear;
            -moz-transition: background-color 0.5s linear;
            -o-transition: background-color 0.5s linear;
            -ms-transition: background-color 0.5s linear;
        }
        .alert_button:hover {
            background-color: #488DF0;
            color:#fff;
        }
            
    </style>
</head>

<body>
    <div class="full">
        <div class="alert">
            <div class="alertin"></div>
            <div class="alert_button">CLOSE</div>
        </div>
    </div>
    <?php
        require 'scripts/connect.inc.php';
        require 'scripts/core.inc.php';
        ob_start();
        if(isset($_POST['username']) && isset($_POST['password'])){
            $username = $_POST['username'];
            $password =$_POST['password'];
            if(!empty($username) && !empty($password)){
                $query = "SELECT `id` FROM `signup` WHERE `username`='$username' AND `password`='$password'";
                $query_run = mysql_query($query);
                $query_row = mysql_num_rows($query_run);
                if($query_row == 1){
                    $user = mysql_result($query_run,0,'id');
                    $_SESSION['user_id'] = $user;
                    header('Location: home.php');
                }
                else {
                    echo'<script>notice();
                        $(".alertin").html("Invalid Username Password Combination.");
                        notice_close();
                    </script>';
                }
            }
            else {
                echo'<script>notice();
                        $(".alertin").html("Please Fill All The Fields.");
                        notice_close();
                    </script>';
            }
        }
    ?>
    <div class="container">
         <form action="index.php" method="post">
            <header><h1>Online Reservation</h1></header>
            <table>
                <tr>
                    <td>Username:</td>
                    <td><input type="text" name="username" placeholder="Your Username"></td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td><input type="password" name="password" placeholder="Enter Password"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="Log IN" id="button"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><a href="signup.php">Click to Sign Up Here</a></td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>