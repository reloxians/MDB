<?php
	
	$me = $_SESSION['username'];
	
	//extra security
	$chk = "select * from website_service_request where username='$me' ";
	$cmd = mysqli_query($connect,$chk);
	$ans = mysqli_num_rows($cmd);
	
	$chk0 = "select * from app_service_request where username='$me' ";
	$cmd0 = mysqli_query($connect,$chk0);
	$ans0 = mysqli_num_rows($cmd0);
	
	if($ans < 1 && $ans0 < 1 ) {
		header("Location: /services/websites.php");
		exit();
	}
	