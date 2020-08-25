<?php
    if(!empty($_GET['day']) && !empty($_GET['month']) && !empty($_GET['year'])){
        $day = $_GET['day'];
        $month = $_GET['month'];
        $year = $_GET['year'];
        echo $day." / ".$month." / ".$year;
    }
    else{
        echo "Date NOT SET";
    }
?>