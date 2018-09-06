<?php

?>

<div class="nav_wrapper">
	<ul>
	<li <?php if($link == 'library') {echo 'class="current"';} else {echo 'class="inactive"'; }?>><a href="../../library/">Library</a></li> 
		
	<li <?php if($link == 'stats') {echo 'class="current"';} else {echo 'class="inactive"'; }?>><a href="../../admin/main.php">Statistics</a></li> 
	
	<li <?php if($link == 'send') {echo 'class="current"';} else {echo 'class="inactive"'; }?>><a href="../../admin/send.php">Broadcast</a></li>
		
	<li <?php if($link == 'add_service') {echo 'class="current"';} else {echo 'class="inactive"'; }?>><a href="../../admin/add_service.php">Add Service</a></li> 
	
	<li <?php if($link == 'function') {echo 'class="current"';} else {echo 'class="inactive"'; }?>><a href="#">Function</a></li> 
	 
	</ul>
	</div>
	
	<?
	
	?>