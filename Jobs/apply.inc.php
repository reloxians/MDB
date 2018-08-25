<?php
	session_start();
	
	if(isset($_POST['submit'])) {
	
	//database
	include '../database/database.php';
	
	//vars
	
	$skill = $_POST['skills'];
	$working_years = $_POST['working-years'];
	$department = $_POST['department'];
	$created = date("Y-m-d h:i:sa");
	
	$skills = implode(',' , $skill);
	
	//validation
	
	if(empty($skill) || empty($working_years) || empty($department)) {
	
	header("Location: /");
	
	}
	
	//user details
	
	$username = $_SESSION['username'];
	
	$sel = "select * from users where username='$username' ";
	$cmd = mysqli_query($connect, $sel);
	$count = mysqli_num_rows($cmd);
	$info = mysqli_fetch_array($cmd);
	
	//details
	$firstname = $info['firstname'];
	$lastname = $info['lastname'];
	$email = $info['email'];
	
	
	if($count < 1 ) {
		
		header("Location: /");
	
		} else {
			
				//
				$ins = "insert into job_applicant (username, firstname, lastname, email, skills,  working_years, department, created ) values ('$username', '$firstname', '$lastname', '$email', '$skills', '$working_years', '$department', '$created' ) ";
				
				$ins_cmd = mysqli_query($connect, $ins);
				
				if($ins_cmd) {
					
					//mail user
					
					$headers .= "Reply-To: ". strip_tags('donotreply@reloxians.com') . "\r\n";
					$headers .= "From: RS - Developers <devs@reloxians.com>". "\r\n";
                        $headers .= "CC: Alvin@reloxians.com\r\n";
                        $headers .= "MIME-Version: 1.0\r\n";
                        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
					
					$subject = 'Developer Application Received';                     
                         
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
Here is a Confirmation that we have received your application form, our management team will look into it & communicate you in no distant time.
</div>

<table width="100%" style="font-family: helvetica;">
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
	
					mail($email, $subject, $message, $headers);

					header("Location: /");
					
					
				} else {
					
					header("Location: /");
					
					}
		
		}
		
		
	
	//end main
		
	} else {
		header("Location: /");
	}
	
	
	