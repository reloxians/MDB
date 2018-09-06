<?php
if(isset($_POST['ids'])) {
//library_frontend 
session_start();
$me = $_SESSION['username'];

$link = 'library' ;
//include '../security/auth_check.php' ;
include '../database/database.php' ;
include '../header.php' ;
include '../client/init.php' ;
echo '<br>';
echo '<br>';
echo '<br>';
if($_SESSION['username'] == 'Admin'){
	include '../nav/admin_nav.php' ;
} else {
	include '../nav/book_nav.php';
}

$rand = grs();

$ids = $_POST['ids'];
$sel = "select * from books where id = '$ids' ";
$cmd = mysqli_query($connect, $sel);
$res = mysqli_fetch_assoc($cmd);

$price = $res['price'];

$chk = "select * from users where username = '$me' ";
$runit = mysqli_query($connect, $chk);
$inf = mysqli_fetch_assoc($runit);
?>

<div class="page_wrapper_sub">
<!-- search -->
	<center>
	<form action="buy.inc.php" method="POST">
	<table width="100%" cellpadding="5">
	<tr bgcolor="">
	<td width="90%">
	<input type="search" name="search" disabled="disabled" placeholder="         Search Library" />
	</td>
	<td align="left" bgcolor="" width="10%">
	<button class="search-btn" type="submit" name="submit"><i class="fa fa-search"></i></button>
	</td>
	</tr>
	</table>
	</form>
	</center>
	<!-- search ends -->


	<table width="100%" cellpadding="15">
	<tr bgcolor="">
	<td align="center" class="white-chart-cards responsive" width="30%">
	<img src="../sales/product/<? echo $res['cover_name'] ?>" width="70%" class="disabled"/>	
	</div>
	</td>
	
	<td align="" width="30%" class="white-chart-cards responsive">
	
	<div class="card_info">
	<? echo $res['title_key'] ?>
	</div>
	<br>
	<div class="card_info">
	<? echo $res['description'] ?>
	</div>
	
	<div class="card_info_val">
	<? echo '₦'.number_format($res['price']) ?>
	</div>
	
	<div class="card_info">
	<? echo now($res['created'])?>
	</div>
	
	</td>
	
	
	
	<td class="white-chart-cards responsive" width="30%">	
	<!-- inner starts -->
	<table width="100%" cellpadding="5">
	<tr bgcolor="">
	<td align="center" width="100%">
	<form action="buy" method="POST">
	
	<input type="hidden" name="ids" value="<? echo $res['id'] ?>" />
	<input name="firstname" type="text" value="<? echo $inf['firstname'] ?>" required="required" placeholder="Firstname">
	<input name="lastname" type="text" value="<? echo $inf['lastname'] ?>" required="required" placeholder="Lastname">
	
	<div class="infomat">
	Book will be delivered to this email, ensure it is correctly spelt
	</div>
	
	<input name="email" type="email" value="<? echo $inf['email'] ?>" required="required" placeholder="Email">
	<input name="location" type="text" value="<? echo $inf['country'] ?>" required="required" placeholder="Country">
			<br>
			<br>
		<button type="submit" name="submit" class="pink_btn">Next <i class="fa fa-angle-right"></i></button>
	
	
	</form>
	</td>
	</tr>
	</table>
	<!-- inner ends -->
	</td>
	</tr>
	</table>

	
</div>

<?
include '../footer.php';

} else {
	header("Location: /");
}
