<?php
//Main INDEX
$themes = array('blue', 'green', 'red');
$i = rand(0, count($themes)-1);
$theme_class = "$themes[$i]";
	
	
	include 'header_no_nav.php';
	include 'parallax.php';
	include 'database/database.php' ;
	
?>
	
	<div class="page">
	
	<?php 
include 'core/listing.php' ?>

<div style="background: transparent" class="pre_block">
<div class="pre_block_header_pink">
E-book Library
</div>
<br>
Get step-by-step explanations on topics of various programming languages from our e-book library today. 

<br>

Our <b>automatic book delivery system</b> ensures that your book is delivered via your email address immediately after payment is made with <b>zero wait time.</b>

</div>

	
	
	<!-- part 3 -->
	
	
	<?
		
		$chk = "select * from books where category = 'ASP.NET' ";
		$chk_cmd = mysqli_query($connect, $chk);
		$count_asp = mysqli_num_rows($chk_cmd);
	
		$chk0 = "select * from books where category = 'PHP' ";
		$chk_cmd0 = mysqli_query($connect, $chk0);
		$count_php = mysqli_num_rows($chk_cmd0);
	
		$chk1 = "select * from books where category = 'CSS' ";
		$chk_cmd1 = mysqli_query($connect, $chk1);
		$count_css = mysqli_num_rows($chk_cmd1);
		
		$chk2 = "select * from books where category = 'JavaScript' ";
		$chk_cmd2 = mysqli_query($connect, $chk2);
		$count_javascript = mysqli_num_rows($chk_cmd2);
	
		$chk3 = "select * from books where category = 'JQuery' ";
		$chk_cmd3 = mysqli_query($connect, $chk3);
		$count_jquery = mysqli_num_rows($chk_cmd3);
		
		$chk3 = "select * from books where category = 'SQL' ";
		$chk_cmd3 = mysqli_query($connect, $chk3);
		$count_sql = mysqli_num_rows($chk_cmd3);
		
		$chk3 = "select * from books where category = 'HTML' ";
		$chk_cmd3 = mysqli_query($connect, $chk3);
		$count_html = mysqli_num_rows($chk_cmd3);
		
		$chk3 = "select * from books where category = 'BootStrap' ";
		$chk_cmd3 = mysqli_query($connect, $chk3);
		$count_bootstrap = mysqli_num_rows($chk_cmd3);
		
		$chk3 = "select * from books where category = 'Ajax' ";
		$chk_cmd3 = mysqli_query($connect, $chk3);
		$count_ajax = mysqli_num_rows($chk_cmd3);
		
		
		$count_total = $count_php + $count_css + $count_ajax + $count_bootstrap + $count_sql + $count_html + $count_javascript + $count_asp + $count_jquery ;
		
		
		/** chat 2 **/
		
		$chk = "select * from book_sales where category = 'ASP.NET' ";
		$chk_cmd = mysqli_query($connect, $chk);
		$count_asp_dl = mysqli_num_rows($chk_cmd);
	
		$chk0 = "select * from book_sales where category = 'PHP' ";
		$chk_cmd0 = mysqli_query($connect, $chk0);
		$count_php_dl = mysqli_num_rows($chk_cmd0);
	
		$chk1 = "select * from book_sales where category = 'CSS' ";
		$chk_cmd1 = mysqli_query($connect, $chk1);
		$count_css_dl = mysqli_num_rows($chk_cmd1);
		
		$chk2 = "select * from book_sales where category = 'JavaScript' ";
		$chk_cmd2 = mysqli_query($connect, $chk2);
		$count_javascript_dl = mysqli_num_rows($chk_cmd2);
	
		$chk3 = "select * from book_sales where category = 'JQuery' ";
		$chk_cmd3 = mysqli_query($connect, $chk3);
		$count_jquery_dl = mysqli_num_rows($chk_cmd3);
		
		$chk3 = "select * from book_sales where category = 'SQL' ";
		$chk_cmd3 = mysqli_query($connect, $chk3);
		$count_sql_dl = mysqli_num_rows($chk_cmd3);
		
		$chk3 = "select * from book_sales where category = 'HTML' ";
		$chk_cmd3 = mysqli_query($connect, $chk3);
		$count_html_dl = mysqli_num_rows($chk_cmd3);
		
		$chk3 = "select * from book_sales where category = 'BootStrap' ";
		$chk_cmd3 = mysqli_query($connect, $chk3);
		$count_bootstrap_dl = mysqli_num_rows($chk_cmd3);
		
		$chk3 = "select * from book_sales where category = 'Ajax' ";
		$chk_cmd3 = mysqli_query($connect, $chk3);
		$count_ajax_dl = mysqli_num_rows($chk_cmd3);
		
		
		$count_total_dl = $count_php_dl + $count_css_dl + $count_ajax_dl + $count_bootstrap_dl + $count_sql_dl + $count_html_dl + $count_javascript_dl + $count_asp_dl + $count_jquery_dl ;
		
		
	 ?>
	
	
	<!-- chart analysis -->
	<table width="100%" cellpadding="10">
	<tr bgcolor="">
	<td class="responsive" width="50%">
	<div class="white-chart-cards">
	<canvas id="myChart" width="200" height="100"></canvas>
	</div>
	</td>
		
	
	<td class="responsive" width="50%">
	<div class="green-chart-cards">
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
					label: 'Available Books Statistics', 
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
							labels: ["ASP.NET", "PHP", "CSS", "JavaScript", "JQuery", "MySQL", "HTML", "BootStrap", "Ajax", "Total"],
							datasets: [{
								label: 'Rate Of Downlaods',
								data: [<? echo $count_asp_dl ?>, <? echo $count_php_dl ?>, <? echo $count_css_dl ?>, <? echo $count_javascript_dl ?>, <? echo $count_jquery_dl ?>, <? echo $count_sql_dl ?>, <? echo $count_html_dl ?>, <? echo $count_bootstrap_dl ?>, <? echo $count_ajax_dl ?>, <? echo $count_total_dl ?>], 
								
								
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
	<!-- chart -->
	
	
<!--  svg section -->
<div style="background: transparent" class="pre_block">
<div class="pre_block_header_pink">
Our Client Arena
</div>
<br>
We have a dashboard for individuals & companies currently hosting & managing their websites with us with features like odering for a new service, making payment for existing services, reminder of service expiration date and lot more.

</div>




</div>
	
	
	
	
	<table width="100%" cellpadding="10">
	<tr bgcolor="">
	<td bgcolor="#F4F4FA" width="80%">
	
	<!-- inner table -->
<table cellpadding="5" width="100%"><!-- inner tab -->
<tr bgcolor="">
<td align="center" valign="top" bgcolor="" width="10%">

<div class="quest_wrapper_pink">
!
</div>
</td>


<td valign="top" width="90%">
<div class="faq_question">
24-Hour Customers Support Services
</div>

<div class="faq_answer">
Our customer care department is activly ready to help you if there be need for any kind of assistance relating to our website
and it's usage
</div>

</td>


</tr>
</table>
	
	
	
	</td>
	
	<td bgcolor="#F4F4FA" align="center" width="20%">
	<img class="disabled" src="/media/images/help.svg" width="60%" />
	</td>
	</tr>
	</table>
	
			<!-- part 4 -->
	
	
	<!--  svg section -->
	
	<table width="100%" cellpadding="10">
	<tr bgcolor="">
	<td bgcolor="#F4F4FA" width="80%">
	
	<!-- inner table -->
<table cellpadding="5" width="100%"><!-- inner tab -->
<tr bgcolor="">
<td align="center" valign="top" bgcolor="" width="10%">

<div class="quest_wrapper_pink">
!
</div>
</td>


<td valign="top" width="90%">
<div class="faq_question">
Money Back Guarantee System
</div>

<div class="faq_answer">
We make refunds for services that are not satisfactory to our customers, this is because, your satisfaction is our uttermost 
concern. <a href="/docs/refund">Learn More</a> about the terms & conditions guiding our refund system
</div>

</td>


</tr>
</table>
	
	
	
	</td>
	
	<td bgcolor="#F4F4FA" align="center" width="20%">
	<img class="disabled" src="/media/images/money_back.svg" width="60%" />
	</td>
	</tr>
	</table>
	
	
	
	<!--  svg section -->
	
	<table width="100%" cellpadding="10">
	<tr bgcolor="">
	<td bgcolor="#F4F4FA" width="80%">
	
	<!-- inner table -->
<table cellpadding="5" width="100%"><!-- inner tab -->
<tr bgcolor="">
<td align="center" valign="top" bgcolor="" width="10%">

<div class="quest_wrapper_pink">
!
</div>
</td>


<td valign="top" width="90%">
<div class="faq_question">
Our Newsletter & Notification System
</div>

<div class="faq_answer">
We get our clients updated regularly on service expiration dates, new inventions on our platform,
 tips for making their online businesses go far and get better.
</div>

</td>


</tr>
</table>
	
	
	
	</td>
	
	<td bgcolor="#F4F4FA" align="center" width="20%">
	<img class="disabled" src="/media/images/call.svg" width="60%" />
	</td>
	</tr>
	</table>
	
	
	<!-- part 2 -->
	
	
		<!--  svg section -->
	
	<table width="100%" cellpadding="10">
	<tr bgcolor="">
	<!-- inner table -->

<td bgcolor="#F4F4FA"  align="center" width="80%">
<table cellpadding="5" width="100%"><!-- inner tab -->
<tr bgcolor="">
<td align="center" valign="top" bgcolor="" width="10%">

<div class="quest_wrapper_pink">
!
</div>
</td>


<td valign="top" width="90%">
<div class="faq_question">
Installmental payment is allowed
</div>

<div class="faq_answer">
For the sake of insufficient cash or any other financial impedement, we allow payment of <span class="email">70%</span> of the charged fee which can be made via the <a class="" href="../../i-pay/">i-pay payment</a> platform. 
<br>
<br>
Note: A service fee of <span class="email">15%</span> of the charge fee is required on the <a href="../../i-pay/">i-pay</a> platform 
</div>

</td>


</tr>
</table>
</td>
<td bgcolor="#F4F4FA" align="center" width="20%">
	
	<img class="disabled" src="/media/images/currency3.svg" width="60%" />
	</td>
		
	
	
	</tr>
	</table>
	

	
	</div>
	
	<br></br>

<?php
	include 'footer.php';
	
	