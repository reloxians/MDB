<?php
session_start();
$me = $_SESSION['username'];
?>

<div class="nav_wrapper">
	<ul>
			
	<li <?php if($link == 'active') {echo 'class="current"';} else {echo 'class="inactive"'; }?>><a href="../../client/">Active</a></li> 


<?

$ch = "select * from notify where username='$me' and stats= 0 " ;
$cmdb = mysqli_query($connect, $ch);

$count = mysqli_num_rows($cmdb);

?>
		
	
	<li <?php if($link == 'notify') {echo 'class="current"';} else {echo 'class="inactive"'; }?>><a href="../../notify/">Inbox <span class="email"><? echo $count ?></span> </a></li> 
	

	
	<li <?php if($link == 'pending') {echo 'class="current"';} else {echo 'class="inactive"'; }?>><a href="../../pending/"><i id="warning" class="fa fa-warning"></i>  Pending</a></li>
	
	
	<li <?php if($link == 'i-pay') {echo 'class="current"';} else {echo 'class="inactive"'; }?>><a href="../../i-pay/"><i id="warning" class="fa fa-dollar"></i>  I-Pay</a></li>
			
	<li <?php if($link == 'pricing') {echo 'class="current"';} else {echo 'class="inactive"'; }?>><a href="../../company/pricing/"><i id="warning" class="fa fa-euro"></i>  Pricing</a></li> 
	
	<?php 
		if($link == 'checkout') {
		?>
		
			<li <?php if($link == 'checkout') {echo 'class="current"';} else {echo 'class="inactive"'; }?>><a>Checkout</a></li>
			<?
			
		}
	
	?>
	
	</ul>
	</div>
	