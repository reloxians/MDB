<?php
	if(isset($_POST['app'])) {
	
	include '../../database/database.php';
	
			//App starts
			
			//declair vars
			$username = $_POST['username'];
		//	$email = $_POST['email'];
			$service_name = $_POST['service_name'];
			$type = $_POST['type'];
			$created = date("Y-m-d h:i:sa");
			$fee = $_POST['fee'];
			$activity_status = '1';
			
			//validate user
			
			$chk = "select * from users where username ='$username' ";
			$chk_cmd = mysqli_query($connect, $chk);
			$bal = mysqli_num_rows($chk_cmd);
			
			if($bal < 1 ){
				
				header("Location: ../services?No_user_found");
				exit();
				
				}
			
			
			//select user email
			$sel = "select email from users where username= '$username' ";
			$sel_cmd = mysqli_query($connect, $sel);
			$res = mysqli_fetch_assoc($sel_cmd);
			
			$email = $res['email'];
						
			//insert
			$insert = "insert into active_service(username, email, service_name, type, created, one_time_fee, activity_status)values('$username', '$email', '$service_name', '$type', '$created', '$fee', '$activity_status')";
			
			$cmd = mysqli_query($connect, $insert);
			
			if($cmd) {
				header("Location: ../services/");
			}
	
	} elseif(isset($_POST['website'])) {
			include '../../database/database.php';
	
		//website starts
			
		//declair vars
			$username = ucfirst($_POST['username']);
		//	$email = $_POST['email'];
			$service_name = $_POST['service_name'];
			$type = $_POST['type'];
			$platform = ucfirst($_POST['platform']);
			$created = date("Y-m-d h:i:sa");
			$expiration = $_POST['expiration'];
			$fee = $_POST['fee'];
			$activity_status = '1';
			
			
			//validate user
			
			$chk = "select * from users where username ='$username' ";
			$chk_cmd = mysqli_query($connect, $chk);
			$bal = mysqli_num_rows($chk_cmd);
			
			if($bal < 1 ){
				
				header("Location: ../services?No_user_found");
				exit();
				
				}
			
			
			//select user email
			$sel = "select email from users where username= '$username' ";
			$sel_cmd = mysqli_query($connect, $sel);
			$res = mysqli_fetch_assoc($sel_cmd);
			
			$email = $res['email'];
						
			//insert
			$insert = "insert into active_service(username, email, service_name, type,  platform, created, expiration, renewal_fee, activity_status)values('$username', '$email', '$service_name', '$type', '$platform', '$created', '$expiration', '$fee', '$activity_status')";
			
			$cmd = mysqli_query($connect, $insert);
			
			if($cmd) {
				header("Location: ../services.php?added");
			}
			
			
			
		} else {
			header("Location: ../");
		}
	
	
	