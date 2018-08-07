<?php
	session_start();
	
	if($_SESSION['username'] != 'Admin') {
		header("Location: ../");
	}
	
	if(isset($_POST['submit'])) {	
	include '../database/database.php';
	
		if($_POST['service_type'] == 'Renewable') {
			//Renewable starts
			
			//declair vars
			$username = $_POST['username'];
		//	$email = $_POST['email'];
			$website = $_POST['website'];
			$platform = $_POST['platform'];
			$created = date("Y-m-d h:i:sa");
			$expiration = $_POST['expiration'];
			$renewal_fee = $_POST['renewal_fee'];
			$activity_status = '1';
			
			//select user email
			$sel = "select email from users where username= '$username' ";
			$sel_cmd = mysqli_query($connect, $sel);
			$res = mysqli_fetch_assoc($sel_cmd);
			
			$email = $res['email'];
						
			//insert
			$insert = "insert into website_service(username, email, website, platform, created, expiration, renewal_fee, activity_status)values('$username', '$email', '$website', '$platform', '$created', '$expiration', '$renewal_fee', '$activity_status')";
			
			$cmd = mysqli_query($connect, $insert);
			
			if($cmd) {
				header("Location: add_service.php?added");
			}
			
		} elseif($_POST['service_type'] == 'Non-Renewable') {
			//Non-Renewable
				//declair vars
			$username = ucfirst($_POST['username']);
		//	$email = $_POST['email'];
			$website = $_POST['website'];
			$platform = ucfirst($_POST['platform']);
			$created = date("Y-m-d h:i:sa");
			$expiration = $_POST['expiration'];
			$one_time_fee = $_POST['one_time_fee'];
			$activity_status = '1';
			
			//select user email
			$sel = "select email from users where username= '$username' ";
			$sel_cmd = mysqli_query($connect, $sel);
			$res = mysqli_fetch_assoc($sel_cmd);
			
			$email = $res['email'];
						
			//insert
			$insert = "insert into website_service(username, email, website, platform, created, one_time_fee, activity_status)values('$username', '$email', '$website', '$platform', '$created', '$one_time_fee', '$activity_status')";
			
			$cmd = mysqli_query($connect, $insert);
			
			if($cmd) {
				header("Location: add_service.php?added");
			}
			
			
			
		} else {
			header("Location: ../");
		}
	
	
	
	
	
	
	
	} else {
			header("Location: ../");
	}