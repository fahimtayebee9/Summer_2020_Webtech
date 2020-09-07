<?php
    require_once('../db/config.php');

    function update_profile($admin){
        $db = dbConnection();
        $name = $admin['name'];
        $email = $admin['email'];
        $password = $admin['password'];
        $username = $admin['username'];
        $role = $admin['role'];
        $uid = $admin['userId']; 
        $id = $admin['id'];
        $dob = $admin['dob'];
        $gender = $admin['gender'];
        $balance = $admin['balance'];
        $profile_picture = $admin['profile_picture'];

        $sql_user = "UPDATE users set name='$name', email='$email', username='$username' ,password='$password', role='$role' where id = '$uid'";
        $res_user = mysqli_query($db,$sql_user);
        
        $sql_admin = "UPDATE admininfo set name = '$name', dob='$dob', gender='$gender', balance ='$balance', profile_picture='$profile_picture' where id = '$id'";
        $res_admin = mysqli_query($db,$sql_admin);

        if($res_user && $res_admin){
            return true;
        }
        else{
            return false; 
        }
        
    }

    function changePassword($password,$uid){
        $db = dbConnection();
        
        $sql_user = "UPDATE users set password='$password' where id = '$uid'";
        $res_user = mysqli_query($db,$sql_user);

        if($res_user){
            return true;
        }
        else{
            return false; 
        }
    }
?>