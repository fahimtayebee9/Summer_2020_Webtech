<?php
    if(isset($_GET['submit'])){
        $name = $_GET['name'];
        $email = $_GET['email'];
        $gender = $_GET['gender_inout'];
        $dregree = $_GET['degree_input'];
        $day = $_GET['day'];
        $year = $_GET['year'];
        $month = $_GET['month'];
        $blood = $_GET['blood'];
        $profile_picture = $_GET['profile_picture'];
        if(!empty($name) && !empty($email) && !empty($gender) && !empty($dregree) && !empty($day) && !empty($year) && !empty($month) && !empty($blood) && !empty($profile_picture)){
            echo $name."<br>";
            echo $email."<br>";
            echo $gender."<br>";
            echo $dregree."<br>";
            echo $day."/".$month."/".$year."<br>";
            echo $blood."<br>";
            echo $profile_picture."<br>";
        }       
        else{
            echo "Invalid Data";
        }
    }
    else{
        echo "Invalid";
    }
?>