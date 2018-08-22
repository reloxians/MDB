<?php
	session_start();
	
	if($_SERVER['REQUEST_METHOD'] == 'POST' ){
		
		include '../function/functions.php' ;
		include '../security/auth_check.php' ;
		
		$message = $_POST['message'] ;
		$email = site_email();
		$username = $_SESSION['username'] ;
		$admin = 'Reloxians' ;
		
						$to = $email;
							
   						$headers .= "Reply-To: ". strip_tags('donotreply@reloxians.com') . "\r\n";
						$headers .= "From: Alvin Excel <support@reloxians.com>". "\r\n";
                        $headers .= "CC: Alvin@reloxians.com\r\n";
                        $headers .= "MIME-Version: 1.0\r\n";
                        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

                        $subject = 'Ticket Submission';                     
                         
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
.$username.' sent a message to you via the support form<p><b>Here is the content of the message</b></p>
</div>

<table width="100%" style="font-family: helvetica;">
<tr>
<td width="20%">
Message
</td>
<td width="80%">
'.$message.'
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
				
				
				}
				 		 	
		
		
		} else {
			header("Location: /");
		}

?>