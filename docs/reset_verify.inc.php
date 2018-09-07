<?php
	if(isset($_POST['reset_verify'])) {
	//
	include '../security/anti_session.php';
	include '../database/database.php' ;
	
	//vars
	$password = $_POST['password'];
	$password_verify = $_POST['password_verify'];
	$auth_code = $_POST['auth_code'];
	$firstname = $_POST['firstname'];
	
	//validation
	if($password != $password_verify) {
		header("Location: reset_verify?temp=".$firstname."&e&auth_code=".$auth_code);	
	
	} elseif($password == $password_verify) {
		//pregmatch
	if(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z]{8,15}$/', $password )) {
		header("Location: reset_verify?temp=".$firstname."&e&auth_code=".$auth_code);	
	} else {
		//verify
		$ver = "select * from reset where auth_code= '$auth_code' and firstname= '$firstname' ";
		$cmd = mysqli_query($connect, $ver);
		$inf = mysqli_fetch_assoc($cmd);
		$cnt = mysqli_num_rows($cmd);
		
		if($cnt < 1 ) {
			header("Location: /");
		} else {
			//var
			$email = $inf['email'];
			//encrypt new pass
			$password_hashed = base64_encode($password);
			
			//take records	
			$upd = "update users set password = '$password_hashed' where email = '$email' ";
			$cmd_upd = mysqli_query($connect, $upd);
			
			if($cmd_upd) {
			
			//delete entry from reset
			$dd = "delete from reset where email = '$email' ";
			$del_cmd = mysqli_query($connect, $dd);
			
			if($del_cmd) {
				header("Location: login.php");	
			
				} else {
					header("Location: /");
				}
			
			}		
		
		}
		
	}
	
	}
	
	
	
	} else {
	
	}