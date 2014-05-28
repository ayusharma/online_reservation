<?php
    require 'scripts/core.inc.php';
    require 'scripts/connect.inc.php';
    if(loggedin()){
        $visitor_name = strtoupper(getfield('name'));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Book a Ticket</title>
    <link href='http://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
    <script type="text/javascript" src="scripts/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="transition.js"></script>
    <script type="text/javascript" src="scripts/trains.js"></script>
    <script type="text/javascript" src="scripts/bus.js"></script>
    <script type="text/javascript" src="scripts/plane.js"></script>
    
    <style>
        body {
            margin:0;
            padding:0;
            z-index:0;
        }
        h1 {
            font-family: 'Ubuntu', sans-serif;
            font-size: 16px;
            color: #fff;
            padding: 0;
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
            width: 400px;
            margin-top:100px;
           
        }
        tr td:nth-child(1) {
            text-align: right;
            width: 65px;
            font-family: 'Ubuntu', sans-serif;
            font-size: 14px;
            color: #fff;
            padding:5px;
        }
        tr td:nth-child(2) {
            text-align: left;
            width: 215px;
            padding:5px;
        }
        .middle {
            width: 400px;
            margin-left: auto;
            margin-right: auto;
            margin-top:30px;
            opacity:0.93;
        }
        .ticket {
            width: 400px;
            overflow: hidden;
        }
        .booking {
            width: 400px;
            height: 500px;
            overflow: hidden;
        }
        .role {
            width: 1200px;
            height: 500px;
            overflow: hidden;
            position: relative;
        }
        .bus,.rail,.plane{
            width: 400px;
            height: 500px;
            float: left;
        }
        .bus {
            background-color: #6B8EA7;
            background-image: url(images/bus.png);
            background-repeat:no-repeat;
            background-position:center 350px;
            background-size: 128px 128px;
            
        }
        .rail {
            background-color: #6B8EA7;
            background-image: url(images/train.png);
            background-repeat:no-repeat;
            background-position:center 350px;
        }
        .plane {
            background-color: #6B8EA7;
            background-image: url(images/plane.png);
            background-repeat:no-repeat;
            background-position:center 350px;
            background-size: 128px 128px;
        }
        .section {
            width: 400px;
        }
        ul {
            margin: 0;
            padding: 0;
        }
        li {
            display: block;
            width: 33.333333333%;
            float: left;
            text-align: center;
            padding-top: 5px;
            padding-bottom: 5px;
            cursor: pointer;
            font-family: 'Ubuntu', sans-serif;
            font-size: 16px;
            color:#fff;
            background-color:#616E71;
           
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
        input {
            font-family: 'Ubuntu', sans-serif;
            font-size: 12px;
            color: #333;
            border:0;
            padding:6px;
            width:75px;
            border-width:1px;
            border-style:solid;
            border-radius:5px;
            border-color:#333;
        }
        select {
            font-family: 'Ubuntu', sans-serif;
            font-size: 12px;
            color: #000;
            width:200px;
            padding:4px;
            background-color:#fff;
            border-width:1px;
            border-style:solid;
            border-radius:5px;
            border-color:#333;
        }
        #button_trains {
            cursor:pointer;
            font-weight:bold;
        }
        .railbg {
            width:100vw;
            height:100vh;
            margin:0;
            padding:0;
            position:fixed;
            z-index:-1;
            background-image:url(images/trainbg.jpg);
            background-repeat:no-repeat;
            background-size: 100% 100%;
        }
        .planebg {
            width:100vw;
            height:100vh;
            margin:0;
            padding:0;
            position:fixed;
            z-index:-3;
            background-image:url(images/planebg.jpg);
            background-repeat:no-repeat;
            background-size: 100% 100%;
        }
        .busbg {
            width:100vw;
            height:100vh;
            margin:0;
            padding:0;
            position:fixed;
            z-index:-2;
            background-image:url(images/busbg.jpg);
            background-repeat:no-repeat;
            background-size: 100% 100%;
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
    
    <div class="railbg"></div>
    <div class="busbg"></div>
    <div class="planebg"></div>
    <div class="full">
        <div class="alert">
            <div class="alertin"></div>
            <div class="alert_button">CLOSE</div>
        </div>
    </div>
    <div class="userinfo">Hi, <strong><?php echo $visitor_name; ?></strong><br><a href="logout.php">Logout</a></div>
    <div class="container">
         <div class="middle">
            <header><h1>Book a ticket</h1></header>
            <div class="ticket">
                <div class="section">
                    <ul>
                        <li>Railway</li>
                        <li>Roadway</li>
                        <li>Airway</li>
                    </ul>
                </div> 
                <div class="booking">
                    <div class="role">
                        <div class="rail">
                            <form action="" method="post" id="trains">
                               <table>
                                    <tr>
                                        <td><strong>From:</strong></td>
                                        <td>
                                            <select name="from" id="trains_from">
                                                <option value="1" selected>Mumbai Central</option>
                                                <option value="2">Vadodra</option></option>
                                                <option value="3">Ratlam</option>
                                                <option value="4">Kota</option>
                                                <option value="5">Mathura</option>
                                                <option value="6">New Delhi</option>
                                            </select>
                                        </td>
                                    </tr> 
                                    <tr>
                                        <td><strong>To:</strong></td>
                                        <td>
                                            <select name="to" id="trains_to">
                                                <option value="1">Mumbai Central</option>
                                                <option value="2">Vadodra</option>
                                                <option value="3">Ratlam</option>
                                                <option value="4">Kota</option>
                                                <option value="5">Mathura</option>
                                                <option value="6" selected>New Delhi</option>
                                            </select>
                                        </td>
                                    </tr> 
                                    <tr>
                                        <td><strong>Class: </strong></td>
                                        <td>
                                            <select name="class">
                                                <option value="SL" selected>Sleeper</option>
                                                <option value="AC-1">First AC</option>
                                                <option value="AC-2">Second AC</option>
                                                <option value="AC-3">Third AC</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>Date:</strong></td>
                                        <td>
                                         <input type="number" name="date"  placeholder="Date" id="date" min="1" max="31">
                                        <input type="number" name="month"  placeholder="Month" id="month" min="1" max="12">
                                        <input type="number" name="year"  placeholder="Year" id="year" min="2014" max="2014">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" value="" name="day" id="invisible" style="display:none;"></td>
                                        <td><input type="button" value="Find Trains" id="button_trains"/></td>
                                    </tr>
                                </table>
                            </form>
                        </div>
                        <div class="bus">
                            <form action="" method="post" id="bus">
                               <table>
                                    <tr>
                                        <td>From:</td>
                                        <td>
                                            <select name="from" id="bus_from">
                                                <option value="1" selected>Jaipur</option>
                                                <option value="2">Jodhpur</option>
                                                <option value="3">Kota</option>
                                                <option value="4">Delhi</option>
                                            </select>
                                        </td>
                                    </tr> 
                                    <tr>
                                        <td>To:</td>
                                        <td>
                                            <select name="to" id="bus_to">
                                                <option value="1">Jaipur</option>
                                                <option value="2">Jodhpur</option></option>
                                                <option value="3">Kota</option>
                                                <option value="4" selected>Delhi</option>
                                            </select>
                                        </td>
                                    </tr> 
                                    <tr>
                                        <td>Class: </td>
                                        <td>
                                            <select name="class">
                                                <option value="AC" selected>AC</option>
                                                <option value="REGULAR">NON-AC</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Date:</td>
                                        <td>
                                         <input type="number" name="date"  placeholder="Date" id="date_bus" min="1" max="31">
                                        <input type="number" name="month"  placeholder="Month" id="month_bus" min="1" max="12">
                                        <input type="number" name="year"  placeholder="Year" id="year_bus" min="2014" max="2014">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" value="" name="day" id="invisible_bus" style="display:none;"></td>
                                        <td><input type="button" value="Find Buses" id="button_bus"/></td>
                                    </tr>
                                </table>
                            </form>

                            
                        </div>
                        <div class="plane">
                            <form action="" method="post" id="plane">
                               <table>
                                    <tr>
                                        <td>From:</td>
                                        <td>
                                            <select name="from" id="plane_from">
                                                <option value="1" selected>Jaipur</option>
                                                <option value="2">New Delhi</option>
                                                <option value="3">Mumbai</option>
                                                <option value="4">Kolkata</option>
                                                <option value="5">Chennai</option>
                                            </select>
                                        </td>
                                    </tr> 
                                    <tr>
                                        <td>To:</td>
                                        <td>
                                            <select name="to" id="plane_to">
                                                <option value="1">Jaipur</option>
                                                <option value="2" selected>New Delhi</option>
                                                <option value="3">Mumbai</option>
                                                <option value="4">Kolkata</option>
                                                <option value="5">Chennai</option>
                                            </select>
                                        </td>
                                    </tr> 
                                    <tr>
                                        <td>Class: </td>
                                        <td>
                                            <select name="class">
                                                <option value="ECONOMY" selected>ECONOMY</option>
                                                <option value="BUSINESS">BUSINESS</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Date:</td>
                                        <td>
                                         <input type="number" name="date"  placeholder="Date" id="date_plane" min="1" max="31">
                                        <input type="number" name="month"  placeholder="Month" id="month_plane" min="<?php echo date("m") ?>" max="12">
                                        <input type="number" name="year"  placeholder="Year" id="year_plane" min="<?php echo date("Y") ?>" max="2014">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" value="" name="day" id="invisible_plane" style="display:none;"></td>
                                        <td><input type="button" value="Find Flights" id="button_plane"/></td>
                                    </tr>
                                </table>
                            </form>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
    
    
</html>
<?php 
     }
else {
    header('Location:index.php');
}
        
?>