<?
if($theme_class == 'blue' ) {
$theme_name = 'page_wrapper_blue';
$theme_btn = 'parallax_tabs_a';

} elseif($theme_class == 'green' ) {
	$theme_name = 'page_wrapper_green';
	$theme_btn = 'btn_for_green';
	
} elseif($theme_class = 'red' ) {
	$theme_name = 'page_wrapper_red';
	$theme_btn = 'btn_for_green';
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
<div class="parallax_font">
 Get A Responsive Website Today!
</div>

<div class="parallax_desc">
 The Reloxians help you take your business to the next level by making your online presence known to the world within few minutes

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
<div class="parallax_tabs">
<a href="#"><i class="fa fa-twitter"></i>   Twitter Connect</a>
</div>
</td>

<td class="responsive" align="" width="20%">
<div class="parallax_tabs">
<a href="https://facebook.com/reloxians"><i class="fa fa-facebook"></i>   Facebook Connect</a>
</div>
</td>


</tr>
</table>
</div>


<div class="info_wrapper">
<div class="info">
<table width="100%" cellpadding="0">
<tr bgcolor="">
<td width="2%">
<i class="fa fa-question-circle"></i>
</td>

<td width="98%">
<span class=""> Our Developers are working on implementing an online lecture platform for students, through which lectures can be delivered remotely & conveniently <i class="fa fa-angle-double-right"></i></span>
</td>

</tr>
</table>
</div>
</div>

</div><!-- unskew -->
</div><!-- parallax -->
</div><!-- page wrapper ends -->

