<?php
    session_start();
    if(isset($_POST['submit'])){
        $old_password = $_POST['old_password'];
        $new_password = $_POST['new_password'];
        $retype_password = $_POST['retype_password'];
        if(empty($new_password) && empty($retype_password)){
            echo "<h1>Type password to change...</h1>";
        }
        else if($new_password != $retype_password){
            echo "<h1>Password not matched...</h1>";
        }
        else{
            unset($_COOKIE['password']);
            setcookie('password', $new_password, time()+3600, '/');
            $_SESSION['upate'] = 'OK';
        }
    }
?>