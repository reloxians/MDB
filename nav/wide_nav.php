<?php
session_start();
$user = $_SESSION['username'];
?>

<div id="nav_java">
<div class="wide_nav_wrapper">
<ul class="wide_nav_ul">
	<li><a id="home" href="/"><i class="fa fa-home"></i>  Reloxians</a></li>
	<li><a href="#"><i class="fa fa-android"></i>  Apps</a></li>
	<li><a href="/services/websites.php"><i class="fa fa-html5"></i>  Websites</a></li>
	<li><a href="#"><i class="fa fa-code"></i>  E-books</a></li>
	<li><a href="/services/"><i class="fa fa-cart-plus"></i>  Services</a></li>
	
	

<!-- part 1 ends -->	

	
	<?php if($_SESSION['username']){ 
	
	?>
	
	<li class="wide_nav_right"><a href="../docs/logout.php"><i class="fa fa-user-o"></i>  Sign Out</a></li>
	
	<?php
	} else {
		?>
		
			<li class="wide_nav_right"><a href="../docs/login.php">Sign In  <i class="fa fa-long-arrow-right"></i></a></li>
			
			<?php
	}
	?>
	
	<?php if($_SESSION['username']){ 
	
	?>
	
	<li class="wide_nav_right"><a href="../../client/"><i class="fa fa-user-circle"></i>  <? echo $user ?></a></li>
	
	<?php
	} 
	
	
	
		?>
		
		
		
		<li class="wide_nav_right"><a href="../../notify/"><i class="fa fa-envelope"></i><span class="">  Inbox</span></a></li>
		
		
	
</ul>


</div>
</div>