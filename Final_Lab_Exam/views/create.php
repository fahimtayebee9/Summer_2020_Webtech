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
	<script src="../assets/js/script.js"></script>
</head>
<body>

	<form action="" method="POST" onsubmit="">
		<fieldset>
			<legend>Create New Author</legend>
			<table>
				<tr>
					<td>Author Name</td>
					<td><input type="text" name="author_name" id="author_name"></td>
					<td><p id="errorMsgName"></p></td>
				</tr>
				<tr>
					<td>Username</td>
					<td><input type="text" name="username" id="username" onkeyup="usernameValidate()"></td>
					<td><p id="errorMsgUsername"></p></td>
				</tr>
				<tr>
					<td>Password</td>
					<td><input type="password" name="password" id="password"></td>
					<td><p id="errorMsgpass"></p></td>
				</tr>
				<tr>
					<td>Contact Number</td>
					<td><input type="text" name="contact_number" id="contact_number"></td>
					<td><p id="errorMsgcontact"></p></td>
				</tr>
				<tr>
					<td></td>
					<td>
						<input type="submit" name="create" value="Create" onclick="submitForm()"> 
						<a href="home.php">Back</a>
					</td>
				</tr>
				<tr>
					<td><p id="formError"></p></td>
				</tr>
			</table>
		</fieldset>
	</form>
</body>
</html>