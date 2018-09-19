<?php 
	//
	
	$link = 'notify' ;
	$active = 'unread' ;
	$child = 'unread_msg' ;
	
	include '../database/database.php' ;
	include '../security/auth_check.php' ;
	
	include '../header.php' ;
	echo '<div style="margin-top: 50px;" />';
	
	if($_SESSION['username']) {
		include '../nav/profile_nav.php' ;		
	}
	echo '<br>' ;
?>
	
<?
	include '../sidebars/notify_bar_small.php' ;
	include '../sidebars/notify_bar.php' ;
	
?>
	
	<div class="near_sidebar">
	
	<br/>
	<!-- msg loops -->
	<?php
	
	$me = $_SESSION['username'];
	$see = "select * from notify where username='$me' and stats=0 ORDER BY ID DESC";
	$see_cmd = mysqli_query($connect, $see);
	
	while($ress = mysqli_fetch_assoc($see_cmd)) {
?>
	
	<center>

	<table width="80%">
	<tr bgcolor="">
	<td width="5%">
	
	<div class="quest_wrapper">
	<center>!</center>
	</div>
	</td>
	
	
	<td bgcolor="" width="95%">
	
	<form id="<? echo $ress['id'] ?>" action="view" method="POST">
	<input type="hidden" name="id" value="<? echo $ress['id'] ?>"/>
	</form>
	

	
	<div class="title_wrapper">	
	<a href="#" onclick="document.getElementById('<? echo $ress['id'] ?>').submit();"> <? echo $ress['title'] ?></a>
	</div>
	
	</td>
	</tr>
	</table>
	
	<table width="80%">
	<tr bgcolor="">
	<td width="5%">
	
	</td>
	
	
	<td align="left" width="95%">
	
	<div class="msg_wrapper">
		
	<a href="#" onclick="document.getElementById('<? echo $ress['id'] ?>').submit();"> <? echo chop_string( $ress['msg'], 150 ) ?></a>
	</div>
	
	
	</td>
	</tr>
	</table>
	
	</center>
	
	<?
	
	}
	
	?>
	
	
	</div>
	<div class="clear" />
	<br>
	
	
<?php
	include '../footer.php' ;
	