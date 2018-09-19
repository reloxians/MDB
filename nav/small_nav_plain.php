<?php
session_start();
$user = $_SESSION['username'];
?>

<div id="nav_java_small">
<div class="wide_nav_wrapper no-bg">
<ul class="wide_nav_ul">
<!--	<li><a id="home" href="/"><i class="fa fa-home"></i>  Reloxians</a></li> -->

<li><a id="home" href="/"><img style="margin-bottom: -8px; margin-left: -20px;" src="/logo.png" width="130px" /></a></li>

	
<li class="small_nav_right"><a id="toggle"><i style="font-size: 25px;" class="fa fa-bars"></i></a></li>	
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
<div class="small_nav_icon_gallery">
<i class="fa fa-cart-plus"></i>
</div>
</td>

<td width="80%">
<a class="small_nav_icon_gallery_txt" href="/company/pricing/">Pricing</a>
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
<a class="small_nav_icon_ebook_txt" href="/library/">E-book</a>
</td>
</tr>
</table>


</td>
</tr>
</table>

</div><!-- fullbox wrapper ends -->


</div>
</div>