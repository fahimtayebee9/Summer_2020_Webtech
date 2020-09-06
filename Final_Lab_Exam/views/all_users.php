<?php
	require_once('../php/session_header.php');
	require_once('../service/userService.php');
?>


<!DOCTYPE html>
<html>
<head>
	<title>User List</title>
</head>
<body onload="getAllUser()">

	<a href="home.php">Back</a> |
	<a href="../php/logout.php">Logout</a> 
	
	<h3>User list</h3>

	<table border="1">
		<tr>
			<th>Author Name</th>
			<th>Username</th>
			<th>Password</th>
			<th>Contact Number</th>
			<th>Action</th>
		</tr>

		<?php  
			$users = getAllUser();
			for ($i=0; $i != count($users); $i++) {  ?>
		<tr>
			<td><?=$users[$i]['id']?></td>
			<td><?=$users[$i]['username']?></td>
			<td><?=$users[$i]['password']?></td>
			<td><?=$users[$i]['email']?></td>
			<td><?=$users[$i]['type']?></td>
			<td>
				<a href="edit.php?id=<?=$users[$i]['id']?>">Edit</a> |
				<a href="delete.php?id=<?=$users[$i]['id']?>">Delete</a> 
			</td>
		</tr>

		<?php } ?>
		
	</table>
</body>
</html>