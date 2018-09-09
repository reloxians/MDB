<?php

?>

<div class="nav_wrapper">
	<ul>
	<li <?php if($link == 'library') {echo 'class="current"';} else {echo 'class="inactive"'; }?>><a href="../../library/">Library</a></li> 
		
	<li <?php if($link == 'stats') {echo 'class="current"';} else {echo 'class="inactive"'; }?>><a href="../../admin/main.php">Statistics</a></li> 
	
	<li <?php if($link == 'broadcast') {echo 'class="current"';} else {echo 'class="inactive"'; }?>><a href="../../admin/broadcast/">Broadcast</a></li>
	
	<li <?php if($link == 'developers') {echo 'class="current"';} else {echo 'class="inactive"'; }?>><a href="../../admin/developers/">Developers</a></li> 
		
	<li <?php if($link == 'function') {echo 'class="current"';} else {echo 'class="inactive"'; }?>><a href="#">Function</a></li> 
	 
	</ul>
	</div>
	
	<?
	
	?>