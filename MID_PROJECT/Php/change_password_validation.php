<?php
    include "DB_Config.php";
    session_start();
    if(isset($_POST['submit'])){
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];
        if(!empty($_SESSION['username'])){
            $username = $_SESSION['username'];
            if($password == $confirm_password){
                $sql = "UPDATE users set password='$password' where username='$username'";
                $updateRes = mysqli_query($db, $sql);
                if($updateRes == 1){
                    $_SESSION['updateRes'] = 'Password Succesfully Updated';
                    header('location: ../layouts/profile_details.php');
                }
                else{
                    $_SESSION['updateError'] = 'Password Not Updated';
                    header('location: ../layouts/profile_details.php');
                }
            }
            else{
                $_SESSION['updateError'] = 'Password Not Matched...';
                header('location: ../layouts/profile_details.php');
            }
        }
        else{
            $_SESSION['updateError'] = 'NO User Found...';
            header('location: ../layouts/profile_details.php');
        }
    }
?>