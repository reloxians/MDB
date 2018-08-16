<?php 
	// Services INDEX
	
	session_start();
	
	$link = 'i-pay' ;
	$active = 'android' ;
	$me = $_SESSION['username'];
	
	include '../database/database.php' ;
	include '../security/auth_check.php' ;
	
	$sel = "select * from users where username='$me' " ;
	$sel_cmd = mysqli_query($connect, $sel);
	$sel_res = mysqli_fetch_assoc($sel_cmd);
	
	
		
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
	
	
	
	
	
	
	
<table width="100%">
<tr bgcolor="">
<td class="invisible" width="20%">
</td>

<td width="60%">

<!-- controller class -->

<center>

<div class="form_class">
<form id="controller" action="confirm" method="POST">

<select name="product" required="required">
<option value="">Select what you are paying for</option>
<option value="s-e-commerce">Standard E-commerce</option>
<option value="b-e-commerce">Basic E-commerce</option>
<option value="s-coporate">Standard Coporate</option>
<option value="b-coporate">Basic Coporate</option>
<option value="pro-church">Pro Church Pack</option>
<option value="b-church">Basic Church Pack</option>
<option value="pro-business">Pro Business</option>
<option value="b-business">Basic Business</option>
<option value="s-qanda">Standard QandA</option>
<option value="b-qanda">Basic QandA</option>
</select>

<div class="forbidden_class_wrapper">			
			<div class="forbidden_class">
<i class="fa fa-warning"></i> Please endeavour to select the right option, as this may lead to a incorrect record entry
			</div>
</div>

<input type="submit" name="submit" value="Next" />

</form>
</div>

</center>


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

	
	
	
	

	
	</center>
	</div>
	<div class="clear" />
	<br>
	
	
<?php
	include '../footer.php' ;
	