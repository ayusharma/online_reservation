<?php 
    ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Book Your Ticket</title>
    <link href='http://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
    <script type="text/javascript" src="scripts/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="transition.js"></script>
    <style>
        body {
            margin:0;
            padding:0;
            width:100vw;
            height:100vh;
            background-image:url(images/bookbg.jpg);
            background-repeat:no-repeat;
            background-size: 100% 100%;
        }
        header {
            width: 600px;
            padding:20px;
            text-align: center;
            margin:auto;
        }
        h1 {
            font-family: 'Ubuntu', sans-serif;
            font-size: 18px;
            color: #fff;
            padding: 0;
            margin:0px;
        }
        hr {
            padding:0;
            margin:0;
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
        #cont {
            width:400px;
            margin:auto;
            line-height:30px;
            font-family: 'Ubuntu', sans-serif;
            font-size: 14px;
            color: #fff;
            background-color:#616E71;
            overflow-x:hidden;
            padding:15px;
            opacity:0.93;
            
        }
        button {
            font-family: 'Ubuntu', sans-serif;
            font-size: 14px;
            color: #000;
            padding:5px;
            border-width:1px;
            border-style:solid;
            border-radius:5px;
            border-color:#333;
            cursor:pointer;
        }
         .userinfo {
            position:absolute;
            top:60px;
            right:0px;
            padding:15px;
            background-color:#616E71;
            font-family: 'Ubuntu', sans-serif;
            font-size: 14px;
            color: #fff;
            line-height:25px;
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
            <div class="alert_button">Back to Home</div>
        </div>
    </div>
<?php
    require 'scripts/connect.inc.php';
    require 'scripts/core.inc.php';
    if(loggedin()){
        $visitor_name = strtoupper(getfield('name'));
        $ip = $_SERVER['REMOTE_ADDR'];
        $refer = $_SERVER['HTTP_REFERER'];
        if($refer=='http://'.$ip.'/or/down.php' || $refer=='http://'.$ip.'/or/up.php'){
            $train_name = $_REQUEST['train_name'];
            $train_no = $_REQUEST['train_no'];
            $from = $_REQUEST['from'];
            $to = $_REQUEST['to'];
            $date = $_REQUEST['date'];
            $month = $_REQUEST['month'];
            $year = $_REQUEST['year'];
            $class = $_REQUEST['class'];
            $arr= $_REQUEST['arr'];
            $depart= $_REQUEST['depart'];
            $fare = $_REQUEST['fare'];
?>

     <div class="userinfo">Hi, <strong><?php echo $visitor_name; ?></strong><br><a href="logout.php">Logout</a></div>
    <header><h1>Ticket From <?php echo $from.' to '.$to; ?></h1></header>
    <div id="cont">
        <strong>Date:</strong> <?php echo $date.'-'.$month.'-'.$year; ?><br>
        <strong>Train No.:</strong> <?php echo $train_no; ?><br>
        <strong>Train Name :</strong> <?php echo $train_name; ?><br>
        <strong>From :</strong> <?php echo $from; ?>
        <strong>To : </strong><?php echo $to; ?><br>
        <strong>Arrival : </strong><?php echo $arr; ?><br>
        <strong>Destination Time : </strong><?php echo $depart; ?><br>
        <strong>Class : </strong><?php echo $class; ?><br>
        <strong>Fare : </strong><?php echo $fare; ?><br>
        <strong>Passenger Details: </strong><hr>
        <?php
            $query = "SELECT * FROM `signup` WHERE `id`='".$_SESSION['user_id']."'";
            $query_run = mysql_query($query);
            while($result = mysql_fetch_array($query_run,MYSQL_ASSOC)){
                echo '<strong>Name: </strong>'.$result["name"].'<br><strong>Sex: </strong>'.$result["sex"].'<br><strong>City: </strong>'.$result['city'].'<br><strong>E-Mail: </strong>'.$result['email'];
            }
        ?>
        <br><em>Note: Always Carry Valid Identity Proof while Travelling...</em>
        <br><button onclick="myFunction()">Print your Ticket</button>
        
        <script>
            function myFunction() {
                window.print();
            }
        </script>
         </div>
</body>
</html>
<?php            
        }
        else {
            echo'<script>notice();
                        $(".alertin").html("You\'re not allowes to access this page.");
                        $(".alert_button").click(function(){
                            window.location.replace("home.php");
                        });
                    </script>';
        }
    }
    else {
        header('Location: index.php');
    }
        
        
?>


