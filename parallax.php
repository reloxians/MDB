<?
if($theme_class == 'blue' ) {
	$theme_name = 'page_wrapper_blue';
	$theme_btn = 'parallax_tabs_a';
	$info_class = 'new_blue';
	$theme_shade = 'blue';

} elseif($theme_class == 'green' ) {
	$theme_name = 'page_wrapper_green';
	$theme_btn = 'btn_for_green';
	$info_class = 'new_green';
	$theme_shade = 'green';
	
} elseif($theme_class = 'red' ) {
	$theme_name = 'page_wrapper_red';
	$theme_btn = 'btn_for_green';
	$info_class = 'new_blue';
	$theme_shade = 'red';
}




?>



<div class="<? echo $theme_name ?>"><!-- page wrapper starts -->
<div class="parallax">
<div class="page_wrapper_unskew"><!-- SVG -->
<?
include 'navigations_plain.php';
?>
<br>
<br>

<a href="/company/request/">
<div class="info_wrapper">
<div class="info">
<table width="100%" cellpadding="5">
<tr bgcolor="">
<td width="5%">
<span class="<? echo $info_class ?>">
New
</span>
</td>

<td align="left" width="85%">
<span class="">Introducing open order platform </span>
</a>
</td>

<td width="10%">
<span class=""><i class="fa fa-angle-double-right"></i></span>
</td>

</tr>
</table>
</div>
</div>
</a>


<div class="parallax_font">
 Get A Responsive Website Today!
</div>

<div class="parallax_desc">
 The Reloxians can help you take your business to the next level by making your online presence known to the world within few minutes

</div>

<div class="tabbing">
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
	
	<span class="parallax_tabs_a">
<a id="order" href="/company/pricing/"><i class="fa fa-cart-plus"></i>   ORDER A SERVICE</a>
</span>
	
	<?
} else {

?>

<span class="<? echo $theme_btn ?>">
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


</td>


</tr>
</table>
</div>


</div><!-- unskew -->

<div class="child-shades-a-<? echo $theme_shade ?>"></div>
<div class="child-shades-b-<? echo $theme_shade ?>"></div>

</div><!-- parallax -->
</div><!-- page wrapper ends -->

<div class="work-flow">
<div class="work-flow-main">
RS - Developers workflow
</div>


<table width="100%" cellpadding="5">
<tr bgcolor="">
<td valign="top" align="center" width="10%">
<div class="quest_wrapper">
<i class="fa fa-pencil"></i><!-- 1 -->
</div>
</td>
<td valign="top" width="90%">
<span class="work-flow-sub">Place an order, telling us what you want</span><!-- 1 -->

</td>
</tr>




<tr bgcolor="">
<td valign="top" align="center" width="10%">
<div class="quest_wrapper">
<i class="fa fa-user"></i><!-- 2 -->
</div>
</td>
<td valign="top" width="90%">
<span class="work-flow-sub">Get an immediate reaponse from our team</span><!-- 2 -->

</td>
</tr>



<tr bgcolor="">
<td valign="top" align="center" width="10%">
<div class="quest_wrapper">
<i class="fa fa-user-plus"></i><!-- 3 -->
</div>
</td>
<td valign="top" width="90%">
<span class="work-flow-sub">Signup with us for proper communication </span><!-- 3 -->

</td>
</tr>



<tr bgcolor="">
<td valign="top" align="center" width="10%">
<div class="quest_wrapper">
<i class="fa fa-dollar"></i><!-- 3 -->
</div>
</td>
<td valign="top" width="90%">
<span class="work-flow-sub">Purchase a plan that suits your request</span><!-- 3 -->

</td>
</tr>



<tr bgcolor="">
<td valign="top" align="center" width="10%">
<div class="quest_wrapper">
<i class="fa fa-plus"></i><!-- 3 -->
</div>
</td>
<td valign="top" width="90%">
<span class="work-flow-sub">We start working immediately </span><!-- 3 -->

</td>
</tr>



<tr bgcolor="">
<td valign="top" align="center" width="10%">
<div class="quest_wrapper">
<i class="fa fa-reply"></i><!-- 3 -->
</div>
</td>
<td valign="top" width="90%">
<span class="work-flow-sub">submitted for reviews & corrections </span><!-- 3 -->

</td>
</tr>



<tr bgcolor="">
<td valign="top" align="center" width="10%">
<div class="quest_wrapper">
<i class="fa fa-check"></i><!-- 3 -->
</div>
</td>
<td valign="top" width="90%">
<span class="work-flow-sub">Delivered after corrections & completion </span><!-- 3 -->

</td>
</tr>


</table>

</div>

