<? session_start();
	$user = $_SESSION['username'];
?>

<div class="page_wrapper_black"><!-- page wrapper starts -->
<div class="parallax-black-team">

<!-- small nav starts -->

<div id="">
<div class="wide_nav_wrapper small_nav_hidden transparent-bg">
<ul class="wide_nav_ul">
	<li><a id="home" href="/"><i class="fa fa-home"></i>  Reloxians</a></li>
	<li><a class="small_hide" href="#"><i class="fa fa-android"></i>  Apps</a></li>
	<li><a class="small_hide" href="/services/android.php"><i class="fa fa-html5"></i>  Websites</a></li>
	<li><a class="small_hide" href="#"><i class="fa fa-code"></i>  E-books</a></li>
	<li><a class="small_hide" href="/services/"><i class="fa fa-cart-plus"></i>  Services</a></li>
	
<!--
<li class="small_nav_right"><a id="toggle"><i style="font-size: 25px;" class="fa fa-bars"></i></a></li>	
-->

<!-- part 1 ends -->




	<?php if($_SESSION['username']){ 
	
	?>
	
	<li  class="wide_nav_right"><a href="../docs/logout.php"><i class="fa fa-user-o"></i>  Sign Out</a></li>
	
	<?php
	} else {
		?>
		
			<li class="wide_nav_right"><a href="../docs/login.php">Sign In  <i class="fa fa-long-arrow-right"></i></a></li>
			
			<?php
	}
	?>
	
	<?php if($_SESSION['username']){ 
	
	?>
	
	<li class="wide_nav_right"><a href="../client/"><i class="fa fa-user-circle"></i>  <? echo $user ?></a></li>
	
	<?php
	} 
		?>
		
	
	
	
<!--	
	
	<li class="small_nav_right"><a id="toggle"><i style="font-size: 25px;" class="fa fa-bars"></i></a></li>	
	
	-->
	
</ul>


<script>
$(document).ready(function() {
	//jquery goes here
	
	$('#toggle').click(function() {
		
		$('#fullbox').toggle(200);
	});
	
});
</script>


<div id="fullbox"><!-- fullbox wrapper -->

<div class="menu_name">
MENU
</div>


<table cellpadding="10" width="100%">
<tr bgcolor="">
<td valign="top" width="50%"><!-- big table 1 -->

<table cellpadding="5" width="100%">
<tr>
<td width="20%">
<div class="small_nav_icon_android">
<i class="fa fa-android"></i>
</div>
</td>

<td width="80%">
<a class="small_nav_icon_android_txt" href="#">Android</a>
</td>
</tr>
</table>

<table cellpadding="5" width="100%">
<tr>
<td width="20%">
<div class="small_nav_icon_website">
<i class="fa fa-html5"></i>
</div>
</td>

<td width="80%">
<a class="small_nav_icon_website_txt" href="/services/websites.php">Website</a>
</td>
</tr>
</table>	

</td>

<td width="50%">



<table cellpadding="5" width="100%">
<tr>
<td width="20%">
<div class="small_nav_icon_ebook">
<i class="fa fa-code"></i>
</div>
</td>

<td width="80%">
<a class="small_nav_icon_ebook_txt" href="#">E-book</a>
</td>
</tr>
</table>

<table cellpadding="5" width="100%">
<tr>
<td width="20%">
<div class="small_nav_icon_gallery">
<i class="fa fa-cart-plus"></i>
</div>
</td>

<td width="80%">
<a class="small_nav_icon_gallery_txt" href="/services/">Services</a>
</td>
</tr>
</table>	



</td>
</tr>
</table>

</div><!-- fullbox wrapper ends -->


</div>


<!-- small nav ends -->



<!--wide nav starts -->

<div class="wide_nav_wrapper wide_nav_hidden transparent-bg">
<ul class="wide_nav_ul">
	<li><a id="home" href="/"><i class="fa fa-home"></i>  Reloxians</a></li>
	
	<!--
	
	<li><a href="#"><i class="fa fa-android"></i>  Apps</a></li>
	<li><a href="/services/websites.php"><i class="fa fa-html5"></i>  Websites</a></li>
	<li><a href="#"><i class="fa fa-code"></i>  E-books</a></li>
	<li><a href="/services/"><i class="fa fa-cart-plus"></i>  Services</a></li>
	
	-->

<!-- part 1 ends -->	

	
	<?php if($_SESSION['username']){ 
	
	?>
	
	<li class="wide_nav_right"><a href="../docs/logout.php"><i class="fa fa-user-o"></i>  Sign Out</a></li>
	
	<?php
	} else {
		?>
		
			<li class="wide_nav_right"><a href="../docs/login.php">Sign In  <i class="fa fa-long-arrow-right"></i></a></li>
			
			<?php
	}
	?>
	
	<?php if($_SESSION['username']){ 
	
	?>
	
	<li class="wide_nav_right"><a href="../../client/"><i class="fa fa-user-circle"></i>  <? echo $user ?></a></li>
	
	<?php
	} 
	
	
	
		?>
		
		
		
		<li class="wide_nav_right"><a href="../../notify/"><i class="fa fa-envelope"></i><span class="">  Inbox</span></a></li>
		
		
	
</ul>


</div>


<!-- nav ends -->

<div class="parallax_font" style="margin-left: -14px;">
Brains behind RS - Developers
</div>


<div class="parallax_desc white" style="margin-left: 6px;">
Like you already know, RS - Developer is a company comprising of over 50+ stack developers. herein, we'll get you introduced to the founder & some of the major brains behind what we do here.

</div>

<div class="tabbing_black_team">
<table width="100%" cellpadding="10">
<tr bgcolor="">
<td class="responsive" align="" width="40%">

<script>

$(document).ready(function() {
	$('#').click(function() {
		
		$('#').toggle(200);
		
	});
	
});

</script>



<?php if($_SESSION['username']) {
	?>
	
	<span class="purple_btn">
<a id="order" href="mailto:support@reloxians.com"><i class="fa fa-inbox"></i>   SUPPORT EMAIL</a>
</span>
	
	<?
} else {

?>

<span class="purple_btn">
<a href="/docs/signup.php"><i class="fa fa-plus-circle"></i>   CREATE ACCOUNT</a>
</span>

<?

}

?>

<span class="parallax_tabs_b">
<a href="tel:<?php echo site_number() ?>"><i class="fa fa-phone"></i>   SUPPORT LINE </a>
</span>
</td>


<td class="responsive" align="" width="20%">
<div class="parallax_tabs">
<a href="#"><i class="fa fa-twitter"></i>   Twitter Connect</a>
</div>
</td>

<td class="responsive" align="" width="20%">
<div class="parallax_tabs">
<a href="http://facebook.com/reloxians"><i class="fa fa-facebook"></i>   Facebook Connect</a>
</div>
</td>


</tr>
</table>
</div>

<!-- 
<div class="info">
<table width="100%" cellpadding="0">
<tr bgcolor="">
<td width="2%">
<i class="fa fa-circle-o-notch"></i>
</td>

<td width="98%">
<span class=""><marquee> Our Developers are working on implementing an online lecture platform for students, through which lectures can be delivered remotely & conveniently </marquee></span>
</td>

</tr>
</table>

</div>
</div>

-->

<!-- <div class="info_wrapper"> -->
<div class="info">
<table width="100%" cellpadding="0">
<tr bgcolor="">
<td width="2%">
<i class="fa fa-circle-o-notch"></i>
</td>

<td width="98%">
<span class=""><marquee> Our Developers are working on implementing an online lecture platform for students, through which lectures can be delivered remotely & conveniently </marquee></span>
</td>

</tr>
</table>

</div>

</div>

</div><!-- page wrapper ends -->