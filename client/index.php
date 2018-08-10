<?php 
	//
	
	$link = 'active' ;
	$active = 'websites' ;
	$child = 'active_websites' ;
	
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
	
	$sel = "select * from active_service  where username= '$me' and type= 'website' ORDER BY ID desc";
	
	$cmd = mysqli_query($connect, $sel) ;
	
//	$res = mysqli_fetch_array($cmd) ; 
	
	$count = mysqli_num_rows($cmd) ;
	
	if($count < 1 ) {
		
		echo 'you currently have no active service' ;
		
		
		} else {
			
			
			?>
			
			<div class="pre_block">
			<div class="pre_block_header">						
			Active Website Services
			</div>
			
			<br></br>
			Below is an overview of your active website 
			
			<?php if($count == 1 ) { echo 'service'  ; } elseif($count > 1 ) { echo 'services' ; } ?>
			
			 currently under the management of our developers, we'll do our best to keep you updated regularly
			
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

<a href="https://<? echo $res['service_name'] ?>"><? echo $res['service_name'] ?> <i class="fa fa-external-link"></i> </a>

</div>

<div class="service_desc_container">
Started <? echo now ($res['created']) ?>

</div>


<!--
<div class="service_desc_container">
Expiration Date is <b><? echo  ($res['expiration']) ?></b>

</div>
-->

<div class="service_desc_container">

<b style="color: #E65100;">
<? if($res['reminded'] == 5 ) { echo 'Service has Expired' ; } else { echo time_up ($res['expiration'])  ;} ?>
</b>

</div>



<div class="service_desc_container">
Renewal Fee  <span class="service_fee">₦<?php echo number_format( $res['renewal_fee'] ) ?>  
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
	