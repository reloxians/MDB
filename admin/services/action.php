<?php
	/** Admin service**/
	$link = 'function';
	if(isset($_POST['ids'])) {
	include '../../security/admin_check.php' ;
	include '../../database/database.php';
	include '../../header.php';
	echo '<br>';
	echo '<br>';
	echo '<br>';
	include '../../nav/admin_nav.php' ;
	
	$ids = $_POST['ids'];
	
	$sel = "select * from active_service where id = '$ids' ";
	$cmd = mysqli_query($connect, $sel);
	$res = mysqli_fetch_assoc($cmd);
	
	?>
	
	<div class="page_wrapper_sub">
	
	<table width="100%" cellpadding="5">
	<tr bgcolor="">
	<form action="action.inc.php" method="POST">
	<td valign="top" class="responsive" width="50">
	<input type="hidden" name="ids" value="<? echo $res['id'] ?>" />
	
	<input type="text" name="username" value="<? echo $res['username'] ?>" placeholder="Username: <? echo $res['username'] ?>" required="" />
	
	<input type="email" name="email" value="<? echo $res['email'] ?>" placeholder="Email: <? echo $res['email'] ?>" require="" />

<input type="text" name="service_name" value="<? echo $res['service_name'] ?>" placeholder="Service Name: <? echo $res['service_name'] ?>" require="" />

<input type="text" name="type" value="<? echo $res['type'] ?>" placeholder="Type: <? echo $res['type'] ?>" require="" />

<input type="text" name="platform" value="<? echo $res['platform'] ?>" placeholder="Platform: <? echo $res['platform'] ?>" require="" />

<input type="text" name="created" value="<? echo $res['created'] ?>" placeholder="Created: <? echo $res['created'] ?>" require="" />




	</td>
	
	
<td valign="top" class="responsive" width="50">

<input type="text" name="expiration" value="<? echo $res['expiration'] ?>" placeholder="Expiration: <? echo $res['expiration'] ?>" require="" />

<input type="text" name="renewal_fee" value="<? echo $res['renewal_fee'] ?>" placeholder="Renewal fee: <? echo $res['renewal_fee'] ?>" require="" />

<input type="text" name="one_time_fee" value="<? echo $res['one_time_fee'] ?>" placeholder="One time fee: <? echo $res['one_time_fee'] ?>" require="" />

<input type="text" name="activity_status" value="<? echo $res['activity_status'] ?>" placeholder="Activity status: <? echo $res['activity_status'] ?>" require="" />

<input type="text" name="reminded" value="<? echo $res['reminded'] ?>" placeholder="Reminded: <? echo $res['reminded'] ?>" require="" />

<input type="submit" name="update" value="update" />
<input type="reset" name="reset" value="Reset" />
<input type="submit" name="delete" value="delete" />
	
	</td>
	</form>
	</tr>
	</table>
	</div>
	<?
	include '../../footer.php';
} else {
	header("Location: /");
}