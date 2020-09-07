<?php
    session_start();
    require_once('services/user_Service.php');
    $email 		= $_POST['email'];
    $search_result = search_user($email);
    if($search_result){
        echo "true";
    }
    else{
        echo "false";
    }
?>