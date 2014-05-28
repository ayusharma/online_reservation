<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sign Up</title>
    <link href='http://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
    <style>
        body {
            margin:0;
            padding:0;
        }
        h1 {
            font-family: 'Ubuntu', sans-serif;
            font-size: 16px;
            color: #000;
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
        }
        tr td:nth-child(1) {
            text-align: right;
            width: 150px;
            font-family: 'Ubuntu', sans-serif;
            font-size: 14px;
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
        }
    </style>
</head>

<body>
    <?php
        require 'scripts/connect.inc.php';
        if(isset($_POST['name']) && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['confirmpassword']) && isset($_POST['email']) && isset($_POST['sex']) && isset($_POST['city']) && isset($_POST['sec_que']) && isset($_POST['answer']))
        {
            $name = $_POST['name'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $confirmpassword = $_POST['confirmpassword'];
            $email = $_POST['email'];
            $sex = $_POST['sex'];
            $city = $_POST['city'];
            $sec_que = $_POST['sec_que'];
            $answer = $_POST['answer'];
            if(!empty($name) && !empty($username) && !empty($password) && !empty($confirmpassword) && !empty($email) && !empty($sex) && !empty($city) && !empty($sec_que) && !empty($answer))
            {
                $query_username = "SELECT * FROM `signup` WHERE  `username` LIKE  '".$username."'";
                $query_username_run = mysql_query($query_username);
                $query_username_num_rows = mysql_num_rows($query_username_run);
                $query_email = "SELECT * FROM  `signup` WHERE  `email` LIKE  '".$email."'";
                $query_email_run = mysql_query($query_email);
                $query_email_num_rows = mysql_num_rows($query_email_run);

                if($password != $confirmpassword)
                {
                    echo'<script>alert("Password combination does not match");</script>';
                }
                elseif($query_username_num_rows >=1){
                    echo'<script>alert("Username already chosen");</script>';
                }
                elseif($query_email_num_rows >=1){
                    echo'<script>alert("Email already chosen");</script>';
                }
                else {
                    $query_insert = "INSERT INTO `signup`(`name`, `username`, `password`, `email`, `sex`, `city`, `sec_que`, `answer`) VALUES ('$name','$username','$password','$email','$sex','$city','$sec_que','$answer')";
                    if($query_insert_run = mysql_query($query_insert))
                    {   
                        echo'<script>alert("Successfully SignedUp");</script>';
                     }
                    else {
                         echo'<script>alert("An error has been occured");</script>';
                    }
                }
            }
            else {
                echo'<script>alert("Please Fill all the fields");</script>';
            }
        }
        

    ?>
    <div class="container">
         <form action="<?php echo $_SERVER['SCRIPT_NAME'];?>" method="POST">
            <header><h1>Sign Up</h1></header>
            <table>
                <tr>
                    <td>Your Name:</td>
                    <td><input type="text" name="name" placeholder="Your Name"></td>
                </tr>
                <tr>
                    <td>Username:</td>
                    <td><input type="text" name="username" placeholder="Choose Username"></td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td><input type="password" name="password" placeholder="Enter Password"></td>
                </tr>
                <tr>
                    <td>Confirm Password:</td>
                    <td><input type="password" name="confirmpassword" placeholder="Re-Password"></td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td><input type="email" name="email" placeholder="Your Email"></td>
                </tr>
                <tr>
            	<td>Sex</td>
    			<td>
                	<select name="sex" id="sex" required>
                    	<option value="male" selected >Male</option>
                        <option value="female">Female</option>
                    </select>
                </td>
            </tr>
            
            <tr>
            	<td>City</td>
    			<td><select name="city" id="city" required>
                    	<option value="delhi" >New Delhi</option>
                        <option value="jaipur" selected>Jaipur</option>
                        <option value="mumbai" >Mumbai</option>
                        <option value="kolkata" >Kolkata</option>
                    </select>
                </td>
            </tr>
            <tr>
            	<td>Secret Question</td>
    			<td><select name="sec_que" id="sec_que" required>
                    	<option value="Which is your first school ?" >Which is your first school ?</option>
                        <option value="Who is your favourite teacher ?" selected>Who is your favourite teacher ?</option>
                        <option value="What is your pet name ?" >What is your pet name ?</option>
                        <option value="Where is your bith-place ?" >Where is your bith-place ?</option>
                    </select>
                </td>
            </tr>
            <tr>
                    <td>Answer:</td>
                    <td><input type="text" name="answer" placeholder="Secret Answer"></td>
                </tr>
            <tr>
                <td><input type="submit" id="button" value="Log IN"></td>
            </tr>
            </table>
        </form>
    </div>
</body>
</html>