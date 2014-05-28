<?php
require 'scripts/connect.inc.php';
require 'scripts/core.inc.php';
if(loggedin()){
    $visitor_name = strtoupper(getfield('name'));
if(isset($_POST['from']) && isset($_POST['to']) && isset($_POST['day']) && isset($_POST['date']) && isset($_POST['month']) && isset($_POST['year']) && isset($_POST['class']) ){ 
    $from = $_POST['from'];
    $to = $_POST['to'];
    $day = $_POST['day'];
    $date = $_POST['date'];
    $month = $_POST['month'];
    $year = $_POST['year'];
    $class = $_POST['class'];
    echo $date.' '.$month.' '.$year.' '.$day.' '.$from.' '.$to.' '.$class;
    if(!empty($from) && !empty($to) && !empty($date) && !empty($month) && !empty($year) && !empty($class)){
        if($from==1){
            $fm = 'Mumbai';
        }
        else if($from==2){
            $fm = 'Vadodra';
        }
        else if($from==3){
            $fm = 'Ratlam';
        }
        else if($from==4){
            $fm = 'Kota';
        }
        else if($from==5){
            $fm = 'Mathura';
        }
        else{
            $fm = 'New Delhi';
        }
         if($to==1){
            $too = 'Mumbai';
        }
        else if($to==2){
            $too = 'Vadodra';
        }
        else if($to==3){
            $too = 'Ratlam';
        }
        else if($to==4){
            $too = 'Kota';
        }
        else if($to==5){
            $too = 'Mathura';
        }
        else{
            $too = 'New Delhi';
        }
       
           
?>
<!DOCTYPE html>
<html lang="en">
<head><title>Trains From <?php echo $fm.' to '.$too; ?></title></head>
<style>
    body {
        margin:0;
        padding:0;
        background-image:url(images/trainbg.jpg);
        background-repeat:no-repeat;
        background-size: 100% 100%;
    }
    table {
        margin:auto;
        background-color: #6B8EA7;
        opacity:0.93;
    }
    td,th {
        width:130px;
        text-align:center;
        font-family: 'Ubuntu', sans-serif;
        font-size: 14px;
        color: #fff;
        border:0;
        padding:6px;
    }
    th {
        background-color:#616E71;
    }
    header {
            margin-top:30px;
            width: 100%;
            text-align: center;
    }
    h1 {
            font-family: 'Ubuntu', sans-serif;
            font-size: 16px;
            color: #fff;
            padding: 0;
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
</style>
<body>
     <div class="userinfo">Hi, <strong><?php echo $visitor_name; ?></strong><br><a href="logout.php">Logout</a></div>
    <header><h1>Trains From <?php echo $fm.' to '.$too; ?></h1></header>
    <table>
        <tr>
            <th>Train No.</th>
            <th>Train Name</th>
            <th><?php echo $fm; ?> Departure</th>
            <th><?php echo $too; ?> Arrival</th>
            <th>Class</th>
            <th>Fare</th>
            <th>Book</th>
        </tr>
<?php       $query ="SELECT * FROM `down` WHERE `tags` LIKE '%$from%' AND `tags` LIKE '%$to%' AND `day` LIKE '%$day%' AND `class` LIKE '%$class%' ";
        $query_run = mysql_query($query);
        $query_num_rows = mysql_num_rows($query_run);
        if($query_num_rows==0){
            echo 'no result found';
        }
        else {
             while($result = mysql_fetch_array($query_run,MYSQL_ASSOC)){
                echo '<tr>
            <td>'.$result["train_no"].'</td>
            <td>'.$result["train_name"].'</td>
            <td>'.$result["$from"].'</td>
            <td>'.$result["$to"].'</td>
            <td>'.$class.'</td>
            <td>'.$result["$class"].'</td>
            <td><a href="book_train.php?train_no='.$result["train_no"].'&train_name='.$result["train_name"].'&from='.$fm.'&to='.$too.'&date='.$date.'&month='.$month.'&year='.$year.'&class='.$class.'&arr='.$result["$from"].'&depart='.$result["$to"].'&fare='.$result["$class"].'">Book</a></td>
                </tr>';
             }
      ?>      
    </table>  
</body>
</html>
    <?php
        
   
        }
    }
    else{
        echo'empty values';
    }
}
else {
    echo 'An Error Has Been Occured';
}
}
else {
    header('Location:index.php');
}

?>
