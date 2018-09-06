<?php
	if(isset($_POST['delete'])) {
	include '../../database/database.php';
	//vars
	$ids = $_POST['ids'];
	
	$se = "select * from books where id ='$ids' ";
	$cmd_se = mysqli_query($connect, $se);
	$re = mysqli_fetch_array($cmd_se);
	
	//file details
	$cover_file = '../../sales/product/'.$re['cover_name'];
	$pdf_file = '../../sales/product/'.$re['file_name'];

	//del files
	$del1 = unlink($cover_file);
	$del2 = unlink($pdf_file);
	
	if($del1 && $del2) {
	
	//del record
	$del = "delete from books where id = '$ids' ";
	$cmd = mysqli_query($connect, $del);
	
	if($cmd){
	//
	header("Location: ../../admin/library.php");
	} else {
	header("Location: ../../admin/library.php");
	}
	
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