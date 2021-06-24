<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Access Google Maps API in PHP</title>
<link rel="stylesheet" href="../city guide/css/bootstrap.min.css">
<script type="text/javascript" src="../city guidefileupload/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="../city guidefileupload/js/googlemap.js"></script>
<style type="text/css">
	.container {
		height: 450px;
	}
	#map {
		width: 100%;
		height: 100%;
		border: 1px solid blue;
	}
</style>
</head>
<body>
	<div class="container">
		<center><h1>Access Google Maps API in PHP</h1></center>
        <div id="map"></div>
    </div>
</body>
<script async
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA9HN5a1z2YeVATAMTx0OcgJ0UwXB0iBng&callback=loadMap">
</script>
</html>
