<?php
    include "../services/common/user_Service.php";
    session_start();
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $id = $_SESSION['uid'];
    if(!empty($password) && !empty($confirm_password)){
        if($password == $confirm_password){
            $update = changePassword($password,$id);
            if($update){
                echo $update;
            }
            else{
                echo $update;
            }
        }
        else{
            echo "false";
        }
    }
    else{
        echo "false";
    }
    
?>