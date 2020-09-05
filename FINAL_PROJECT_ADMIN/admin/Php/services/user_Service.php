<?php
    require_once('db/config.php');
    function search_user($email){
        $conn = dbConnection();

        if(!$conn){
            echo "DB connection error";
        }

        $sql = "select * from users where email='$email'";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) == 0){
            return true;
        }
        else{
            return false;
        }
    }
?>