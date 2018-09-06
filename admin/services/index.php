<?php
	//services
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
	
	if (isset($_GET['pageno'])) { 
		$pageno = $_GET['pageno']; 
	} else { 
		
		$pageno = 1; 
	}
	
	$no_of_records_per_page = 30; 
	$offset = ($pageno-1) * $no_of_records_per_page;
	
	$cnt = "SELECT * from users";
	$cmd_cnt = mysqli_query($connect, $cnt);
	$total_rows = mysqli_num_rows($cmd_cnt);
	
	$total_pages = ceil($total_rows / $no_of_records_per_page);
	
	
	$sel = "select * from active_service ORDER BY ID DESC LIMIT $offset, $no_of_records_per_page";
	$cmd = mysqli_query($connect, $sel);
	
	$i = 0;
	while($inf = mysqli_fetch_assoc($cmd)) {
	$user = $inf['username'];
	
		if($i%3 == 0){
			echo '<tr style="margin-bottom: 5px;">'. PHP_EOL;
		}
	
		?>
		
	<form id="<? echo $inf['id'] ?>" action="action" method="POST">
	<input type="hidden" name="ids" value="<? echo $inf['id'] ?>" />
	</form>
		
	<a href="javascript:void(0)" onclick="document.getElementById('<? echo $inf['id'] ?>').submit();" class="card_act"><!-- card act -->
	
	<table class="white-chart-cards" width="100%" cellpadding="10">
	<tr bgcolor="">
	<td class="responsive -chart-cards" width="30%">
	<!-- inner -->
	<table width="100%" cellpadding="5">
	<tr>
	<td valign="center" width="30%">
		<img  style="border-radius: 3px;" src="/media/images/users/default.jpg" width="100%" />
	</td>
	
	<td align="right" valign="center" width="70%">
	
	<div class="card_info">
	<? echo $inf['username']?>
	</div>	
	
	<div class="card_info">
	<a class="card_act grey" href="mailto:<? echo $inf['email']?>"><? echo $inf['email']?> <i class="fa fa-external-link"></i></a>
	</div>	
	
	<!-- flag -->
	<table cellpadding="5">
	<tr>
	<td align="right" width="%">
	<span class="card_info">
	<?
	$me = $inf['username'];
	$cn = "select country from users where username = '$me' ";
	$cn_cmd = mysqli_query($connect, $cn);
	$if = mysqli_fetch_assoc($cn_cmd);
	?>
	<img src="/media/images/country/svg/<? echo $if['country']?>.svg" width="20%" />
	</span>
	</td>
	<td align="right" width="%">
	<span class="card_info">
	<? echo $if['country']?>
	</span>
	</td>
	</tr>
	</table>
		
	</td>
	</tr>
	</table>
	<!-- inner ends -->
	</td>
	
	<td valign="top" class="responsive" width="60%">
	
	<!-- Q&A -->
	<table width="100%" cellpadding="5">
	<div class="survey_quest skills">
	Service Name
	</div>
	
	<tr class="" bgcolor="">
	
	<td width="80%">	
	<div class="survey_ans">
	<? 
	
	
	if(!empty($inf['service_name']) && $inf['reminded'] < 1) {echo '<span class="skill space-5">' .$inf['service_name'].'</span>'; } else {echo '<span class="skill main-skill space-5">' .$inf['service_name'].'</span>'; }
	
	
	?>
	</div>	
	</td>
	
	</tr>
	</table><!--inner ends -->
	
	
	<!-- Q&A -->
	<table width="100%" cellpadding="5">
	<div class="survey_quest skills">
	Service Platform
	</div>
	
	<tr class="" bgcolor="">
	
	<td width="80%">	
	<div class="survey_ans">
	<?
	
	echo $inf['platform'];
	
	?>
	</div>	
	</td>
	
	</tr>
	</table><!--inner ends -->
	
	</td>
	

	</tr>
	</table>
	</a>
	
		<?
		
		$i++ ;
	
	if($i%3 == 0) {
			echo '</tr>'.PHP_EOL;
		}
		
		}
		
		?>
	
	
	</div><!-- wrapper end -->	
	
	<br>
	<br>
	<br>
	
	
		<center>
		<ul class="pagination"> 
		<li><a href="?pageno=1"><i class="fa fa-angle-double-left"></i> First</a></li> 
		<li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>"> 
			<a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>"><i class="fa fa-angle-left"></i> Prev</a> 
		</li> 
		
		<li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>"> <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Next <i class="fa fa-angle-right"></i></a></li> 
		
		<li><a href="?pageno=<?php echo $total_pages; ?>">Last <i class="fa fa-angle-double-right"></i></a></li>
		
		</ul>
		</center>
	
	<?
	include '../../footer.php' ;