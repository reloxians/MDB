<?php 
	// Services INDEX
	
	$link = 'pending' ;
	$active = 'services' ;
	
	include '../database/database.php' ;
	include '../security/auth_check.php' ;
	
	include '../header.php' ;
	echo '<div style="margin-top: 50px;" />';
	
	if($_SESSION['username']) {
		include '../nav/profile_nav.php' ;		
	}
	echo '<br>' ;
?>
	
<?
	include '../sidebars/pending_bar_small.php' ;
	include '../sidebars/pending_bar.php' ;
	
?>
	
	<div class="near_sidebar">
	<center>
	<img class="disabled" src="/media/images/dev.svg" width="80%"/>
	
	<div style="width: 60%;" class="pre_block_plain">
	<span class="email">RS - Developers</span> have provided a section for you to track record of your order placement 
	and lot more. Make a selction from the navigation bar to view order status
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
	