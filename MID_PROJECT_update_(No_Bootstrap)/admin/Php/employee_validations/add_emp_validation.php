<?php
    include "DB_Config.php";
    session_start();
    if(isset($_POST['confirm'])){
        $name = $_POST['fname'];
        $email = $_POST['email'];
        $dob = $_POST['dob'];
        $salary = $_POST['salary'];
        $onePass = $_POST['onePass'];
        if(isset($_POST['user_type'])){
            if($_POST['user_type'] == '#'){
                $_SESSION['roleError'] = 'Invalid Data Inserted...';
                header('location: ../layouts/addEmployee.php');
            }
            else{
                $user_type = $_POST['user_type'];
                $emp_info = $name." | ".$email." | ".$dob." | ".$salary." | ".$onePass." | ".$user_type.PHP_EOL;
                file_put_contents('../files/Emp_data.txt', $emp_info, FILE_APPEND);
                $_SESSION['confirmation'] = 'Employee Added Successfully..';
                header("Location: ../layouts/addEmployee.php");
            }
        }
    }
    else{
        echo "File can not be opened..";
    }
?>