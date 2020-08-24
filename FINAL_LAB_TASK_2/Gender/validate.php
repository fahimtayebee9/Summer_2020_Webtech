<?php
    if(isset($_GET['gender_inout'])){
        $gender = $_GET['gender_inout'];
        echo $gender;
    }
    else{
        echo "Gender NOT SET";
    }
?>