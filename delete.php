<?php
	session_start();
	
	require_once 'connect.php';
	$image = R::load("images" , $_GET['id']);
	unlink("data/".$image['path']);
	R::trash($image);

	header("location:manage.php")

?>