<?php
	if(isset($_POST['submit'])) {
		include '../../database/database.php';
		//vars
		$item_name = $_POST['item_name']; 
		$item_price = $_POST['item_price'];
		$created = date("Y-m-d h:i:sa");
		
		//check
		$sel = "select * from prices where item_name = '$item_name' ";
		$cmd = mysqli_query($connect, $sel);
		$res = mysqli_fetch_assoc($cmd);
		$count = mysqli_num_rows($cmd);
		
		
		if($count < 1 ) {
		//ins
		
		$ins = "insert into prices (item_name, price, created ) values ('$item_name', '$item_price', '$created' )";
		
		$cmdd = mysqli_query($connect, $ins);
		
		if($cmdd) {
		
		header('Location: ' . $_SERVER['HTTP_REFERER']);
		
		}
		
		} else {
			//update 
			
			$upd = "update prices set price = '$item_price' where item_name = '$item_name' ";
			$cmdo = mysqli_query($connect, $upd);
			
			
			if($cmdo) {
			
			header('Location: ' . $_SERVER['HTTP_REFERER']);
			
			}
		
		
		}
	
	
	} else {
		header("Location: /");
	
	}