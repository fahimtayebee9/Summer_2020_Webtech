<?php
    session_start();    
    if(isset($_POST["submit_btn"])){
        $username = $_POST["username"];
        $password = $_POST["password"];
        if(empty($username) && empty($password)){
            echo "Null Submission";
        }
        else if(isset($_SESSION['user'])){
            if($username == $_SESSION['user']['username'] && $password == $_SESSION['user']['password']){
                $_SESSION['status'] == 'OK';
                header('location : ../Layouts/loggedin_home.html');
            }
            else{
                echo "Invalid Username / Password";
            }
        }
        else{
            echo "No Record Found";
        }
    }
?>