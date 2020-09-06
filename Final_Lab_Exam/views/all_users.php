<?php
	require_once('../php/session_header.php');
	require_once('../service/userService.php');
?>


<!DOCTYPE html>
<html>
<head>
	<script src="../assets/js/script.js"></script>
	<title>User List</title>
	<style>
		.searchj{
			padding: 25px;
		}
	</style>
</head>
<body>

	<a href="home.php">Back</a> |
	<a href="../php/logout.php">Logout</a> 
	
	<h3>User list</h3>

	<p>Search Author</p>
	<form action="search_data.php" method="GET">
		<input type="text" id="a_name" name="name" onkeyup="search()"/> 
		<input type="submit" id="button" name="search" value="Click" /> 
	</form>

	<div class="searchj">
		<div class="searchdata" id="searchdata"></div>
	</div>

	<table border="1">
		<tr>
			<th>Sl.</th>
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
			<td><?=$users[$i]['author_name']?></td>
			<td><?=$users[$i]['username']?></td>
			<td><?=$users[$i]['password']?></td>
			<td><?=$users[$i]['contact_number']?></td>
			<td>
				<a href="edit.php?id=<?=$users[$i]['id']?>">Edit</a> |
				<a href="../php/delete.php?id=<?=$users[$i]['id']?>">Delete</a> 
			</td>
		</tr>

		<?php } ?>
		
	</table>
</body>
</html>