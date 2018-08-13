<?php
	if(isset($_GET['auth_code'])) {
	include '../database/database.php' ;
	//vars
	$user = mysqli_real_escape_string($connect, $_GET['temp']);
	$code = mysqli_real_escape_string($connect, $_GET['auth_code']);
		
	
	$sql = "select * from admin where auth_code= '$code' and firstname= '$user' ";
	$do = mysqli_query($connect, $sql);
	$rea = mysqli_fetch_assoc($do);
	$count = mysqli_num_rows($do);
	
	if($count < 1) {
			header("location: ../");
			exit();		
			
	} else {
		//update
		$upd = "update admin set account_status= 1, auth_code= '' where firstname= '$user' ";
		$cmd = mysqli_query($connect, $upd);
		
		if($cmd) {
			$email = $rea['email'];
			
			//mail user 
			$to = $email;
			
   						$headers .= "Reply-To: ". strip_tags('donotreply@reloxians.com') . "\r\n";
						$headers .= "From: Alvin Excel <billing@reloxians.com>". "\r\n";
                        $headers .= "CC: Alvin@reloxians.com\r\n";
                        $headers .= "MIME-Version: 1.0\r\n";
                        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

                        $subject = 'Welcome to Reloxians';                     
                         
                         $message = '
                         
<table  width="100%" cellpadding="10">
<tr bgcolor="#fbfbfb"> 
<td align="center">
<h2 style="font-family: arial; color: grey;">Reloxians - Account Confirmed</h2>
</td>
</tr>
</table>



<table width="100%" cellpadding="10">
<tr bgcolor="#FF7B00">
<td>
<p style="color: white; font-size: 20; font-family: helvetica; font-weight: bold;"> Hi ' .$user . '</p>
</td>
</tr>

<tr bgcolor="#fbfbfb">
<td>
<div style="font-family: helvetica;">
Welcome to Reloxians website, this is to confirm that you now own an account with us at reloxians.com website, you can place your orders & check service expiration status right away!
</div>
<br>

</td>
</tr>


<tr bgcolor="#eaeaea">
<td>
<div style="font-weight: bold; font-size: 15; font-family: helvetica; color: grey; margin-left: 40%; padding: 10;">© Reloxians -'. date('Y') . ' | <a href="facebook.com/integritye2">Reloxians</a></div>
</td>


</tr>
</table>
' ;
                         							         
   $sentmail = mail($to,$subject,$message,$headers);
			header("location: ../docs/login.php");
			
			//echo 'done';
		} else {
			header("location: ../");
		}
	}
	
	
	
	}