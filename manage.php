<?php
	
	require_once 'auth.php';
	require_once 'connect.php';

	$images = R::getAll("SELECt * FROM `images`");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	<style type="text/css">
		html,body{
			padding: 0;
			margin: 0;
			height: 100%;
			width: 100%;
		}
		#bg-image{
			background-image: url(images/bg-01.jpg);  
			filter: blur(4px);
			-webkit-filter: blur(4px);
			height: 100%;
			width: 100%;
			background-size: cover;
			background-position: center;
			position: absolute;
			z-index: -1;
		}
		#main{
			width: 90%;
			min-height: 85%;
			padding: 8px;
			margin: 0 auto;	
			background-color: #ffffff;
			-webkit-box-shadow: 0px 0px 7px 1px rgba(0,0,0,0.61);
			-moz-box-shadow: 0px 0px 7px 1px rgba(0,0,0,0.61);
			box-shadow: 0px 0px 7px 1px rgba(0,0,0,0.61);
			border-radius: 4px;
		}
		.item{
		    margin-bottom: 10px;
		    height: 300px;
		    width: 100%;
		    overflow: hidden;
		    text-align: center;
		}
		.image{
			height: 100%;
		}
		.remove{
			height: 32px;
		    width: 32px;
		    position: absolute;
		    padding: 10px;
		    cursor: pointer;
		}
	</style>
</head>
<body >
	<div id="bg-image"></div>
	<div style="width: 100%;height: 5%"></div>
	<div id="main">
		<? foreach ($images as $value) { ?>

			<div class="item">
				<a style="display: <? print $_SESSION['admin'] == 1 ? contents : none; ?>;" href="delete.php?id=<? print $value['id'] ?>"><img src="images/remove.png" class="remove"></a>
				<img src="data/<? print $value['path']; ?>" class="image">
			</div>
		<? } ?>
			
	</div>
</body>
</html>