<?php
	if(isset($_POST['submit']) && $_POST['submit'] != 'null' ) {
		include '../function/functions.php' ;
		//vars
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
	 	$email = $_POST['email'];
		$phone = $_POST['phone'];
		$country = $_POST['country'];	
		$service = $_POST['service'];
		$logo_choice = $_POST['logo-choice'];
		$logo_design_choice = $_POST['logo-design-choice'];
		$description = $_POST['description'];
		
		//empty check
		if(empty($firstname) || empty($lastname) || empty($email) || empty($phone) || empty($country) ||  empty($service) || empty($logo_choice) || empty($logo_design_choice) || empty($description)) {
		
		//send back
		
		header("Location: /");
		
		} else {
		
		//validate email
		
		if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			
		header("Location: /");	
		
		} else {
		
		//validate names
		if(!preg_match("/[a-zA-Z]{3,30}$/", $firstname) || !preg_match("/[a-zA-Z]{3,30}$/", $lastname)) {
		?>
		
		<form id="error-names" action="request" method="post">
		<input type="hidden" name="error-names">
		</form>
		
		<script>
		document.getElementById("error-names").submit();
		</script>		
		
		<?
		} else {
			//mail to admin
			
						$to = site_email();
						$admin = 'Reloxians';
							
   					$headers .= "Reply-To: ". strip_tags('donotreply@reloxians.com') . "\r\n";
						$headers .= "From: Alvin Excel <support@reloxians.com>". "\r\n";
                        $headers .= "CC: Alvin@reloxians.com\r\n";
                        $headers .= "MIME-Version: 1.0\r\n";
                        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

                        $subject = 'Request Submission';                     
                         
                         $message = '
                         
<table  width="100%" cellpadding="10">
<tr bgcolor="#fbfbfb"> 
<td align="center">
<h2 style="font-family: arial; color: grey;">Reloxians - Support Ticket</h2>
</td>
</tr>
</table>



<table width="100%" cellpadding="10">
<tr bgcolor="#FF7B00">
<td>
<p style="color: white; font-size: 20; font-family: helvetica; font-weight: bold;"> Hi ' .$admin . '</p>
</td>
</tr>

<tr bgcolor="#fbfbfb">
<td>
<div style="font-family: helvetica;">'
.$firstname.' submitted a request form <p><b>Here is the content of the form</b></p>
</div>

<table width="100%" style="font-family: helvetica;">
<tr>
<td width="20%">
Firstname
</td>
<td width="80%">
'.$firstname.'
</td>
</tr>

<tr>
<td width="20%">
Lastname
</td>
<td width="80%">
'.$lastname.'
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


<tr>
<td width="20%">
Phone
</td>
<td width="80%">
'.$phone.'
</td>
</tr>


<tr>
<td width="20%">
Country
</td>
<td width="80%">
'.$country.'
</td>
</tr>


<tr>
<td width="20%">
Service
</td>
<td width="80%">
'.$service.'
</td>
</tr>


<tr>
<td width="20%">
Do you have a logo?
</td>
<td width="80%">
'.$logo_choice.'
</td>
</tr>


<tr>
<td width="20%">
Should we design for you?
</td>
<td width="80%">
'.$logo_design_choice.'
</td>
</tr>

<tr>
<td width="20%">
Description
</td>
<td width="80%">
'.$description.'
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
			
			
				if($mailto) {
				
					 ?>
				 	
				 		 
				 		 <form id="form" action="sent" method="POST">
				 		 <input name="confirm" type="hidden" value="confirm"/>
				 		 </form>
				 		 
				 		 <script>
				 		 document.getElementById("form").submit();
				 		 </script>
						
					<?
				
				
				} else {
				
					header("Location: /");
					
					}
		
		
			}
		
		}
		
		
		
}
		
		
		
		
		
		
		
		
		
		
		
		
		
		
	}	else {
	
	header("Location: /");
	
	}