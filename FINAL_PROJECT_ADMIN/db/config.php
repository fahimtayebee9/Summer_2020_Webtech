<?php
	
	$host	= "localhost";
	$dbuser = "root";
	$dbpass = "";
	$dbname	= "hms";

	function dbConnection(){
		global $host;
		global $dbname;
		global $dbuser;
		global $dbpass;

		return $conn = mysqli_connect($host, $dbuser, $dbpass, $dbname);
	}

?>