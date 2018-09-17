<?php
	if(isset($_POST['submit'])) {
	include '../../database/database.php';
	//vars
	$post_id = $_POST['post_id'];	
	$content = $_POST['data-content'];
	$encode = base64_encode($content);
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$email = $_POST['email'];
	$created = date("Y-m-d h:i:sa");
	
	//
	$ins = "insert into comments (post_id, firstname, lastname, email, content, created ) values ( '$post_id', '$firstname', '$lastname', '$email', '$encode', '$created' ) ";
	
	$cmd = mysqli_query($connect, $ins);
	
	if($cmd) {
		
		try {
		
		header('Location: ' . $_SERVER['HTTP_REFERER']);
		
				}
				
				catch(Exception $e) {
				
				header("location:javascript://history.go(-1)");
				
				}
	} 
	
	
	} else {
		header("Location: /");
	}
	