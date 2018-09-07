<?php
	//plus services
	$link = 'function' ;
	include '../../security/admin_check.php' ;
	include '../../database/database.php' ;
	include '../../header.php' ;
	echo '<br>';
	echo '<br>';
	echo '<br>';
	include '../../nav/admin_nav.php' ;
	
	?>
	
	<div class="page_wrapper_sub">

<table width="100%" cellpadding="5">
<tr bgcolor="">
<td valign="top" width="50%">
<form id="app_service" action="plus.inc" method="POST">
<input name="username" type="text" placeholder="Username" required="required" />

<input name="service" type="hidden" value="app" />

<input name="email" type="hidden" placeholder="Email" required="required" />	
		
<input name="service_name" type="text" placeholder="Service Name" required="required" />	
<br>
							
<input name="type" type="text" placeholder="Type" value="App" required="required" />

<input name="fee" type="number" placeholder="One Time Fee" required="required" />
			
<input type="submit" value="Save" name="app" />

</form>

</td>

<td valign="top" width="50%"><!-- 2nd -->
<form id="website_service" action="plus.inc" method="POST">
<input name="username" type="text" placeholder="Username" required="required" />

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
			
			<input type="submit" value="Save" name="website" />


</form>
</td>
</tr>
</table>
	
	</div>
	<?
	include '../../footer.php';