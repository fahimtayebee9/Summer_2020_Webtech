<?php
    require_once('../db/db.php');
    
	$name = $_POST['name'];
	$sql= "select * from authors where username like '%{$name}%'";

	$result = mysqli_query($conn, $sql);

	$data = "";
	$x =1;
	while ($row = mysqli_fetch_assoc($result)) {
		$data.="<p onclick='liveSearchDataClick()' id='data-$x'>{$row['username']}</p>";
		$x++;
	}

	$data .= "";

	echo $data;

?>