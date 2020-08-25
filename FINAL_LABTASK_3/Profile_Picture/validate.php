<?php
    if(isset($_GET['user_id']) && isset($_GET['profile_picture'])){
        $user_id = $_GET['user_id'];
        echo $user_id."<br>";
        echo $_GET['profile_picture'];
    }
    else{
        echo "User Id and Image NOT SET";
    }
?>