<?php 
	// Services INDEX
	
	$link = 'notify' ;
	$active = 'notify' ;
	
	include '../database/database.php' ;
	include '../security/auth_check.php' ;
	
	include '../header.php' ;
	include '../parallax.php' ;
	
	if($_SESSION['username']) {
		include '../nav/profile_nav.php' ;		
	}
	echo '<br>' ;
?>
	
<?
	include '../sidebars/notify_bar_small.php' ;
	include '../sidebars/notify_bar.php' ;
	
?>
	
	<div class="near_sidebar">
	<center>
	<img class="disabled" src="/media/images/blank.svg" width="45%"/>
	
	<div style="width: 60%;" class="pre_block_plain">
	<span class="email">RS - Developers</span> have provided a section for you to be updated with informations internally.
Do well to	check regularly to stay updated with tips and lot more.
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
	