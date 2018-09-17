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
	<!-- search -->
	<center>
	<form action="search" method="POST">
	<table width="100%" cellpadding="5">
	<tr bgcolor="">
	<td width="90%">
	<input type="search" name="search" placeholder="         Search Services" required="required" />
	</td>
	<td align="left" bgcolor="" width="10%">
	<button class="search-btn" type="submit" name="submit"><i class="fa fa-search"></i></button>
	</td>
	</tr>
	</table>
	</form>
	</center>
	<!-- search ends -->
	
	
	<table width="100%" cellpadding="10">
	<tr bgcolor="">
	<td class="white-chart-cards responsive" width="30%">
	<a class="card_act" href="plus"><!-- card act -->
	<table width="100%" cellpadding="5"><!-- inner -->
	<tr bgcolor="">
	<td width="30%">
	<div class="yellow-plastic">
	<i class="fa fa-plus"></i>
	</div>
	</td><!-- icon -->
	
	<td align="right" valign="" width="70%">
	<span class="card_info">
	Add Service
	</span>
	
	<div class="card_info_val">
	<?
	$se = "select * from active_service";
	$ru = mysqli_query($connect, $se);
	$cn = mysqli_num_rows($ru);
	
	echo $cn ;
	
	?>
	</div>
	</td>
	</tr>
	</table><!-- inner -->
	</a><!-- card act ends -->
	</td>
	
	<td class="white-chart-cards responsive" width="30%">
	<a class="card_act" href="prices"><!-- card act -->
	<table width="100%" cellpadding="5"><!-- inner -->
	<tr bgcolor="">
	<td width="30%">
	<div class="pink-plastic">
	<i class="fa fa-euro"></i>
	</div>
	</td><!-- icon -->
	
	<td align="right" valign="" width="70%">
	<span class="card_info">
	Price Modification
	</span>
	
	<div class="card_info_val">
	<?
	$se = "select * from prices";
	$ru = mysqli_query($connect, $se);
	$cn = mysqli_num_rows($ru);
	
	echo $cn ;
	
	?>
	</div>
	</td>
	</tr>
	</table><!-- inner -->
	</a><!-- card act ends -->
	</td>
	
	
	<td class="white-chart-cards responsive" width="30%">
	<a class="card_act" href="applicant"><!-- card act -->
	<table width="100%" cellpadding="5"><!-- inner -->
	<tr bgcolor="">
	<td width="30%">
	<div class="blue-plastic">
	<i class="fa fa-code"></i>
	</div>
	</td><!-- icon -->
	
	<td align="right" valign="" width="70%">
	<span class="card_info">
	Job Applicants
	</span>
	
	<div class="card_info_val">
	<?
	$se = "select * from job_applicant";
	$ru = mysqli_query($connect, $se);
	$cn = mysqli_num_rows($ru);
	
	echo $cn ;
	
	?>
	</div>
	</td>
	</tr>
	</table><!-- inner -->
	</a><!-- card act ends -->
	</td>
	
	</tr>
	</table>
	<br>
	
	<table width="100%" cellpadding="">
	<tr bgcolor="">
	<td valign="top" width="50%">
	<form action="price.inc.php" method="POST">
	<select name="item_name" required="">
	<option value=""></option>
	<option value="Standard Corporate">Standard Corporate</option>
	<option value="Basic Corporate">Basic Corporate</option>
	<option value="S-E-Commerce">S-E-Commerce</option>
	<option value="B-E-Commerce">B-E-Commerce</option>
	<option value="Pro church pack">Pro church pack</option>
	<option value="Basic Church pack">Basic Church pack</option>
	<option value="Pro Business">Pro Business</option>
	<option value="Basic Business">Basic Business</option>
	<option value="Standard Q&A">Standard Q&A</option>
	<option value="Basic forum">Basic forum</option>
	<option value="wordpress full">wordpress full</option>
	<option value="wordpress design">wordpress design</option>
	</select>
	</td>
	
	
	
	
	<td valign="top" width="50%">
	<input type="number" name="item_price" required="required" placeholder="item price" />
	
	<input type="submit" name="submit" value="submit" />
	<input type="reset" name="reset" value="reset" />
	</form>
	
	</td>
	</tr>
	</table>
	
	</div>
	
	<?
	include '../../footer.php';