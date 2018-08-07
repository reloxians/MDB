<?php 
	session_start();
	if(isset($_POST['submit'])) {
		include '../database/database.php';
		//vars
		$username = mysqli_real_escape_string($connect, $_POST['username']);
		$password = mysqli_real_escape_string($connect, $_POST['password']);
		
		$next = mysqli_real_escape_string($connect, $_POST['next']);
		
		$password_raw = base64_encode($password);
		//query
		$check = "SELECT * FROM users WHERE account_status= 1 AND username= '$username' OR email= '$username'";
		
		$cmd = mysqli_query($connect, $check);
		$res = mysqli_fetch_assoc($cmd);
		$count = mysqli_num_rows($cmd);
		
		if($count < 1 ) {
			header("Location: login.php?errorRecord");
			
		} else {
			//check password match
			if($res['password'] != $password_raw) {
				
				header("Location: login.php?errorPassword");
				
			} elseif($res['password'] == $password_raw) {
			
				//check for next
				
				if(!empty($_POST['next'])) {
						$next = $_POST['next'];
						
			 //start session 
				
				$_SESSION['username'] = $res['username'];
				$_SESSION['email'] = $res['email'];
				
					
						header("Location: ..$next");
					
				} elseif(empty($_POST['next'])) {
					
			//start session
					
				$_SESSION['username'] = $res['username'];
				$_SESSION['email'] = $res['email'];
				
					header("Location: ../client/");
					
				}
				
			}
			
		}
		
		
	} else {
		header("Location: login.php?");
	}