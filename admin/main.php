<?php
	$link = 'stats';
	include '../security/admin_check.php';
	include '../database/database.php' ;
	include '../header.php';
	echo '<br>' ;
	echo '<br>' ;
	echo '<br>' ;
	include '../nav/admin_nav.php';
	?>
	
	<?
		
		$chk = "select * from active_service where reminded < 5 ";
		$chk_cmd = mysqli_query($connect, $chk);
		$count_active = mysqli_num_rows($chk_cmd);
	
		$chk0 = "select * from cart_order";
		$chk_cmd0 = mysqli_query($connect, $chk0);
		$count_pending = mysqli_num_rows($chk_cmd0);
	
		$chk1 = "select * from active_service where reminded = 4 ";
		$chk_cmd1 = mysqli_query($connect, $chk1);
		$count_reminded = mysqli_num_rows($chk_cmd1);
		
		$chk2 = "select * from active_service where reminded = 5 ";
		$chk_cmd2 = mysqli_query($connect, $chk2);
		$count_expired = mysqli_num_rows($chk_cmd2);
	
		$chk3 = "select * from renew_service";
		$chk_cmd3 = mysqli_query($connect, $chk3);
		$count_renew = mysqli_num_rows($chk_cmd3);
		
		$count_total = $count_active + $count_pending + $count_reminded + $count_expired ;
		
	 ?>
		
	<div class="page_wrapper_sub">
	<!-- T section -->
	
	<table width="100%" cellpadding="5">
	<tr bgcolor="">
	<td class="responsive" width="50%">
	<div class="white-chart-cards">
	<canvas id="myChart" width="200" height="100"></canvas>
	</div>
	</td>
		
	
	<td class="responsive" width="50%">
	<div class="pink-chart-cards">
	<canvas id="line-chart" width="200" height="100"></canvas>
	</div>
	</td>
	
	</tr>
	</table>
	

	
	
	<script> 
		var ctx = document.getElementById("myChart"); 
		Chart.defaults.global.hover.mode = 'nearest';
		var myChart = new Chart(ctx, { 
			type: 'bar', 
			data: { 
				labels: ["Active", "Pending", "Reminded", "Expired", "Renew", "Total"], 
				datasets: [{ 
					label: 'Statistical values of services', 
					data: [<? echo $count_active ?>, <? echo $count_pending ?>, <? echo $count_reminded ?>, <? echo $count_expired ?>, <? echo $count_renew ?>, <? echo $count_total ?>], 
					backgroundColor: [ 
															 'rgba(255, 99, 132, 0.2)', 
															 'rgba(54, 162, 235, 0.2)', 
															 'rgba(255, 206, 86, 0.2)', 
															 'rgba(75, 192, 192, 0.2)', 
															 'rgba(153, 102, 255, 0.2)', 
															 'rgba(255, 159, 64, 0.2)' 
															 ], 
															 
					borderColor: [ 
															'rgba(255,99,132,1)', 
															'rgba(54, 162, 235, 1)', 
															'rgba(255, 206, 86, 1)', 
															'rgba(75, 192, 192, 1)', 
															'rgba(153, 102, 255, 1)', 
															'rgba(255, 159, 64, 1)' 
												 ], 
												 
					borderWidth: 1 
												}] 
											}, 
						
					options: {
				
						scales: {
						
							yAxes: [{
							
									ticks: { beginAtZero:true }
							
											}]
						
									}
							
							}
								
							}); 
					
					</script>
					
					
					
					
	<script> 
		var ctx = document.getElementById("line-chart");
	//	Chart.defaults.global.defaultFontColor = '';
		var myLineChart = new Chart(ctx, { 
			type: 'line', 
			data: {
							labels: ["Active", "Pending", "Reminded", "Expired", "Renew", "Total"],
							datasets: [{
								label: 'Statistical values of services',
								data: [<? echo $count_active ?>, <? echo $count_pending ?>, <? echo $count_reminded ?>, <? echo $count_expired ?>, <? echo $count_renew ?>, <? echo $count_total ?>], 
								
								
								backgroundColor: [
																		
															 'rgba(255, 99, 132, 0.2)', 
															 
								
																		],
								borderColor: [
																
															 'rgba(255,99,132,1)', 
															 
								
															],
															
								pointBackgroundColor: [
								
															 'rgba(255, 255, 255, 0.9)', 
								
															],
								
								
															
								borderWidth: 1
								
								
								}],
							},
										
				
				options: {
				
						scales: {
						
							yAxes: [{
							
									ticks: { beginAtZero:true }
							
											}]
						
									}
							
							}
			
			});
		
	</script>
	
	<div class="pad-10"><!-- wrapper -->
	<table width="100%" cellpadding="10">
	<tr bgcolor="">
	<td class="white-chart-cards responsive" width="30%">

	<table width="100%" cellpadding="5"><!-- inner -->
	<tr bgcolor="">
	<td width="30%">
	<div class="red-plastic">
	<i class="fa fa-user-o"></i>
	</div>
	</td><!-- icon -->
	
	<td align="right" valign="" width="70%">
	<span class="card_info">
	Total Users
	</span>
	
	<div class="card_info_val">
	<?
	$dd = "select * from users";
	$run = mysqli_query($connect, $dd);
	$run_count = mysqli_num_rows($run); 
	
	echo $run_count ;
	
	?>
	</div>
	
	</td>
	</tr>
	</table><!-- inner -->
	</td>
	
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
	<table width="100%" cellpadding="5"><!-- inner -->
	<tr bgcolor="">
	<td width="30%">
	<div class="green-plastic">
	<i class="fa fa-usd"></i>
	</div>
	</td><!-- icon -->
	
	<td align="right" valign="" width="70%">
	<span class="card_info">
	Total Revenue
	</span>
	
	<div class="card_info_val">
	<?
	$mth = mysqli_query($connect, "select sum(price) as prices from cart_order");
	$row = mysqli_fetch_assoc($mth); 
	$total0 = $row['prices'];
	
	$mth = mysqli_query($connect, "select sum(price) as prices from ipay");
	$row = mysqli_fetch_assoc($mth); 
	$total1 = $row['prices'];
	
	$mth = mysqli_query($connect, "select sum(balance) as prices from ipay_balance");
	$row = mysqli_fetch_assoc($mth); 
	$total2 = $row['prices'];
	
	$mth = mysqli_query($connect, "select sum(charge) as prices from app_service_request");
	$row = mysqli_fetch_assoc($mth); 
	$total3 = $row['prices'] / 100 ;
	
	$mth = mysqli_query($connect, "select sum(charge) as prices from website_service_request");
	$row = mysqli_fetch_assoc($mth); 
	$total4 = $row['prices'] / 100 ;
	
	
	$total = $total0 + $total1 + $total2 + $total3 + $total4;
	
	echo '₦'.number_format($total);
	
	?>
	</div>
	
	
	</td>
	</tr>
	</table><!-- inner -->
	</td>
	
	</tr>
	</table>
	</div><!-- wrapper ends -->
	
	<!-- survey -->
	<div class="white-chart-cards pad-15"><!-- pad wrapper -->
	
	<div class="card_title">Survey Statistics</div>
	
	<table width="100%" cellpadding="5">
	
	<div class="survey_quest">
	How did you come across this website?
	</div>
	
	<tr class="" bgcolor="">
	
	<td width="80%">	
	<div class="survey_ans">
	Throung a friend
	</div>
	</td>
	
	<td align="right" width="20%">
	<?
	$sel = "select * from survey where source_answer = 'Throung a friend' ";
	$sel_cmd = mysqli_query($connect, $sel);
	$count_ans = mysqli_num_rows($sel_cmd);
	?>
	
	<div class="survey_ans">
	<span class="email"><? echo $count_ans ?></span><? if($count_ans < 2 ) {echo ' Time';} else {echo ' Times';} ?> Selected
	</div>
	</td>
	</tr>
	
	<tr class="" bgcolor="">
	
	<td width="80%">	
	<div class="survey_ans">
	Via an advert
	</div>
	</td>
	
	<td align="right" width="20%">
	<?
	$sel = "select * from survey where source_answer = 'Via an advert' ";
	$sel_cmd = mysqli_query($connect, $sel);
	$count_ans = mysqli_num_rows($sel_cmd);
	?>
	
	<div class="survey_ans">
	<span class="email"><? echo $count_ans ?></span><? if($count_ans < 2 ) {echo ' Time';} else {echo ' Times';} ?> Selected
	</div>
	</td>
	
	</tr>
	
	<tr class="" bgcolor="">
	
	<td width="80%">	
	<div class="survey_ans">
	Stumbled upon it
	</div>
	</td>
	
	<td align="right" width="20%">
	<?
	$sel = "select * from survey where source_answer = 'Stumbled upon it' ";
	$sel_cmd = mysqli_query($connect, $sel);
	$count_ans = mysqli_num_rows($sel_cmd);
	?>
	
	<div class="survey_ans">
	<span class="email"><? echo $count_ans ?></span><? if($count_ans < 2 ) {echo ' Time';} else {echo ' Times';} ?> Selected
	</div>
	</td>
	
	</tr>
	</table><!-- 1 -->
	
	
	<br>
	
	
	
	<table width="100%" cellpadding="5">
	<div class="survey_quest">
	How long have you been using this website?
	</div>
	
	<tr class="" bgcolor="">
	
	<td width="80%">	
	<div class="survey_ans">
	For a few weeks now
	</div>
	</td>
	
	<td align="right" width="20%">
	<?
	$sel = "select * from survey where time_answer = 'For a few weeks now' ";
	$sel_cmd = mysqli_query($connect, $sel);
	$count_ans = mysqli_num_rows($sel_cmd);
	?>
	
	<div class="survey_ans">
	<span class="email"><? echo $count_ans ?></span><? if($count_ans < 2 ) {echo ' Time';} else {echo ' Times';} ?> Selected
	</div>
	</td>
	</tr>
	
	<tr class="" bgcolor="">
	
	<td width="80%">	
	<div class="survey_ans">
	For a few months now
	</div>
	</td>
	
	<td align="right" width="20%">
	<?
	$sel = "select * from survey where time_answer = 'For a few months now' ";
	$sel_cmd = mysqli_query($connect, $sel);
	$count_ans = mysqli_num_rows($sel_cmd);
	?>
	
	<div class="survey_ans">
	<span class="email"><? echo $count_ans ?></span><? if($count_ans < 2 ) {echo ' Time';} else {echo ' Times';} ?> Selected
	</div>
	</td>
	</tr>
	
	<tr class="" bgcolor="">
	
	<td width="80%">	
	<div class="survey_ans">
	For some years now
	</div>
	</td>
	
	<td align="right" width="20%">
	<?
	$sel = "select * from survey where time_answer = 'For a few years now' ";
	$sel_cmd = mysqli_query($connect, $sel);
	$count_ans = mysqli_num_rows($sel_cmd);
	?>
	
	<div class="survey_ans">
	<span class="email"><? echo $count_ans ?></span><? if($count_ans < 2 ) {echo ' Time';} else {echo ' Times';} ?> Selected
	</div>
	</td>
	</tr>
	
	</table><!-- 2 -->
	
	
	
	<br>
	
	
	
	<table width="100%" cellpadding="5">
	<div class="survey_quest">
	Do you like the quality of services we render here in this website?
	</div>
	
	<tr class="" bgcolor="">
	
	<td width="80%">	
	<div class="survey_ans">
	Yes
	</div>
	</td>
	
	<td align="right" width="20%">
	<?
	$sel = "select * from survey where service_answer = 'Yes' ";
	$sel_cmd = mysqli_query($connect, $sel);
	$count_ans = mysqli_num_rows($sel_cmd);
	?>
	
	<div class="survey_ans">
	<span class="email"><? echo $count_ans ?></span><? if($count_ans < 2 ) {echo ' Time';} else {echo ' Times';} ?> Selected
	</div>
	</td>
	</tr>
	
	<tr class="" bgcolor="">
	
	<td width="80%">	
	<div class="survey_ans">
	To an extent
	</div>
	</td>
	
	<td align="right" width="20%">
	<?
	$sel = "select * from survey where service_answer = 'To an extent' ";
	$sel_cmd = mysqli_query($connect, $sel);
	$count_ans = mysqli_num_rows($sel_cmd);
	?>
	
	<div class="survey_ans">
	<span class="email"><? echo $count_ans ?></span><? if($count_ans < 2 ) {echo ' Time';} else {echo ' Times';} ?> Selected
	</div>
	</td>
	</tr>
	
	<tr class="" bgcolor="">
	
	<td width="80%">	
	<div class="survey_ans">
	Not really
	</div>
	</td>
	
	<td align="right" width="20%">
	<?
	$sel = "select * from survey where time_answer = 'Not really' ";
	$sel_cmd = mysqli_query($connect, $sel);
	$count_ans = mysqli_num_rows($sel_cmd);
	?>
	
	<div class="survey_ans">
	<span class="email"><? echo $count_ans ?></span><? if($count_ans < 2 ) {echo ' Time';} else {echo ' Times';} ?> Selected
	</div>
	</td>
	</tr>
	
	<tr class="" bgcolor="">
	
	<td width="80%">	
	<div class="survey_ans">
	No
	</div>
	</td>
	
	<td align="right" width="20%">
	<?
	$sel = "select * from survey where time_answer = 'No' ";
	$sel_cmd = mysqli_query($connect, $sel);
	$count_ans = mysqli_num_rows($sel_cmd);
	?>
	
	<div class="survey_ans">
	<span class="email"><? echo $count_ans ?></span><? if($count_ans < 2 ) {echo ' Time';} else {echo ' Times';} ?> Selected
	</div>
	</td>
	</tr>
	</table><!-- 3 -->
	
	
	<br>
	
	
	<table width="100%" cellpadding="5">
	<tr bgcolor="">
	<td width="100%">
	
	<?
	$cc = "select * from survey where rate_answer = 100 ";
	$cmd = mysqli_query($connect, $cc);
	$count_100 = mysqli_num_rows($cmd);
	
	$cc = "select * from survey where rate_answer = 90 ";
	$cmd = mysqli_query($connect, $cc);
	$count_90 = mysqli_num_rows($cmd);
	
	$cc = "select * from survey where rate_answer = 80 ";
	$cmd = mysqli_query($connect, $cc);
	$count_80 = mysqli_num_rows($cmd);
	
	$cc = "select * from survey where rate_answer = 70 ";
	$cmd = mysqli_query($connect, $cc);
	$count_70 = mysqli_num_rows($cmd);
	
	$cc = "select * from survey where rate_answer = 60 ";
	$cmd = mysqli_query($connect, $cc);
	$count_60 = mysqli_num_rows($cmd);
	
	$cc = "select * from survey where rate_answer = 50 ";
	$cmd = mysqli_query($connect, $cc);
	$count_50 = mysqli_num_rows($cmd);
	
	$cc = "select * from survey where rate_answer = 40 ";
	$cmd = mysqli_query($connect, $cc);
	$count_40 = mysqli_num_rows($cmd);
	
	$cc = "select * from survey where rate_answer = 30 ";
	$cmd = mysqli_query($connect, $cc);
	$count_30 = mysqli_num_rows($cmd);
	
	$cc = "select * from survey where rate_answer = 20 ";
	$cmd = mysqli_query($connect, $cc);
	$count_20 = mysqli_num_rows($cmd);
	
	$cc = "select * from survey where rate_answer = 10 ";
	$cmd = mysqli_query($connect, $cc);
	$count_10 = mysqli_num_rows($cmd);
	
	
	?>
	
	<canvas id="rating" height="70"></canvas>
	
	<script> 
		var ctx = document.getElementById("rating");
	//	Chart.defaults.global.defaultFontColor = '';
		var myLineChart = new Chart(ctx, { 
			type: 'line', 
			data: {
							labels: ["100", "90", "80", "70", "60", "50", "40", "30", "20", "10"],
							datasets: [{
								label: 'Statistical values of service ratings',
								data: [<? echo $count_100 ?>, <? echo $count_90 ?>, <? echo $count_80 ?>, <? echo $count_70 ?>, <? echo $count_60 ?>, <? echo $count_50 ?>, <? echo $count_40 ?>, <? echo $count_30 ?>, <? echo $count_20 ?>, <? echo $count_10 ?>], 
								
								
								backgroundColor: [
																		
															'rgba(54, 162, 235, 0.2)', 
															 
								
																		],
								borderColor: [
																
															 'rgba(54, 162, 235, 1.0)', 
															 
								
															],
															
								pointBackgroundColor: [
								
															 'rgba(54, 162, 235, 1.0)', 
								
															],
								
								
															
								borderWidth: 1
								
								
								}],
							},
										
				
				options: {
				
						scales: {
						
							yAxes: [{
							
									ticks: { beginAtZero:true }
							
											}]
						
									}
							
							}
			
			});
		
	</script>
	
	
	</td>
	</tr>		
	</table>
	
	
	<br>
	<br>
	
	
	<table width="100%" cellpadding="5">
	<div class="survey_quest">
	Would you recommend this website to friends and family if the need be?
	</div>
	
	<tr class="" bgcolor="">
	
	<td width="80%">	
	<div class="survey_ans">
	Yes
	</div>
	</td>
	
	<td align="right" width="20%">
	<?
	$sel = "select * from survey where recommend_answer = 'Yes' ";
	$sel_cmd = mysqli_query($connect, $sel);
	$count_ans = mysqli_num_rows($sel_cmd);
	?>
	
	<div class="survey_ans">
	<span class="email"><? echo $count_ans ?></span><? if($count_ans < 2 ) {echo ' Time';} else {echo ' Times';} ?> Selected
	</div>
	</td>
	</tr>
	
	<tr class="" bgcolor="">
	
	<td width="80%">	
	<div class="survey_ans">
	Maybe
	</div>
	</td>
	
	<td align="right" width="20%">
	<?
	$sel = "select * from survey where recommend_answer = 'Maybe' ";
	$sel_cmd = mysqli_query($connect, $sel);
	$count_ans = mysqli_num_rows($sel_cmd);
	?>
	
	<div class="survey_ans">
	<span class="email"><? echo $count_ans ?></span><? if($count_ans < 2 ) {echo ' Time';} else {echo ' Times';} ?> Selected
	</div>
	</td>
	</tr>
	
	<tr class="" bgcolor="">
	
	<td width="80%">	
	<div class="survey_ans">
	No
	</div>
	</td>
	
	<td align="right" width="20%">
	<?
	$sel = "select * from survey where recommend_answer = 'No' ";
	$sel_cmd = mysqli_query($connect, $sel);
	$count_ans = mysqli_num_rows($sel_cmd);
	?>
	
	<div class="survey_ans">
	<span class="email"><? echo $count_ans ?></span><? if($count_ans < 2 ) {echo ' Time';} else {echo ' Times';} ?> Selected
	</div>
	</td>
	</tr>
	</table><!-- 5 -->
	
	
	<br>
	
	
	</div><!-- pad wrapper ends -->
	</div><!-- main wrapper ends -->
	
	<?php
		include '../footer.php';
	
	