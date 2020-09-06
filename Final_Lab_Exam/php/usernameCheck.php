<?php
    session_start();
    require_once('../service/userService.php');
    $username 		= $_POST['username'];
    $search_result = search_user($username);
    if($search_result){
        echo "true";
    }
    else{
        echo "false";
    }
?>