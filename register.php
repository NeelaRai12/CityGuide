<?php
	require 'dbconfig/config.php';
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Registration Page</title>
<link rel="stylesheet" href="css/style1.css">
</head>

<body style="background-color:#bdc3c7"> 
<div id="main-wrapper">
	<center>
    	<h2> Regisration Form</h2>
        <img src="images/avatar.jpg" class="avatar" />
    </center>
    
    <form class="myform" action="register.php" method="post">
    	<label><b> Username:</b></label><br />
        <input name="username" type="text" class="inputvalues" placeholder="Type your username" required /><br />
        <label><b>Password:</b></label><br />
        <input name="password" type="password" class="inputvalues" placeholder="Your password"  required/><br />
        <label><b>Confirm Password:</b></label><br />
        <input name="cpassword" type="password" class="inputvalues" placeholder="Confirm password" required/><br />
        <input name="submit_btn" type="submit" id="signup_btn" value="Sign Up" /><br />
        <a href="index.php"><input type="button" id="back_btn" value="Back" /></a>
   </form>
   
   <?php
   if(isset($_POST['submit_btn']))
   {
	   //echo '<script type="text/javascript"> alert("Sign Up button Clicked")</script>';
	   
       $username=$_POST['username'];
	   $password=$_POST['password'];
	   $cpassword=$_POST['cpassword'];
	   
	   if($password==$cpassword)
	   {
		   $query= "select * from user WHERE username='$username'";
		   $query_run= mysqli_query($con,$query);
		   if(mysqli_num_rows($query_run)>0)
		   {
			   echo'<script type="text/javascript"> alert("User already exist..Try another username")</script>';
			   
		   }
           else
		   {
			   $query = "insert into user value('$username','$password')";
			   $query_run =mysqli_query($con,$query);
			   
			   if($query_run)
			   {
				   echo'<script type="text/javascript"> alert("User registered..Go to login page to login")</script>';  
			   }
			   else
			   {
				   echo'<script type="text/javascript"> alert("Error!!!")</script>';
			   }
			   
		   }
		   
	   }
	   else
	   {
		   echo'<script type="text/javascript"> alert("Password and confirm password does not match!")</script>';
		   
	   }
   }
	  
   ?>
  </div>
</body>
</html>