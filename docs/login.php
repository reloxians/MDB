<?php
			$theme_class = 'green'; 
			session_start();
			
			if($_SESSION['username'] || $_SESSION['email']) {
				header("Location: ../client/");
			}
$link = 'login' ;
$Next = $_POST['next'];

			 include '../header_no_nav.php' ;
			 include '../parallax.php' ;
			 include '../nav/signup_login_nav.php' ;
			
			?>
			
	<div class="page_wrapper_sub">
	
			<div class="page_intro">
			Login to access the client arena
			
			</div>
			
			
			
			<table width="100%" cellpadding="5">
			<tr bgcolor="">
			<td class="invisible" width="20%">
			
			</td>
			
			<td width="60%">
						
			
			<center>
			
			<div class="forbidden_class_wrapper">			
			<div class="warning_class">
<i class="fa fa-warning"></i> Endevour to fill in your correct login details to avoid detection of unusual activies in your account
			</div>
					</div>
			
			<form action="login.inc.php" method="POST">
			<input name="username" type="text" placeholder="Username or Email" required="required" />
			<br>
			<input name="password" type="password" pattern=".{8, 15}" placeholder="***********" required="required" />
			<br>	
			
			<?
			if(isset($_POST['pass-error'])) {
			?>
			
			<div class="infomat-error">
			Invalid password and username combination, review your entries before retrying the sign in process.
			</div>
			<?
			
			} elseif(isset($_POST['no-entry'])) {
			
			?>
			
			<div class="infomat-error">
			No account information was found on your submission, kindly review your spellings or any other typographical errors.
			</div>
			
			<?
			
			}
			
			?>
			<br>
			
			<input type="hidden" name="next" value="<? echo $Next ?>" />
			
			<button type="submit" name="submit" class="purple_btn">Sign in <i class="fa fa-long-arrow-right"></i></button>
			
			
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
			
			