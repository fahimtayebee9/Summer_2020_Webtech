<?php
	require_once('../php/session_header.php');
	require_once('../service/companyService.php');
?>


<!DOCTYPE html>
<html>
<head>
	<title>User List</title>
</head>
<body>

	<a href="home.php">Back</a> |
	<a href="../php/logout.php">Logout</a> 
	
	<h3>Company list</h3>

	<table border="1">
		<tr>
			<td>ID</td>
			<td>Company Name</td>
			<td>Profile Desciption</td>
			<td>Industry</td>
			<td>Company Website</td>
			<td>Company Logo</td>
            <td>User Account ID</td>
            <td>Action</td>
		</tr>

		<?php  
			$companyies = getAllCompany();
			for ($i=0; $i != count($companyies); $i++) {  ?>
		<tr>
			<td><?=$companyies[$i]['id']?></td>
			<td><?=$companyies[$i]['company_name']?></td>
			<td><?=$companyies[$i]['profile_description']?></td>
			<td><?=$companyies[$i]['industry']?></td>
			<td><?=$companyies[$i]['company_website']?></td>
            <td><?=$companyies[$i]['company_logo']?></td>
            <td><?=$companyies[$i]['user_account_id']?></td>
			<td>
				<a href="edit_company.php?c_id=<?=$companyies[$i]['id']?>">Edit</a> |
				<a href="delete_company.php?id=<?=$companyies[$i]['id']?>">Delete</a> 
			</td>
		</tr>

		<?php } ?>
		
	</table>
</body>
</html>