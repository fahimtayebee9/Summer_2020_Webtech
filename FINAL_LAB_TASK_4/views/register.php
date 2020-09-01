<?php

	if (isset($_GET['error'])) {
		
		if($_GET['error'] == 'db_error'){
			echo "Something went wrong...please try again";
		}
	}

?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="../assets/css/style.css">
	<script src="../assets/js/script.js" type="text/javaScript"></script>
	<title>SignUp</title>

</head>
<body>

	<form action="../php/regCheck.php" method="post">
		<fieldset>
			<legend>SignUp</legend>
			<table>
				<tr>
					<td>Username</td>
					<td><input type="text" name="username"></td>
				</tr>
				<tr>
					<td>Email</td>
					<td><input type="text" name="email" id="email" onkeyup="emailValidate()"></td>
					<td><p id="errorMsg"></p></td>
				</tr>
				<tr>
					<td>Password</td>
					<td><input type="password" name="password"></td>
					
				</tr>
				<tr>
					<td></td>
					<td>
						<input type="button" name="submit" value="Submit" onclick="submitForm()">
						<a href="login.php" id="login">Login</a>
					</td>
				</tr>
			</table>
		</fieldset>
	</form>
</body>
</html>