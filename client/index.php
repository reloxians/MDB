<?php 
	// INDEX CLIENT
	
	$link = 'active';
	session_start();
	
	include '../database/database.php' ;
	
	$me = $_SESSION['username'];
	
	if(!$_SESSION['username']) {
		header("Location: ../docs/login.php");
	}
	require '../security/auth_check.php' ;
	?>
	
	<?php
	include '../header.php' ;
	include '../parallax.php' ;
	include '../nav/profile_nav.php' ;
	?>
	<div class="page_wrapper_sub">
	

<div class="pre_block">

<div class="pre_block_header">
				Active Services
	</div>
<br>

Below are a list of your services currently hosted and managed by the <?php echo site_name() ?> web developers, for complaints or any sort of assistance, contact us via the help email provided in the footer
</div>

<table width="100%" cellpadding="10">
<tr bgcolor="">
<td valign="top" bgcolor="" class="responsive" width="50%">

<?php
	
	$sel = "select * from website_service where username= '$me' and platform= 'WordPress' and renewal_fee > 0 and activity_status= 1 ";
	$cmd = mysqli_query($connect, $sel);
	
	$count = mysqli_num_rows($cmd);
	
	if($count < 1) {
		?>
		
		<div class="service_name_header">
		WordPress Blog Development
		</div>
		
		<div class="forbidden_class">
<i class="fa fa-warning"></i> You do not have an active full WordPress development service, do well to place an order if the need be to own a WordPress blog now
</div>
		
		<br>
		<?
	} else {
	
	while($rows = mysqli_fetch_assoc($cmd)) {	
?>


<div class="service_wrapper"><!-- service wrapper -->

<table width="100%">
<tr bgcolor="">
<td valign="" width="30%">

<span class="wp_service_ico_main">
<i class="fa fa-wordpress"></i>
</span>

<div class="service_ico_name">
WordPress
</div>
</td>

<td bgcolor="" align="left" valign="top" width="70%">
<div class="service_desc_container">

<a href="<? echo $rows['website'] ?>"><? echo $rows['website'] ?> <i class="fa fa-external-link"></i> </a>

</div>

<div class="service_desc_container">
Started <? echo now($rows['created']) ?>

</div>

<div class="service_desc_container">
Time Left <? echo time_left($rows['expiration']) ?>

</div>

<div class="service_desc_container">
Renewal Fee  <span class="service_fee"><i class="fa fa-usd"></i><? echo $rows['renewal_fee'] ?>  USD
</span>
</div>


</td>
</tr>
</table>



</div><!-- service wrapper main --><br>

<div class="valid_class">
<i class="fa fa-check"></i> This service is running & requires an anual renewal to keep it active & avoid the deletion of site and its contents 
</div>

<br>

<center>
<!-- action starts -->

<form action="renew" method="POST">

<input name="service_id" type="hidden" value="<? echo $rows['id'] ?>" />

<ul class="service_action">

<li><a href="#" class="parallax_tabs_b">Cancel Service <i class="fa fa-minus"></i></a></li>

<li><button type="submit" name="submit" class="purple_btn"> Renew Service <i class="fa fa-cart-plus"></i></button></li>

</ul>

</form>

</center>



<br>
<br>


<?php

	}
}

?>

<!-- service 2 -->


<?php
	include 'database.php';
	
	$sel = "select * from website_service where username= '$me' and platform!= 'WordPress' and activity_status= 1 ";
	$cmd = mysqli_query($connect, $sel);
	
	$count1 = mysqli_num_rows($cmd);
	
	if($count1 < 1) {
		?>
		
		<div class="service_name_header">
		Full Website Development
		</div>
		
		<div class="forbidden_class">
<i class="fa fa-warning"></i> You do not have an active full Website development service, do well to place an order if the need be to own a static or dynamic Website now
</div>
		
		<br>
		
		<?
	} else {
	
	while($rows = mysqli_fetch_assoc($cmd)) {	
?>

<div class="service_wrapper">

<table width="100%">
<tr bgcolor="">
<td valign="" width="30%">


<span class="wp_service_ico_main">
<i class="fa fa-code"></i>
</span>

<div class="service_ico_name">
Website
</div>

</td>

<td valign="" align="left" bgcolor="" width="70%">
<div class="service_desc_container">

<a href="<? echo $rows['website'] ?>"><? echo $rows['website'] ?> <i class="fa fa-external-link"></i> </a>

</div>

<div class="service_desc_container">
Started <? echo now($rows['created']) ?>

</div>

<div class="service_desc_container">
Time Left <? echo time_left($rows['expiration']) ?>

</div>

<div class="service_desc_container">
Renewal Fee  <span class="service_fee"><i class="fa fa-usd"></i><? echo $rows['renewal_fee'] ?>  USD
</span>

</div>


</td>
</tr>
</table>

</div><!-- service wrapper -->

<br>

<div class="valid_class">
<i class="fa fa-check"></i> This service is running & requires an anual renewal to keep it active & avoid the deletion of site and its contents 
</div>

<br>


<center>
<!-- action starts -->

<form action="renew" method="POST">

<input name="service_id" type="hidden" value="<? echo $rows['id'] ?>" />

<ul class="service_action">

<li><a href="#" class="parallax_tabs_b">Cancel Service <i class="fa fa-minus"></i></a></li>

<li><button type="submit" name="submit" class="purple_btn"> Renew Service <i class="fa fa-cart-plus"></i></button></li>

</ul>

</form>

</center>

<br>
<br>


<?php

	}		
	
}
?>

</td>



<td valign="top" class="responsive" width="50%"><!-- part 2 -->


<?php
	include 'database.php';
	
	$sel = "select * from website_service where username= '$me' and platform= 'WordPress' and renewal_fee= 0 and activity_status= 1 ";
	$cmd = mysqli_query($connect, $sel);
	
	$count2 = mysqli_num_rows($cmd);
	
	if($count2 < 1) {
		?>
		
		<div class="service_name_header">
		WordPress Blog Design 
		</div>
		
		<div class="forbidden_class">
<i class="fa fa-warning"></i> You do not have an active full WordPress design service, do well to place an order if the need be to own a WordPress blog now
</div>
		
		<br>
		
		
		<?
	} else {
	
	while($rows = mysqli_fetch_assoc($cmd)) {	
?>

<div class="service_wrapper"><!-- service wrapper starts -->

<table width="100%">
<tr bgcolor="">
<td valign="" width="30%">


<span class="wp_service_ico_main">
<i class="fa fa-wordpress"></i>
</span>

<div class="service_ico_name">
WordPress
</div>

</td>

<td bgcolor="" align="left" valign="top" width="70%">
<div class="service_desc_container">

<a href="<? echo $rows['website'] ?>"><? echo $rows['website'] ?> <i class="fa fa-external-link"></i> </a>

</div>

<div class="service_desc_container">
Started <? echo now($rows['created']) ?>

</div>


<div class="service_desc_container">
Renewal Fee 
</div>


<div class="service_desc_container">One Time Fee
<span class="service_fee"><i class="fa fa-usd"></i><? echo $rows['one_time_fee'] ?>  USD
</span>
</div>

</td>
</tr>
</table>

</div>

<br>

<div class="valid_class">
<i class="fa fa-check"></i> This service is running and does not require any sort of renewal, do well to order a new service if needed
</div>


<br>
<br>


<?php

	}		
}
	
?>





<?php
	include 'database.php';
	
	$sel = "select * from app_service where username= '$me' and platform= 'Android' and one_time_fee > 0 and activity_status= 1 ";
	$cmd = mysqli_query($connect, $sel);
	
	$count2 = mysqli_num_rows($cmd);
	
	if($count2 < 1) {
		?>
		
		<div class="service_name_header">
		Android App Development 
		</div>
		
		<div class="forbidden_class">
<i class="fa fa-warning"></i> You do not have an active App Development service, do well to place an order if the need be to own an Android App now
</div>
		
		<br>
		
		
		<?
	} else {
	
	while($rows = mysqli_fetch_assoc($cmd)) {	
?>


<div class="service_wrapper">

<table width="100%"><!-- last part -->
<tr bgcolor="">
<td valign="" width="30%">


<span class="wp_service_ico_main">
<i class="fa fa-android"></i>
</span>

<div class="service_ico_name">
Android
</div>

</td>

<td bgcolor="" align="left" valign="top" width="70%">
<div class="service_desc_container">

<a href="<? echo $rows['website'] ?>"><? echo $rows['app_name'] ?> <i class="fa fa-external-link"></i> </a>

</div>

<div class="service_desc_container">
Started <? echo now($rows['created']) ?>

</div>


<div class="service_desc_container">
Renewal Fee 
</div>


<div class="service_desc_container">One Time Fee
<span class="service_fee"><i class="fa fa-usd"></i><? echo $rows['one_time_fee'] ?>  USD
</span>
</div>


</div>
</td>
</tr>
</table>

</div>

<br>

<div class="valid_class">
<i class="fa fa-check"></i> This service is running and does not require any sort of renewal, do well to order a new service if needed
</div>

<br>
<br>

<?php

		}
	}
	
	?>


</td>
</tr>
</table>

	
	</div>
	
	<?php 
		include '../footer.php' ;