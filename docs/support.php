<?php
	session_start();
	include '../header.php' ;
	include '../parallax.php' ;
	include '../security/auth_check.php' ;
	
	$me = $_SESSION['username'];
	
	if(isset($_SESSION['username'])) {
		include '../database/database.php' ;
		include '../nav/profile_nav.php' ;	
		
	}

	?>
	
	<div class="page_wrapper_sub">
	
		<!--  svg section -->
	
	<table width="100%" cellpadding="10">
	<tr bgcolor="">
	<td width="50%">
	
	<!-- inner table -->
<table cellpadding="5" width="100%"><!-- inner tab -->
<tr bgcolor="">
<td align="center" valign="top" bgcolor="" width="10%">

<div class="quest_wrapper">
!
</div>
</td>


<td valign="top" width="90%">
<div class="faq_question">
Having any technical challenge?
</div>

<div class="faq_answer">
We are here to assist our clients with any problem or complains not stated in the <a href="faq.php">FAQ</a>
section of this website
</div>

</td>


</tr>
</table>
	
	
	
	</td>
	
	<td align="center" width="50%">
	<img class="disabled" src="/media/images/support.svg" width="35%" />
	</td>
	</tr>
	</table>
	
	<br>
	
	
	
	<table width="100%">
	<tr>
	<td width="20%" class="invisible">
	
	</td>
	<td align="center" width="60%">
	<form action="support.inc.php" method="POST">
	
	<input type="text" name="email" placeholder="support@reloxians.com" readonly="" />
	
	<input type="text" name="username" value="<? echo $me ?>" readonly="" />
	<textarea name="message" rows="10" placeholder="Enter your message" required=""></textarea>
	
	<input type="submit" name="submit" value="Submit" />
	
	</form>
	
	<div class="agreement">
By clicking "Submit", you acknowledge that you have read our updated <a class="email" href="/tos.php"> terms of service</a>, <a class="email" href="/disclaimer.php">Disclaimer</a> and that your continued use of the website is subject to these policies.
</div>
	
	
	</td>
	
	<td width="20%" class="invisible">
	</td>

	
	</tr>
	</table>
	
	
	
	</div><!-- wrapper -->
	
	
<?
	include '../footer.php' ;