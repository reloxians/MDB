<?php
	session_start();
	
	if(isset($_POST['stripeToken'])) {
		
		include 'database.php' ;
		
		//load stripe activities
		include 'init.php';
		
		//useful vars
			$token = $_POST['stripeToken'];
			$renewal_fee = $_POST['stripeCharge'];
			$calculated = $renewal_fee / 100 ;
			$admin_email = 'reloxians@gmail.com';
			$email = $_POST['stripeEmail'];
			$username = $_POST['username'];
			$website = $_POST['website'];
			$platform = $_POST['platform'];
			$created = date("Y-m-d h:i:sa");		
			$activity_status = '1';
			
			
			//start charge 
			
			try {
				
		\Stripe\Stripe::setApiKey($stripe['private']);
				
				 \Stripe\Charge::create(array( 
				 		
				 		"amount" => $renewal_fee, 
				 		"currency" => "usd", 
				 		"source" => $token, // obtained with Stripe.js 
				 		"description" => $email
				 		
				 		 )); 
				 		 
				 		 //insert record into payment table
				 		 
				 		 	$insert = "insert into renew_service(username, email, website, platform, created, renewal_fee, activity_status) values ('$username', '$email', '$website', '$platform', '$created', '$renewal_fee', '$activity_status')";
			 		 
				 		 $cmd = mysqli_query($connect, $insert);
				 		 
				 		 //mail user of new order status
				 		 
				 		 if($cmd) {
				 		 	
				 		 	$to = $email;
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
Website Url 
</td>
<td width="80%">
'.$website.'
</td>

<tr>
<td width="20%">
Charge fee
</td>
<td width="80%">
'.$calculated.' USD
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
				 		 	
				 		 }
				 		 
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
Website Url 
</td>
<td width="80%">
'.$website.'
</td>

<tr>
<td width="20%">
Username
</td>
<td width="80%">
'.$username.'
</td>
</tr>

<tr>
<td width="20%">
Charge fee
</td>
<td width="80%">
$'.$calculated.' USD
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
				 	
				 		 
				 		 <form id="form" action="payment" method="POST">
				 		 <input name="confirm" type="hidden" value="confirm"/>
				 		 </form>
				 		 
				 		 <script>
				 		 document.getElementById("form").submit();
				 		 </script>
				 		 
				 		 
				 		 
				 		 <?
				 
					
					} catch(Stripe_CardError $e) {
						//handle card errors
						
					} 
					
				
				
	
			
			
	} else {
		header("Location: ../");
	}
	
	
	
	