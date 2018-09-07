<?php
if(isset($_POST['reset'])) {
include '../database/database.php';
	//vars
	$email = $_POST['email'];
	//verify email
	if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	header("Location: /");
	
	} else {
	//check for user
	$sel = "select firstname,email from users where email = '$email' and account_status = 1 ";
	$cmd = mysqli_query($connect, $sel);
	$count = mysqli_num_rows($cmd);
	$inf = mysqli_fetch_assoc($cmd);
	if($count < 1) {
	
	?>
	<form action="reset" id="no-user" method="POST">
	<input type="hidden" name="no-user" />
	</form>
	
	<script>
	document.getElementById('no-user').submit();
	</script>
	
	<?
	} else {
	//send verification code
	require_once '../function/functions.php';
		
	$auth_code = grs();
	$created = date("Y-m-d h:i:sa");
	$firstname = $inf['firstname'];
	$email = $_POST['email'];
	
	
	//check for existing request
	$ch = "select * from reset where email = '$email' ";
	$cmde = mysqli_query($connect, $ch);
	$coun = mysqli_num_rows($cmde);
	
	if($coun > 0 )	{
	//update ex
	
	$upd = "update reset set firstname = '$firstname', email = '$email', auth_code = '$auth_code', created = '$created' ";
	$cmdd = mysqli_query($connect, $upd);
	
	} else {
	
	$ins = "insert into reset(firstname, email, auth_code, created) values ('$firstname', '$email', '$auth_code', '$created')";
	
	$cmdr = mysqli_query($connect, $ins);	
	
	}
	
	if($cmdr || $cmdd ) {
						//mail user
	
						$headers .= "Reply-To: ". strip_tags('donotreply@reloxians.com') . "\r\n";
						$headers .= "From: Alvin Excel <support@reloxians.com>". "\r\n";
                        $headers .= "CC: Alvin@reloxians.com\r\n";
                        $headers .= "MIME-Version: 1.0\r\n";
                        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
                        $subject = 'Reloxians Account Password Reset';                     
                         
                        
                        
						$message = '
                         
<table  width="100%" cellpadding="10">
<tr bgcolor="#fbfbfb"> 
<td align="center">
<h2 style="font-family: arial; color: grey;">Reloxians - Account Password Reset</h2>
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
A password reset request was made on your account recently, if you did not make this request let us know via the support email otherwise confirm your request. <p><b>click below to confirm the password reset</b></p>
</div>


<br>

<table cellpadding="10" width="100%">
<tr bgcolor="">
<td width="40%">
</td>

<td style="background: blue; border-radius: 8px;" width="20%">

<div style="text-align: center; font-weight: bold; font-family: helvetica; font-size: 18; color: white;"><a style="color: white; text-decoration: none;"href="http://localhost:8080/docs/reset_verify.php?auth_code='.$auth_code.'&temp='.$firstname.'">Confirmation</a></div>
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

	
$send = 	mail($email, $subject, $message, $headers);

if($send) {

	?>
	<form action="reset" id="sent" method="POST">
	<input type="hidden" name="sent" />
	</form>
	
	<script>
	document.getElementById('sent').submit();
	</script>
	
	<?


		}	else {
		
		echo 'not sent';
		
		}
	
	}
	
	}
	
	}
	
} else {
	header("Location: /");
}