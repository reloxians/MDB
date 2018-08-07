<?php 
	session_start();
	$link = 'renew';
	
	if(isset($_POST['submit'])) {
		require '../security/auth_check.php' ;
		include '../header.php';
		include '../parallax.php';
		include '../nav/profile_nav.php' ;
		include '../database/database.php' ;
		include 'init.php';
		
		//var
		$id = $_POST['service_id'];
		$me = $_SESSION['username'];
		
		//extra security check
		$check = "select * from website_service where id= '$id'";
		$cmd = mysqli_query($connect, $check);
		$res = mysqli_fetch_array($cmd);
		
		if($res['username'] != $me) {
			header("Location: /");
			
		} elseif($res['username'] == $me) {
			?>
			
			<div class="page_wrapper_sub">
			
			
			
			<div class="page_intro">
			Renew your service, payment is safe, secured and quick
			
			</div>
			
			<table width="100%" cellpadding="5">
			<tr bgcolor="">
			<td class="invisible" width="20%">
			
			</td>
			
			<td width="60%">
						
			
			
			<center>
			<div class="form_class">
			
			<?php 
				//get user details 
				$get = "select * from users where username= '$me' ";
				$cmd = mysqli_query($connect, $get);
				$info = mysqli_fetch_array($cmd);
			
					?>
			
			<form action="renew.inc.php" method="POST">
			
			<input name="username" type="text" placeholder="<? echo $info['username'] ?>" readonly="readonly" />
				
				<div class="forbidden_class_wrapper">			
			<div class="valid_class">
<i class="fa fa-check"></i> This is the username you signed up with through which payment will be registered and assigned
			</div>
					</div>
			
			
			<input name="firstname" type="text" placeholder="<? echo $info['firstname'] ?>" readonly="readonly" />	
			<br>
			<input name="lastname" type="text" placeholder="<? echo $info['lastname'] ?>" readonly="readonly" />	
			<br>
			<input name="email" type="email" placeholder="<? echo $info['email'] ?>" readonly="readonly" />
					
			
			<input name="phone" type="number" placeholder="<? echo $info['phone'] ?>" readonly="readonly" />				
		
			<br>
			
			</form>
		
			</div>			
			</center>
			
			
			<center>
			
			
			
			<div class="service_renew_wrapper">
			
			
			<table width="100%">
<tr bgcolor="">
<td valign="top" width="30%">


<span class="wp_service_ico_main">
<?php if($res['platform'] == 'wordPress'){
	echo '<i class="fa fa-wordpress"></i>' ;
	
} else {
	echo '<i class="fa fa-code"></i>' ;
}
?>

</span>

<div class="service_ico_name">
<?php if($res['platform'] == 'wordPress'){
	echo 'WordPress' ;
	
} else {
	echo 'Website' ;
}
?>


</div>
</td>

<td align="left" valign="top" bgcolor="" width="70%">
<div class="service_desc_container">

<a href="<? echo $rows['website'] ?>"><? echo $res['website'] ?> <i class="fa fa-external-link"></i> </a>

</div>

<div class="service_desc_container">
Started <? echo now($res['created']) ?>

</div>

<div class="service_desc_container">
Time Left <? echo time_left($res['expiration']) ?>

</div>

<div class="service_desc_container">
Renewal Fee  <span class="service_fee"><i class="fa fa-usd"></i><? echo $res['renewal_fee'] ?>  USD
</span>

</div>


</td>
</tr>
</table>
			
		</div>
		
		
		<div class="agreement">
			
			By clicking "Pay with card", you acknowledge that you have read our updated <a class="email" href="tos.php"> terms of service</a>, <a class="email" href="disclaimer.php">Disclaimer</a> and that your continued use of the website is subject to these policies.
			
			</div>
			
			<br>
			
			
			
			<form action="renew.inc.php" method="POST">
  <script
    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
    data-key="<? echo $stripe['publishable'] ?>"
    data-currency="usd"
    data-amount="<? echo $res['renewal_fee'] ?>00"
    data-name="Reloxians"
    data-email="<? echo $res['email'] ?>"
    data-description="<? echo $res['website'] ?>"
    data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
    data-locale="auto">
  </script>
  <script>
  document.getElementsByClassName("stripe-button-el")[0].style.display = 'none'; 
  </script> 
  
  <input type="hidden" name="website" value="<? echo $res['website'] ?>" />
  
  <input type="hidden" name="platform" value="<? echo $res['platform'] ?>" />
  
  <input type="hidden" name="username" value="<? echo $res['username'] ?>" />
  
  <input type="hidden" name="stripeCharge" value="<? echo $res['renewal_fee'] ?>00" />
  <button type="submit" class="purple_btn">Pay with card <i class="fa fa-cart-plus"></i></button>
</form>
			
			
			
			</center>
			
			</td>
			
			<td class="invisible" width="20%">
			
			</td>
			</tr>
			</table>
			
			
			
			</div>
			
			
			<?
		}
		
		
	//
	include '../footer.php' ;
} else {
	header("Location: /");
}