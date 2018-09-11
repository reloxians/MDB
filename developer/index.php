<?php
//developer frontend
	include '../security/anti_session.php';
	include '../header.php';
	//$link = 'login';
	$link = 'Developer';
	echo '<br>';
	echo '<br>';
	echo '<br>';
	//include '../nav/signup_login_nav.php' ;
	include '../nav/company_nav.php' ;
			
			?>
			
	<div class="page_wrapper_sub">
	
			<div class="page_intro">
			Welcome Developer!
			
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
			
			<form action="login.inc" method="POST">
			<input name="username" type="text" placeholder="Identity" required="required" />
			<br>
			<input name="password" type="password" pattern=".{8,15}" placeholder="***********" required="required" />
			<br>
			<input name="pin" type="password" pattern=".{4,4}" placeholder="****" required="required" />
			
			<input name="dob" type="date" placeholder="***********" required="required" />
			
			<br>
			<br>			
			<button type="submit" name="developer" class="purple_btn">Sign in <i class="fa fa-long-arrow-right"></i></button>
				
			<div class="agreement">
			For a lost or forgotten password, click the <a class="email" href="mailto:reloxians@gmail.com">RS-Developer</a> for identification and assistance			
			</div>
			
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
			
			