<?php
	include '../classes/mailer/vendor/autoload.php';
	
	use PHPMailer\PHPMailer\PHPMailer; 
	use PHPMailer\PHPMailer\Exception;
	
	require '../classes/mailer/src/Exception.php'; 
	require '../classes/mailer/src/PHPMailer.php'; 
	require '../classes/mailer/src/SMTP.php';

	if(isset($_POST['firstname'])) {
	include '../database/database.php'; 
	
	//vars 
	$ids = $_POST['ids'];
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$user_email = $_POST['email'];
	$location = $_POST['location'];
	$price = $_POST['price'];
	$created = date("Y-m-d h:i:sa");
	
	//verify price
	$sel = "select * from books where id ='$ids' ";
	$cmd = mysqli_query($connect, $sel);
	$res = mysqli_fetch_array($cmd);
	
	$category = $res['category'];
	
	//file
	$file = $res['file_name'];
	$db_price = $res['price'];
	
	if(!$price > $db_price ){
		header("Location: /");
	} 
	
	//mail user
	$bodytext = '
                         
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
<p style="color: white; font-size: 20; font-family: helvetica; font-weight: bold;"> Hi ' .$firstname . '</p>
</td>
</tr>

<tr bgcolor="#fbfbfb">
<td>
<div style="font-family: helvetica;">
Here is the book you paid for at RSD website, click below for immediate download of attachment into your device. for complaints, email us at support@reloxians.com
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
	
	$email = new PHPMailer(false);
	
	try{
	
	//Server settings 
//	$email->isSMTP(); // Set mailer to use SMTP 
//	$email->Host = 'smtp.gmail.com; smtp.gmail.com'; // Specify main and backup SMTP servers 
//	$email->Username = 'bizzygodaddy@gmail.com'; // SMTP username 
//	$email->Password = 'smartabc2017'; // SMTP password 



	$email->Host = "billing@reloxians.com";
	$email->Port = '465';
	$email->Username = "admin@reloxians.com"; //from@domainname.com 
	$email->Password = "";
	$email->SMTPAuth = true; // Enable SMTP authentication 
	$email->SMTPSecure = 'tls'; // Enable TLS encryption, `ssl` also accepted 
	$email->Port = 587;
	$email->SMTPDebug = false; // Enable or disable verbose debug output 
	$email->do_debug = 0;  // Enable or disable verbose debug output 
	
	//mail settings
	
	$email->SetFrom('billing@reloxians.com', 'Alvin Excel');
	$email->Subject = 'RS - Developers Book Delivery';
	$email->Body = $bodytext;
	$email->IsHTML(true);
	$email->AddAddress($user_email);

	$file_to_attach = '../sales/product/'.$file ; 
	
	$email->AddAttachment( $file_to_attach , $file );
	
	$send = $email->send(); 
	
	if($send){
		//take records
		
		$ins = "insert into book_sales (firstname, lastname, email, category, country, price, created) values ('$firstname', '$lastname', '$user_email', '$category', '$location', '$price', '$created') ";
		$ins_cmd = mysqli_query($connect, $ins);
		//
		if($ins_cmd){
			//send user back
			?>
			<form id="form" action="sent" method="POST">
			<input type="hidden" name="valid" value="sent" />
			</form>
			
			<script>
			document.getElementById('form').submit();
			</script>
			<?
		}
	}
	
	} catch (Exception $e) { 
	
	echo 'Message could not be sent. Mailer Error: ', $email->ErrorInfo; 
	
	}
	
	
	} else {
		header("Location: /");
	}