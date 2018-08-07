<?php 
	session_start();
	$from = $_SERVER['REQUEST_URI'];
//	$converted = base64_encode($from);
	
	if(!$_SESSION['username']) {
		?>	
	
	<form id="form" action="../../docs/login" method="POST">
				 		 <input name="next" type="hidden" value="<? echo $from ?>"/>
				 		 </form>
				 		 
				 		 <script>
				 		 document.getElementById("form").submit();
				 		 </script>
	<?
	exit();
		//header("Location: ../docs/login.php?Next=$from");
	}
	