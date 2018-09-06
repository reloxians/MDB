<?php
	/**service Search**/
	$link = 'function';
	if(isset($_POST['search']) || $_GET['pageno']) {
	include '../../security/admin_check.php' ;
	include '../../database/database.php';
	include '../../header.php';
	echo '<br>';
	echo '<br>';
	echo '<br>';
	include '../../nav/admin_nav.php' ;
	
	//vars
	$item = $_POST['search'] ;
		
	//search
		
	$sea = "select *from active_service where service_name like '%$item%'";
	$cmd = mysqli_query($connect, $sea);
	$count = mysqli_num_rows($cmd);
	
	if (isset($_GET['pageno'])) { 
		$pageno = $_GET['pageno']; 
	} else { 
		
		$pageno = 1; 
	}
	
	$no_of_records_per_page = 100; 
	$offset = ($pageno-1) * $no_of_records_per_page;
	
	$cnt = "SELECT * from active_service where service_name like '%$item%'";
	$cmd_cnt = mysqli_query($connect, $cnt);
	$total_rows = mysqli_num_rows($cmd_cnt);
	
	$total_pages = ceil($total_rows / $no_of_records_per_page);
	
	
	?>
	<div class="page_wrapper_sub">
	
	<!-- search -->
	<center>
	<form action="search" method="POST">
	<table width="100%" cellpadding="5">
	<tr bgcolor="">
	<td width="90%">
	<input type="search" class="disabled" name="search" placeholder="       <? echo $count ?> Search Results" required="required" />
	</td>
	<td align="left" bgcolor="" width="10%">
	<button class="search-btn disabled" type="submit" name="submit"><i class="fa fa-search"></i></button>
	</td>
	</tr>
	</table>
	</form>
	</center>
	<!-- search ends -->
	
	<?
	//search
		
	$se = "select *from active_service where service_name like '%$item%' ORDER BY ID DESC LIMIT $offset, $no_of_records_per_page";
	$cmd = mysqli_query($connect, $se);
	
	?>
	
	<?
	$i = 0;
	while($inf = mysqli_fetch_assoc($cmd)) {
	
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
		
	}
		
	?>
	</div>	
	
	
	<br>
	<br>
	<br>
	
	<!--
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
		
	-->
	
	<?
	include '../../footer.php';
	} else {
		header("Location: /");
	}
