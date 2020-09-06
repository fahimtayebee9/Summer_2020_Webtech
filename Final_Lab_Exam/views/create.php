<?php
	require_once('../php/session_header.php');
	if (isset($_GET['error'])) {
		
		if($_GET['error'] == 'db_error'){
			echo "Something went wrong...please try again";
		}
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Add Author</title>
</head>
<body>

	<form action="" method="">
		<fieldset>
			<legend>Create New Author</legend>
			<table>
				<tr>
					<td>Author Name</td>
					<td><input type="text" name="name" id="name"></td>
					<td><p id="errorMsgUsername"></p></td>
				</tr>
				<tr>
					<td>Username</td>
					<td><input type="text" name="username" id="username"></td>
					<td><p id="errorMsgUsername"></p></td>
				</tr>
				<tr>
					<td>Password</td>
					<td><input type="password" name="password" id="password"></td>
					<td><p id="errorMsgUsername"></p></td>
				</tr>
				<tr>
					<td>Contact Number</td>
					<td><input type="text" name="contact" id="contact"></td>
					<td><p id="errorMsgUsername"></p></td>
				</tr>
				<tr>
					<td></td>
					<td>
						<input type="submit" name="create" value="Create" onclick="submitForm()"> 
						<a href="home.php">Back</a>
					</td>
				</tr>
			</table>
		</fieldset>
	</form>
</body>
</html>