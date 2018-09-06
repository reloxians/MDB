<?php

	$yes = date("Y-m-d h:i:sa", strtotime("-1 days")) ;

	$now = date("Y-m-d h:i:sa") ;
	
	echo $now. '<br />';
	echo 'yesterday'. $yes ;
	
	echo $seven_days_ago = date("Y-m-d h:i:sa", strtotime("-7 days"));
	
	
$file = "delete/desk.jpg";
$file2 = "delete/team.jpg";

//$del = unlink($file);

if($del){
	echo 'deleted' ;
} else {
	echo 'not deleted';
}

//$del2 = unlink($file2);

if($del2){
	echo 'deleted' ;
} else {
	echo 'not deleted';
}


	