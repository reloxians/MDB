<?php
	//library_frontend 
	$link = 'library' ;
	include '../security/auth_check.php' ;
	include '../database/database.php' ;
	include '../header.php' ;
	echo '<br>';
	echo '<br>';
	echo '<br>';
	if($_SESSION['username'] == 'Admin'){
	include '../nav/admin_nav.php' ;
	}
	
	
	if (isset($_GET['pageno'])) { 
		$pageno = $_GET['pageno']; 
	} else { 
		
		$pageno = 1; 
	}
	
	$no_of_records_per_page = 15; 
	$offset = ($pageno-1) * $no_of_records_per_page;
	
	$cnt = "SELECT * from books";
	$cmd_cnt = mysqli_query($connect, $cnt);
	$total_rows = mysqli_num_rows($cmd_cnt);
	
	$total_pages = ceil($total_rows / $no_of_records_per_page);
	
	?>
	
	<div class="page_wrapper_sub">
	<!-- search -->
	<center>
	<form action="#" method="POST">
	<table width="100%" cellpadding="5">
	<tr bgcolor="">
	<td width="90%">
	<input type="search" name="search" placeholder="         Search Library" />
	</td>
	<td align="left" bgcolor="" width="10%">
	<button class="search-btn" type="submit" name="submit"><i class="fa fa-search"></i></button>
	</td>
	</tr>
	</table>
	</form>
	</center>
	<!-- search ends -->
	
	<?
	$sel = "select * from books ORDER BY ID DESC LIMIT $offset, $no_of_records_per_page";
	$cmd = mysqli_query($connect, $sel);
	$count = mysqli_num_rows($cmd);
	
	?>
	
	
	<table width="100%" cellpadding="10">
	
	<?
	$i = 0;
	while($res = mysqli_fetch_assoc($cmd)) {
	
		if($i%3 == 0){
			echo '<tr bgcolor="">'. PHP_EOL;
		}
	
	echo '
	
	
	<td class="white-chart-cards responsive" width="30%">
	<a class="card_act" href="library"><!-- card act -->
	<table width="100%" cellpadding="5"><!-- inner -->
	<tr bgcolor="">
	<td width="30%">
	<img src="../sales/product/'.$res['cover_name'].'" width="100%" class="disabled"/>
	</td><!-- icon -->
	
	<td align="right" valign="" width="70%">
	<span class="card_info">
	'.$res['title_key'].'
	</span>
	
	<div class="card_info_val">
	₦'.number_format($res['price']).'
	</div>
	</td>
	</table><!-- inner -->
	</a><!-- card act ends -->
	</td>'.PHP_EOL;
	
	
	$i++ ;
	
	if($i%3 == 0) {
			echo '</tr>'.PHP_EOL;
		}
		
	}
		
	?>
	</table>
	
	
	</div>
	
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
	include '../footer.php';