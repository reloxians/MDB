<?php 
	// Services INDEX
	if(!$_POST['submit']) {
		header("Location: /");
		
		}
	
	session_start();
	
	$link = 'i-pay' ;
	$active = 'balance' ;
	$me = $_SESSION['username'];
	
	include '../database/database.php' ;
	include '../security/auth_check.php' ;
	include '../client/init.php' ;
	
	$sel = "select * from users where username='$me' " ;
	$sel_cmd = mysqli_query($connect, $sel);
	$sel_res = mysqli_fetch_assoc($sel_cmd);
	
	
		
	include '../header.php' ;
	include '../parallax.php' ;
	
	if($_SESSION['username']) {
		include '../nav/profile_nav.php' ;		
	}
	echo '<br>' ;
	
?>
	
<?
	include '../sidebars/ipay_bar_small.php' ;
	include '../sidebars/ipay_bar.php' ;
	
	
	//vars
	$product  = $_POST['product'] ;
	$username = $_SESSION['username'] ;
	$rand = grs();
	
	//dynamic prices
	if($product == 's-e-commerce') {
		$first_charge = 137000 ;
		$add = $first_charge * 0.15 ;
		$full = $first_charge + $add ;
		$price = $full * 0.70 ;
		$balance = $full - $price ;
		$product_name = 'Standard E-commerce' ;
		
		} elseif($product == 'b-e-commerce') {
		$first_charge = 92500 ;
		$add = $first_charge * 0.15 ;
		$full = $first_charge + $add ;
		$price = $full * 0.70 ;
		$balance = $full - $price ;
		$product_name = 'Basic E-commerce' ;
				
		} elseif($product == 's-coporate') {
		$first_charge = 137000 ;
		$add = $first_charge * 0.15 ;
		$full = $first_charge + $add ;
		$price = $full * 0.70 ;
		$balance = $full - $price ;
		$product_name = 'Standard Coporate' ;

		} elseif($product == 'b-coporate') {
		$first_charge = 92500 ;
		$add = $first_charge * 0.15 ;
		$full = $first_charge + $add ;
		$price = $full * 0.70 ;
		$balance = $full - $price ;
		$product_name = 'Basic Coporate' ;
			
		} elseif($product == 'pro-church') {
		$first_charge = 187000 ;
		$add = $first_charge * 0.15 ;
		$full = $first_charge + $add ;
		$price = $full * 0.70 ;
		$balance = $full - $price ;
		$product_name = 'Pro Church Pack' ;
		
		} elseif($product == 'b-church') {
		$first_charge = 92500 ;
		$add = $first_charge * 0.15 ;
		$full = $first_charge + $add ;
		$price = $full * 0.70 ;
		$balance = $full - $price ;	
		$product_name = 'Basic Church Pack' ;
		
		} elseif($product == 'pro-business') {
		$first_charge = 75000 ;
		$add = $first_charge * 0.15 ;
		$full = $first_charge + $add ;
		$price = $full * 0.70 ;
		$balance = $full - $price ;
		$product_name = 'Pro Business' ;
		
		} elseif($product == 'b-business') {
		$first_charge = 55500 ;
		$add = $first_charge * 0.15 ;
		$full = $first_charge + $add ;
		$price = $full * 0.70 ;
		$balance = $full - $price ;
		$product_name = 'Basic Business' ;
		
		} elseif($product == 's-qanda') {
		$first_charge = 225000 ;
		$add = $first_charge * 0.15 ;
		$full = $first_charge + $add ;
		$price = $full * 0.70 ;
		$balance = $full - $price ;
		$product_name = 'Standard QandA' ;
		
		} elseif($product == 'b-qanda') {
		$first_charge = 120500 ;
		$add = $first_charge * 0.15 ;
		$full = $first_charge + $add ;
		$price = $full * 0.70 ;
		$balance = $full - $price ;
		$product_name = 'Basic QandA(Forum)' ;
		
		}
	
?>
	
	<div class="near_sidebar">
	<center>
	<br></br>	
	
	
<table width="100%">
<tr bgcolor="">
<td class="invisible" width="20%">
</td>

<td width="60%">

<!-- controller class -->


<div class="form_class">
<center>

<form id="controller">
<input type="text" name="username" value="<? echo $username ?>" readonly="" />
<input type="text" name="email" value="<? echo $sel_res['email'] ?>" readonly="" />
<input type="text" name="product" value="<? echo $product_name ?>" readonly="" />

<div class="forbidden_class_wrapper">			
<div class="forbidden_class">
<i class="fa fa-warning"></i> Please endeavour to select the right option, as this may lead to a incorrect record entry
</div>
</div>

<div class="ipay_calc">

The initial price for this service is <span class="email"> ₦<? echo number_format($first_charge) ?></span>, 
<span class="email">%15</span> of this is <span class="email"> ₦<? echo number_format($add) ?></span>,
added to the initial price, the resultant price is now <span class="email"> ₦<? echo number_format($full) ?></span>.
Consequently, the due payment is <span class="email">  ₦<? echo number_format($price) ?></span> with a 
balance of <span class="email">  ₦<? echo number_format($balance) ?></span> to be paid upon service completion.

<a href="../i-pay/"><b>Learn More</b></a>

</div>
</form>

<br></br>

	<form action="confirm_balance.inc.php" method="POST">
	<input type="hidden" name="rand" value="<? echo $rand ?>" />
				
				
		<?php
			require '../classes/paystackCharge.php' ;
			
			$pc = new PaystackCharge(0.015, 0); // always 1.5% flat					
			
		?>
				
		<br>		
		<span id="pay" class="pink_btn">
		Pay With Card  <i class="fa fa-cart-plus"></i>
		</span>
		
		<script src="https://js.paystack.co/v1/inline.js"
		 data-currency="NGN"
		 data-phone="<? echo $sel_res['phone'] ?>"
		 data-key="<? echo $paystack['publishable_test'] ?>" 
		 data-email="<? echo $sel_res['email'] ?>" 
		 data-amount="<? echo $pc->add_for_kobo($balance * 100) . "\n"; ?>"  
		 data-ref="<? echo $rand ?>"
		 data-custom-button="pay">
		 
		 
		</script>
		<input type="hidden" value="<? echo $rand ?>" name="ref" />
		
		<input type="hidden" value="<? echo $me ?>" name="username" />
		
		<input type="hidden" value="<? echo $sel_res['email'] ?>" name="email" />
		
		<input type="hidden" value="<? echo $product ?>" name="product" />
		
		<input type="hidden" value="<? echo $product_name ?>" name="product_name" />
		
		<input type="hidden" value="<? echo $balance ?>" name="balance" />
		
		<input type="hidden" value="<? echo $pc->add_for_kobo($price) . "\n"; ?>" name="price" />		
 



</form>
</div>


<div class="agreement">
By clicking "Pay with card", you acknowledge that you have read our updated <a class="email" href="/tos.php"> terms of service</a>, <a class="email" href="/disclaimer.php">Disclaimer</a> and that your continued use of the website is subject to these policies.
</div>
					
			

</center>


</div>
</center>
</td>

<td class="invisible" width="20%">
</td>
</tr>
</table>
</div>	
	</center>
	</div>
	<div class="clear" />
	<br>
	
	
<?php
	include '../footer.php' ;
	