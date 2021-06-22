<?php
	require 'dbconfig/config.php';
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Registration Page</title>
<link rel="stylesheet" href="css/style1.css">

<script type="text/javascript">

    function PreviewImage() {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("imglink").files[0]);

        oFReader.onload = function (oFREvent) {
            document.getElementById("uploadPreview").src = oFREvent.target.result;
        };
    };
</script>

</head>
<body style="background-color:#bdc3c7"> 

	<form class="myform" action="register.php" method="post" enctype="multipart/form-data">
	<div id="main-wrapper">
	<center>
    	<h2> Regisration Form</h2>
        <img id="uploadPreview" src="images/avatar.jpg" class="avatar" /><br />
        <input type="file" id="imglink" name="imglink" accept=".jpg,.jpeg,.png" onchange="PreviewImage();" />
    </center>
    
        <label><b> Fullname:</b></label><br />
        <input name="fullname" type="text" class="inputvalues" placeholder="Type your fullname" required /><br />
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
	   /*echo '<script type="text/javascript"> alert("Sign Up button Clicked")</script>';*/
	   
	   $fullname=$_POST['fullname'];   
       $username=$_POST['username'];
	   $password=$_POST['password'];
	   $cpassword=$_POST['cpassword'];
	   
	   $img_name = $_FILES['imglink']['name'];
	   $img_size =$_FILES['imglink']['size'];
	   $img_tmp =$_FILES['imglink']['tmp_name'];
	   
	   $directory = 'uploads/';
	   $target_file = $directory.$img_name;
	   
	   if($password==$cpassword)
	   {
		   $query= "select * from fileuploadtables WHERE username='$username'";
		   $query_run= mysqli_query($con,$query);
		   
		   if(mysqli_num_rows($query_run)>0)
		   {
			   echo'<script type="text/javascript"> alert("User already exist..Try another username")</script>';
			   
		   }
           else if(file_exists($target_file))
		   {
			   echo '<script type="text/javascript"> alert("Image file already exists.. Try another image file") </script>';
	       }
		   else if($img_size>2097152)
		   {
				echo '<script type="text/javascript"> alert("Image file size larger than 2 MB.. Try another image file") </script>';
		   }
		   else
		   {
			   move_uploaded_file($img_tmp,$target_file); 
			   $query = "insert into fileuploadtables values('','$username','$password','$fullname','$target_file')";
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