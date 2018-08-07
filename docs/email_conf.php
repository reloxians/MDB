<?php
include '../database/database.php' ;

if(isset($_GET['act_code'])) {
	$code = $_GET['act_code'];
	$sql = "select * from temp_users where activation_code= '$code' ";
	$do = mysqli_query($connect, $sql);
	$rea = mysqli_fetch_assoc($do);
	$count = mysqli_num_rows($do);
	
	if($count < 1) {
			header("location: index.php");
			exit();		
	} else {
	
	//insert user now
	$username = mysqli_real_escape_string($connect, $rea['username']);
//	$username = ucfirst($username0); 
	$firstname = mysqli_real_escape_string($connect, $rea['firstname']);
//	$firstname = ucfirst($firstname0);
	$lastname = mysqli_real_escape_string($connect, $rea['lastname']);
//	$lastname = ucfirst($lastname0);
	$email = mysqli_real_escape_string($connect, $rea['email']);
	
	$password = mysqli_real_escape_string($connect, $rea['password']);
//	$confirm = mysqli_real_escape_string($connect, $_POST['confirm']);
	$country = mysqli_real_escape_string($connect, $rea['country']);
	$skills = mysqli_real_escape_string($connect, $rea['skills']);
	$avatar ='default.jpg';
	
	$query = "INSERT into users(username, firstname, lastname, email, password, country, account_status, activation_code, profession, avatar, joindate)values('$username', '$firstname', '$lastname', '$email',   '$password', '$country',1, '$act_code', '$skills', '$avatar', NOW() )";
                $dow = mysqli_query($connect, $query);
                
                if($dow) {
                	//send mail to user
						 	$to = $email;
   					$headers = "From: " . strip_tags('donotreply@gmail.com') . "\r\n";
                        $headers .= "Reply-To: ". strip_tags('donotreply@gmail.com') . "\r\n";
                        //$headers .= "CC: susan@example.com\r\n";
                        $headers .= "MIME-Version: 1.0\r\n";
                        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
                        $subject = 'Welcome to Stackactivity';                     
                         
                         $message = '
                         
<table  width="100%" cellpadding="10">
<tr bgcolor="#fbfbfb"> 
<td align="center">
<h2 style="font-family: arial; color: grey;">Stack Activity - Account Confirmed</h2>
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
Welcome to Stackactivity website, we are proud to have you among many other developers. this platform was raised for the success of both upcoming & pro developers, feel free to ask any question in agreement with our asking instructions in order to appear relevant among your peers. check the account confirmation mail for your account details. you can start contributing to the community right away! 
</div>
<br>

</td>
</tr>


<tr bgcolor="#eaeaea">
<td>
<div style="font-weight: bold; font-size: 15; font-family: helvetica; color: grey; margin-left: 40%; padding: 10;">© Stackactivity -'. date('Y') . ' | <a href="facebook.com/integritye2">Reloxians</a></div>
</td>


</tr>
</table>
' ;
                         							
                         						
         
   $sentmail = mail($to,$subject,$message,$headers);

   if($sentmail)
                            {
                            	//add user badge
                            	$badge = 'novice.png' ;
                            	$badgeq = "INSERT into badges(username, badge) values ('$username', '$badge')" ;
                            	$runq = mysqli_query($connect, $badgeq);
                            	
                            	//insert into achievements
									$ach = "INSERT into achievements(username, welcome) values ('$username', '1')";
									$doach = mysqli_query($connect, $ach);
									                            	
                            	
                 		       // remember to move this to account conf page later..
                            	$followf = "INSERT into followers(leader_name) values ('$username')" ;
                            	$runf = mysqli_query($connect, $followf);
                            	if($runf) {
                            		
                            		//delete records from temp_users
                            		$del = "delete from temp_users where activation_code='$code' ";
                            		$dodel = mysqli_query($connect, $del);
                            		
                            		if($dodel) {
                                  header('Location: ../login.php?AccountConfirmed');
                                  exit();
                               //   echo 'done' ;
                                  } else {
                                  	header('Location: ../signup_error.php?temp=' . $firstname );
   							  				exit();
                                		  }
                             }  
                			}
                }
	
		}
	
	} else {
		//send user back to home
		header('Location: ../index.php?');
       exit();
	}
?>

