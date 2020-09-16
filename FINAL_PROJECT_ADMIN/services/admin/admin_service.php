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
?>