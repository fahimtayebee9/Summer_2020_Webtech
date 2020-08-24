<?php
    if(isset($_GET['degree_input'])){
        $gender = $_GET['degree_input'];
        echo $gender;
    }
    else{
        echo "Degree NOT SET";
    }
?>