<?php
	session_start();

	session_destroy();

	header('location: ..\Layouts\login.html');

?>