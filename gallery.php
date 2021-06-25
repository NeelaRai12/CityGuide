<?php

  // Initialize message variable
  $msg = "";

  // If upload button is clicked ...
  if (isset($_POST['upload'])) {
	  // image file directory
  	$target = "images/".basename($_FILES['image']['name']);
	
		  // Create database connection
  	$db = mysqli_connect("localhost", "root", "", "cityguidedb");
	
  	// Get image name
  	$image = $_FILES['image']['name'];
  	// Get text
  	$text = $_POST['text'];

  	$sql = "INSERT INTO images (image, text) VALUES ('$image', '$text')";
  	// execute query
  	mysqli_query($db, $sql);

  	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		$msg = "Image uploaded successfully";
  	}else{
  		$msg = "Failed to upload image";
  	}
  }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Image</title>
<link rel="stylesheet" type="text/css" href="css/style4.css" />
</head>

<body>
<div id="content">
  <?php
   $db = mysqli_connect("localhost", "root", "", "cityguidedb");
   $sql = "select * FROM images";
   $result = mysqli_query($db,$sql);
    while ($row = mysqli_fetch_array($result)) {
      echo "<div id='img_div'>";
      	echo "<img src='images/".$row['image']."' >";
      	echo "<p>".$row['text']."</p>";
      echo "</div>";
    }
  ?>
  <form method="POST" action="gallery.php" enctype="multipart/form-data">
  	<input type="hidden" name="size" value="1000000">
  	<div>
  	  <input type="file" name="image">
  	</div>
  	<div>
      <textarea 
      	name="text" 
      	cols="40" 
      	rows="4" 
      	placeholder="Say something about this image..."></textarea>
  	</div>
  	<div>
  		<button type="submit" name="upload">POST</button>
  	</div>
  </form>
</div>
</body>
</html>
