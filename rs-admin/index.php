<?php 
// ADMIN INDEX
			session_start();
			
			if($_SESSION['username'] || $_SESSION['email']) {
				header("Location: ../client/");
				
			} elseif($_SESSION['admin']) {
				header("Location: ../admin/main.php");
			}
			
$link = 'login' ;

			 include '../header.php' ;
			 include '../parallax.php' ;
			 include '../nav/signup_login_nav.php' ;
			
			?>
			
	<div class="page_wrapper_sub">
	
			<div class="page_intro">
			Login To Access The Admin Dashboard
			
			</div>
			
			
			
			<table width="100%" cellpadding="5">
			<tr bgcolor="">
			<td class="invisible" width="20%">
			
			</td>
			
			<td width="60%">
						
			
			<center>
			<div class="form_class">
			
			<div class="forbidden_class_wrapper">			
			<div class="warning_class">
<i class="fa fa-warning"></i> Endevour to fill in your correct login details to avoid detection of unusual activies in your account
			</div>
					</div>
			
			<form action="admin_login.inc.php" method="POST">
			<input name="username" type="text" placeholder="Username or Email" required="required" />
			<br>
			<input name="first_token" type="password" placeholder="First Token" required="required" />
			<br>
			<input name="second_token" type="password" placeholder="Second Token" required="required" />
			<br>
			<input type="submit" value="Login" name="submit" />
			</form>
		
			</div>			
			</center>
			
			<center>
			
			<div class="agreement">
			For a lost or forgotten password, click the <a class="email" href="mailto:reloxians@gmail.com">RS-Developer</a> for identification and assistance			
			</div>
			
			
			
			</center>
			
			</td>
			
			<td class="invisible" width="20%">
			
			</td>
			</tr>
			</table>
			
			
			
			</div>
			
<?php
	include '../footer.php' ;
			
			