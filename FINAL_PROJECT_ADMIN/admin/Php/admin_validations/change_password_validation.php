<?php
    include "../../Php/services/admin_service.php";
    session_start();
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $id = $_SESSION['uid'];
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
        echo "false".mysqli_error($db);
    }
?>