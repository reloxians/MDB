<?php
	session_start();
	
	if($_SESSION['username'] != 'Admin') {
		header("Location: /");
	}
	
	if(isset($_POST['submit'])) {	
	include '../../database/database.php';
	
		if($_POST['type'] == 'single') {
			//Single starts
			
			//declair vars
			$username = ucfirst($_POST['username']);
			$title = $_POST['title'];
			$msg = $_POST['msg'];
			$created = date("Y-m-d h:i:sa");
			
			//validate user
			
			$chk = "select * from users where username ='$username' ";
			$chk_cmd = mysqli_query($connect, $chk);
			$bal = mysqli_num_rows($chk_cmd);
			
			if($bal < 1 ){
				
				header("Location: index.php?No_user_found");
				exit();
				
				}
			
			
			//select user email
			$sel = "select email from users where username= '$username' ";
			$sel_cmd = mysqli_query($connect, $sel);
			$res = mysqli_fetch_assoc($sel_cmd);
			
			$email = $res['email'];
						
			//insert
			$insert = "insert into notify(username, email, title, msg, created)values('$username', '$email', '$title', '$msg', '$created')";
			
			$cmd = mysqli_query($connect, $insert);
			
			if($cmd) {
				header("Location: index.php?added");
			}
			
			
			
			
		} elseif($_POST['type'] == 'bulk') {
			//bulk starts
			
		//declair vars

			$type = $_POST['type'];
			$created = date("Y-m-d h:i:sa");
			$msg = $_POST['msg'];
			$title = $_POST['title'];
			
			
			//validate users
			
			$chk = "select * from users" ;
			$chk_cmd = mysqli_query($connect, $chk);
			
			
	while ($bal = mysqli_fetch_array($chk_cmd)) { 
				
				//declair vars
				
				$var_email = $bal['email'];
				$var_username = $bal['username'];
			
			
			//send msg to all
			$send = "insert into notify(username, email, title, msg, created)values('$var_username', '$var_email', '$title', '$msg', '$created')" ;
			$send_cmd = mysqli_query($connect, $send);
			
			if($send_cmd) {
				header("Location: index.php?added");			
			
		} 
	
	
	}
	
	}
	
	
	
	
	
	
	} else {
			header("Location: ../");
	}