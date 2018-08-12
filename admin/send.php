<?php
	$link = 'send';
	include '../security/admin_check.php';
	include '../header.php';
	include '../parallax.php';
	include '../nav/admin_nav.php';
	?>
	
	<div class="page_wrapper_sub">
	
	<div class="page_intro">
			Send messages to clients
	</div>

<table width="100%">
<tr bgcolor="">
<td class="invisible" width="20%">
</td>

<td width="60%">

<!-- controller class -->

<center>

<div class="form_class">
<form id="controller">

<select id="dynamic_form" required="required">
<option value="single">Single</option>
<option value="bulk">Bulk</option>
</select>

<div class="forbidden_class_wrapper">			
			<div class="forbidden_class">
<i class="fa fa-warning"></i> Please endeavour to select the right option, as this may lead to a incorrect record entry
			</div>
</div>



</form>
</div>

</center>


<!--child forms -->

<center>

<div class="form_class">
<form id="single" action="send.inc.php" method="POST">
<input name="username" type="text" placeholder="Username" required="required" />

<div class="forbidden_class_wrapper">			
			<div class="forbidden_class">
<i class="fa fa-warning"></i> The username you entered has been used, please fix this error before proceeding with the signup process
			</div>
</div>

			<input name="type" type="hidden" value="single"/>

			<input name="title" type="text" placeholder="Title of your message" required="required"/>
			
			<textarea name="msg" rows="10" placeholder="Message Content" required="required"></textarea>
			
			<input type="submit" value="Send" name="submit" />

</form>

<!-- second child form starts -->

<form id="bulk" style="display: none;" action="send.inc.php" method="POST">

<!-- 

<input name="username" type="text" placeholder="Username" required="required" />

-->

<div class="forbidden_class_wrapper">			
			<div class="forbidden_class">
<i class="fa fa-warning"></i> The username you entered has been used, please fix this error before proceeding with the signup process
			</div>
</div>

			<input name="type" type="hidden" value="bulk"/>

			<input name="title" type="text" placeholder="Title of your message" required="required"/>
			
			<textarea name="msg" rows="10" placeholder="Message Content" required="required"></textarea>
			
			<input type="submit" value="Send" name="submit" />


</form>
</div>

</center>

<!-- script for controller -->

<script>
			
	  $("#dynamic_form").on("change", function() { $("#" + $(this).val()).show().siblings().hide();
				 }) 
				
</script>			


</td>

<td class="invisible" width="20%">
</td>
</tr>
</table>
	
	
	</div>
	
<?php
	include '../footer.php' ;