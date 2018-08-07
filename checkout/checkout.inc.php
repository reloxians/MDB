<?php
	include '../database/database.php' ;
	
	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		//vars
		
		$ref = $_POST['ref'];
		$item = $_POST['item'];
		$price = $_POST['price'];
		$billing = $_POST['billing'];
		$username = $_POST['username'];
		$created = date("Y-m-d h:i:sa");
		
		//admin
		include '../function/functions.php' ;
		
		$admin_email = site_email();
		
		//get user details 
		$chk = "select * from users where username= '$username' ";
		$cmd = mysqli_query($connect, $chk);
		$info = mysqli_fetch_array($cmd);
		
		//use info
		$firstname = $info['firstname'];
		$lastname = $info['lastname'];
		$email = $info['email'];
		$phone = $info['phone'];
		
		//create record
		
		$ins = "insert into cart_order(username, firstname, lastname, email, phone, item, price, billing, ref, created ) values ('$username', '$firstname', '$lastname', '$email', '$phone', '$item', '$price', '$billing', '$ref', '$created')";

		$cmd = mysqli_query($connect, $ins);
		
		//send them notification
		
		if($cmd) {
				 		 	
				 		 	$to = $email;
   						$headers = "From: " . strip_tags('billing@reloxians.com') . "\r\n";
                        $headers .= "Reply-To: ". strip_tags('donotreply@gmail.com') . "\r\n";
                        //$headers .= "CC: susan@example.com\r\n";
                        $headers .= "MIME-Version: 1.0\r\n";
                        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
                        $subject = 'Reloxians Order Confirmation';                     
                         
                         $message = '
                         
<table  width="100%" cellpadding="10">
<tr bgcolor="#fbfbfb"> 
<td align="center">
<h2 style="font-family: arial; color: grey;">Reloxians - Order Confirmation</h2>
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
Here is a Confirmation that we have received your order placement. our team of developers will work on it as soon as possible, you will get notified upon completion. <p><b>Here are your order details </b></p>
</div>

<table width="100%" style="font-family: helvetica;">
<tr>
<td width="20%">
Item 
</td>
<td width="80%">
'.$item.'
</td>

<tr>
<td width="20%">
Charge fee
</td>
<td width="80%">
'.$price.' NGN
</td>
</tr>

<tr>
<td width="20%">
Billing
</td>
<td width="80%">
'.$billing.'
</td>
</tr>

<tr>
<td width="20%">
Ref Code
</td>
<td width="80%">
'.$ref.'
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
                         											
			$mailto = mail($to, $subject, $message, $headers);		
				 		 	
				 		 
				 		 
				 		 //mail admin of new order placement 
				 		 
				 		 	$to_admin = $admin_email;
   						$headers = "From: " . strip_tags('donotreply@gmail.com') . "\r\n";
                        $headers .= "Reply-To: ". strip_tags('donotreply@gmail.com') . "\r\n";
                        //$headers .= "CC: susan@example.com\r\n";
                        $headers .= "MIME-Version: 1.0\r\n";
                        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
                        $subject = 'Reloxians Order Confirmation';                     
                         
                         $message = '
                         
<table  width="100%" cellpadding="10">
<tr bgcolor="#fbfbfb"> 
<td align="center">
<h2 style="font-family: arial; color: grey;">Reloxians - Order Confirmation</h2>
</td>
</tr>
</table>


<table width="100%" cellpadding="10">
<tr bgcolor="#FF7B00">
<td>
<p style="color: white; font-size: 20; font-family: helvetica; font-weight: bold;"> Hi Admin</p>
</td>
</tr>

<tr bgcolor="#fbfbfb">
<td>
<div style="font-family: helvetica;">
Here is a Confirmation of an order placement on your website. below are details of this order. <p><b>Here are the order details </b></p>
</div>

<table width="100%" style="font-family: helvetica;">

<tr>
<td width="20%">
Item 
</td>
<td width="80%">
'.$item.'
</td>

<tr>
<td width="20%">
Charge fee
</td>
<td width="80%">
'.$price.' NGN
</td>
</tr>

<tr>
<td width="20%">
Billing
</td>
<td width="80%">
'.$billing.'
</td>
</tr>

<tr>
<td width="20%">
Ref Code
</td>
<td width="80%">
'.$ref.'
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
                         											
			$mailto = mail($to_admin, $subject, $message, $headers);		
				 		 
				 		 //take user back 
				 		 ?>
				 	
				 		 
				 		 <form id="form" action="/client/payment" method="POST">
				 		 <input name="confirm" type="hidden" value="confirm"/>
				 		 </form>
				 		 
				 		 <script>
				 		 document.getElementById("form").submit();
				 		 </script>
				 		 
				 		 
				 		 
				 		 <?
				 
			}
				
	} else {
		header("Location: ../");
	}
	
	