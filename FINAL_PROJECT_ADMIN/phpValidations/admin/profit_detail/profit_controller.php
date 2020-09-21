<?php
    require_once('../../../services/admin/profit_service.php');
    require_once('../../../services/admin/employee_service.php');

    $year_arr = [];
    
    if(isset($_POST['getAll'])){
        update();
        $profits = get_profits();
        
        echo printData($profits,"All");
    }
    if(isset($_POST['getYearList'])){
        $printOption = "<option value='#'></option>";
        $yearsList = [];
        $profitList = get_profits();
        foreach($profitList as $year){
            array_push($year_arr,$year['year']);
            $printOption .= "<option value='{$year['id']}'>{$year['year']}</option>";
        }
        echo $printOption;
    }
    if(isset($_POST['year']) && isset($_POST['month'])){
        $year = $_POST['year'];
        $month = $_POST['month'];
        $result = get_monthlyProfit($year,$month);
    
        echo printData($result,"Month");
    }
    if(isset($_POST['yearly_profit'])){
        $year = $_POST['yearly_profit'];

        $months = get_yearlyProfit($year);
        
        echo printData($months,"Year");
    }
    if(isset($_POST['setMonthList'])){
        $year = $_POST['year_val'];
        $result = get_yearlyProfit($year);
        $month_arr = ["January","February","March","April", "May","June","July","August","September","October","November","December"];
        
        $printOption = "<option value='#'></option>";
        foreach($result as $yr_Obj){
            $mn = $month_arr[$yr_Obj['month']-1];
            $printOption .= "<option value='{$yr_Obj['id']}'>$mn</option>";
        }
        echo $printOption;
    }

    if(isset($_POST['getProfits'])){
        $lastMonths = getLastMonthProfit();

        $currentYearProfit = get_yearlyProfit($lastMonths[0]['year_id']);
        $annualProfit = 0;
        foreach($currentYearProfit as $mn){
            $annualProfit += $mn['profit'];
        }

        $avgProfit = $annualProfit / sizeof($currentYearProfit);

        $empList = get_Employees();
        $totalSalary = 0;
        foreach($empList as $empSal){
            $totalSalary = $empSal['salary'] + $empSal['bonus'] + $totalSalary;
        }

        $returnStr = (object)array();
        $returnStr->lastMonth = $lastMonths[0]['profit'];
        $returnStr->annual = $annualProfit;
        $returnStr->avg = $avgProfit;
        $returnStr->exp = $totalSalary;

        echo json_encode($returnStr);

    }

    function printData($list,$val){
        $thead = "";
        $tbody = "";
        $yr = "";
        $mn = "";
        $month_arr = ["January","February","March","April", "May","June","July","August","September","October","November","December"];
        if($val == "All"){
            $thead = "<tr>".
                        "<th class='thArea'>SL#</th>".
                        "<th class='thArea'>Year</th>".
                        "<th class='thArea'>Profit</th>".
                    "</tr>";
            $count = 1;
            foreach($list as $profit){
                $tbody .= "<tr>".
                                "<td class='tdArea'>SL#$count</td>".
                                "<td class='tdArea'>{$profit['year']}</td>".
                                "<td class='tdArea'>{$profit['profit']} BDT</td>".
                            "</tr>";
                
                $count++;
            }
            $mainStr = $thead."-".$tbody;
            return $mainStr;
        }
        if($val == "Year"){
            $thead = "<tr>".
                        "<th class='thArea'>SL#</th>".
                        "<th class='thArea'>Year</th>".
                        "<th class='thArea'>Month</th>".
                        "<th class='thArea'>Profit</th>".
                    "</tr>";
                $count = 1;
                
                foreach($list as $profit){
                    $yearList = get_profits();
                    foreach($yearList as $yrObj){
                        if($yrObj['id'] == $profit['year_id']){
                            $yr = $yrObj['year'];
                        }
                    }
                    $mn = $month_arr[$profit['month']-1];
                    $tbody .= "<tr>".
                                    "<td class='tdArea'>SL#$count</td>".
                                    "<td class='tdArea'>$yr</td>".
                                    "<td class='tdArea'>$mn</td>".
                                    "<td class='tdArea'>{$profit['profit']} BDT</td>".
                                "</tr>";
                    
                    $count++;
                }
                $mainStr = $thead."-".$tbody;
                return $mainStr;
        }
        if($val == "Month"){
            $thead = "<tr>".
                        "<th class='thArea'>SL#</th>".
                        "<th class='thArea'>Year</th>".
                        "<th class='thArea'>Month</th>".
                        "<th class='thArea'>Day</th>".
                        "<th class='thArea'>Profit</th>".
                    "</tr>";
            $count = 1;
                
            foreach($list as $profit){
                $yearList = get_profits();
                foreach($yearList as $yrObj){
                    if($yrObj['id'] == $profit['year_id']){
                        $yr = $yrObj['year'];
                    }
                }
                
                $months = get_yearlyProfit($profit['year_id']);
                foreach($months as $mt){
                    if($mt['id'] == $profit['month_id']){
                        $mn = $month_arr[$mt['month']-1];
                    }
                }
                $tbody .= "<tr>".
                                "<td class='tdArea'>SL#$count</td>".
                                "<td class='tdArea'>$yr</td>".
                                "<td class='tdArea'>$mn</td>".
                                "<td class='tdArea'>{$profit['day']}</td>".
                                "<td class='tdArea'>{$profit['profit']} BDT</td>".
                            "</tr>";
                
                $count++;
            }
            $mainStr = $thead."-".$tbody;
            return $mainStr;
        }
    }
?>