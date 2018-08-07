<?php 
	session_start();
	if(isset($_POST['submit'])) {
		include '../database/database.php';
		//vars
		$username = mysqli_real_escape_string($connect, $_POST['username']);
		$first_token_raw = mysqli_real_escape_string($connect, $_POST['first_token']);
		$second_token_raw = mysqli_real_escape_string($connect, $_POST['second_token']);
		
		$first_token = base64_encode($first_token_raw);
		$second_token = base64_encode($second_token_raw);
		
		//query
		$check = "SELECT * FROM admin WHERE account_status= 1 AND username= '$username' OR email= '$username'";
		
		$cmd = mysqli_query($connect, $check);
		$res = mysqli_fetch_assoc($cmd);
		$count = mysqli_num_rows($cmd);
		
		if($count < 1 ) {
			header("Location: ../docs/login.php?errorRecord");
			
		} else {
			//check password match
			if($res['first_token'] != $first_token || $res['second_token'] != $second_token) {
				
				header("Location: ../docs/login.php?errorPassword");
				
			} elseif($res['first_token'] == $first_token && $res['second_token'] == $second_token) {
				//start session 
				
				$_SESSION['username'] = $res['username'];
				$_SESSION['email'] = $res['email'];
				
				//login
				header("Location: ../admin/main.php");
				
			}
			
		}
		
		
	} else {
		header("Location: ../docs/login.php?");
	}