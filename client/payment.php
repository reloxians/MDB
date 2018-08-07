<?php 
	if(isset($_POST['confirm'])) {
		
	session_start();
	
	$user = $_SESSION['username'];
	
	$link = 'renew';
	include '../database/database.php' ;
	include '../security/auth_check.php' ;
	include '../header.php' ;
	include '../parallax.php' ;
	include '../nav/profile_nav.php' ;
	
	?>
	
	<div class="page_wrapper_sub">
	
	
	<table width="100%" cellpadding="5">
<tr bgcolor="">
<td class="invisible" width="20%">

</td>

<td class="responsive" width="60%">


	<div class="forbidden_class_wrapper">			
			<div class="valid_class">
<i class="fa fa-check"></i> Hi <span class="email"><?php echo $user ?></span>, we processing your payment, we will send a confirmation mail to your registered email address, do well to check your inbox & spam folders.
			</div>
					</div>
					
				
					
						<table cellpadding="5" width="100%">
		<tr bgcolor="">
		<td width="">
		
			<center>
			<span class="pink_btn">
		<a href="/client/" class="">
		Client Arena <i class="fa fa-home"></i>
		</a>
			</span>
			</center>
			
		</td>
		</tr>
		</table>
		

</td>


<td class="invisible" width="20%">

</td>
</tr>
</table>

	
	
	
	</div>
	
	
<?php
	include '../footer.php' ;
	
	} else {
		header("Location: /client/");
	}