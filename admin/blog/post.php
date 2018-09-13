<?php
	if(isset($_POST['submit']) && $_POST['submit'] != null ) {
		include '../../database/database.php';
		include '../../function/functions.php';
		
		//vars
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$email = $_POST['email'];
		$post_title = $_POST['post_title'];
		$slug = slug($_POST['slug']);
		$post_details_raw = $_POST['post_details'];
		$post_details = base64_encode($post_details_raw);
		$created = date("Y-m-d h:i:sa");
		
		//insert
		
		$ins = "insert into blog (firstname, lastname, email, post_title, post_details, slug, created) values ('$firstname', '$lastname' , '$email', '$post_title', '$post_details', '$slug', '$created' ) ";
		
		$cmd = mysqli_query($connect, $ins);
		
		if($cmd) {
		
			echo 'done';
		
		}
	
} else {

header("Location: / ");
}
