<?php 
	session_start();
	//include '../security/anti_session.php';
	if(isset($_POST['submit'])) {
		include '../database/database.php';
		//vars
		$username = mysqli_real_escape_string($connect, $_POST['username']);
		$first_token_raw = mysqli_real_escape_string($connect, $_POST['first_token']);
		$second_token_raw = mysqli_real_escape_string($connect, $_POST['second_token']);
		$dob = mysqli_real_escape_string($connect, $_POST['dob']);
		
		//validate
		if(!preg_match('/^[0-9]{4,4}$/', $first_token_raw ) || !preg_match('/^[0-9]{4,4}$/', $second_token_raw)) {
		header("Location: ../docs/login.php?errorRecord");
		exit();
		
		} elseif($dob != '1995-05-18') {
			header("Location: ../docs/login.php?errorRecord");
			exit();
		
		}
		
		$first_token = base64_encode($first_token_raw);
		$second_token = base64_encode($second_token_raw);
		
		//query
		$check = "SELECT * FROM admin WHERE account_status= 1 AND username= '$username' OR email= '$username' AND account_status = 1 ";
		
		$cmd = mysqli_query($connect, $check);
		$res = mysqli_fetch_assoc($cmd);
		$count = mysqli_num_rows($cmd);
		
		if($count < 1 ) {
			header("Location: ../docs/login.php?errorRecord");
			exit();
			
		} else {
			//check password match
			if($res['first_token'] != $first_token || $res['second_token'] != $second_token) {
				
				header("Location: ../docs/login.php?errorPassword");
				exit();
				
			} elseif($res['first_token'] == $first_token && $res['second_token'] == $second_token) {
				//start session 
				
				$_SESSION['username'] = $res['username'];
				$_SESSION['email'] = $res['email'];
				
				//login
				header("Location: ../admin/main.php");
				exit();
			}
			
		}
		
		
	} else {
		header("Location: ../docs/login.php?");
		exit();
	}