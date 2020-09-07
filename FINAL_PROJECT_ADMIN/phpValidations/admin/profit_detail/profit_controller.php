<?php
    require_once('../services/profit_service.php');

    if(isset($_POST['year']) && isset($_POST['month'])){
        $year = $_POST['year'];
        $month = $_POST['month'];
        $result = get_monthlyProfit($year,$month);
    
        $yearObj = json_encode($result);
        echo $yearObj;
    }
    else if(isset($_POST['year'])){
        $year = $_POST['year'];
        $result = get_yearlyProfit($year);
    
        $yearObj = json_encode($result);
        echo $yearObj;
    }
    else{
        $result = get_profits();
    
        $yearObj = json_encode($result);
        echo $yearObj;
    }
    
?>