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

	<form action="../php/post.php" method="POST" onsubmit="">
		<fieldset>
			<legend>Create New Author</legend>
			<table>
				<tr>
					<td>Post </td>
					<td><textarea name="post" id="post" cols="30" rows="10"></textarea></td>
					<td><p id="errorMsgName"></p></td>
				</tr>
				<tr>
					<td></td>
					<td>
                        <input type="hidden" id="username" name="username" value="<?=$_GET['username']?>">
						<input type="submit" name="create" value="Create"> 
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