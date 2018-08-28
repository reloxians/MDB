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
	
	
	
	</div>
	
	<?php
		include '../footer.php';
	
	