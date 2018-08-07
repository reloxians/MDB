<?php
	session_start();
	include '../../database/database.php' ;	
	$link = 'pricing';
	$active = 'websites' ;
	$child = 'school' ;
	
	include '../../security/auth_check.php' ;
	include '../../security/pricing_auth_check.php' ;
	include '../../header.php' ;
	include '../../parallax.php' ;
	include '../../nav/profile_nav.php' ;
	
	echo '<br>' ;
?>
	
<?
	include '../../sidebars/pricing_bar_small.php' ;
	include '../../sidebars/pricing_bar.php' ;
	echo '<br>';
	
?>

<div class="near_sidebar">

<table cellpadding="5" width="100%">
<tr bgcolor="">

<td valign="top" class="responsive" align="center" width="50%">

<div class="list" href="#"><!-- wrapper starts -->

<div class="list_item">
<div class="list_icon_grey">
<i class="fa fa-code"></i>
</div>

<div class="list_name">
Standard Pack
</div>

<div class="list_text">
This package is suitable for large organisation, making their presence known on the internet
</div>


<div class="quantity">
1 Website
</div>

<div class="subject">
Only one website is allowed for this package
</div>

<br>

<div class="quantity">
50GB Storage
</div>

<div class="subject">
Allocated HDD space
</div>

<br>

<div class="quantity">
Standard Peformance 
</div>

<div class="subject">
Site speed and load time
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
Submit your desired domain name in your application form, after you have verified its availability status or allow us choose for you
</div>

<br>

<div class="quantity">
5 email account
</div>

<div class="subject">
Custom email addresses for your website
</div>

<br>

<div class="quantity">
Security
</div>

<div class="subject">
Cloudflare security is included
</div>

<br>

<div class="quantity">
Administration
</div>

<div class="subject">
Admin dashboard included
</div>

<br>

<div class="quantity">
Signup system
</div>

<div class="subject">
User signup system included
</div>

<br>

<div class="quantity">
Newsletter
</div>

<div class="subject">
Mass email broadcasting included
</div>


<br>

<div class="quantity">
SEO Optimsed
</div>

<div class="subject">
SEO optimisation is added for search engine visibility
</div>

<br>

<div class="quantity">
<span class="price"> ₦137,000 NGN Yearly</span>
</div>

<div class="subject">
A recurrent annual payment for this plan
</div>

<br>


	<form method="post" action="/checkout/">	
		<input name="item" type="hidden" value="Standard Corporate" />
		<input name="price" type="hidden" value="137000" />
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
<i class="fa fa-code"></i>
</div>

<div class="list_name">
Basic Pack
</div>

<div class="list_text">
This package is suitable for small organisation just starting up, making their <span class="email">First Appearance</span> on the internet
</div>

<div class="quantity">
1 Website
</div>

<div class="subject">
Service is to be rendered with just one website
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
SEO Optimsed
</div>

<div class="subject">
SEO optimisation included to enhance search visibility
</div>

<br>

<div class="quantity">
Basic Peformance 
</div>

<div class="subject">
Site speed and load time
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
Submit your desired domain name in your application form, after you have verified its availability status or allow us choose for you
</div>

<br>

<div class="quantity">
2 email account
</div>

<div class="subject">
Custom email addresses for your website
</div>

<div class="quantity">
Administration
</div>

<div class="subject">
Admin dashboard included
</div>

<br>

<div class="quantity">
Signup system
</div>

<div class="subject">
User signup system included
</div>


<br>


<div class="quantity">
<span class="price"> ₦92,500 NGN Yearly</span>
</div>

<div class="subject">
A recurrent annual payment for this plan
</div>

<br>
		
		<!-- order botton -->
		
		<form method="post" action="/checkout/">	
		<input name="item" type="hidden" value="Basic Corporate" />
		<input name="price" type="hidden" value="92500" />
		<input name="billing" type="hidden" value="Yearly" />

		<button type="submit" name="submit" class="pink_btn">Order Now <i class="fa fa-cart-plus"></i></button>

	</form>

</div>
</div><!-- wrapper ends -->

</td>
</tr>
</table><!-- table 2 ends-->

<br>


</div>
<div class="clear" />

<?php
	include 'website_faq.php' ;
	include '../../footer.php' ;
	
	