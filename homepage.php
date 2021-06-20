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
<body>
	<div id="main-wrapper">
		<center><h2>Home Page</h2>
		<h3>Welcome 
		<?php
		echo $_SESSION['username']
        ?>
        </center>
       
		
		<form class="myform" action="homepage.php" method="post">
			<div class="imgcontainer">
            <center>    
			<img src="images/avatar.jpg" class="avatar">
            </center>
			</div>
			<div class="inner_container">
            <input type="button" id="logout_btn" value="Log Out" />
			</div>
		</form>      
        <?php
        if(isset($_POST['logout']))
		{
		session_destroy();
		header('location:index.php')
		}
		?>
	</div>
</body>
</html>