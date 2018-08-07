<?php

$to = 'xtrabrilliancy@gmail.com';

   						$headers = "From: " . strip_tags('donotreply@gmail.com') . "\r\n";
                        $headers .= "Reply-To: ". strip_tags('donotreply@gmail.com') . "\r\n";
                        //$headers .= "CC: susan@example.com\r\n";
                        $headers .= "MIME-Version: 1.0\r\n";
                        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
                        $subject = 'Stackactivity account activation';                     
                         
                         $message = '
                         
<table  width="100%" cellpadding="10">
<tr bgcolor="#fbfbfb"> 
<td align="center">
<h2 style="font-family: arial; color: grey;">Stack Activity - Account Confirmation</h2>
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
Here is a Confirmation mail to verify you account signup on Stack activity website, click the confirmation botton below to continue the signup process. <p><b>Here are your signup details </b></p>
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
'.$password.'
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

<div style="text-align: center; font-weight: bold; font-family: helvetica; font-size: 18; color: white;"><a style="color: white; text-decoration: none;"href="http://localhost:8000/email_conf.php?act_code='.$act_code.'">Confirmation</a></div>
</td>

<td width="40%">
</td>

</tr>
</table>

</td>
</tr>


<tr bgcolor="#eaeaea">
<td>
<div style="font-weight: bold; font-size: 15; font-family: helvetica; color: grey; margin-left: 40%; padding: 10;">© Stackactivity -'. date('Y') . '</div>
</td>


</tr>
</table>
' ;
                         							
                         						
         
   $sentmail = mail($to,$subject,$message,$headers);
   
   
   if($sentmail) {
   	echo 'done';
   	
   } else {
   	echo 'done 2';
   }
   
   
   
