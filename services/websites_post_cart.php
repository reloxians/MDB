<?php
	session_start();
	
	if($_SERVER['REQUEST_METHOD'] == 'POST' ){
			
			include '../database/database.php' ;
			include '../function/functions.php' ;
			
	//vars
						
						$admin_email = site_email();
						$username = $_POST['username'];
						$firstname = $_POST['firstname'];
						$lastname = $_POST['lastname'];
						$email = $_POST['email'];
						$phone = $_POST['phone'];
						$country = $_POST['country'];
						$desc = $_POST['desc'];
						$category = $_POST['category'];
						$charge = $_POST['charge'];
						$ref = $_POST['rand'];
						
						$price_link = 'https://reloxians.com/pricing/' ;
		
//		echo $details['admin_email'];

	//insert 
	
	$ins = "insert into website_service_request (username,firstname,lastname, email, phone, country, description, category, charge, ref ) values ('$username', '$firstname', '$lastname', '$email', '$phone', '$country', '$desc', '$category', '$charge', '$ref') ";
	
	$cmd = mysqli_query($connect, $ins);
	
		if($cmd) {
			
			//tell them to check price list now
				 		 	
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
Here is a Confirmation that we have received your order placement, we are glad to have you do business with us. <p><b>Follow this link for our price overview </b></p>
</div>

<table width="100%" style="font-family: helvetica;">
<tr>
<td width="20%">
Price list 
</td>
<td width="80%">
'.$price_link.'
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
				 		 	
			
			?>
			
			<form id="form" action="../client/payment" method="POST">
				 		 <input name="confirm" type="hidden" value="confirm"/>
				 		 </form>
				 		 
				 		 <script>
				 		 document.getElementById("form").submit();
				 		 </script>
			<?
			
		} else {
			header("Location: ../");
		}
		
		
	} else {
			header("Location: ../");
	}
		
	
	
	
	