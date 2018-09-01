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
	
	$sel = "select * from job_applicant order by id DESC limit 10";
	$cmd = mysqli_query($connect, $sel);
	
	while($inf = mysqli_fetch_assoc($cmd)) {
	$user = $inf['username'];
		?>
	
	<table class="white-chart-cards" width="100%" cellpadding="10">
	<tr bgcolor="">
	<td class="responsive -chart-cards" width="30%">
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
	
	<td valign="top" class="responsive" width="60%">
	<!-- skills -->
	<? 
	$skill = explode(',', $inf['skills']);
	
	if(!empty($skill['0'])) {echo '<span class="skill space-5">' .$skill['0'].'</span>'; }
	if(!empty($skill['1'])) {echo '<span class="skill space-5">' .$skill['1'].'</span>'; }
	if(!empty($skill['2'])) {echo '<span class="skill space-5">' .$skill['2'].'</span>'; }
	if(!empty($skill['3'])) {echo '<span class="skill space-5">' .$skill['3'].'</span>'; }
	if(!empty($skill['4'])) {echo '<span class="skill space-5">' .$skill['4'].'</span>'; }
	if(!empty($skill['5'])) {echo '<span class="skill space-5">' .$skill['5'].'</span>'; }
	if(!empty($skill['6'])) {echo '<span class="skill space-5">' .$skill['6'].'</span>'; }
	if(!empty($skill['7'])) {echo '<span class="skill space-5">' .$skill['7'].'</span>'; }
	if(!empty($skill['8'])) {echo '<span class="skill space-5">' .$skill['8'].'</span>'; }
	
	?>
	<!-- Q&A -->
	<table width="100%" cellpadding="5">
	<div class="survey_quest skills">
	How many years have you worked with these languages?
	</div>
	
	<tr class="" bgcolor="">
	
	<td width="80%">	
	<div class="survey_ans">
	<?
	$get = "select * from job_applicant where username = '$user' ";
	$get_res = mysqli_query($connect, $get);
	$in = mysqli_fetch_assoc($get_res);
	
	echo $in['working_years'];
	
	?>
	</div>	
	</td>
	
	</tr>
	</table><!--inner ends -->
	
	
	<!-- Q&A -->
	<table width="100%" cellpadding="5">
	<div class="survey_quest skills">
	What can you do if you are employed?
	</div>
	
	<tr class="" bgcolor="">
	
	<td width="80%">	
	<div class="survey_ans">
	<?
	$get = "select * from job_applicant where username = '$user' ";
	$get_res = mysqli_query($connect, $get);
	$in = mysqli_fetch_assoc($get_res);
	
	echo $in['department'];
	
	?>
	</div>	
	</td>
	
	</tr>
	</table><!--inner ends -->
	
	</td>
	

	</tr>
	</table>
	
		<?
		
		}
		
		?>
	
	
	</div><!-- wrapper end -->	
	<?
	include '../../footer.php' ;