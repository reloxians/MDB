<?php
	//library_frontend 
	$link = 'sql' ;
	//include '../security/auth_check.php' ;
	include '../../database/database.php' ;
	include '../../header.php' ;
	echo '<br>';
	echo '<br>';
	echo '<br>';
	if($_SESSION['username'] == 'Admin'){
	include '../../nav/admin_nav.php' ;
	} else {
	include '../../nav/book_nav.php' ;
	}
	
	
	if (isset($_GET['pageno'])) { 
		$pageno = $_GET['pageno']; 
	} else { 
		
		$pageno = 1; 
	}
	
	$no_of_records_per_page = 30; 
	$offset = ($pageno-1) * $no_of_records_per_page;
	
	$cnt = "SELECT * from books where category = 'SQL' ";
	$cmd_cnt = mysqli_query($connect, $cnt);
	$total_rows = mysqli_num_rows($cmd_cnt);
	
	$total_pages = ceil($total_rows / $no_of_records_per_page);
	
	?>
	
	<div class="page_wrapper_sub">
	<!-- search -->
	<center>
	<form action="../search" method="POST">
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
	$sel = "select * from books where category = 'SQL' ORDER BY ID DESC LIMIT $offset, $no_of_records_per_page";
	$cmd = mysqli_query($connect, $sel);
	$count = mysqli_num_rows($cmd);
	
	?>
	
	
	<table width="100%" cellpadding="10">
	
	<?
	$i = 0;
	while($res = mysqli_fetch_assoc($cmd)) {
	
		if($i%3 == 0){
			echo '<tr style="margin-bottom: 5px;">'. PHP_EOL;
		}
	
	?>
	
	<form id="<? echo $res['id'] ?>" action="../preview" method="POST">
	<input type="hidden" name="ids" value="<? echo $res['id'] ?>">
	</form>
	
	<td class="white-chart-cards responsive" width="30%">
	<a class="card_act" href="javascript:void(0)" onclick="document.getElementById('<? echo $res['id'] ?>').submit();"><!-- card act -->
	<table width="100%" cellpadding="5"><!-- inner -->
	<tr bgcolor="">
	<td valign="top" width="30%">
	<img src="../../sales/product/<? echo $res['cover_name'] ?>" width="100%" class="disabled"/>
	</td><!-- icon -->
	
	<td align="" valign="top" width="70%">
	<span class="card_info">
	<? echo '<span class="book-title">'.$res['title_key'].'</span>' ?>
	</span>
	
	<div class="card_info">
	<? echo '<span class="faq_answer">'.chop_string_null($res['description'], 50).'</span>' ?>
	</div>
	
	<div class="card_info_val">
	<? echo '₦'.number_format($res['price']) ?>
	</div>
	
	<div class="card_info">
	<? echo now($res['created'])?>
	</div>
	</td>
	</table><!-- inner -->
	</a><!-- card act ends -->
	</td>
	
	<?
	
	$i++ ;
	
	if($i%3 == 0) {
			echo '</tr>'.PHP_EOL;
		}
		
	}
		
	?>
	</table>
	
	
	</div>
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
	include '../../footer.php';