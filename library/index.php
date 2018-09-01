<?php
	//library_frontend 
	$link = 'library' ;
	include '../security/auth_check.php' ;
	include '../database/database.php' ;
	include '../header.php' ;
	echo '<br>';
	echo '<br>';
	echo '<br>';
	if($_SESSION['username'] == 'Admin'){
	include '../nav/admin_nav.php' ;
	}
	?>
	
	<div class="page_wrapper_sub">
	<!-- search -->
	<center>
	<form action="#" method="POST">
	<table width="100%" cellpadding="5">
	<tr bgcolor="">
	<td width="90%">
	<input type="search" name="search" placeholder="         Search Library" />
	</td>
	<td align="left" bgcolor="" width="10%">
	<button class="search-btn" type="submit" name="submit"><i class="fa fa-search"></i></button>
	</td>
	</tr>
	</table>
	</form>
	</center>
	<!-- search ends -->
	
	</div>
	
	<?
	include '../footer.php';