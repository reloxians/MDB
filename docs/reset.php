<?php 
			session_start();
			
			if($_SESSION['username'] || $_SESSION['email']) {
				header("Location: ../client/");
			}
$link = 'reset' ;
$Next = $_POST['next'];

			 include '../header.php' ;
			 include '../parallax.php' ;
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
			
			<form action="reset.inc.php" method="POST">
			<input name="email" type="email" placeholder="Email" required="required" />
			
			<?
			if(isset($_POST['no-user'])) {
			echo '			
			<div class="infomat-error">
			<i class="fa fa-warning"></i> No account information was found on your email entry, ensure spellings are made correctly before retrying.
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
		
			
			<input type="hidden" name="next" value="<? echo $Next ?>" />
			<br>
			<br>
			<button type="submit" name="reset" class="purple_btn">Reset <i class="fa fa-long-arrow-right"></i></button>
			
			</form>
					
			</center>

			
			</td>
			
			<td class="invisible" width="20%">
			
			</td>
			</tr>
			</table>
			
			
			
			</div>
			
<?php
	include '../footer.php' ;
			
			