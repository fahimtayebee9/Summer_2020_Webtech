<?php
    include "../../Php/db/DB_Config.php";
    session_start();
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $id = $_SESSION['uid'];
    if($password == $confirm_password){
        $sql = "UPDATE users set password='$password' where id='$id'";
        $updateRes = mysqli_query($db, $sql);
        if($updateRes){
            echo "true";
        }
        else{
            echo "false";
        }
    }
    else{
        echo "false".mysqli_error($db);
    }
?>