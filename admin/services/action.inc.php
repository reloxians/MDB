<?php
	if(isset($_POST['delete'])) {
	include '../../database/database.php';
	//vars
	$ids = $_POST['ids'];
	
	//del record
	$del = "delete from active_service where id = '$ids' ";
	$cmd = mysqli_query($connect, $del);
	
	if($cmd){
	//
	header("Location: ../../admin/services/");
	} else {
	header("Location: ../../admin/services/");
	}
	
	
	
	} elseif(isset($_POST['update'])) {
	include '../../database/database.php';
	//vars
	$ids = $_POST['ids'];
	$username = $_POST['username'];
	$email = $_POST['email'];
	$service_name = $_POST['service_name'];
	$type = $_POST['type'];
	$platform = $_POST['platform'];
	$created = $_POST['created'];
	$expiration = $_POST['expiration'];
	$one_time_fee = $_POST['one_time_fee'];
	$activity_status = $_POST['activity_status'];
	$reminded = $_POST['reminded'];
	
	$update = "update active_service set username = '$username', email = '$email', service_name = '$service_name', type = '$type', platform = '$platform', created = '$created', expiration = '$expiration', one_time_fee = '$one_time_fee', activity_status = '$activity_status', reminded = '$reminded' where id ='$ids' ";
	$cmd = mysqli_query($connect, $update);
	
	if($cmd){
	//
	header("Location: ../../admin/services/");
	} else {
	header("Location: ../../admin/services/");
	}
	
	} else {
	header("Location: /");
	}