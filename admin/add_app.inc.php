<?php
	session_start();
	
	if($_SESSION['username'] != 'Admin') {
		header("Location: ../");
	}
	
	if(isset($_POST['submit'])) {	
	include '../database/database.php';
	
			//declair vars
			$username = ucfirst($_POST['username']);
			$app_name = $_POST['app_name'];
			$platform = $_POST['platform'];
			$created = date("Y-m-d h:i:sa");
			$one_time_fee = $_POST['one_time_fee'];
			$activity_status = '1';
			
			//fetch user email
			$sel = "select email from users where username= '$username' ";
			$sel_cmd = mysqli_query($connect, $sel);
			$res = mysqli_fetch_assoc($sel_cmd);
			
			$email = $res['email'];
						
			//insert
			$insert = "insert into app_service(username, email, app_name, platform, created, one_time_fee, activity_status)values('$username', '$email', '$app_name', '$platform', '$created', '$one_time_fee', '$activity_status')";
			
			$cmd = mysqli_query($connect, $insert);
			
			if($cmd) {
				header("Location: add_app.php?added");
				
			} else {
				header("Location: add_app.php?Notadded");
			}
			
	
	} else {
			header("Location: ../");
	}