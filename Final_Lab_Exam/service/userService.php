<?php
	require_once('../db/db.php');

	function getByID($id){
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

		$sql = "select * from authors where id={$id}";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);
		return $row;
	}

	function getAllUser(){
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

		$sql = "select * from authors";
		$result = mysqli_query($conn, $sql);
		$users = [];

		while($row = mysqli_fetch_assoc($result)){
			array_push($users, $row);
		}

		return $users;
	}

	function search_user($username){
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

		$sql = "select * from authors where username like '%$username%'";
		$result = mysqli_query($conn, $sql);

		if(mysqli_num_rows($result) == 0){
			return true;
		}
		else{
			return false;
		}
	}

	function validate($user){
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

		$sql = "select * from authors where username='{$user['username']}' and password='{$user['password']}'";
		$result = mysqli_query($conn, $sql);
		$user = mysqli_fetch_assoc($result);

		if(count($user) > 0 ){
			$_SESSION['role'] = $user['role'];
			return true;
		}else{
			return false;
		}
	}


	function insert($user){
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

		$sql = "insert into authors (author_name,contact_number,username,password,role) values('{$user['author_name']}','{$user['contact_number']}', '{$user['username']}', '{$user['password']}','{$user['role']}')";
		if(mysqli_query($conn, $sql)){
			return true;
		}else{
			return false;
		}
	}


	function update($user){
		$conn = dbConnection();
		if(!$conn){
			echo "DB connection error";
		}

		$sql = "update authors set username='{$user['username']}', password='{$user['password']}',author_name='{$user['author_name']}' ,contact_number='{$user['contact_number']}' where id={$user['id']}";

		if(mysqli_query($conn, $sql)){
			return true;
		}else{
			return false;
		}
	}
?>