<?php
    include '../php/user.txt';
    session_start();
    if(isset($_POST['submit'])){
        $id = $_POST['id'];
        $password = $_POST['password'];
        if( empty($id) || empty($password)){
            echo "Invalid Submission...";
        }
        else{
            $file = fopen('user.txt', 'r');
			$data = fread($file, filesize('user.txt'));
            $user = explode('|', $data);
            if(trim($user[0]) == $id && trim($user[1]) == $password){
                $_SESSION['status']  = "Ok";
                if(trim($user[4]) == 'Admin'){
                    header('location: ../layouts/admin_home.php');
                }
				else{
                    header('location: ../layouts/user_home.php');
                }
			}else{
				echo "Invalid username/password";
			}
        }
    }
?>