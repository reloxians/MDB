<?php 
	//INDEX CHECKOUT
	
	if(isset($_POST['submit'])) {
		$link = 'checkout' ;
		
		include '../database/database.php' ;
		include '../security/auth_check.php' ;
		include '../client/init.php' ;
		include '../classes/paystackCharge.php' ;
		include '../header.php' ;
		include '../parallax.php' ;
		include '../nav/profile_nav.php' ;
		
		//vars
		$item = $_POST['item'];
		$price_raw = $_POST['price'];
		$billing = $_POST['billing'];
		$type = $_POST['type'];
		
		//verify price
		$match = "select * from prices where item_name = '$item' ";
		$cmd = mysqli_query($connect, $match);
		$ins = mysqli_fetch_assoc($cmd);
		$price = $ins['price'];
		
	
	//ref
		$rand = grs();
	
	
		//get user details 
				$me = $_SESSION['username'];
				
				$get = "select * from users where username= '$me' ";
				$cmd = mysqli_query($connect, $get);
				$info = mysqli_fetch_array($cmd);
			
					?>
					
					<br>
	
			
			<table width="100%" cellpadding="5">
			<tr bgcolor="">
			<td class="invisible" width="20%">
			
			</td>
			
			<td width="60%">
			
			<center>
			<div class="form_class">		
			
			<form action="checkout.inc.php" method="POST">
			
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
<i class="fa fa-cart-plus"></i>
</span>

<div class="service_ico_name">
<?php echo $item ?>


</div>
</td>

<td align="left" valign="top" bgcolor="" width="70%">

<div class="service_desc_container">
<b>Item</b>: <?php echo $item ?> 
</div>

<div class="service_desc_container">
<b>Type</b>: <?php echo $type ?> 
</div>


<div class="service_desc_container">
<b>Charge Fee</b>:  <span class="service_fee"> ₦<? echo  number_format( $price ) ?>  NGN
</span>

</div>

<div class="service_desc_container">
<b>Billing</b>: <? echo $billing ?> 
</div>


</td>
</tr>
</table>
			
		</div>
		
		
		<div class="agreement">
			
			By clicking "Pay with card", you acknowledge that you have read our updated <a class="email" href="/tos.php"> terms of service</a>, <a class="email" href="/disclaimer.php">Disclaimer</a> and that your continued use of the website is subject to these policies.
			
			</div>
					
			
			<form action="checkout.inc.php" method="POST">
	<input type="hidden" name="rand" value="<? echo $rand ?>" />
				
				
		<?php
			
			$pc = new PaystackCharge(0.015, 0); // always 1.5% flat					
			
		?>
				
				
		<span id="pay" class="pink_btn">
		Pay With Card  <i class="fa fa-cart-plus"></i>
		</span>
		
		<script src="https://js.paystack.co/v1/inline.js"
		 data-currency="NGN"
		 data-phone="<? echo $info['phone'] ?>"
		 data-key="<? echo $paystack['publishable_test'] ?>" 
		 data-email="<? echo $info['email'] ?>" 
		 data-amount="<? echo $pc->add_for_kobo($price * 100) . "\n"; ?>"  
		 data-ref="<? echo $rand ?>"
		 data-custom-button="pay">
		 
		 
		</script>
		
		<input type="hidden" value="<? echo $rand ?>" name="ref" />
		
		<input type="hidden" value="<? echo $me ?>" name="username" />
		
		<input type="hidden" value="<? echo $item ?>" name="item" />
		
		<input type="hidden" value="<? echo $type ?>" name="type" />
		
		<input type="hidden" value="<? echo $billing ?>" name="billing" />
		
		<input type="hidden" value="<? echo $pc->add_for_kobo($price) . "\n"; ?>" name="price" />		
 
</form>
			
			<br>
			
			</center>
			
			</td>
			
			<td class="invisible" width="20%">
			
			</td>
			</tr>
			</table>
			
	
	</div>
			
	<?
include '../footer.php' ;

	} else {
		header("Location: /");
	}
	
	
	