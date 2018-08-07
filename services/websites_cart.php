<?php 
	session_start();
	
	if($_SERVER['REQUEST_METHOD'] != 'POST') {
		
		header("Location: ../");
	} else {
		
		//vars
		
	$desc = $_POST['desc'];
	$category = $_POST['category'];
	
	$link = 'services' ;
	$active = 'websites' ;
	include '../database/database.php';
	include '../client/init.php';
	include '../security/auth_check.php' ;
	
	include '../header.php' ;
	include '../parallax.php' ;
	include '../nav/profile_nav.php' ;
	echo '<br>' ;
	include '../sidebars/service_bar_small.php' ;
	echo '<br>' ;
	include '../sidebars/service_bar.php' ;
	
	$me = $_SESSION['username'];
		
		$get = "select * from users where username= '$me' ";
		$cmd = mysqli_query($connect, $get);
		$res = mysqli_fetch_assoc($cmd);
		
		
		//ref
		$rand = grs();
	
	?>
	
	
	<div class="near_sidebar"><!-- wrapper start -->
			
			

<div class="pre_block_plain">
<div class="pre_block_header">
				Website Request
			</div>
	<br>

The <?php echo site_name() ?> can help you build a clean, elegant & well cascaded website that suites your businesses, company & all other Non Governmental Organisations
</div>
<br>



	<table width="100%" cellpadding="5">
			<tr bgcolor="">
			<td class="invisible" width="20%">
			
			</td>
			
			<td width="60%">
						
			
			
			<center>
			<div class="form_class">
			
			<form action="websites_post_cart" method="POST">			
			
			
			<input name="username" type="text" placeholder="<? echo $res['username'] ?>" value="<? echo $res['username'] ?>" readonly="readonly" />
					
			<input name="firstname" type="text" placeholder="<? echo $res['firstname'] ?>" value="<? echo $res['firstname'] ?>"readonly="readonly" />	
			<br>
			<input name="lastname" type="text" placeholder="<? echo $res['lastname'] ?>" value="<? echo $res['lastname'] ?>" readonly="readonly" />	
			<br>
		
			<input name="email" type="email" placeholder="<? echo $res['email'] ?>" value="<? echo $res['email'] ?>" readonly="readonly" />
			
			<input name="phone" type="number" placeholder="<? echo $res['phone'] ?>" value="<? echo $res['phone'] ?>" readonly="readonly" />			
			<br>
			
			<input name="country" type="text" placeholder="<? echo $res['country'] ?>" value="<? echo $res['country'] ?>" readonly="readonly" />
			<br>
			
		
			
			<textarea name="desc" required="required" placeholder="<? echo $desc ?>" readonly="readonly" rows="8"><? echo $desc ?> </textarea>
			
			<input name="category" type="text" value="<? echo $category ?>" placeholder="<? echo $category ?>" readonly="readonly"/>
			
			
			
			<div class="forbidden_class_wrapper">		
					
			<div class="valid_class">
<i class="fa fa-warning"></i> Note: a service fee of <span class="email">₦500 NGN</span> which will be later deducted from the total service charge is required to place your order, this is to avoid spam and unserious requests from users.
</div>
				</div>
				
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
		 data-phone="<? echo $res['phone'] ?>"
		 data-key="<? echo $paystack['publishable_test'] ?>" 
		 data-email="<? echo $res['email'] ?>" 
		 data-amount="<? echo $pc->add_for_kobo(50000) . "\n"; ?>"  
		 data-ref="<? echo $rand ?>"
		 data-custom-button="pay">
		 
		 
		</script>
		
		<input type="hidden" value="<? echo $pc->add_for_kobo(50000) . "\n"; ?>" name="charge" />
		
			</form>
		
			</div>			
			</center>
			
			<center>
			
			<div class="agreement">
			By clicking "Submit", you acknowledge that you have read our updated <a class="email" href="tos.php"> terms of service</a>, <a class="email" href="disclaimer.php">Disclaimer</a> and that your continued use of the website is subject to these policies.			
			
			</div>
			
			
			
			
		
			
			
			
			</center>
			
			</td>
			
			<td class="invisible" width="20%">
			
			</td>
			</tr>
			</table>
			





</div><!-- wrapper ends -->
<div class="clear" />

<?php
	include '../footer.php' ;
	
	}