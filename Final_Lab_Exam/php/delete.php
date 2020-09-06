<?php
    require_once('../db/db.php');
    $conn = dbConnection();
    if($conn){
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $sql = "delete from authors where id='$id'";
            $res = mysqli_query($conn,$sql);
            if($res){
                header('location: ../views/all_users.php');
            }
        }
        
    }
?>