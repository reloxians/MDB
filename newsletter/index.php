<?php
	if(isset($_POST['submit']) && $_POST['email'] != null) {
	include '../database/database.php';
	//vars
	$email = $_POST['email'];
	$created = date("Y-m-d h:i:sa");
	
	if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		header();
		exit();
			
	} else {
	//check for duplicate 
	$ch = "select * from newsletter where email = '$email' ";
	$cmd = mysqli_query($connect, $ch);
	$res = mysqli_num_rows($cmd);
	
	if($res > 0 ) {
	//update d records
	$upd = "update newsletter set email = '$email', created = '$created' ";
	$cmd0 = mysqli_query($connect, $upd);
	
	if($cmd0) {
	
		?>
		<form id="success-response" action="success" method="POST">
		<input type="hidden" name="success" value="success" />
		</form>
		
		<script>
		document.getElementById('success-response').submit();
		</script>
		
		<?
	}
	
	
	} else {
	//insert records
	$ins = "insert into newsletter (email, created) values ('$email', '$created') ";
	$cmd00 = mysqli_query($connect, $ins);
	
	if($cmd00) {
		
		?>
		<form id="success-response" action="success" method="POST">
		<input type="hidden" name="success" value="success" />
		</form>
		
		<script>
		document.getElementById('success-response').submit();
		</script>
		
		<?
		
		
	}
	
	}
	
	}
	
	} else {
	header("Location: /");
	exit();
	
	}