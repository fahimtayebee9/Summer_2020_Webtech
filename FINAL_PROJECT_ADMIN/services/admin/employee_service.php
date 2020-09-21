<?php
    require_once('../../../db/config.php');
    function get_EmployeesType($filterType){
        $conn = dbConnection();

        if(!$conn){
            echo "DB connection error";
        }

        $sql = "SELECT users.id, users.name, users.email, users.profile_picture, employee_details.salary,employee_details.role,employee_details.bonus,employee_details.rating FROM users INNER JOIN employee_details ON users.id = employee_details.user_id where employee_details.role like '%$filterType%'";
        $result = mysqli_query($conn, $sql);

        $users = [];

		while($row = mysqli_fetch_assoc($result)){
			array_push($users, $row);
        }
        // mysqli_close($conn);
        return $users;
    }
    
    function get_Employees(){
        $conn = dbConnection();

        if(!$conn){
            echo "DB connection error";
        }

        $sql = "SELECT users.id, users.name, users.email, users.profile_picture, employee_details.salary,employee_details.balance,employee_details.role,employee_details.bonus,employee_details.rating,employee_details.user_id FROM users INNER JOIN employee_details ON users.id = employee_details.user_id where users.userType='Employee'";
        $result = mysqli_query($conn, $sql);

        $emp = [];

		while($row = mysqli_fetch_assoc($result)){
			array_push($emp, $row);
        }
        // mysqli_close($conn);
        return $emp;
    }

    function get_empDataById($id){
        if($id != null || $id !=""){
            $conn = dbConnection();

            if(!$conn){
                echo "DB connection error";
            }

            $sql = "SELECT users.id, users.name, users.email, users.profile_picture, employee_details.salary,employee_details.balance,employee_details.role,employee_details.bonus,employee_details.rating FROM users INNER JOIN employee_details ON users.id = employee_details.user_id where users.id='$id'";
            $result = mysqli_query($conn, $sql);

            $emp = (object)array();

            while($row = mysqli_fetch_assoc($result)){
                $emp->id = $row['id'];
                $emp->name = $row['name'];
                $emp->email = $row['email'];
                $emp->profile_picture = $row['profile_picture'];
                $emp->salary = $row['salary'];
                $emp->role = $row['role'];
                $emp->bonus = $row['bonus'];
                $emp->rating = $row['rating'];
                $emp->balance = $row['balance'];
            }
            // mysqli_close($conn);
            return $emp;
        }
    }

    function updateEmp($empData){
        $conn = dbConnection();

        if(!$conn){
            echo "DB connection error";
        }
        $empData = (object) json_decode( $empData, true);

        $role = $empData->role;
        $salary = $empData->salary;
        $bonus = $empData->bonus;
        $balance = $empData->balance;
        $rating = $empData->rating;
        $user_id = $empData->user_id;

        $sqlEmp = "update employee_details set role='$role', salary='$salary', bonus='$bonus', balance='$balance', rating='$rating' where user_id='$user_id'";
        $status = mysqli_query($conn, $sqlEmp);
        // mysqli_close($conn);
        return $status;
    }

    function removeEmp($user_id){
        $conn = dbConnection();

        if(!$conn){
            echo "DB connection error";
        }

        $validRemove = false;

        $sqlRmvEmp = "delete from employee_details where user_id='$user_id'";
        $statusEmpRmv = mysqli_query($conn, $sqlRmvEmp);
        if($statusEmpRmv){
            $sqlRmvUser = "delete from users where id='$user_id'";
            $statusUserRmv = mysqli_query($conn, $sqlRmvUser);
            if($statusUserRmv){
                 $validRemove = true;
            }
            else{
                $validRemove = false;
            }
        }
        else {
            $validRemove = false;
        }
        // mysqli_close($conn);
        return $validRemove;
    }

    function insertEmp($empDataAdd){
        $conn = dbConnection();

        if(!$conn){
            echo "DB connection error";
        }

        $sql = "insert into users (id,name,email,phone,password,dateOfBirth,profile_picture,userType) values('','$empDataAdd->name','$empDataAdd->email','','$empDataAdd->password','$empDataAdd->date','','Employee')";
        $status = mysqli_query($conn, $sql);
        global $id; global $sqlEmp;
        if($status){
            $getSql = "select * from users where email='$empDataAdd->email'";
            $res = mysqli_query($conn, $getSql);
            while($row = mysqli_fetch_assoc($res)){
                $id = $row['id'];
            }
            $sqlEmp = "insert into employee_details (id,role,salary,bonus,balance,rating,user_id) values('','$empDataAdd->role','$empDataAdd->salary','0','0','0','$id')";
            $statusEmp = mysqli_query($conn, $sqlEmp);
        }
        // mysqli_close($conn);
        return $statusEmp;
    }

?>