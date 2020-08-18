<?php 
	require_once('../php/session_header.php');
	require_once('../service/companyService.php');

	//add Company
	if(isset($_POST['create'])){
		$company_name 	= $_POST['company_name'];
		$profile_description 	= $_POST['description'];
        $industry 		= $_POST['industry'];
        $company_website = $_POST['website'];
        $company_logo = $_FILES["logo"]["name"];
        $user_account_id = $_POST['user_id'];
		if(empty($company_name) || empty($profile_description) || empty($industry) || empty($company_website)|| empty($company_logo) || empty($user_account_id)){
			header('location: ../views/add_company.php?error=null_value');
		}else{
			$company = [
				'company_name'=> $company_name,
				'profile_description'=> $profile_description,
                'industry'=> $industry,
                'company_website' => $company_website,
                'company_logo' => $company_logo,
                'user_account_id' => $user_account_id
			];

			$status = insert($company);

			if($status){
				header('location: ../views/all_company_info.php?success=done');
			}else{
				header('location: ../views/add_company.php?error=db_error');
			}
		}
	}

	//update Company
	if(isset($_POST['edit'])){
		$company_name 	= $_POST['company_name'];
		$profile_description 	= $_POST['description'];
        $industry 		= $_POST['industry'];
        $company_website = $_POST['website'];
        $company_logo = $_FILES["logo"]["name"];
		$user_account_id = $_POST['user_id'];
		$id = $_POST['id'];

		if(empty($company_name) || empty($profile_description) || empty($industry) || empty($company_website)|| empty($company_logo) || empty($user_account_id)){
			header('location: ../views/all_company_info.php?error=null_value');
		}else{
			$company = [
				'id' => $id,
				'company_name'=> $company_name,
				'profile_description'=> $profile_description,
                'industry'=> $industry,
                'company_website' => $company_website,
                'company_logo' => $company_logo,
                'user_account_id' => $user_account_id
			];

			$status = update($company);

			if($status){
				header('location: ../views/all_company_info.php?success=done');
			}else{
				header('location: ../views/edit_company_info.php?error=db_error');
			}
		}
	}

?>