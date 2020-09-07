<?php
    require_once("../../db/config.php");
    $con = dbConnection();
    $sql = "SELECT * from package where available = 'true'";
    $result_package = mysqli_query($con,$sql);
    $response = "";
    while($row = mysqli_fetch_assoc($result_package)){
        if($row['available'] == true){
            $package_name = $row['name'];
            $availableFrom = $row['available_from'];
            $availableTo = $row['availabl_to'];
            $duration = $row['duration'];
            $facility = $row['facility'];
            $image = $row['image'];
            $price = $row['price'];
            $response .= "";
        }
    }   
?>