<?php
    require 'scripts/connect.inc.php';
    require 'scripts/core.inc.php';
    if(loggedin()){
        $visitor_name = strtoupper(getfield('name'));
        $ip = $_SERVER['REMOTE_ADDR'];
        $refer = $_SERVER['HTTP_REFERER'];
        if($refer=='http://'.$ip.'/or/plane.php' || $refer=='http://'.$ip.'/or/plane.php'){
            $plane_name = $_REQUEST['plane_name'];
            $plane_no = $_REQUEST['plane_no'];
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
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Book Your Ticket</title>
    <link href='http://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
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
     </style>
</head>
<body>
     <div class="userinfo">Hi, <strong><?php echo $visitor_name; ?></strong><br><a href="logout.php">Logout</a></div>
    <header><h1>Ticket From <?php echo $from.' to '.$to; ?></h1></header>
    <div id="cont">
        <strong>Date:</strong> <?php echo $date.'-'.$month.'-'.$year; ?><br>
        <strong>Flight No.:</strong> <?php echo $train_no; ?><br>
        <strong>Flight Name :</strong> <?php echo $train_name; ?><br>
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
            die('You are not authorized to view this page');
        }
    }
    else {
        header('Location: index.php');
    }
        
        
?>


