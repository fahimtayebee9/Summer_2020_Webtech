<?php
	require_once('../php/session_header.php');
	require_once('../service/companyService.php');

	if (isset($_GET['c_id'])) {
		$company = getByID($_GET['c_id']);	
	}else{
		header('location: all_company_info.php');
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit Company</title>
</head>
<body>

	<form action="../php/companyController.php" method="post" enctype="multipart/form-data">
		<fieldset>
			<legend>Edit Company</legend>
			<table>
				<tr>
					<td>Company Name</td>
					<td><input type="text" name="company_name" value="<?php echo $company['company_name']?>"></td>
				</tr>
				<tr>
					<td>Profile Description</td>
					<td><textarea type="text" name="description" value="<?php echo $company['profile_description']?>"></textarea></td>
				</tr>
				<tr>
					<td>Industry</td>
					<td><input type="text" name="industry" value="<?php echo $company['industry']?>"></td>
				</tr>
                <tr>
					<td>Company Website</td>
					<td><input type="text" name="website" value="<?php echo $company['company_website']?>"></td>
				</tr>
                <tr>
					<td>Company Logo</td>
					<td><input type="file" name="logo" value="<?php echo $company['company_logo']?>"></td>
				</tr>
                <tr>
					<td>User Id</td>
					<td><input type="text" name="user_id" value="<?php echo $company['user_account_id']?>"></td>
				</tr>
				<tr>
					<td></td>
					<td>
						<input type="hidden" name="id" value="<?=$company['id']?>">
						<input type="submit" name="edit" value="Add Company"> 
						<a href="all_company_info.php">Back</a>
					</td>
                </tr>
                <tr>
                    <td colspan=3><p><?php if(isset($_SESSION['imgError'])){echo $_SESSION['imgError'];}?></p></td>
                </tr>
				<tr>
                    <td colspan=3><p><?php if(isset($_GET['error'])){echo $_GET['error'];}?></p></td>
                </tr>
			</table>
		</fieldset>
	</form>
</body>
</html>