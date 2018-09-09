<?php
	if(isset($_POST['submit_dev'])) {
	include '../../security/admin_check.php';
	include '../../database/database.php';
	//vars
	$username = mysqli_real_escape_string($connect, $_POST['username']);
	$firstname = mysqli_real_escape_string($connect, $_POST['firstname']);
	$lastname = mysqli_real_escape_string($connect, $_POST['lastname']);
	$email = mysqli_real_escape_string($connect, $_POST['email']);
	$password = mysqli_real_escape_string($connect, $_POST['password']);
	$pin = mysqli_real_escape_string($connect, $_POST['pin']);
	$dob = mysqli_real_escape_string($connect, $_POST['dob']);
	$skills = mysqli_real_escape_string($connect, $_POST['skills']);
	$department = mysqli_real_escape_string($connect, $_POST['department']);
	$country = mysqli_real_escape_string($connect, $_POST['country']);
	$account_status = mysqli_real_escape_string($connect, $_POST['account_status']);
	$potrait = 'default.jpg';
	$created = date("Y-m-d h:i:sa");
	
	//encr
	$password_hash = base64_encode($password);
	$pin_hash = base64_encode($pin);
	
	$username_ups = ucfirst($username);
	$email_ups = ucfirst($email);
	
	if(!preg_match('/^[0-9]{4,4}$/' ,$pin) || !preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z]{8,15}$/', $password)) {
		header("Location: index.php?passwordError");
		exit();
		
	} else {
	
	//make entry
	$ins = "insert into developers(username, firstname, lastname, email, password, pin, dob, skills, department, country, account_status, potrait, created ) values ('$username_ups', '$firstname', '$lastname', '$email_ups', '$password_hash', '$pin_hash', '$dob', '$skills', '$department', '$country', '$account_status', '$potrait', '$created' )";
	
	$cmd = mysqli_query($connect, $ins);
	
	if($cmd) {
	//mail developer
	
	
	header("Location: index.php?done");
	
	} else {
	
	header("Location: index.php?Error");
	exit();
	}
	
	}
	
	} else {
		header("Location: /");
	
	}