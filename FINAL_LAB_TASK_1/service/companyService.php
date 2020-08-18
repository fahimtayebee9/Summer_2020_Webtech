<?php
	require_once('../db/db.php');

	function getByID($id){
		$conn = dbConnection();
		if(!$conn){
			echo "DB connection error";
		}
		$sql = "select * from company_info where id={$id}";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);
		return $row;
	}

	function getAllCompany(){
		$conn = dbConnection();
		if(!$conn){
			echo "DB connection error";
		}
		$sql = "select * from company_info";
		$result = mysqli_query($conn, $sql);
		$companyies = [];
		while($row = mysqli_fetch_assoc($result)){
			array_push($companyies, $row);
		}
		return $companyies;
	}

	function insert($company){
		$conn = dbConnection();
		if(!$conn){
			echo "DB connection error";
		}
		$target = "../images/".basename($company['company_logo']);
		$i=1;
		if(file_exists($target)){
			$target = "../images/$i-".basename($company['company_logo']);
			$i++;
		}
		$sql = "insert into company_info values('', '{$company['company_name']}','{$company['profile_description']}', '{$company['industry']}', '{$company['company_website']}', '{$company['company_logo']}', '{$company['user_account_id']}')";
		if(mysqli_query($conn, $sql)){
			if (move_uploaded_file($_FILES['logo']['tmp_name'], $target)) {
				$_SESSION['imgSuccess'] = "Image uploaded successfully";
			}else{
				$_SESSION['imgError'] = "Failed to upload image";
			}
			return true;
		}else{
			return false;
		}
	}

	function update($company){
        $conn = dbConnection();
        if(!$conn){
            echo "DB connection error";
            $sql = "update company_info set company_name='{$company['company_name']}', profile_description='{$company['profile_description']}', industry='{$company['industry']}', company_website='{$company['company_website']}', company_logo='{$company['company_logo']}', user_account_id='{$company['user_account_id']}' where id='{$company['id']}'";
			$target = "../images/".basename($company['company_logo']);
			if(mysqli_query($conn, $sql)){
				if (move_uploaded_file($_FILES['logo']['tmp_name'], $target)) {
					$_SESSION['imgSuccess'] = "Image uploaded successfully";
				}else{
					$_SESSION['imgError'] = "Failed to upload image";
				}
                return true;
            }else{
				return false;
			}
        }
    }
?>