<?php
	if(!$_GET['temp']) {
		header("Location: signup.php");
	}
	
	$user = $_GET['temp'];
	
	$link = 'signup';
	include '../header.php';
	include '../parallax.php';
	include '../nav/signup_login_nav.php' ;
	
	?>
	
<div class="page_wrapper_sub">

<table width="100%" cellpadding="5">
<tr bgcolor="">
<td class="invisible" width="20%">

</td>

<td class="responsive" width="60%">


	<div class="forbidden_class_wrapper">			
			<div class="warning_class">
<i class="fa fa-warning"></i> Hi <?php echo $user ?>, we have sent a confirmation mail to your registered email address, do well to check your inbox & spam folders for your email confirmation message.
			</div>
					</div>
					
				
					
						<table cellpadding="5" width="100%">
		<tr bgcolor="">
		<td width="">
		
			<center>
		<a href="../" class="action_main">
		Back Home <i class="fa fa-home"></i>
		</a>
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
	include '../footer.php';	