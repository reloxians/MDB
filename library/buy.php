<?php
if(isset($_POST['submit'])) {
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
}

//vars

$rand = grs();
$ids = $_POST['ids'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$location = $_POST['location'];

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
	<form action="" method="POST">
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


	<table width="100%" cellpadding="15"><!--  main -->
	<tr bgcolor=""><!-- tr -->
	
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
	
	<form action="buy.inc.php" method="POST">	
	
	
	
	
		<?php
			require '../classes/paystackCharge.php' ;
			
			$pc = new PaystackCharge(0.015, 0); // always 1.5% flat					
			
		?>
 						

	<input name="ids" type="hidden" value="<? echo $ids ?>" />
	<input name="firstname" type="text" value="<? echo $firstname ?>" readonly="readonly" />
	<input name="lastname" type="text" value="<? echo $lastname ?>" readonly="readonly" />
	<div class="infomat">
	Book will be delivered to this email, ensure it is correctly spelt
	</div>
	<input name="email" type="email" value="<? echo $email ?>" readonly="readonly" />
	<input name="location" type="text" value="<? echo $location ?>" readonly="readonly" />
	<input name="price" type="hidden" value="<? echo $pc->add_for_kobo($price) . "\n"; ?>" />
		
		<br />
		<br />
		<span id="pay" class="pink_btn">
		Pay With Card  <i class="fa fa-cart-plus"></i>
		</span>
		
		<script src="https://js.paystack.co/v1/inline.js"
		 data-currency="NGN"
		 data-phone="<? echo $info['phone'] ?>"
		 data-key="<? echo $paystack['publishable_test'] ?>" 
		 data-email="<? echo $email ?>" 
		 data-amount="<? echo $pc->add_for_kobo($price * 100) . "\n"; ?>"  
		 data-ref="<? echo $rand ?>"
		 data-custom-button="pay">
		 
		</script>
		
	</form>
	</td>
	</tr>
	</table>
	<!-- inner ends -->
	
	</td>
	</tr><!-- tr -->
	</table><!-- main -->

<center>
<div class="agreement" style="width: 50%;">
			
			By clicking "Pay with card", you acknowledge that you have read our updated <a class="email" href="/tos.php"> terms of service</a>, <a class="email" href="/disclaimer.php">Disclaimer</a> and that your continued use of the website is subject to these policies.
</div>
</center>

	
</div>
<?
include '../footer.php';

} else {
	header("Location: /");
}
