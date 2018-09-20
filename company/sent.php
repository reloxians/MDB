<?php 
	if(isset($_POST['confirm'])) {
		
	session_start();
	
	$user = $_SESSION['username'];
	
	$link = 'renew';
	$themes = array('blue', 'green', 'red');
	$i = rand(0, count($themes)-1);
	$theme_class = "$themes[$i]";
	include '../database/database.php' ;
	include '../header_no_nav.php' ;
	include '../parallax.php' ;
	//include '../nav/profile_nav.php' ;
	
	?>
	
	<div class="page_wrapper_sub">
	
	
	<table width="100%" cellpadding="5">
<tr bgcolor="">
<td class="invisible" width="20%">

</td>

<td class="responsive" width="60%">


	<div class="forbidden_class_wrapper">			
			<div class="infomat-valid">
<i class="fa fa-check"></i> Hi <span class="email"><?php echo $user ?></span>, we processing your request,
 we'll send a message to you shortly 
			</div>
					</div>
					
		

</td>


<td class="invisible" width="20%">

</td>
</tr>
</table>

	
	
	
	</div>
	
	
<?php
	include '../footer.php' ;

	} else {
	
	header("Location: /");
	
	}