<?php 
$link = 'services';
$active = 'wordpress' ;

				session_start();
				include '../security/auth_check.php';
				include '../database/database.php' ;
				include '../header.php' ;
				include '../parallax.php' ;
				include '../nav/profile_nav.php' ;
	     include '../sidebars/service_bar_small.php' ;
	     echo '<br>' ;
	     include '../sidebars/service_bar.php' ;
			?>
			
			<div class="near_sidebar"><!-- wrapper start -->
			
			<!--

<div class="pre_block_plain">
<div class="pre_block_header">
				WordPress Blogs
			</div>
	<br>

The <?php echo site_name() ?> can help you build a WordPress blog withing few minutes, courtesy of our WordPress developers at a very cheap rate. below are the specifications of our WordPress blog plans
</div>

			
			-->
			
			
			
			<table cellpadding="5" width="100%">
<tr bgcolor="">

<td valign="top" class="responsive" align="center" width="50%">

<div class="list" href="#"><!-- wrapper starts -->

<div class="list_item">
<div class="list_icon_grey">
<i class="fa fa-wordpress"></i>
</div>

<div class="list_name">
Full Development
</div>

<div class="list_text">
This package is suitable for beginners who have not yet created and hosted their WordPress blog
</div>


<div class="quantity">
1 Website
</div>

<div class="subject">
Only one website is allowed for this package
</div>

<br>

<div class="quantity">
1GB Storage
</div>

<div class="subject">
Allocated HDD space
</div>

<br>

<div class="quantity">
Default & 2 Premium 
</div>

<div class="subject">
List of themes to sellect from
</div>

<br>

<div class="quantity">
Unlimited 
</div>

<div class="subject">
Monthly bandwidth of traffic
</div>

<br>

<div class="quantity">
Domain included
</div>

<div class="subject">
Submit your desired domain name in your application form, after you have verified its availability status
</div>

<br>

<div class="quantity">
2 email account
</div>

<div class="subject">
Custom email addresses for your website
</div>

<br>

<div class="quantity">
SEO plugins
</div>

<div class="subject">
SEO plugins are included to enhance search visibility
</div>

<br>

<div class="quantity">
<span class="price"> ₦47,000 NGN Yearly</span>
</div>

<div class="subject">
A recurrent annual payment for this plan
</div>

<br>



<form method="post" action="/checkout/">	
		<input name="item" type="hidden" value="WordPress Full" />
		<input name="type" type="hidden" value="wordpress" />
		<input name="price" type="hidden" value="47000" />
		<input name="billing" type="hidden" value="Yearly" />

		<button type="submit" name="submit" class="purple_btn">Order Now <i class="fa fa-cart-plus"></i></button>

	</form>

</div>
</div><!-- wrapper ends -->

</td>







<td valign="top" class="responsive" align="center" width="50%">

<div class="list" href="#"><!-- wrapper starts -->

<div class="list_item">
<div class="list_icon_grey">
<i class="fa fa-wordpress"></i>
</div>

<div class="list_name">
WordPress Blog Design
</div>

<div class="list_text">
This package is suitable for users with little or no experience of designing a WordPress blog
</div>

<div class="quantity">
1 Website
</div>

<div class="subject">
Service is to be rendered with just one website
</div>

<div class="quantity">
SEO plugins
</div>

<div class="subject">
SEO plugins are included to enhance search visibility
</div>

<br>

<div class="quantity">
5 Premium 
</div>

<div class="subject">
List of themes to sellect from
</div>

<br>

<div class="quantity">
<span class="price"> ₦23,000 NGN One Time</span>
</div>

<div class="subject">
A one time payment is required for this plan
</div>

<br>

<form method="post" action="/checkout/">	
		<input name="item" type="hidden" value="WordPress Design" />
		<input name="type" type="hidden" value="wordpress" />
		<input name="price" type="hidden" value="23000" />
		<input name="billing" type="hidden" value="One Time" />

		<button type="submit" name="submit" class="pink_btn">Order Now <i class="fa fa-cart-plus"></i></button>

	</form>

</div>
</div><!-- wrapper ends -->


</td>
</tr>
</table><!-- table 2 ends-->
<br>			
			</div><!-- wrapper ends -->
			<div class="clear" />
			
			<?php include '../faq.php' ?>
			
<?php include '../footer.php' ;