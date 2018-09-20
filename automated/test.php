<?php

	

	$email = 'xtrabrilliancy@gmail.com' ;
	$subject = 'cron test' ;
	$message = 'worked' ;
	
						$headers .= "Reply-To: ". strip_tags('donotreply@reloxians.com') . "\r\n";
						$headers .= "From: Alvin Excel <billing@reloxians.com>". "\r\n";
                        $headers .= "CC: Alvin@reloxians.com\r\n";
                        $headers .= "MIME-Version: 1.0\r\n";
                        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";


	mail($email, $subject, $message, $headers);

?>