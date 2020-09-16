<?php
    require_once('../../../db/config.php');
    function getEmpCount($type1){
        $conn = dbConnection();

        if(!$conn){
            echo "DB connection error";
        }

        $sql = "select * from users where userType like '$type1'";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) == 0){
            return 0;
        }
        else{
            return mysqli_num_rows($result);
        }
    }

    function getCustomerCount($type){
        $conn = dbConnection();

        if(!$conn){
            echo "DB connection error";
        }

        $sql = "select * from users where userType like '$type'";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) == 0){
            return 0;
        }
        else{
            return mysqli_num_rows($result);
        }
    }

    function getEmployeeList(){
        $conn = dbConnection();

        if(!$conn){
            echo "DB connection error";
        }

        $sql = "select * from users where userType like 'Employee'";
        $result = mysqli_query($conn, $sql);

        $users = [];

		while($row = mysqli_fetch_assoc($result)){
			array_push($users, $row);
        }
        
        return $users;
    }

    function getCustomerList(){
        $conn = dbConnection();

        if(!$conn){
            echo "DB connection error";
        }

        $sql = "select * from users where userType like 'Customer'";
        $result = mysqli_query($conn, $sql);

        $users = [];

		while($row = mysqli_fetch_assoc($result)){
			array_push($users, $row);
        }
        
        return $users;
    }

    function search_user($value, $type){
        $conn = dbConnection();
        if(!$conn){
            echo "DB connection error";
        }

        $sqlEmp = "select * from users where name like '%$value%' and userType='$type'";
        $resultEmp = mysqli_query($conn,$sqlEmp);

        $userEmp = [];

		while($row = mysqli_fetch_assoc($resultEmp)){
			array_push($userEmp, $row);
        }
        
        return $userEmp;
    }

    function get_userData($value){
        $conn = dbConnection();
        if(!$conn){
            echo "DB connection error";
        }

        $sql = "select * from users where id='$value'";
        $result = mysqli_query($conn,$sql);

        $user = (object) array();

		while($row = mysqli_fetch_assoc($result)){
            $user->name              = $row['name'];
            $user->email             = $row['email'];
            $user->phone             = $row['phone'];
            $user->dateOfBirth       = $row['dateOfBirth'];
            $user->profile_picture   = $row['profile_picture'];
            $user->userType          = $row['userType'];
        }
        
        return $user;
    }
?>