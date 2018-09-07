<?php

	$yes = date("Y-m-d h:i:sa", strtotime("-1 days")) ;

	$now = date("Y-m-d h:i:sa") ;
	
	echo $now. '<br />';
	echo 'yesterday'. $yes ;
	
	echo $seven_days_ago = date("Y-m-d h:i:sa", strtotime("-7 days"));
	
	
$file = "delete/desk.jpg";
$file2 = "delete/team.jpg";

//$del = unlink($file);

if($del){
	echo 'deleted' ;
} else {
	echo 'not deleted';
}

//$del2 = unlink($file2);

if($del2){
	echo 'deleted' ;
} else {
	echo 'not deleted';
}


echo	$message = '
                         
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

