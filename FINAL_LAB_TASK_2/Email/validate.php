<?php
    if(isset($_GET['email'])){
        $email = $_GET['email'];
        echo $email;
    }
    else{
        echo "email NOT SET";
    }
?>
