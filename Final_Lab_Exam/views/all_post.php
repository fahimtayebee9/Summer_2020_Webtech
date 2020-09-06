<?php
	require_once('../php/session_header.php');
	require_once('../service/blogService.php');
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
	
    <h3>Post list</h3>
    
	<table border="1">
		<tr>
			<th>Sl.</th>
			<th>Post</th>
			<th>Action</th>
		</tr>

        <?php  
            
			$users = getAllPost($_GET['username']);
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