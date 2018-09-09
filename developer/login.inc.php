<?php
	if(isset($_POST['developer'])) {
	include '../database/database.php';
	//vars
	$details = ucfirst(mysqli_real_escape_string($connect, $_POST['username']));
	$password = mysqli_real_escape_string($connect, $_POST['password']);
	$pin = mysqli_real_escape_string($connect, $_POST['pin']);
	$dob = mysqli_real_escape_string($connect, $_POST['dob']);
	
	if(empty($details) || empty($password) || empty($pin) || empty($dob)) {
		header("Location: /");
	}
	
	//validation
	elseif(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z]{8,15}$/', $password )) {
		header("Location: /");
		
	} elseif(!preg_match('/^[0-9]{4,4}$/', $pin)) {
	//
		header("location: /");
		exit();
	
	} else {
	//verify
	$sel = "select * from developers where username = '$details' and account_status = 1 or email = '$details' and account_status = 1 ";
	$cmd = mysqli_query($connect, $sel);
	$count = mysqli_num_rows($cmd);
	$res = mysqli_fetch_assoc($cmd);
	
	//vars
	$password_unhash = base64_decode($res['password']);
	$pin_unhash = base64_decode($res['pin']);
	$dob_db = $res['dob'];
	$username = $res['username'];
	$email = $res['email'];
	
	if($count < 1 ) {
		header("location: /");
		exit();
	
	} elseif($password_unhash != $password || $dob_db != $dob || $pin_unhash != $pin) {
		//compare pass, pin & dob
		header("location: /");
		exit();
		
	} else {
		//start session
		session_start();
		
		$_SESSION['type'] = 'Developer';
		$_SESSION['username'] = $username;
		$_SESSION['email'] == $email;
		
		//dashboard
		header("Location: ../../developer/dashboard.php");
		
	}
		
	
	}
	
	
	
	
	} else {
		header("Location: /");
	
	}