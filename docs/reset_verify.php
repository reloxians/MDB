<?php
		if(isset($_GET['auth_code']) && $_GET['temp']) {
		//var
		$auth_code = $_GET['auth_code'];
		$firstname = $_GET['temp'];
		
		//authenticate
		require_once('../database/database.php');
		$ch = "select * from reset where auth_code = '$auth_code' and firstname = '$firstname' ";
		$cmd = mysqli_query($connect, $ch);
		$count = mysqli_num_rows($cmd);
		
		if($count < 1 ) {
		
		header("Location: /");
		
		} else {
		
		
		
		
		
		include '../security/anti_session.php';
	  include '../header.php' ;
		include '../parallax.php' ;
		$link = 'reset';
		include '../nav/signup_login_nav.php' ;
?>

<div class="page_wrapper_sub">


<table width="100%" cellpadding="5">
			<tr bgcolor="">
			<td class="invisible" width="20%">
			
			</td>
			
			<td width="60%">
						
			
			<center>
			
			<div class="infomat">
			<i class="fa fa-check"></i> Endevour to fill in your correct login details to avoid detection of unusual activies in your account
			</div>
			
			<form action="reset_verify.inc.php" method="POST">
						
			<input name="password" type="password" placeholder="*********** 8 characters minimum" required="required" pattern=".{8,15}" />
			<br>
			<input name="password_verify" type="password" placeholder="*********** confirm password" required="required" pattern=".{8,15}" />
			
			
			<div class="forbidden_class_wrapper">
			<div class="infomat" style="width: 95%; text-align: left;">
			<ul>
			<li>May contain letter and numbers</li>
			<li>Must contain at least 1 number and 1 letter</li>
			<li>Must be 8-12 characters</li>
			</div>
			</div>
			
			
			<input type="hidden" name="auth_code" value="<? echo $auth_code ?>" />
			
			<input type="hidden" name="firstname" value="<? echo $firstname ?>" />
			
			<?
			if(isset($_GET['e'])) {
			echo '			
			<div class="infomat-error">
			<i class="fa fa-warning"></i> Invalid password combination, please endeavour to fill in the same passwords for both fields
			</div>';
			
			}
			?>
			
			<?
			if(isset($_POST['sent'])) {
			echo '			
			<div class="infomat-valid">
			<i class="fa fa-check"></i> Verification email sent to your registered email, click the confirmation link to confirm account ownership & reset your password
			</div>';
			
			}
			?>
		
			<br>
			<br>
			<button type="submit" name="reset_verify" class="purple_btn">Reset <i class="fa fa-long-arrow-right"></i></button>
			
			</form>
					
			</center>

			
			</td>
			
			<td class="invisible" width="20%">
			
			</td>
			</tr>
			</table>


</div>

<?
include '../footer.php' ;

}

} else {
	header("Location: /");
}