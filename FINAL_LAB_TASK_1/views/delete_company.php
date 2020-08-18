<?php
    require_once('../db/db.php');
    $conn = dbConnection();
    $id = $_GET['id'];
    $sql = "DELETE FROM company_info where id = '$id'";
    $result = mysqli_query($conn,$sql);
    if($result){
        header('location: ../views/all_company_info.php?success=done');
    }
    else{
        header('location: ../views/all_company_info.php?error=null');
    }
?>