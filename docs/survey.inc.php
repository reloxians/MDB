<?php
	session_start();
	
	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		
		include '../database/database.php' ;
		
		//vars
		$username = $_SESSION['username'];
		$source_answer = $_POST['source-answer'];
		$time_answer = $_POST['time-answer'];
		$service_answer = $_POST['service-answer'];
		$rate_answer = $_POST['rate-answer'];
		$recommend_answer = $_POST['recommend-answer'];
		$improve_answer = $_POST['improve-answer'];	
		$created = date("Y-m-d h:i:sa");
		
		//insert
		$ins = "insert into survey (username, source_answer, time_answer, service_answer, rate_answer, recommend_answer, improve_answer, created ) values ('$username', '$source_answer', '$time_answer', '$service_answer', '$rate_answer', '$recommend_answer', '$improve_answer', '$created' ) " ;
		
		//cmd
		$cmd = mysqli_query($connect, $ins);
		
		if($cmd) {
			
			header("Location: /");
			
		} else {
		
		
			header("Location: /");
			
			}
	
	}	