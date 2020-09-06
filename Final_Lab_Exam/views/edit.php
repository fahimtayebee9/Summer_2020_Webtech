<?php
	require_once('../php/session_header.php');
	require_once('../service/userService.php');

	if (isset($_GET['id'])) {
		$id=$_GET['id'];
		$user = getByID($id);	
	}else{
		header('location: all_users.php');
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit User</title>
</head>
<body>

	<form action="../php/userController.php" method="post">
		<fieldset>
			<legend>Edit User</legend>
			<table>
				<tr>
					<td>Username</td>
					<td><input type="text" name="username" value="<?=$user['username']?>"></td>
				</tr>
				<tr>
					<td>Password</td>
					<td><input type="password" name="password" value="<?=$user['password']?>"></td>
				</tr>
				<tr>
					<td>Author Name</td>
					<td><input type="text" name="author_name" value="<?=$user['author_name']?>" id="author_name"></td>
				</tr>
				<tr>
					<td>Contact Number</td>
					<td><input type="text" name="contact_number" value="<?=$user['contact_number']?>" id="contact_number"></td>
				</tr>
				<tr>
					<td></td>
					<td>
						<input type="hidden" name="id" value="<?=$user['id']?>">
						<input type="submit" name="edit" value="Update"> 
						<a href="all_users.php">Back</a>
					</td>
				</tr>
			</table>
		</fieldset>
	</form>
</body>
</html>