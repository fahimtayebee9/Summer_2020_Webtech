<?php
	require_once('../php/session_header.php');
	require_once('../service/companyService.php');

	if (isset($_GET['id'])) {
		$user = getByID($_GET['id']);	
	}else{
		// header('location: all_company_info.php');
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Add Company</title>
</head>
<body>

	<form action="../php/companyController.php" method="post" enctype="multipart/form-data">
		<fieldset>
			<legend>Add Company</legend>
			<table>
				<tr>
					<td>Company Name</td>
					<td><input type="text" name="company_name" value=""></td>
				</tr>
				<tr>
					<td>Profile Description</td>
					<td><textarea type="text" name="description" value=""></textarea></td>
				</tr>
				<tr>
					<td>Industry</td>
					<td><input type="text" name="industry" value=""></td>
				</tr>
                <tr>
					<td>Company Website</td>
					<td><input type="text" name="website" value=""></td>
				</tr>
                <tr>
					<td>Company Logo</td>
					<td><input type="file" name="logo" value=""></td>
				</tr>
                <tr>
					<td>User Id</td>
					<td><input type="text" name="user_id" value=""></td>
				</tr>
				<tr>
					<td></td>
					<td>
						<input type="hidden" name="id" value="<?=$user['id']?>">
						<input type="submit" name="create" value="Add Company"> 
						<a href="home.php">Back</a>
					</td>
                </tr>
                <tr>
                    <td colspan=3><p><?php if(isset($_SESSION['imgError'])){echo $_SESSION['imgError'];}?></p></td>
                </tr>
			</table>
		</fieldset>
	</form>
</body>
</html>