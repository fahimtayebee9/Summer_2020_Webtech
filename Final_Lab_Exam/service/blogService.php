<?php
    require_once('../db/db.php');

    function getAllPost($username){
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
        }
        
        $id = getId($username);

		$sql = "select * from blog where id='$id'";
		$result = mysqli_query($conn, $sql);
		$users = [];

		while($row = mysqli_fetch_assoc($result)){
			array_push($users, $row);
		}

		return $users;
    }
    
    function getId($username){ 
        $conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

		$sql = "select id from author where username='$username'";
        $result = mysqli_query($conn, $sql);
        $id ="";
        while($row = mysqli_fetch_assoc($result)){
            $id = $row['id'];
        }
        return $id;
    }
?>  