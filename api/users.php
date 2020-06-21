<?php
include '../classes/Users.php';
if(isset($_GET['checkUsername'])){
	$username=$_GET['username'];
	echo Users::checkUsername($username);
}
if(isset($_POST['logIn'])){
	$username=$_POST['username'];
	$password=$_POST['password'];
	if(Users::logIn($username,$password)){
		session_start();
		$id=Users::getUserId($username);
		$_SESSION['user_id']=$id;
		echo 1;
	}
	else{
		echo 0;
	}
}