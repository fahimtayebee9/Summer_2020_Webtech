<?php
    include "DB_Config.php";
    session_start();
    if(isset($_POST['submit'])){
        if(empty($_POST['email']) || empty($_POST['password'])){
            echo "<h4>Invalid Input</h4>";
        }
        else{
            $email = $_POST['email'];
            $password = $_POST['password'];
            $sql = "SELECT * FROM users where email='$email' and password = '$password'";
            $alluser = mysqli_query($db, $sql);
            $rowCount = mysqli_num_rows($alluser);
            if($rowCount > 0){
                while( $row = mysqli_fetch_assoc($alluser) ){
                    $id       = $row['id'];
                    $email_db    = $row['email'];
                    $username_db   = $row['username'];
                    $password_db  = $row['password'];
                    $role = $row['role'];
                    if(($email == $email_db) && ($password == $password_db)){
                        if($role == 'Admin'){
                            $_SESSION['username'] = $username_db;
                            setcookie('email', $email, time() + (86400 * 30), "/");
                            setcookie('password', $password, time() + (86400 * 30), "/");
                            header('location: ../layouts/admin_home.php');
                            break;
                        }
                        else if($role == 'Customer'){
                            $_SESSION['username'] = $username_db;
                            header('location: ../layouts/user_home.php');
                            break;
                        }
                        else if($role == 'Manager'){
                            $_SESSION['username'] = $username_db;
                            header('location: ../layouts/user_home.php');
                            break;
                        }
                        else if($role == 'Chef' || $role == 'Worker'){
                            $_SESSION['username'] = $username_db;
                            header('location: ../layouts/user_home.php');
                            break;
                        }
                    }
                } 
            }
            else{
                    $_SESSION['loginError'] = 'Invalid Information...';
                    header('location: ../layouts/login.php');
            }
        }
    }
    else if(isset($_POST['register'])){
        header('location: ../layouts/register.php');
    }
    else{

    }
?>