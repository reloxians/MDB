<?php
	if(isset($_POST['delete'])) {
	include '../../database/database.php';
	//vars
	$ids = $_POST['ids'];
	
	//del record
	$del = "delete from books where id = '$ids' ";
	$cmd = mysqli_query($connect, $del);
	
	$cover_file = '../../sales/product/';
	$pdf_file = '../../sales/product/';
	
	if($cmd){
	//
	header("Location: ../../admin/library.php");
	} else {
	header("Location: ../../admin/library.php");
	}
	
	} elseif(isset($_POST['update'])) {
	include '../../database/database.php';
	//vars
	$ids = $_POST['ids'];
	$title_key = $_POST['title_key'];
	$cover_name = $_POST['cover_name'];
	$file_name = $_POST['file_name'];
	$category = $_POST['category'];
	$price = $_POST['price'];
	$description = $_POST['description'];
	
	$update = "update books set title_key = '$title_key', cover_name = '$cover_name', file_name = '$file_name', category = '$category', price = '$price', description = '$description' where id ='$ids' ";
	$cmd = mysqli_query($connect, $update);
	
	if($cmd){
	//
	header("Location: ../../admin/library.php");
	} else {
	header("Location: ../../admin/library.php");
	}
	
	} else {
	header("Location: /");
	}