<?php
	$theme_class = 'red';
	session_start();
	include '../header_no_nav.php' ;
	include '../parallax.php' ;
	
	if(isset($_SESSION['username'])) {
		include '../database/database.php' ;
		include '../nav/profile_nav.php' ;	
	}

	?>
	
	<div class="page_wrapper_sub">
	<!-- faq starts -->

<table width="100%" cellpadding="10">
<tr bgcolor="">
<td valign="top" class="responsive" width="50%">	

<table cellpadding="5" width="100%"><!-- inner tab -->
<tr bgcolor="">
<td align="center" valign="top" bgcolor="" width="10%">
<div class="quest_wrapper">
?
</div>
</td>


<td valign="top" width="90%">
<div class="faq_question">
Do you host websites and domains?
</div>

<div class="faq_answer">
We currently do not have a hosting equiptments, we are just a group of developers that work hand in hand to deliver your expected result. Nevertheless, we are in partnership with some renouned hosting companies like <a href="#">Bluehost</a>, <a href="#">Godaddy</a> & other top hosting companies.
</div>
</td>
</tr>
</table>

<!-- next -->

<table cellpadding="5" width="100%"><!-- inner tab -->
<tr bgcolor="">
<td align="center" valign="top" bgcolor="" width="10%">

<div class="quest_wrapper">
?
</div>
</td>


<td valign="top" width="90%">
<div class="faq_question">
Do you employ stack developers?
</div>

<div class="faq_answer">
We currently do not have a room for developers as our company is currently running over 50+ active developers
</div>

</td>


</tr>
</table>

<!-- next -->

<table cellpadding="5" width="100%"><!-- inner tab -->
<tr bgcolor="">
<td align="center" valign="top" bgcolor="" width="10%">

<div class="quest_wrapper">
?
</div>
</td>


<td valign="top" width="90%">
<div class="faq_question">
Can i pay for services installmentally?
</div>

<div class="faq_answer">
For the sake of insufficient cash or any other financial impedement, we allow payment of <span class="email">70%</span> of the charged fee which can be made via the <a class="" href="../../i-pay/">i-pay payment</a> platform. 
<br>
<br>
Note: A service fee of <span class="email">15%</span> of the charge fee is required on the <a href="../../i-pay/">i-pay</a> platform 
</div>

</td>
</tr>
</table>


<table class="" cellpadding="5" width="100%"><!-- inner tab -->
<tr bgcolor="">
<td align="center" valign="top" bgcolor="" width="10%">

<div class="quest_wrapper">
?
</div>
</td>

<td valign="top" width="90%">
<div class="faq_question">
When are your working days?
</div>

<div class="faq_answer">
We work Monday - Friday from 6am  - 10pm daily 
</div>

</td>
</tr>
</table>



</td>

<!-- right side starts -->

<td valign="top" class="responsive" width="50%">


<table class="" cellpadding="5" width="100%"><!-- inner tab -->
<tr bgcolor="">
<td align="center" valign="top" bgcolor="" width="10%">

<div class="quest_wrapper">
?
</div>
</td>


<td valign="top" width="90%">
<div class="faq_question">
How do we get updates on services?
</div>

<div class="faq_answer">
We get our clients updated regularly on service expiration dates, new inventions on our platform,
 tips for making their online businesses go far and get better.
</div>

</td>
</tr>
</table>


<table class="" cellpadding="5" width="100%"><!-- inner tab -->
<tr bgcolor="">
<td align="center" valign="top" bgcolor="" width="10%">

<div class="quest_wrapper">
?
</div>
</td>

<td valign="top" width="90%">
<div class="faq_question">
How long will it take to complete a requested service?
</div>

<div class="faq_answer">
All <b>web development</b> services are brought to completion within 14 working days, except for special projects that
require a lot of time for completion
</div>

</td>
</tr>
</table>



</td>
</tr>
</table>
	
	</div><!-- wrapper ends -->
	
	
<?
	include '../footer.php' ;