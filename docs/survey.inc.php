<?php
	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		
		include '../database/database.php' ;
		
		$username = $_POST['username'] ;
		$firstname = $_POST['firstname'] ;
		$lastname = $_POST['lastname'] ;
		$email = $_POST['email'] ;
		
		//error handling =================================
		
		$errorAllEmpty	=	false ;
		$errorEmail = false ;
		$errorUsername = false ;
		$errorFirstname = false ;
		$errorLastname = false ;
		
		if(empty($username)	&&	empty($firstname)	&&	empty($lastname)	&&	empty($email)) {
			
			echo '<span class="email">Enter all fields</span>' ;
			$errorAllEmpty = true ;
			
			}
		
		elseif (empty($_POST['username'])) {
			
			echo '<span class="email">Enter a valid username </span>' ;
				$errorUsername = true ;
		}
			
		elseif (empty($_POST['firstname'])) {
			
			echo '<span class="email">Enter a valid firstname </span>' ;
				$errorFirstname = true ;
				
			} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				
				echo '<span class="email">Enter a valid e-mail </span>' ;
				$errorEmail = true ;
				
			} else {
				
				echo '<span class="email">Entry successful </span>' ;
			
			}
		
		} else {
		
			echo '<span class="email">There was an Error </span>' ;
		}
?>



<script>

$("#username,	#firstname,	#lastname,	#email").removeClass("input-error") ;

	var errorAllEmpty = "<? echo $errorAllEmpty ?>" ;
	var errorUsername = "<? echo $errorUsername ?>" ;
	var errorEmail = "<? echo $errorEmail ?>" ;
	var errorFirstname = "<? echo $errorFirstname ?>" ;
	
	if(errorAllEmpty == true) {
		
		$("#username,	#firstname,	#lastname,	#email").addClass("input-error") ;
		
		}
		
	if(errorFirstname == true)	{
		
		$("#firstname").addClass("input-error") ;
		
		} 
		
	if(errorUsername == false ) {
		
		$("#username").addClass("input-valid") ;
		
		}
		
	if(errorUsername == true) {
		
		$("#username").addClass("input-error") ;
		
		}
		
	if(errorEmail == true)	{
		
		$("#email").addClass("input-error") ;
		
		}
		
	if(errorEmail == false && errorEmpty == false ) {
		
		$("#username,	#firstname,	#lastname,	#email").val("") ;
		
		}	

</script>