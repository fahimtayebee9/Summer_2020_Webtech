<?php
    session_start();
    session_destroy();
    header('location: ../pages/other/login.php');
?>