<?php
    require_once('../db/DB_Config.php');
    $value = $_POST['value'];
    $type = $_POST['type'];
    if($type == "Customer"){
        $sql = "select * from users where role='Customer' and name='%$value%'";
        $result = mysqli_query($db,$sql);
        
    }
?>