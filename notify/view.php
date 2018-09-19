<?php 
	//
	
	if(!($_POST['id'])) {
		
		header("Location: ../");
		exit();
		
		}
	
	$link = 'notify' ;
	$active = 'read' ;
	$child = 'read_msg' ;
	
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
	
	<?
	
	$id = $_POST['id'];
	$me = $_SESSION['username'];
	
	$chk = "select * from notify where id= '$id' and username='$me' ";
	$chk_cmd = mysqli_query($connect, $chk);
	$see = mysqli_fetch_assoc($chk_cmd);
	
	?>
	
	<!-- display msg -->
	
	<center>
	
	<br></br>
	
	<table width="80%" cellpadding="">
	<tr bgcolor="pink">
	<td width="100%">
	
	<div class="msg_title">
	<? echo $see['title'] ?>
	</div>
	
	</td>	
	</tr>
	
	<tr bgcolor="pink">
	<td width="100%">
	
	<div class="msg_wrapper_open">
	<div class="msg_greeting">
	<b>
	Hi <? echo $me ?>,
	</b>
	</div>
	
	<? echo $see['msg'] ?>
	</div>
	
	</td>
	</tr>
	</table>
	
	<table width="80%">
	<tr bgcolor="">
	<td bgcolor="pink" width="50">
	
	<div class="msg_open_time">
	Received <? echo now($see['created']) ?>
	</div>
	
	</td>
	
	<td bgcolor="pink" align="right" width="50%">
	<div class="msg_open_time">
	RS - Developers Team
	</div>
	</td>
	</tr>
	
	</table>
	
	</center>
	
	</div>
	<div class="clear" />
	<br>
	
	
<?php

	$upd = "update notify set stats= 1 where id='$id' ";
	$upd_cmd = mysqli_query($connect, $upd);



	include '../footer.php' ;
	