<?php
	session_start();
	require 'connect.php';
	if (!empty($_POST['username']) && !empty($_POST['password'])) {
		$users = R::getAll("SELECT * FROM `users` WHERE `users`.`name` = ? AND `users`.`password` = ?" , [$_POST['username'] , $_POST['password']]);
		if (count($users) < 1) {
			header("location:index.php");
			session_destroy();
			exit();
		}
		$_SESSION['username'] = $_POST['username'];
		$_SESSION['password'] = $_POST['password'];
		$_SESSION['admin'] = $_POST['username'] == "admin" ? 1 : 0;
	}
	else{
		$users = R::getAll("SELECT * FROM `users` WHERE `users`.`name` = ? AND `users`.`password` = ?" , [$_SESSION['username']  , $_SESSION['password']]);
		if (count($users) < 1) {
			header("location:index.php");
			session_destroy();	
			exit();
		}	
	}


