<?php
	session_start();
	//**require_once('../../../Users/hp/C:/xampp/htdocs/city guide/dbconfig/config.php');
	//phpinfo();**/
?>
<!DOCTYPE html>
<html>
<head>
<title>Home Page</title>
<link rel="stylesheet" href="css/style1.css">
</head>
<body style="background-color:#bdc3c7">
	<div id="main-wrapper">
		<center>
        <h2>Home Page</h2>
		<h3>Welcome 
		<?php
		echo $_SESSION['username']
        ?></h3>
        <?php echo '<img class="avatar" src="'.$_SESSION["imglink"].'">';?>
        </center>
       
		
		<form class="myform" action="homepage.php" method="post">
            <input name="logout" type="submit" id="logout_btn" value="Log Out" /><br>
		</form>      
        <?php
        if(isset($_POST['logout']))
		{
		session_destroy();
		header('location:index.php');
		}
		?>
	</div>
</body>
</html>