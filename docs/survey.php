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
	<br></br>
	
	<script type="text/javascript">
			
//submit.js

$(document).ready(function() {
	
	$("#ajax_form").submit(function(event){
		
		event.preventDefault();
		
		var username = $("#username").val() ;
		var firstname = $("#firstname").val() ;
		var lastname = $("#lastname").val() ;
		var email = $("#email").val() ;
		var submit = $("#submit").val() ;
		
		$("#notification").load("survey.inc.php", {
			username: username,
			firstname: firstname,
			lastname: lastname,
			email: email,
			submit: submit
			
		}) ;
	
	});

});
	
	</script>
	
	
	
	<form id="ajax_form"  action="survey.inc.php" method="POST">
	<input type="text" id="username" name="username" placeholder="Username" />
	<input type="text" id="firstname" name="firstname" placeholder="Firstname" />
	<input type="text" id="lastname" name="lastname" placeholder="Lastname" />
	<input type="email" id="email" name="email" placeholder="E-mail" />
	<input type="submit" id="submit" value="submit" />
	
	<div id="notification"></div>
	
	</form>
	
		
	
	</div><!-- wrapper ends -->
	
	<?
	include '../footer.php' ;