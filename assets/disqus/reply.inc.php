<?php
	if(isset($_POST['submit'])) {
	include '../../database/database.php';
	//vars
	$comment_id = $_POST['comment_id'];
	$pre = $_POST['data-content'];
	$content = base64_encode($pre);
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$email = $_POST['email'];
	$created = date("Y-m-d h:i:sa");
	
	//ins
	
	$ins = "insert into replies (comment_id, firstname, lastname, email, content, created) values ('$comment_id', '$firstname', '$lastname', '$email', '$content', '$created') ";
	
	$run = mysqli_query($connect, $ins);
	
	if($run) {
		
		try {
		
		header('Location: ' . $_SERVER['HTTP_REFERER']);
		
				}
				
				catch(Exception $e) {
				
				header("location:javascript://history.go(-1)");
				
				}
	} else {
		
		echo 'no';
	
	}
	
	
	} else {
	
	header("Location: /");
	
	}