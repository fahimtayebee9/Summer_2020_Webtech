<?php
    require_once('../db/config.php');
    function get_all(){
        $conn = dbConnection();

        if(!$conn){
            echo "DB connection error";
        }

        $sql = "select * from package";
        $result = mysqli_query($conn, $sql);

        $packages = [];

        while($row = mysqli_fetch_assoc($result)){
            array_push($packages, $row);
        }
        
        return $packages;
    }

?>