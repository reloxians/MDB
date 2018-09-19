<?php
	if(isset($_POST['success']) && $_POST['success'] != null ) {
	$theme_class = 'green';
	include '../header_no_nav.php';
	include '../parallax.php';
	$User = $_SESSION['username'];
?>
<div class="page_wrapper_sub">

<table width="100%" cellpadding="5">
<tr bgcolor="">
<td class="invisible" width="20%">

</td>

<td align="center" class="responsive" width="60%">

	<div class="forbidden_class_wrapper">			
	<div class="infomat-valid">
Hi <span class="email"><?php echo $user ?></span>, you have successfully enlisted your email in our newsletter program.. enjoy up to date informations.
	</div>
	</div>
					
				

</td>


<td class="invisible" width="20%">

</td>
</tr>
</table>

</div>
<?	
	

	include '../footer.php';
	
	} else {
	header("Location: /");
	
	}