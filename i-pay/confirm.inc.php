<?php

if($_SERVER['REQUEST_METHOD'] == 'POST') {
	
	include '../database/database.php' ;
	include '../security/auth_check.php' ;
	include '../function/functions.php' ;
	
	//vars
	
	$username = $_POST['username'] ;
	$email = $_POST['email'] ;
	$admin_email = site_email() ;
	$billing = 'Yearly' ;
	$ref = $_POST['ref'] ;
	$product = $_POST['product'] ;
	$product_name = $_POST['product_name'] ;
	$price = $_POST['price'] ;
	$balance = $_POST['balance'] ;
	$created = date("Y-m-d h:i:sa");
	
	$ins = "insert into ipay (username, email, ref, product, price, balance, created) values ('$username', '$email', '$ref', '$product', '$price', '$balance', '$created')" ;
	
	$cmd = mysqli_query($connect, $ins);
	
	if($cmd) {
		
						$to = $email;
							
   						$headers .= "Reply-To: ". strip_tags('donotreply@reloxians.com') . "\r\n";
						$headers .= "From: Alvin Excel <billing@reloxians.com>". "\r\n";
                        $headers .= "CC: Alvin@reloxians.com\r\n";
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
Product 
</td>
<td width="80%">
'.$product_name.'
</td>

<tr>
<td width="20%">
Charged fee
</td>
<td width="80%">
<b style="color: red">₦'. number_format($price).' NGN</b>
</td>
</tr>

<tr>
<td width="20%">
Balance
</td>
<td width="80%">
<b style="color: red">₦'. number_format($balance).' NGN</b>
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
   						$headers .= "Reply-To: ". strip_tags('donotreply@reloxians.com') . "\r\n";
						$headers .= "From: Alvin Excel <billing@reloxians.com>". "\r\n";
                        $headers .= "CC: Alvin@reloxians.com\r\n";
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
'.$product_name.'
</td>

<tr>
<td width="20%">
Charged fee
</td>
<td width="80%">
<b style="color: red;">₦'. number_format($price).' NGN</b>
</td>
</tr>

<tr>
<td width="20%">
Balance
</td>
<td width="80%">
<b style="color: red">₦'. number_format($balance).' NGN</b>
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
						
		}	else {
			header("Location: /");
		}
	
	
	
	
	} else {
	header("Location: /");
	
	}
