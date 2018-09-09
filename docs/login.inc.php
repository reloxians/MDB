<?php 
	session_start();
	if(isset($_POST['submit'])) {
		include '../database/database.php';
		//vars
				
		$capital = ucfirst($_POST['username']);
		
		$username = mysqli_real_escape_string($connect, $capital);
		$password = mysqli_real_escape_string($connect, $_POST['password']);
		
		$next = mysqli_real_escape_string($connect, $_POST['next']);
		
		$password_raw = base64_encode($password);
		
		//validate
		if(empty($_POST['username']) || empty($_POST['password']) ) {
		
try {
		
			?>
			
			<form id="no-entry" action="login" method="POST">
			<input type="hidden" name="no-entry" />
			</form>
			
			<script>
			document.getElementById('no-entry').submit(); 
			</script>
				
			<?
			
			} catch(Exception $e) {
			
			header("Location: login.php?errorRecord");
			exit();
			
			}
		
		} elseif(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z]{8,15}$/', $password)) {
		
try {
			//matching
			?>
			
			<form id="pass-error" action="login" method="POST">
			<input type="hidden" name="pass-error" />
			</form>
			
			<script>
			document.getElementById('pass-error').submit(); 
			</script>
				
			<?
			} catch(Exception $e) {
			header("Location: login.php?passError");
			exit();
			
			}
		
		} else {
		
		
		//query
		$check = "SELECT * FROM users WHERE username= '$username' AND account_status= 1 OR email= '$username' AND account_status= 1";
		
		$cmd = mysqli_query($connect, $check);
		$res = mysqli_fetch_assoc($cmd);
		$count = mysqli_num_rows($cmd);
		
		if($count < 1 ) {
		
		try {
			
			
			?>
			
			<form id="no-entry" action="login" method="POST">
			<input type="hidden" name="no-entry" />
			</form>
			
			<script>
			document.getElementById('no-entry').submit(); 
			</script>
				
			<?
			
			} catch (Exception $e) {
			
			header("Location: login.php?errorRecord");
			exit();
			
			}
			
		} else {
			//check password match
			if($res['password'] != $password_raw) {
			
	try {			
			
			
			?>
			
			<form id="pass-error" action="login" method="POST">
			<input type="hidden" name="pass-error" />
			</form>
			
			<script>
			document.getElementById('pass-error').submit(); 
			</script>
				
			<?
			
			} catch (Exception $e) {
			
			header("Location: login.php?errorPassword");
			exit();
			
			}
				
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
	}
		
	} else {
		header("Location: login.php?");
	}