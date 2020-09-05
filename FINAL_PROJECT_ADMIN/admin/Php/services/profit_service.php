<?php
    //include '../db/DB_Config.php';
    include '../db/config.php';
    
    function get_profits(){
        $db = dbConnection();
        $sql = "select * from year_profits";
        $result = mysqli_query($db,$sql);
        $profits = [];
        while($row = mysqli_fetch_assoc($result)){
            array_push($profits,$row);
        }
        return $profits;
    }

    function get_yearlyProfit($year){
        $db = dbConnection();
        $getSql = "select yr_id from year_profits where year='$year'";
        $res_yr = mysqli_query($db,$getSql);
        $yr_id = null;
        if(mysqli_num_rows($res_yr) == 1){
            while($row = mysqli_fetch_assoc($res_yr)){
                $yr_id = $row['yr_id'];
            }
        }
        $sql = "SELECT * FROM monthly_profits where yr_id='$yr_id'";
        $result = mysqli_query($db,$sql);
        $months = [];
        while($row = mysqli_fetch_assoc($result)){
            array_push($months,$row);
        }
        return $months;
    }

    function get_monthlyProfit($year,$month){
        $db = dbConnection();
        $yr_id = null;
        $m_id = null;
        $getYear = "select yr_id from year_profits where year='$year'";
        $res_yr = mysqli_query($db,$getYear);
        while($row = mysqli_fetch_assoc($res_yr)){
            $yr_id = $row['yr_id'];
        }
        $getMonth = "select m_id from monthly_profits where month='$month' and yr_id='$yr_id'";
        $res_month = mysqli_query($db,$getMonth);

        if(mysqli_num_rows($res_month) == 1){
            while($row = mysqli_fetch_assoc($res_month)){
                $m_id = $row['m_id'];
            }
        }
        $sql = "SELECT * FROM daily_profits where yr_id='$yr_id' and m_id='$m_id'";
        $result = mysqli_query($db,$sql);
        $days = [];
        while($row = mysqli_fetch_assoc($result)){
            array_push($days,$row);
        }
        return $days;
    }

    function update(){
        $db = dbConnection();
        $monthly_total = 0;
        $yearly_total = 0;

        $yr_sql_all = "select * from year_profits";
        $result_years = mysqli_query($db,$yr_sql_all);

        while($yearRow = mysqli_fetch_assoc($result_years)){

            $yr_id_row = $yearRow['yr_id'];
            $getMonth_sql = "SELECT * from monthly_profits where yr_id='$yr_id_row'";
            $result_months = mysqli_query($db,$getMonth_sql);

            while($monthRow = mysqli_fetch_assoc($result_months)){

                $m_id_row = $monthRow['m_id'];

                $daily_sql = "select * from daily_profits where m_id='$m_id_row' and yr_id='$yr_id_row'";
                $result = mysqli_query($db,$daily_sql);
                
                while($row= mysqli_fetch_assoc($result)){
                    $monthly_total += $row['profit'];
                }

                $up_monthly = "UPDATE monthly_profit set profit='$monthly_total' where m_id='$m_id_row' and yr_id='$yr_id_row'";
                $yup_result = mysqli_query($db,$up_monthly);

                $m_sql = "select * from monthly_profits where yr_id = '$yr_id_row'";
                $res_month = mysqli_query($db,$m_sql);

                while($row_m = mysqli_fetch_assoc($res_month)){
                    $yearly_total += $row_m['profit'];
                }

                $up_yr = "UPDATE year_profits set profit = '$yearly_total' where yr_id = '$yr_id_row'";
                $res_up_yr = mysqli_query($db,$up_yr);

                if($res_up_yr){
                    return true;
                }
                else{
                    return false;
                }
            }
        }
    }    
?>