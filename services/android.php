<?php 
	session_start();
	$link = 'services' ;
	$active = 'android' ;
	
	include '../database/database.php';
	include '../client/init.php';
	include '../security/auth_check.php' ;
	
	include '../header.php' ;
	include '../parallax.php' ;
	include '../nav/profile_nav.php' ;
	include '../sidebars/service_bar_small.php' ;
	echo '<br>' ;
	include '../sidebars/service_bar.php' ;
	
	$me = $_SESSION['username'];
		
		$get = "select * from users where username= '$me' ";
		$cmd = mysqli_query($connect, $get);
		$res = mysqli_fetch_assoc($cmd);
	
	?>
	
	
	<div class="near_sidebar"><!-- wrapper start -->
			
			

<div class="pre_block_plain">
<div class="pre_block_header">
				Android App Request
			</div>
	<br>

The <?php echo site_name() ?> can help you build an Android app for your blogs, websites & any other category of app you need. send your request & app description to our Android App Development department.
</div>
<br>



	<table width="100%" cellpadding="5">
			<tr bgcolor="">
			<td class="invisible" width="20%">
			
			</td>
			
			<td width="60%">
						
			
			
			<center>
			<div class="form_class">
			
			<form action="android_cart" method="POST">			
			
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
			
			<textarea name="desc" required="required" placeholder="Desceibe what you want"rows="8"></textarea>
			
			<select name="category" required="required">
				<option value="">Select a category</option>
				<option value="webapps">Webapps</option>
				<option value="others">Others</option>
			</select>
			
			<div class="forbidden_class_wrapper">		
					
			<div class="valid_class">
<i class="fa fa-warning"></i> Note: a service fee of <span class="email"> ₦500 NGN</span> which will be later deducted from the total service charge is required to place your order, this is to avoid spam and unserious requests from users.
</div>
				</div>
  
   <button type="submit" name="next" class="pink_btn">NEXT <i class="fa fa-long-arrow-right"></i></button>
		
			</form>
		
			</div>			
			</center>
			
			<center>
			
			<div class="agreement">
			By clicking "Submit", you acknowledge that you have read our updated <a class="email" href="/docs/tos.php"> terms of service</a>, <a class="email" href="/docs/disclaimer.php">Disclaimer</a> and that your continued use of the website is subject to these policies.
			
			
			
			
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