<?php
	if(isset($_POST['delete'])) {
	include '../../database/database.php';
	//vars
	$ids = $_POST['ids'];
	
	//del record
	$del = "delete from users where id = '$ids' ";
	$cmd = mysqli_query($connect, $del);
	
	if($cmd){
	//
	header("Location: ../../admin/users/");
	} else {
	header("Location: ../../admin/users/");
	}
	
	
	
	} elseif(isset($_POST['update'])) {
	include '../../database/database.php';
	//vars
	$ids = $_POST['ids'];
	$username = $_POST['username'];
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$email = $_POST['email'];
	$password_raw = $_POST['password'];
	$password = base64_encode($password_raw);
	$phone = $_POST['phone'];
	$country = $_POST['country'];
	$auth_code = $_POST['auth_code'];
	$account_status = $_POST['account_status'];
	
	$update = "update users set username = '$username', firstname = '$firstname', lastname = '$lastname', email = '$email', password = '$password', phone = '$phone', country = '$country', auth_code = '$auth_code', account_status = '$account_status' where id ='$ids' ";
	$cmd = mysqli_query($connect, $update);
	
	if($cmd){
	//
	header("Location: ../../admin/users/");
	} else {
	header("Location: ../../admin/users/");
	}
	
	} else {
	header("Location: /");
	}