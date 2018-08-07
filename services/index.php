<?php 
	// Services INDEX
	
	$link = 'services' ;
	$active = 'services' ;
	
	include '../database/database.php' ;
	
	include '../header.php' ;
	include '../parallax.php' ;
	
	if($_SESSION['username']) {
		include '../nav/profile_nav.php' ;		
	}
	echo '<br>' ;
?>
	
<?
	include '../sidebars/service_bar_small.php' ;
	include '../sidebars/service_bar.php' ;
	
?>
	
	<div class="near_sidebar">
	<center>
	<img class="disabled" src="/media/images/dev.svg" width="80%"/>
	
	<div style="width: 60%;" class="pre_block_plain">
	<span class="email">RS - Developers</span> can help you register your business online presence by employing the services of competent & experienced web & app developers for your business today! signup to get started
	</div>
	
	
	<? if($_SESSION['username']) {
		
	?>

	
	<table cellpadding="10" width="50%">
	<tr bgcolor="">
	
	<td align="center" width="50%">
	<span class="purple_btn">
<a id="order" href="mailto:<? echo site_email() ?>"><i class="fa fa-cart-plus"></i>   SUPPORT EMAIL</a>
</span>
	</td>
	
	<td align="center" width="50%">
	
<span class="parallax_tabs_b">
<a href="tel:<?php echo site_number() ?>"><i class="fa fa-phone"></i>   SUPPORT LINE </a>
</span>
	
	</td>
	</tr>
	</table>

	<?
		}
	?>
	
	</center>
	</div>
	<div class="clear" />
	<br>
	
	
<?php
	include '../footer.php' ;
	