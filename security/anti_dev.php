<?php
	session_start();
	if($_SESSION['type'] == 'Developer') {
		header("Location: ../developer/dashboard");
	}
