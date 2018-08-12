<?php
$cho = "select * from notify where username='$user' and stats= 0 " ;
$cmdb = mysqli_query($connect, $cho);

$count = mysqli_num_rows($cmdb);

		
		?>