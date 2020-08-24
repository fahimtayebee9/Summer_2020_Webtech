<?php
    if(isset($_GET['blood'])){
        $gender = $_GET['blood'];
        echo "Blood Group is ".$gender;
    }
    else{
        echo "Blood Group NOT SET";
    }
?>