<?php
    session_start();
    session_destroy();
    header('location: ../common_pages/login.php');
?>