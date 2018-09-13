<?php
	//blog backend
	$link = 'blog' ;
	include '../../security/admin_check.php' ;
	include '../../database/database.php' ;
	include '../../header.php' ;
	echo '<br>';
	echo '<br>';
	echo '<br>';
	include '../../nav/admin_nav.php' ;
	
	$username = $_SESSION['username'];
	
	$sel = "select * from admin where username='$username' ";
	$cmd = mysqli_query($connect, $sel);
	$rrr = mysqli_fetch_assoc($cmd);
		
	?>
<div class="page_wrapper_sub">
	<table width="100%" cellpadding="10">
	<tr bgcolor="">
	<td class="white-chart-cards responsive" width="30%">
	<a class="card_act" href="users"><!-- card act -->
	<table width="100%" cellpadding="5"><!-- inner -->
	<tr bgcolor="">
	<td width="30%">
	<div class="red-plastic">
	<i class="fa fa-user-o"></i>
	</div>
	</td><!-- icon -->
	
	<td align="right" valign="" width="70%">
	<span class="card_info">
	Total Blog Posts
	</span>
	
	<div class="card_info_val">
	<?
	$dd = "select * from blog";
	$run = mysqli_query($connect, $dd);
	$run_count = mysqli_num_rows($run); 
	
	echo $run_count ;
	
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
	Overall Revenue
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
	
	$mth = mysqli_query($connect, "select sum(price) as prices from book_sales");
	$row = mysqli_fetch_assoc($mth); 
	$total5 = $row['prices'] ;	
	
	$total = $total0 + $total1 + $total2 + $total3 + $total4 + $total5;
	
	echo '₦'.number_format($total);
	
	?>
	</div>
	
	
	</td>
	</tr>
	</table><!-- inner -->
	</td>
	
	</tr>
	</table>
	
	
	<!-- part 2 -->
	
	<form action="post" method="POST">
	
	<table width="100%" cellpadding="5">
	<tr bgcolor="">
	<td align="center" valign="top" class="responsive" width="50%">
	<input style="width: 95%;" type="text" name="firstname" value="<? echo $rrr['firstname'] ?>" placeholder="firstname" required="required" />
	
	<input style="width: 95%;" type="text" name="lastname" value="<? echo $rrr['lastname'] ?>" placeholder="lastname" required="required" />
	
	
	</td>	
	<td align="center" valign="top" class="responsive" width="50%">
	<input style="width: 95%;" type="text" name="email" placeholder="email" value="<? echo $rrr['email'] ?>" required="required" />	
	
	
	<input style="width: 95%;" type="text" name="post_title" placeholder="post title" required="required" />
	
	<input style="width: 95%;" type="text" name="slug" placeholder="post slug" required="required" />
	
	
	</td>	
	</tr>
	</table>
	
	
	<textarea id="blog-textarea" name="post_details" rows="10"></textarea>
	<br>
	<input type="submit" name="submit" />
	<input type="reset" name="reset" />
	
	
	</form>
	
</div>
<?php
	include '../../footer.php';