<?php 
	//
	
	$link = 'active' ;
	$active = 'android' ;
	$child = 'active_apps' ;
	
	include '../database/database.php' ;
	
	$me = $_SESSION['username'];
	
	//if(!$_SESSION['username']) {
//		header("Location: ../docs/login.php");
//	}
	require '../security/auth_check.php' ;
	
	include '../header.php' ;
	include '../parallax.php' ;
	
	if($_SESSION['username']) {
		include '../nav/profile_nav.php' ;		
	}
	echo '<br>' ;
?>
	
<?
	include '../sidebars/active_bar_small.php' ;
	include '../sidebars/active_bar.php' ;
	
?>
	
	<div class="near_sidebar"><!-- wrapper starts -->
	<center>

	
	<?php
	$me = $_SESSION['username'] ;
	
	$sel = "select * from active_service  where type != 'website' and username='$me' ORDER BY ID desc";
	
	$cmd0 = mysqli_query($connect, $sel) ;
	
//	$res = mysqli_fetch_array($cmd) ; 
	
	$count = mysqli_num_rows($cmd0) ;
	
	if($count < 1 ) {
		
		?>
		
	<img class="disabled" src="/media/images/lap.svg" width="60%" />
		
	<div style="width: 60%;" class="pre_block_plain">
	You currently do not have an active service on <span class="email">RS - Developers</span> website, select one from the list of available services
	</div>
	

	
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
			
		
		} else {
			
			
			?>
			
			<div class="pre_block">
			<div class="pre_block_header">						
			Pending Services
			</div>
			
			<br></br>
			Below is an overview of your pending website 
			
			<?php if($count == 1 ) { echo 'service'  ; } elseif($count > 1 ) { echo 'services' ; } ?>
			
			 currently under construction, we'll do our best to comlete 
			
			<?php if($count == 1 ) { echo 'it'  ; } elseif($count > 1 ) { echo 'them' ; } ?> as soon as possible. 
			you'll be notified upon completion
			
			</div>

			<?
			
			
			while($res = mysqli_fetch_array($cmd) ) { //loop starts
			
			?>
			
			<div class="service_wrapper_list"><!-- service wrapper -->

<table width="100%">
<tr bgcolor="">
<td valign="" width="30%">

<span class="wp_service_ico_main">
<i class="fa fa-code"></i>
</span>

<div class="service_ico_name">
WordPress
</div>
</td>

<td bgcolor="" align="left" valign="top" width="70%">
<div class="service_desc_container">

<a href="#"><? echo $res['item'] ?> <i class="fa fa-external-link"></i> </a>

</div>

<div class="service_desc_container">
Ordered <? echo now ($res['created']) ?>

</div>

<div class="service_desc_container">
Price  <span class="service_fee">₦<?php echo number_format( $res['price'] ) ?>  
</span>
</div>


</td>
</tr>
</table>



</div><!-- service wrapper main --><br>
			
			
			
			
			<?
			
			} //loop ends
		
		
		}
	
	?>	
	
	</center>
	</div><!-- wrapper ends -->
	<div class="clear" />
	<br>
	
	
<?php
	include '../footer.php' ;
	