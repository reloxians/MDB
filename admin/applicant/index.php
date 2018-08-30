<?php
	//applicant 
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
	
	<table width="100%" cellpadding="10">
	<tr bgcolor="">
	<td class="white-chart-cards responsive" width="30%">
	<a class="card_act" href="applicant"><!-- card act -->
	<table width="100%" cellpadding="5"><!-- inner -->
	<tr bgcolor="">
	<td width="30%">
	<div class="yellow-plastic">
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
	
	<td class="white-chart-cards responsive" width="30%">
	<a class="card_act" href="applicant"><!-- card act -->
	<table width="100%" cellpadding="5"><!-- inner -->
	<tr bgcolor="">
	<td width="30%">
	<div class="pink-plastic">
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
	
	<!-- 2 -->
	
	<?
	
	$sel = "select * from job_applicant order by id DESC";
	$cmd = mysqli_query($connect, $sel);
	
	while($inf = mysqli_fetch_assoc($cmd)) {
		?>
	
	<table class="white-chart-cards" width="100%" cellpadding="10">
	<tr bgcolor="">
	<td class="responsive pink-chart-cards" width="30%">
	<!-- inner -->
	<table width="100%" cellpadding="5">
	<tr>
	<td valign="center" width="30%">
		<img  style="border-radius: 3px;" src="/media/images/applicant/<? echo $inf['potrait']?>" width="100%" />
	</td>
	
	<td align="right" valign="center" width="70%">
	<div class="card_info">
	<? echo $inf['firstname']?> <? echo $inf['lastname']?>
	</div>	
	
	<div class="card_info">
	<a class="card_act grey" href="mailto:<? echo $inf['email']?>"><? echo $inf['email']?></a>
	</div>	
	
	<!-- flag -->
	<table cellpadding="5">
	<tr>
	<td align="right" width="%">
	<span class="card_info">
	<img src="/media/images/country/svg/<? echo $inf['country']?>.svg" width="20%" />
	</span>
	</td>
	<td align="right" width="%">
	<span class="card_info">
	<? echo $inf['country']?>
	</span>
	</td>
	</tr>
	</table>
	
	<div class="card_info_val">
	<? echo now($inf['created'])?>
	</div>
		
	</td>
	</tr>
	</table>
	<!-- inner ends -->
	</td>
	
	<td class="responsive" width="30%">
	@@@
	</td>
	
	<td class="responsive" width="30%">
	@@@
	</td>
	</tr>
	</table>
	
		<?
		
		}
		
		?>
	
	
	</div><!-- wrapper end -->	
	<?
	include '../../footer.php' ;