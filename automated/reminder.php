<?php
	//mail notification sysyem for due renewal
	//Reloxians Alvin Excel


	include '../database/database.php' ;
	
	//
	
	$chk = "select * from active_service where type= 'Website' ORDER BY ID DESC" ;
	$cmd = mysqli_query($connect, $chk);
	
	
	while($res = mysqli_fetch_assoc($cmd)) {	
	
	$exp =  $res['expiration'];
	$created = $res['created'];
	$rem = $res['reminded'];
	
$now = new DateTime(); 
$future_date = new DateTime($exp); 
$interval = $future_date->diff($now); 

//return $interval->format("%y years, %m months, %d days %h hours, %i minutes, %s seconds");

//vars

$years =  $interval->format("%y year");

$months =  $interval->format("%m");

$days =  $interval->format("%d");

$hours = $interval->format("%h");

$minutes = $interval->format("%i");

$seconds = $interval->format("%s");

$time = $interval->format("%d days %h hours, %i minutes, %s seconds");

//cond check

if($years < 1 && $months < 1 && $days < 31 && $days > 0 && $rem == 0 ) {
	
	//action starts
	
	$id = $res['id'];
	$email = $res['email'];
	$username = $res['username'];
	
	$email = $res['email'];
	$username = $res['username'];
	$service_name = $res['service_name'];
	$renewal_fee = $res['renewal_fee'];
	
   						$headers .= "Reply-To: ". strip_tags('donotreply@reloxians.com') . "\r\n";
						$headers .= "From: Alvin Excel <billing@reloxians.com>". "\r\n";
                        $headers .= "CC: Alvin@reloxians.com\r\n";
                        $headers .= "MIME-Version: 1.0\r\n";
                        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";


                        $subject = 'Reloxians - Service Expiration';                     
                         
                         $message = '
                         
<table  width="100%" cellpadding="10">
<tr bgcolor="#fbfbfb"> 
<td align="center">
<h2 style="font-family: arial; color: grey;">Reloxians - Service Expiration</h2>
</td>
</tr>
</table>



<table width="100%" cellpadding="10">
<tr bgcolor="#FF7B00">
<td>
<p style="color: white; font-size: 20; font-family: helvetica; font-weight: bold;"> Hi ' .$username . '</p>
</td>
</tr>

<tr bgcolor="#fbfbfb">
<td>
<div style="font-family: helvetica;">
This is to inform you that a service running under your account on our website will expire soon & deletion of files will start within a few hours.
You have about <b style="color: red;">' .$time. '</b> left. 
To renew this service, sign in to your account & click the renew button.
 <p><b>Here are your service details </b></p>
</div>

<table width="100%" style="font-family: helvetica;">
<tr>
<td width="20%">
Website
</td>
<td width="80%">
'.$service_name.'
</td>

<tr>
<td width="20%">
Due Fee
</td>
<td width="80%">
<b style="color: red;">
₦'.number_format($renewal_fee).'
</b>
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


</td>
</tr>


<tr bgcolor="#eaeaea">
<td>
<div style="font-weight: bold; font-size: 15; font-family: helvetica; color: grey; margin-left: 40%; padding: 10;">© Reloxians -'. date('Y') . '</div>
</td>


</tr>
</table>
' ;
	
	$send = mail($email, $subject, $message, $headers);
	
	if($send) {
		//update 
		$upd = "update active_service set 
						reminded = '4' where id = '$id' " ;
						
		$cmd1 = mysqli_query($connect, $upd);
		
		header("Location: expired.php");
		
		}
	
	}



}	


header("Location: expired.php");



?>