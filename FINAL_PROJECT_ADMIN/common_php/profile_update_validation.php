<?php
    include "../../Php/db/DB_Config.php";
    session_start();
    $name_new           = $_POST['name'];
    $email_new          = $_POST['email'];
    $password_new       = $_POST['password'];
    $username_new       = $_POST['username'];
    $role_new           = "Admin";
    $confirmPassword    = $_POST['confirmPass'];
    $gender_new         = $_POST['gender'];
    $day_new            = $_POST['day'];
    $month_new          = $_POST['month'];
    $year_new           = $_POST['year'];
    $balance_new        = $_POST['balance'];
    $new_dob            = "$year_new-$month_new-$day_new";
    $profile_picture_new= $_POST["fileUpload"];
    $filePath           = $_POST['filePath'];
    $uid = $_SESSION['userId'];

    $query      = "UPDATE users set name='$name_new', username='$username_new', email='$email_new',  password='$password_new' where id = '$uid'";
    $adduser    = mysqli_query($db, $query);
    $_SESSION['username'] = $username_new;
    if ( $adduser ){
        $add_query  = "update admininfo set name='$name_new', profile_picture='$profile_picture_new', balance='$balance_new',gender='$gender_new',dob='$new_dob' where userId='$uid'";
        $add_admin_data    = mysqli_query($db, $add_query);
        if($add_admin_data){
            // $filedir = 'uploads/'.$profile_picture_new;
            // if(move_uploaded_file($filePath, $filedir)){
            //     echo "true";
            // }else{
            //     echo "false File Not Moved";
            // }
            echo "true";
        }
        else{
            echo "false<br>".mysqli_error($db);
        }
    }
    else{
        die("Connection Failed. Please try again later..." . mysqli_error($db));
        echo "false".mysqli_error($db);
    }
?>