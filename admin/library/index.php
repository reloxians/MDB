<?php
	//library_backend 
	$link = 'function' ;
	include '../../security/admin_check.php' ;
	include '../../database/database.php' ;
	include '../../header.php' ;
	echo '<br>';
	echo '<br>';
	echo '<br>';
	include '../../nav/admin_nav.php' ;
	
	?>
	
		<?
		
		$chk = "select * from book_sales where category = 'ASP.NET' ";
		$chk_cmd = mysqli_query($connect, $chk);
		$count_asp = mysqli_num_rows($chk_cmd);
	
		$chk0 = "select * from book_sales where category = 'PHP' ";
		$chk_cmd0 = mysqli_query($connect, $chk0);
		$count_php = mysqli_num_rows($chk_cmd0);
	
		$chk1 = "select * from book_sales where category = 'CSS' ";
		$chk_cmd1 = mysqli_query($connect, $chk1);
		$count_css = mysqli_num_rows($chk_cmd1);
		
		$chk2 = "select * from book_sales where category = 'JavaScript' ";
		$chk_cmd2 = mysqli_query($connect, $chk2);
		$count_javascript = mysqli_num_rows($chk_cmd2);
	
		$chk3 = "select * from book_sales where category = 'JQuery' ";
		$chk_cmd3 = mysqli_query($connect, $chk3);
		$count_jquery = mysqli_num_rows($chk_cmd3);
		
		$chk3 = "select * from book_sales where category = 'SQL' ";
		$chk_cmd3 = mysqli_query($connect, $chk3);
		$count_sql = mysqli_num_rows($chk_cmd3);
		
		$chk3 = "select * from book_sales where category = 'HTML' ";
		$chk_cmd3 = mysqli_query($connect, $chk3);
		$count_html = mysqli_num_rows($chk_cmd3);
		
		$chk3 = "select * from book_sales where category = 'BootStrap' ";
		$chk_cmd3 = mysqli_query($connect, $chk3);
		$count_bootstrap = mysqli_num_rows($chk_cmd3);
		
		$chk3 = "select * from book_sales where category = 'Ajax' ";
		$chk_cmd3 = mysqli_query($connect, $chk3);
		$count_ajax = mysqli_num_rows($chk_cmd3);
		
		
		$count_total = $count_php + $count_css + $count_ajax + $count_bootstrap + $count_sql + $count_html + $count_javascript + $count_asp + $count_jquery ;
		
		
		/** days time calculation **/
		//vars
		$today = date("Y-m-d");
		$yesterday = date("Y-m-d", strtotime("-1 days"));
		$two_days_ago = date("Y-m-d", strtotime("-2 days"));
		$three_days_ago = date("Y-m-d", strtotime("-3 days"));
		$four_days_ago = date("Y-m-d", strtotime("-4 days"));
		$five_days_ago = date("Y-m-d", strtotime("-5 days"));
		$six_days_ago = date("Y-m-d", strtotime("-6 days"));
		$seven_days_ago = date("Y-m-d", strtotime("-7 days"));
		
		//get entries
		
		$ss = "SELECT * FROM book_sales WHERE date_format(created, '%Y-%m-%d') = '$today' ";
		$cmmm = mysqli_query($connect, $ss);
		$count_today = mysqli_num_rows($cmmm);
		
		$ss = "SELECT * FROM book_sales WHERE date_format(created, '%Y-%m-%d') = '$yesterday' ";
		$cmmm = mysqli_query($connect, $ss);
		$count_yesterday = mysqli_num_rows($cmmm);
		
		$ss = "SELECT * FROM book_sales WHERE date_format(created, '%Y-%m-%d') = '$two_days_ago' ";
		$cmmm = mysqli_query($connect, $ss);
		$count_two_days_ago = mysqli_num_rows($cmmm);
		
		$ss = "SELECT * FROM book_sales WHERE date_format(created, '%Y-%m-%d') = '$three_days_ago' ";
		$cmmm = mysqli_query($connect, $ss);
		$count_three_days_ago = mysqli_num_rows($cmmm);
		
		$ss = "SELECT * FROM book_sales WHERE date_format(created, '%Y-%m-%d') = '$four_day_ago' ";
		$cmmm = mysqli_query($connect, $ss);
		$count_four_days_ago = mysqli_num_rows($cmmm);
		
		$ss = "SELECT * FROM book_sales WHERE date_format(created, '%Y-%m-%d') = '$five_days_ago' ";
		$cmmm = mysqli_query($connect, $ss);
		$count_five_days_ago = mysqli_num_rows($cmmm);
		
		$ss = "SELECT * FROM book_sales WHERE date_format(created, '%Y-%m-%d') = '$six_days_ago' ";
		$cmmm = mysqli_query($connect, $ss);
		$count_six_days_ago = mysqli_num_rows($cmmm);
		
		$ss = "SELECT * FROM book_sales WHERE date_format(created, '%Y-%m-%d') = '$seven_days_ago' ";
		$cmmm = mysqli_query($connect, $ss);
		$count_seven_days_ago = mysqli_num_rows($cmmm);
		
		
	 ?>
	
	<div class="page_wrapper_sub">
	<!-- search -->
	<center>
	<form action="search" method="POST">
	<table width="100%" cellpadding="5">
	<tr bgcolor="">
	<td width="90%">
	<input type="search" name="search" placeholder="         Search Library" required="required" />
	</td>
	<td align="left" bgcolor="" width="10%">
	<button class="search-btn" type="submit" name="submit"><i class="fa fa-search"></i></button>
	</td>
	</tr>
	</table>
	</form>
	</center>
	<!-- search ends -->
	
	
	<!-- chart analysis -->
	<table width="100%" cellpadding="5">
	<tr bgcolor="">
	<td class="responsive" width="50%">
	<div class="white-chart-cards">
	<canvas id="myChart" width="200" height="100"></canvas>
	</div>
	</td>
		
	
	<td class="responsive" width="50%">
	<div class="white-chart-cards">
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
				labels: ["ASP.NET", "PHP", "CSS", "JavaScript", "JQuery", "MySQL", "HTML", "BootStrap", "Ajax", "Total"], 
				datasets: [{ 
					label: 'Book Download Statistics', 
					data: [<? echo $count_asp ?>, <? echo $count_php ?>, <? echo $count_css ?>, <? echo $count_javascript ?>, <? echo $count_jquery ?>, <? echo $count_sql ?>, <? echo $count_html ?>, <? echo $count_bootstrap ?>, <? echo $count_ajax ?>, <? echo $count_total ?>], 
					backgroundColor: [ 
															 'rgba(200, 199, 12, 0.2)', 
															 'rgba(54, 162, 235, 0.2)', 
															 'rgba(255, 206, 86, 0.2)', 
															 'rgba(75, 192, 192, 0.2)', 
															 'rgba(153, 102, 255, 0.2)', 
															 'rgba(255, 159, 64, 0.2)',
															 'rgba(255, 99, 132, 0.2)',
															 'rgba(55, 99, 232, 0.2)',
															 'rgba(123, 99, 232, 0.2)',
															 ], 
															 
					borderColor: [ 
															'rgba(200 ,199 ,12,1)', 
															'rgba(54, 162, 235, 1)', 
															'rgba(255, 206, 86, 1)', 
															'rgba(75, 192, 192, 1)', 
															'rgba(153, 102, 255, 1)', 
															'rgba(255, 159, 64, 1)' ,
															'rgba(255, 99, 132, 1)',
															'rgba(55, 99, 232, 1)',
															'rgba(123, 99, 232, 1)',
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
							labels: ["Today", "Yesterday", "2Days", "3Days", "4Days", "5Days", "6Days", "7Days"],
							datasets: [{
								label: 'Rate Of Downlaods Per Day',
								data: [<? echo $count_today ?>, <? echo $count_yesterday ?>, <? echo $count_two_days_ago ?>, <? echo $count_three_days_ago ?>, <? echo $count_four_days_ago ?>, <? echo $count_five_days_ago ?>, <? echo $count_six_days_ago ?>, <? echo $count_seven_days_ago ?>], 
								
								
								backgroundColor: [
																		
															 'rgba(139, 195, 74, 0.2)', 
															 
								
																		],
								borderColor: [
																
															 'rgba(51,105,30,1)', 
															 
								
															],
															
								pointBackgroundColor: [
								
															 'rgba(51, 105, 30, 0.9)', 
								
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
	
	<!-- 2 -->
	<?
	$see = "select * from books where category='ASP.NET' ";
	$cmda = mysqli_query($connect, $see);
	$count_asp = mysqli_num_rows($cmda);
	
	$see1 = "select * from books where category='PHP' ";
	$cmda = mysqli_query($connect, $see1);
	$count_php = mysqli_num_rows($cmda);
	
	$see1 = "select * from books where category='CSS' ";
	$cmda = mysqli_query($connect, $see1);
	$count_css = mysqli_num_rows($cmda);
	
	$see1 = "select * from books where category='JQuery' ";
	$cmda = mysqli_query($connect, $see1);
	$count_jquery = mysqli_num_rows($cmda);
	
	$see1 = "select * from books where category='BootStrap' ";
	$cmda = mysqli_query($connect, $see1);
	$count_bootstrap = mysqli_num_rows($cmda);
	
	$see1 = "select * from books where category='AJax' ";
	$cmda = mysqli_query($connect, $see1);
	$count_ajax = mysqli_num_rows($cmda);
	
	$see1 = "select * from books where category='JavaScript' ";
	$cmda = mysqli_query($connect, $see1);
	$count_javascript = mysqli_num_rows($cmda);
	
	$see1 = "select * from books where category='SQL' ";
	$cmda = mysqli_query($connect, $see1);
	$count_sql = mysqli_num_rows($cmda);
	
	$see1 = "select * from books where category='HTML' ";
	$cmda = mysqli_query($connect, $see1);
	$count_html = mysqli_num_rows($cmda);
	
	$see1 = "select * from books";
	$cmda = mysqli_query($connect, $see1);
	$count_total = mysqli_num_rows($cmda);
	
	?>
	
	
	
	<div class="pad-10"><!-- wrapper -->
	<div class="orange-chart-cards">
	<canvas id="line-chart-books" width="200" height="50"></canvas>
	</div>
	
		<script> 
		var ctx = document.getElementById("line-chart-books");
	//	Chart.defaults.global.defaultFontColor = '';
		var myLineChart = new Chart(ctx, { 
			type: 'line', 
			data: {
							labels: ["ASP.NET","PHP", "CSS", "JQuery", "BootStrap", "AJax","JavaScript", "SQL", "HTML"],
							datasets: [{
								label: 'Publication Statistics',
								data: [<? echo $count_asp ?>, <? echo $count_php ?>, <? echo $count_css ?>, <? echo $count_jquery ?>, <? echo $count_bootstrap ?>, <? echo $count_ajax ?>, <? echo $count_javascript ?>, <? echo $count_sql ?>, <? echo $count_html ?>], 
								
								
								backgroundColor: [
																		
															 'rgba(255, 111, 0, 0.2)', 
															 
								
																		],
								borderColor: [
																
															 'rgba(255,111,0,1)', 
															 
								
															],
															
								pointBackgroundColor: [
								
															 'rgba(255, 111, 0, 0.9)', 
								
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
	
	
	
	<!-- chart analysis ends -->
	
	<br />
	
	
	<!-- stats 1 -->
	<table width="100%" cellpadding="10">
	<tr bgcolor="">
	<td class="white-chart-cards responsive" width="30%">
	<this class="card_act" href="applicant"><!-- card act -->
	<table width="100%" cellpadding="5"><!-- inner -->
	<tr bgcolor="">
	<td width="30%">
	<div class="yellow-plastic">
	<i class="fa fa-code"></i>
	</div>
	</td><!-- icon -->
	
	<td align="right" valign="" width="70%">
	<span class="card_info">
	Total Publications
	</span>
	
	<div class="card_info_val">
	<?
		
	echo $count_total ;
	
	?>
	</div>
	</td>
	</tr>
	</table><!-- inner -->
	</this><!-- card act ends -->
	</td>
	
	<td class="white-chart-cards responsive" width="30%">
	<this class="card_act" href="applicant"><!-- card act -->
	<table width="100%" cellpadding="5"><!-- inner -->
	<tr bgcolor="">
	<td width="30%">
	<div class="pink-plastic">
	<i class="fa fa-euro"></i>
	</div>
	</td><!-- icon -->
	
	<td align="right" valign="" width="70%">
	<span class="card_info">
	Today's Revenue
	</span>
	
	<div class="card_info_val">
	<?
	$se = "select sum(price) as prices from book_sales where date_format(created, '%Y-%m-%d') = '$today' ";
	$ru = mysqli_query($connect, $se);
	$cn = mysqli_fetch_assoc($ru);
	
	echo '₦'.number_format($cn['prices']) ;
	
	?>
	</div>
	</td>
	</tr>
	</table><!-- inner -->
	</this><!-- card act ends -->
	</td>
	
	
	<td class="white-chart-cards responsive" width="30%">
	<this class="card_act" href="applicant"><!-- card act -->
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
	$se = "select sum(price) as prices from book_sales";
	$ru = mysqli_query($connect, $se);
	$cn = mysqli_fetch_assoc($ru);
	
	echo '₦'.number_format($cn['prices']);
	
	?>
	</div>
	</td>
	</tr>
	</table><!-- inner -->
	</this><!-- card act ends -->
	</td>
	
	</tr>
	</table>
	<br>
	<!-- stats 1 ends -->
	
	
	<!-- listing starts -->
	<form action="insert" method="POST" enctype="multipart/form-data">
	<table width="100%" cellpadding="">
	<tr bgcolor="">
	<td valign="top" align="left" width="50%" class="responsive">
	
	<div class="infomat">
	Select the PDF file and the cover photo of the document you are uploading
	</div>
	
	<input name="cover_pdf[]" type="file" required="required" multiple />	
	
	<!--
	
	<div class="infomat">
	Select the PDF document first before selecting the cover photo of the document
	</div>
	
	
	<input name="docx" type="file"/>	
	
	-->
	
	<input name="title" type="text" placeholder="Enter The Title of Your E-Book" required />
	
	</td>
	
	<td valign="top" align="right" width="50%" class="responsive">
	<select name="category" required />
	<option value="">Select an option</option>
	<option value="HTML">HTML</option>
	<option value="CSS">CSS</option>
	<option value="AJax">AJax</option>
	<option value="JavaScript">JavaScript</option>
	<option value="JQuery">JQuery</option>
	<option value="BootStrap">BootStrap</option>
	<option value="PHP">PHP</option>
	<option value="SQL">SQL</option>
	<option value="ASP.NET">ASP.NET</option>
	</select>
	
	<input type="number" name="price" placeholder="Enter Your Price" required />
	
	<textarea name="desc" rows="5" placeholder="Describe your book"></textarea>
	
	<input type="submit" name="submit" value="Insert" />
	<input type="reset" name="reset" value="reset" />
	
	</td>
	</tr>
	</table>
	</form>
	
	</div><!-- pad 10 ends -->
	</div>
	<?
	include '../../footer.php';