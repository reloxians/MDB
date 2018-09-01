<?php
	//library_backend 
	$link = 'function' ;
	include '../../security/admin_check.php' ;
	include '../../database/database.php' ;
	
	if(isset($_POST['submit'])) {
	
	//upload file
	
	/**
	
	
	$dir = 'product/';
	//load file
	$target = $dir. basename($_FILES['cover']['name']);
	//get file name
	$filename = basename($_FILES['cover']['name']);
	//upload file
	if(!move_uploaded_file($_FILES['cover']['tmp_name'], $target)) { 
				header("Location: /");
				exit();
	
		} 
	
	**/
	
	for($i = 0; $i < count($_FILES['cover_pdf']['tmp_name']); $i++){
	$dir = 'product/' ;
		//Get the temp file path 
	$tmpFilePath = $_FILES['cover_pdf']['tmp_name'][$i];
	//real file path 
	$target_dir = $dir. basename($_FILES['cover_pdf']['name'][$i]);
	//
	//file names
	$cover = array(basename($_FILES['cover_pdf']['name']['0']));
	$file = array(basename($_FILES['cover_pdf']['name']['1']));
	
	move_uploaded_file($tmpFilePath, $target_dir);
	
	}
	
	$cover_name = $cover['0'];
	$file_name = $file['0'];
	
	//vars
	
	$title = $_POST['title'];
	$category = $_POST['category'];
	$price = $_POST['price'];
	$desc = $_POST['desc'];
	$created = date("Y-m-d h:i:sa");
	
	echo $created ;
	
	
	//query
	
	$ins = "INSERT INTO books (title_key, cover_name, file_name, category, price, description, created) VALUES ('$title', '$cover_name', '$file_name', '$category', '$price', '$desc', '$created') ";
	//
	$cmd = mysqli_query($connect, $ins);
	
	if($cmd){
		
		if(isset($_SERVER["HTTP_REFERER"])) { header("Location: " . $_SERVER["HTTP_REFERER"]); } 

		
	} else {
		
		if(isset($_SERVER["HTTP_REFERER"])) { header("Location: " . $_SERVER["HTTP_REFERER"]); } 
	
	}
	
	
	} else {
		
		header("Location: /");
	}
