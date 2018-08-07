<?php
	session_start();
	if($_SESSION['username'] != 'Admin') {
		header("Location: ../");
	}