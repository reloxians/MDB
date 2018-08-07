<?php
	$link = 'add_service';
	include '../security/admin_check.php';
	include '../header.php';
	include '../parallax.php';
	include '../nav/admin_nav.php';
	?>
	
	<div class="page_wrapper_sub">
	
	<div class="page_intro">
			Add a new service to the list of services 
			
			</div>
			
			<table width="100%" cellpadding="5">
			<tr bgcolor="">
			<td class="invisible" width="20%">
			
			</td>
			
			<td width="60%">
						
			
			
			<center>
			<div class="form_class">
			
			<form action="add_service.inc.php" method="POST">
			
			<select name="service_type" required="required">
				<option value="">Select Service Type</option>
				<option value="Renewable">Renewable</option>
				<option value="Non-Renewable">Non-Renewable</option>
			</select>
			
			<br>
			
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
			
				<div class="forbidden_class_wrapper">		
					
			<div class="valid_class">
<i class="fa fa-warning"></i> This should be a valid email address as it is going to be verified before completing the signup process
</div>
				</div>
			
			<input name="email" type="hidden" placeholder="Email" required="required" />	
		
			<input name="website" type="text" placeholder="Website Url" required="required" />	
			<br>
							
			<input name="platform" type="text" placeholder="Platform" required="required" />
			
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
			<br>
			<input name="expiration" type="text" placeholder="Expiration Date" required="required" />
			<br>
			
			<input name="renewal_fee" type="number" placeholder="Renewal Fee $USD" required="required" />
			
			
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
			
					
			
			<input name="one_time_fee" type="number" placeholder="One Time Fee $USD" required="required" />			
			<br>
			
			
			
			<input type="submit" value="Save" name="submit" />
			</form>
		
			</div>			
			</center>
			
			<center>
			
			<div class="agreement">
			By clicking "Save", you acknowledge that you have been credited with the ammount you requeated for this service
			
			
			
			
			</div>
			
			</center>
			
			</td>
			
			<td class="invisible" width="20%">
			
			</td>
			</tr>
			</table>
			
	
	</div>
	
	<?php
		include '../footer.php';
	
	