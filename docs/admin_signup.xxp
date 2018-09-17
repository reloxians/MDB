<?php 
$link = 'signup' ;

			 include '../header.php' ;
			 include '../parallax.php' ;
			 include '../nav/signup_login_nav.php' ;
			
			?>
			
	<div class="page_wrapper_sub">
	
			<div class="page_intro">
			Create your Reloxians account. It is free and only takes a minute.
			
			</div>
			
			<table width="100%" cellpadding="5">
			<tr bgcolor="">
			<td class="invisible" width="20%">
			
			</td>
			
			<td width="60%">
						
			
			
			<center>
			<div class="form_class">
			
			<form action="admin_signup.inc.php" method="POST">
			<input name="username" type="text" placeholder="Username" required="required" />
			
			<?php 
				$main_link = 	$_SERVER['REQUEST_URI'];
				$username_error_link = '/docs/signup?usernameError';
			
			if($main_link == $username_error_link) {
			
					?>
					
					<div class="forbidden_class_wrapper">			
			<div class="forbidden_class">
<i class="fa fa-warning"></i> The username you entered has been used, please fix this error before proceeding with the signup process
			</div>
					</div>
		
				
		<?		
			}
			?>
			
			
			<input name="firstname" type="text" placeholder="Firstname" required="required" />	
			<br>
			<input name="lastname" type="text" placeholder="Lastname" required="required" />	
			<br>
				
				<div class="forbidden_class_wrapper">		
					
			<div class="valid_class">
<i class="fa fa-warning"></i> This should be a valid email address as it is going to be verified before completing the signup process
</div>
				</div>

			
			<input name="email" type="email" placeholder="Email address" required="required" />
			
			<?php 
				$main_link = 	$_SERVER['REQUEST_URI'];
				$email_error_link = '/docs/signup?emailError';
			
			if($main_link == $email_error_link) {
			
					?>
					
					<div class="forbidden_class_wrapper">			
			<div class="forbidden_class">
<i class="fa fa-warning"></i> The email you entered has been used, please fix this error before proceeding with the signup process
			</div>
					</div>
		
				
		<?		
			}
			?>
			
			<input name="first_token" type="password" placeholder="First token" required="required" />
			<br>
			<input name="second_token" type="password" placeholder="Second token" required="required" />
			
			
			<?php 
				$main_link = 	$_SERVER['REQUEST_URI'];
				$other_link = '/docs/signup?passwordError';
			
			if($main_link == $other_link) {
			
					?>
					
					<div class="forbidden_class_wrapper">			
			<div class="forbidden_class">
<i class="fa fa-warning"></i> The passwords you entered didnt match, please fix this error before proceeding with the signup process
			</div>
					</div>
		
				
		<?		
			}
			?>
			
			
			
			
			<input name="phone" type="number" placeholder="+23456789101" required="required" />			
			<br>
			<select name="country">
				<option value="">Select Your Country</option>
				<option value="Nigeria">Nigeria</option>
				<option value="USA">USA</option>
				<option value="Ghana">Ghana</option>
			</select>
			
			<br>
			
			<input type="submit" value="Sign up" name="submit" />
			</form>
		
			</div>			
			</center>
			
			<center>
			
			<div class="agreement">
			By clicking "Sign up", you acknowledge that you have read our updated <a class="email" href="tos.php"> terms of service</a>, <a class="email" href="disclaimer.php">Disclaimer</a> and that your continued use of the website is subject to these policies.
			
			
			
			
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
	 