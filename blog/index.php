<?php
	//blog
	include '../header.php';
	$link = 'Blog';
	echo '<br>';
	echo '<br>';
	echo '<br>';
	include '../nav/blog_nav.php';
?>

<div class="page_wrapper_sub">

<table width="100%" cellpadding="10">
<tr bgcolor="">
<td align="center" valign="top" class="responsive" width="70%">
<div class="blog_wrapper">

<div class="post-title">
EU Copyright Vote: A Critical Juncture for the Open Internet
</div>


<div class="post-body">
<?php 
echo chop_string('
Back in June, we blogged about the draft EU copyright proposal which is currently making its way through the legislative process in Brussels.  We outlined how under one of the more controversial provisions within the draft Directive, Article 13, certain Internet platforms could be held legally responsible for any copyright content that their users upload and would effectively have to turn to automated filtering solutions to remove infringing content at the point of user upload. Moreover, in order to avoid potential legal liability, it is widely expected that content sharing providers would err on the side of caution and remove excessive amounts of content, resulting in a form of online censorship.

Since that blogpost, the European Parliament Plenary narrowly voted on 5th July to reject the proposal tabled by the Legal Affairs (JURI) Committee and a mandate to negotiate, and now the proposed Directive will undergo a full discussion and rescheduled vote in the next Plenary meeting on 12th September. This was a fantastic outcome, thanks in large part to a groundswell of support from those who value the fundamental right of freedom of expression online. It has presented a window of opportunity to correct the deeply flawed approach to copyright reform in Europe and find a more balanced solution. Campaigning has continued throughout the summer period and MEPs are now set to vote again on a proposal that has heavy consequences for the open Internet if passed in its current form.

What is at stake?

Widespread disruption to the web
The Article 13 proposal has an incredibly broad reach in terms of who can be impacted. We face a scenario in which not only the large content sharing platforms, such as Facebook and YouTube, but other businesses involved in storing and giving access to material uploaded by users - music, pictures and videos - will be forced to try and conclude licensing agreements with rights-holders, and could have to resort to content surveillance and removal activities to protect their business. This could include blogging and discussion platforms. This could also potentially impact Cloudflare and its ability to innovate in the European market with new services that offer a storage component.

Your freedoms and rights
The proposal threatens the freedom of expression and information and upsets the balance of rights that has been so important to Internet innovation. Creators, users and independent businesses alike - any content that is uploaded may be deleted without your consent by Internet providers anxious not to incur legal liability. The right to freedom to access information and the right to conduct a business', 300) ?>

</div>

<!-- datas -->
<table width="100%" cellpadding="10">
<tr bgcolor="yellow">
<td width="25%">
<i class="fa fa-eye"></i>
</td>

<td width="25%">

</td>

<td width="25%">

</td>

<td width="25%">

</td>
</tr>
</table>


</div><!-- l -->
</td>


<td align="center" class="responsive" valign="top" width="30%">
<div class="blog-side">
sidebar
</div>
</td>

</tr>
</table>
<br>
<br>


</div><!-- m -->
<?
	include '../footer.php';