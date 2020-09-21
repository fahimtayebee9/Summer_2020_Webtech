<?php
    require_once('../../../db/config.php');

    function getData($id){
        $con = dbConnection();

        if(!$con){
            echo "ERROR".mysqli_error($con);
        }

        $sql = "select * from admin_info where user_id='$id'";
        $result = mysqli_query($con,$sql);
        $admin =[];
        while($row = mysqli_fetch_assoc($result)){
            array_push($admin,$row);
        }
        return $admin;
    }
    
    function updateAdmin($admin){
        $con = dbConnection();

        if(!$con){
            echo "ERROR".mysqli_error($con);
        }
        $sql = "update admin_info set balance='{$admin['balance']}' where user_id='{$admin['user_id']}'";
        $result = mysqli_query($con,$sql);

        return $result;
    }

    function getAll_application(){
        $con = dbConnection();

        if(!$con){
            echo "ERROR\n".mysqli_error($con);
        }
        $sql = "select * from job_application";
        $result = mysqli_query($con,$sql);

        $result_arr = [];
        while($row = mysqli_fetch_assoc($result)){
            array_push($result_arr,$row);
        }

        return $result_arr;
    }

    function getApplicationById($app_id){
        $con = dbConnection();

        if(!$con){
            echo "ERROR\n".mysqli_error($con);
        }
        $sql = "select * from job_application where id = '$app_id'";
        $result = mysqli_query($con,$sql);

        $result_arr = (object)array();
        while($row = mysqli_fetch_assoc($result)){
            $result_arr->id = $row['id'];
            $result_arr->email = $row['email'];
            $result_arr->name = $row['name'];
            $result_arr->position = $row['position'];
            $result_arr->expected_salary = $row['expected_salary'];
            $result_arr->cv_file = $row['cv_file'];
        }

        return $result_arr;
    }

    function deleteApplication($id){
        $con = dbConnection();

        if(!$con){
            echo "ERROR\n".mysqli_error($con);
        }
        $sql = "delete from job_application where id = '$id'";
        $result = mysqli_query($con,$sql);
        if($result){
            return $result;
        }
        else{
            return mysqli_error($con);
        }
    }
?>