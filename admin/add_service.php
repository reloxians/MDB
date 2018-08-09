<?php
	$link = 'add_service';
	include '../security/admin_check.php';
	include '../header.php';
	include '../parallax.php';
	include '../nav/admin_nav.php';
	?>
	
	<div class="page_wrapper_sub">
	
	<div class="page_intro">
			Add a new service to the list of services 		
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
<option value="app_service">App Service</option>
<option value="website_service">Web Service</option>
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
<form id="app_service" action="add_service.inc.php" method="POST">
<input name="username" type="text" placeholder="Username" required="required" />

<div class="forbidden_class_wrapper">			
			<div class="forbidden_class">
<i class="fa fa-warning"></i> The username you entered has been used, please fix this error before proceeding with the signup process
			</div>
</div>

			<input name="service" type="hidden" value="app" />

			<input name="email" type="hidden" placeholder="Email" required="required" />	
		
			<input name="service_name" type="text" placeholder="Service Name" required="required" />	
			<br>
							
			<input name="type" type="text" placeholder="Type" value="App" required="required" />

			<input name="fee" type="number" placeholder="One Time Fee" required="required" />
			
			<input type="submit" value="Save" name="submit" />

</form>

<!-- second child form starts -->

<form id="website_service" style="display: none;" action="add_service.inc.php" method="POST">
<input name="username" type="text" placeholder="Username" required="required" />

<div class="forbidden_class_wrapper">			
			<div class="forbidden_class">
<i class="fa fa-warning"></i> The username you entered has been used, please fix this error before proceeding with the signup process
			</div>
</div>

			<input name="service" type="hidden" value="website" />

			<input name="email" type="hidden" placeholder="Email" required="required" />	
		
			<input name="service_name" type="text" placeholder="Service Name" required="required" />	
			<br>
							
			<input name="type" type="text" placeholder="Type" value="Website" required="required" />
			
			<select name="platform" required="required">
			<option value="">Select an option</option>
			<option value="wordpress">WordPress</option>
			<option value="PHP_based">Full PHP</option>
			</select>
			
			<input name="expiration" type="datetime-local" placeholder="Expiration Date" required="required" />
			
			<input name="fee" type="number" placeholder="Renewal Fee" required="required" />
			
			<input type="submit" value="Save" name="submit" />


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