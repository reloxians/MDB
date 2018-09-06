<?php
	/** Admin user**/
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
	
	$sel = "select * from users where id = '$ids' ";
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

<input type="text" name="firstname" value="<? echo $res['firstname'] ?>" placeholder="First Name: <? echo $res['firstname'] ?>" require="" />

<input type="text" name="lastname" value="<? echo $res['lastname'] ?>" placeholder="Last Name: <? echo $res['lastname'] ?>" require="" />

<input type="email" name="email" value="<? echo $res['email'] ?>" placeholder="Email: <? echo $res['email'] ?>" require="" />

<?

$password_view = base64_decode($res['password']);

?>

<input type="text" name="password" value="<? echo $password_view ?>" placeholder="Password: <? echo $res['password'] ?>" require="" />
	

	</td>
	
	
	<td valign="top" class="responsive" width="50">

<input type="number" name="phone" value="<? echo $res['phone'] ?>" placeholder="Phone: <? echo $res['phone'] ?>" require="" />


<input type="text" name="country" value="<? echo $res['country'] ?>" placeholder="Country: <? echo $res['country'] ?>" require="" />


<input type="text" name="auth_code" value="<? echo $res['auth_code'] ?>" placeholder="Auth Code: <? echo $res['auth_code'] ?>" require="" />

<input type="number" name="account_status" value="<? echo $res['account_status'] ?>" placeholder="Account Status: <? echo $res['account_status'] ?>" required="required" />

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