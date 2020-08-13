<?php
    include "DB_Config.php";
    session_start();
    if(isset($_POST['change'])){
        $curPass = $_POST['cur_password'];
        $newPass = $_POST['new_password'];
        $confirmPass =  $_POST['confirm_password'];
        $getUserQuery = "SELECT * FROM user_test where id = '$id'";
        $getRes = mysqli_query($db,$getUserQuery);
        if(mysqli_num_rows($getRes) == 1){
            $data = mysqli_fetch_assoc($getRes);
            $pass_db = $data['password'];
            if(empty($newPass) || empty($confirmPass)){
                $_SESSION['passError'] = "Empty Data Inserted..FIllup the password to change...";
            }
            else if($newPass != $confirmPass){
                $_SESSION['passError'] = "Password NOt Matched....";
                header('location: ../layouts/change_password.php');
            }
            else if(strlen($newPass) < 8 || strlen($confirmPass) < 8){
                $_SESSION['passError'] = "Password Must be 8 characters long....";
                header('location: ../layouts/change_password.php');
            }
            else if($curPass != $pass_db){
                $_SESSION['passError'] = "Current Password Not Matched....";
                header('location: ../layouts/change_password.php');
            }
            else{
                $id = $_SESSION['id'];
                $query = "UPDATE user_test set password = '$newPass' where id = '$id'";
                $result = mysqli_query($db,$query);
                if($result){
                    $_SESSION['success'] = 'Password Changed..';
                    header('location: ../layouts/change_password.php');
                }
            }
        }
        else{
            $_SESSION['passError'] = "INVALID....";
            header('location: ../layouts/change_password.php');
        }
    }
?>