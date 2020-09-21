<?php
	$db = mysqli_connect("localhost", "root", "", "hms");
	if ( $db ){
		// echo "Database Connected Successfully.";
	}
	else{
		die("MySQLi Connection Failed." . mysqli_error($db));
	}
?>