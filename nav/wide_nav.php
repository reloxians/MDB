<?php
session_start();

$user = $_SESSION['username'];
?>

<div id="nav_java">
<div class="wide_nav_wrapper">

<ul class="wide_nav_ul">
	<li><a id="home" href="/"><img style="margin-bottom: -8px; margin-left: -20px;" src="/logo.png" width="130px" /></a></li>
	
	
<!-- <li><a href="#"><i class="fa fa-android"></i>  Apps</a></li> -->
<!--	<li><a href="/services/websites.php"><i class="fa fa-html5"></i>  Websites</a></li> -->
	<li><a href="/library/"><i class="fa fa-code"></i>  E-books</a></li>
	<li><a href="/company/pricing"><i class="fa fa-dollar"></i>  Pricing</a></li>
	<li><a href="/company/request"><i class="fa fa-share"></i>  Request</a></li>
	

<!-- part 1 ends -->	
	
	<?php if($_SESSION['username']){ 
	
	?>
	
	<li class="wide_nav_right"><a href="../../../docs/logout.php"><i class="fa fa-user-o"></i>  Sign Out</a></li>
	
	<?php
	} else {
		?>
		
			<li class="wide_nav_right"><a href="../../../docs/login.php">Sign In  <i class="fa fa-long-arrow-right"></i></a></li>
			
			<?php
	}
	?>
	
	<?php if($_SESSION['username'] && $_SESSION['type'] != 'Developer') { 
	
	?>
	
	<li class="wide_nav_right"><a href="../../../client/"><i class="fa fa-user-circle"></i>  <? echo $user ?></a></li>
	
	<?php
	} elseif($_SESSION['type'] == 'Developer') {
	
	?>
	
	<li class="wide_nav_right"><a href="../../developer/dashboard"><i class="fa fa-user-circle"></i>  <? echo '<b style="color: #ff6600;">Dev</b> '.$user ?></a></li>
	
	<?
	
	}
	
		?>
		
	
</ul>

</div>
</div>