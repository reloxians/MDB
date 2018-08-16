<?php 
	// Services INDEX
	
	$link = 'i-pay' ;
	$active = 'services' ;
	
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
	include '../sidebars/ipay_bar_small.php' ;
	include '../sidebars/ipay_bar.php' ;
	
?>
	
	<div class="near_sidebar">
	<center>
	<br></br>	
	
<table cellpadding="5" width="100%"><!-- inner tab -->
<tr bgcolor="">
<td align="center" valign="top" bgcolor="" width="10%">

<div class="quest_wrapper">
?
</div>
</td>


<td valign="top" width="90%">
<div class="faq_question">
What is I-pay all about?
</div>

<div class="faq_answer">
I-pay is  a payment platform for making installmental payment for services on the RS - Developers website.
for some reasons, people would want to make installmental payment for services, so we've raised this payment 
system  to meet these needs
</div>

</td>
</tr>


<tr bgcolor="">
<td align="center" valign="top" bgcolor="" width="10%">

<div class="quest_wrapper">
?
</div>
</td>


<td valign="top" width="90%">
<div class="faq_question">
Terms & Conditions
</div>

<div class="faq_answer">
To pay via the i-pay payment method, here are a list of things to note before processing a payment via the i-pay platform

<ul class="sidebar_links_ipay">
<li>A <span class="email">15%</span> of the total charged fee will be added to your payment, for example, 
<span class="email">15%</span> of <span class="email"> ₦2800</span> is <span class="email">₦420</span> and resultantly, the total charged fee is now <span class="email"> ₦3220</span>
</li>

<li>
Balance of the total charged fee must be paid before the delivery of the service to the customer who placed 
the order. 
Note that failure to pay up the balance of the charged fee will lead to service discard.
</li>

<li><span class="email">70%</span> of the total charged fee is what you'll pay first, followed by
the balance upon completion of the requested service. using the above example, <span class="email">70%</span> of <span class="email"> ₦3220</span> is <span class="email">  ₦2254</span>
</li>

</ul>
</div>

</td>
</tr>


</table>

	
	</center>
	</div>
	<div class="clear" />
	<br>
	
	
<?php
	include '../footer.php' ;
	