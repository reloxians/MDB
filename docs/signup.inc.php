<?php
	if(isset($_POST['submit'])) {
		include '../database/database.php';
		//declairing vars
		
		$username = ucfirst($_POST['username']);
		$firstname = ucfirst($_POST['firstname']);
		$lastname = ucfirst($_POST['lastname']);
		$email = $_POST['email'];
		$password_raw = $_POST['password'];
		$password_verify = $_POST['password_verify'];
		$phone = $_POST['phone'];
		$country = $_POST['country'];
		
		//password verification
		if($password_raw != $password_verify ) {
			header("Location: signup.php?passwordError");
			
		} elseif(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z]{8,15}$/', $password_raw )) {
		header("Location: signup.php?passwordError");
			
		} else {				
		//validation
		$check = "select * from users where username= '$username' ";
		$cmd = mysqli_query($connect, $check);
		$res = mysqli_fetch_assoc($cmd);
		
		if($res > 0 ) {
			header("Location: signup.php?usernameError");
			
		} else {
			$check1 = "select * from users where email= '$email' ";
			$cmd = mysqli_query($connect, $check1);
			$res1 = mysqli_fetch_assoc($cmd);
			
			if($res1 > 0 ) {
				header("Location: signup.php?emailError");
				
			} elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				header("Location: signup.php?emailError");
			} else {
			//encrypt password
			$password = base64_encode($password_raw);
		
			//add records
			 $auth_code = mt_rand(). mt_rand() . mt_rand();
			 $cmd = "insert into users(username, firstname, lastname, email, password, phone, country, auth_code ) values ('$username', '$firstname', '$lastname', '$email', '$password', '$phone', '$country', '$auth_code')";
		
		$run = mysqli_query($connect, $cmd);	
							
   				if($cmd) {			
			//
			 				$to = $email;
   						$headers .= "Reply-To: ". strip_tags('donotreply@reloxians.com') . "\r\n";
							$headers .= "From: Alvin Excel <support@reloxians.com>". "\r\n";
                        $headers .= "CC: Alvin@reloxians.com\r\n";
                        $headers .= "MIME-Version: 1.0\r\n";
                        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
                        $subject = 'Reloxians Account Activation';                     
                         
                         $message = '
                         
<table  width="100%" cellpadding="10">
<tr bgcolor="#fbfbfb"> 
<td align="center">
<h2 style="font-family: arial; color: grey;">Reloxians - Account Confirmation</h2>
</td>
</tr>
</table>



<table width="100%" cellpadding="10">
<tr bgcolor="#FF7B00">
<td>
<p style="color: white; font-size: 20; font-family: helvetica; font-weight: bold;"> Hi ' .$firstname . '</p>
</td>
</tr>

<tr bgcolor="#fbfbfb">
<td>
<div style="font-family: helvetica;">
Here is a Confirmation mail to verify you account signup on reloxians.com website, click the confirmation botton below to continue the signup process. <p><b>Here are your signup details </b></p>
</div>

<table width="100%" style="font-family: helvetica;">
<tr>
<td width="20%">
Username 
</td>
<td width="80%">
'.$username.'
</td>

<tr>
<td width="20%">
Password
</td>
<td width="80%">
'.$password_raw.'
</td>
</tr>

<tr>
<td width="20%">
Email
</td>
<td width="80%">
'.$email.'
</td>
</tr>
</table>
<br>

<table cellpadding="10" width="100%">
<tr bgcolor="">
<td width="40%">
</td>

<td style="background: blue; border-radius: 8px;" width="20%">

<div style="text-align: center; font-weight: bold; font-family: helvetica; font-size: 18; color: white;"><a style="color: white; text-decoration: none;"href="https://reloxians.com/docs/email_verify.php?auth_code='.$auth_code.'&temp='.$firstname.'">Confirmation</a></div>
</td>

<td width="40%">
</td>

</tr>
</table>

</td>
</tr>


<tr bgcolor="#eaeaea">
<td>
<div style="font-weight: bold; font-size: 15; font-family: helvetica; color: grey; margin-left: 40%; padding: 10;">© Reloxians -'. date('Y') . '</div>
</td>


</tr>
</table>
' ;
                         											
			$mailto = mail($to, $subject, $message, $headers);		
						
		if($mailto) {
						
						//
						header("Location: pending_signup.php?%em%$auth_code&temp=$firstname");
			
						} else {
							//send again
							$mailto_retry = mail($to, $subject, $message, $headers);
							
							if($mailto_retry) {
						
						//
						header("Location: pending_signup.php?%em%$auth_code&temp=$firstname");
			
						} else {
							//delete records
							$del = "delete from users where email= '$email' ";
							$del_cmd = mysqli_query($connect, $del);
							
							if($del_cmd) {
							
							//tell user about the error
							header("Location: /");
							}
							
						}
							
						}
					}
				}
			}
		}		
	} else {
		//
		header("Location: signup.php");
		
	}
	
	
	
	