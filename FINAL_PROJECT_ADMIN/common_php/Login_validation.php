<?php
    include "../db/DB_Config.php";
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
            while( $row = mysqli_fetch_assoc($alluser) ){
                $id       = $row['id'];
                $email_db    = $row['email'];
                $username_db   = $row['name'];
                $password_db  = $row['password'];
                $role = $row['userType'];
                if(($email == $email_db) && ($password == $password_db)){
                    if($role == 'Admin'){
                        $_SESSION['username'] = $username_db;
                        $_SESSION['uid'] = $id;
                        setcookie('email', $email, time() + (86400 * 30), "/");
                        setcookie('password', $password, time() + (86400 * 30), "/");
                        header('location: ../pages/admin/admin_layouts/admin_home.php');
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
            
            if($rowCount == 0){
                $_SESSION['loginError'] = 'Invalid Information...';
                header('location: ../common_pages/login.php');
            }
        }
    }
    else if(isset($_POST['register'])){
        header('location: ../pages/other/register.php');
    }
    else{

    }
?>