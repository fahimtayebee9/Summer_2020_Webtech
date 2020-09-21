<?php
    include '../../../db/config.php';
    
    function get_profits(){
        $db = dbConnection();
        $sql = "select * from yearly_profit";
        $result = mysqli_query($db,$sql);
        $profits = [];
        while($row = mysqli_fetch_assoc($result)){
            array_push($profits,$row);
        }
        mysqli_close($db);
        return $profits;
    }

    function get_yearlyProfit($year){
        $db = dbConnection();
        $sql = "SELECT * FROM monthly_profit where year_id='$year'";
        $result = mysqli_query($db,$sql);
        $months = [];
        while($row = mysqli_fetch_assoc($result)){
            array_push($months,$row);
        }
        mysqli_close($db);
        return $months;
    }

    function get_monthlyProfit($year,$month){
        $db = dbConnection();
        
        $sql = "SELECT * FROM daily_profit where year_id='$year' and month_id='$month'";
        $result = mysqli_query($db,$sql);

        $days = [];
        while($row = mysqli_fetch_assoc($result)){
            array_push($days,$row);
        }
        mysqli_close($db);
        return $days;
    }

    function update(){
        $db = dbConnection();

        $yr_sql_all = "select * from yearly_profit";
        $result_years = mysqli_query($db,$yr_sql_all);

        while($yearRow = mysqli_fetch_assoc($result_years)){
            $yearly_total = 0;
            $yr_id_row = $yearRow['id'];

            $getMonth_sql = "SELECT * from monthly_profit where year_id='$yr_id_row'";
            $result_months = mysqli_query($db,$getMonth_sql);

            while($monthRow = mysqli_fetch_assoc($result_months)){
                $monthly_total = 0;
                $m_id_row = $monthRow['id'];
                
                $daily_sql = "select * from daily_profit where month_id='$m_id_row' and year_id='$yr_id_row'";
                $result = mysqli_query($db,$daily_sql);
                if(mysqli_num_rows($result) != 0){
                    while($row= mysqli_fetch_assoc($result)){
                        $monthly_total += $row['profit'];
                    }
                    $up_monthly = "UPDATE monthly_profit set profit='$monthly_total' where id='$m_id_row' and year_id='$yr_id_row'";
                    $yup_result = mysqli_query($db,$up_monthly);
                    if($yup_result){
                        $m_sql = "select * from monthly_profit where year_id = '$yr_id_row'";
                        $res_month = mysqli_query($db,$m_sql);
                        if(mysqli_num_rows($res_month)){
                            while($row_m = mysqli_fetch_assoc($res_month)){
                                $yearly_total += $row_m['profit'];
                            }
                            $up_yr = "UPDATE yearly_profit set profit = '$yearly_total' where id = '$yr_id_row'";
                            $res_up_yr = mysqli_query($db,$up_yr);
                        }
                    }
                }
            }
        }
        mysqli_close($db);
    }    

    function getLastMonthProfit(){
        $db = dbConnection();

        if(!$db){
            echo "DB NOT CONNECTED";
        }

        $lastMonthSql = "SELECT * FROM monthly_profit ORDER BY id DESC LIMIT 1";
        $resultMonth = mysqli_query($db,$lastMonthSql);

        $monthLast = [];
        while($row = mysqli_fetch_assoc($resultMonth)){
            array_push($monthLast,$row);
        }
        mysqli_close($db);
        return $monthLast;
    }   

?>