<?php
session_start();
    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $gender = $_POST['gender'];
        $password = $_SESSION['password'];
        $day = $_POST['day'];
        $month = $_POST['month'];
        $year = $_POST['year'];
        if(empty($name) && empty($email) && empty($gender) && empty($day) && empty($month) && empty($year)){
            echo "<h1>Fill up all the areas to register!!!</h1>";
        }
        else{
            if(($day >=1 && $day <=31) && ($month >=1 && $month <=12) && ($year >=1990 && $year <=2090) ){
                $user = [
                    'uname'=>$name,
                    'email'=>$email,
                    'username'=>$username,
                    'gender' => $gender,
                    'password'=>$password,
                    'day'=> $day,
                    'month' => $month,
                    'year'=> $year
                ];
                $_SESSION['user'] = $user;
                header('location: ..\Layouts\loggedin_home.php');
            }
            else{
                echo "<h1>Invalid Date</h1>";
            }
        }
    }
?>