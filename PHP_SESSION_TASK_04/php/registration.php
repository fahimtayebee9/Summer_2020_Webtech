<?php
    session_start();
    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $username = $_POST['userName'];
        $pass = $_POST['password'];
        $retype_pass = $_POST['confirmPassword'];
        $gender = $_POST['gender'];
        $day = $_POST['day'];
        $month = $_POST['month'];
        $year = $_POST['year'];
        if(empty($name) && empty($email) && empty($username) && empty($pass) && empty($retype_pass) && empty($gender) && empty($day) && empty($month) && empty($year)){
            echo "<h1>Fill up all the areas to register!!!</h1>";
        }
        else if($pass != $retype_pass){
            echo "<h1>Password not Matched</h1>";
        }
        else{
            if(($day >=1 && $day <=31) && ($month >=1 && $month <=12) && ($year >=1990 && $year <=2090) ){
                $user = [
                    'uname'=>$name,
                    'email'=>$email,
                    'username'=>$username,
                    'gender' => $gender,
                    'day'=> $day,
                    'month' => $month,
                    'year'=> $year,
                    'password'=>$pass
                ];
                $_SESSION['user'] = $user;
                header('location: ..\Layouts\login.html');
            }
            else{
                echo "<h1>Invalid Date</h1>";
            }
        }
    }
?>