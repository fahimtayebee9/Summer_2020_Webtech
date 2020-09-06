<?php 
	session_start();
	require_once('../service/userService.php');
	$username 	= $_POST['username'];
	$password 	= $_POST['password'];
	$contact_number = $_POST['contact_number'];
	$author_name = $_POST['author_name'];

	if(empty($username) || empty($password) || empty($contact_number) || empty($author_name)){
		header('location: ../views/register.php?error=null_value');
	}
	else{

		$user = [
			'username'=> $username,
			'password'=> $password,
			'author_name'=> $author_name,
			'contact_number'=> $contact_number,
			'role'=>"Author"
		];

		$status = insert($user);
		if($status){
			echo "true";
		}else{
			echo "false";
		}
	}
?>