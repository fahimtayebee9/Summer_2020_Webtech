<?php
    require_once('../../../services/admin/food_service.php');
    require_once('../../../services/admin/user_service.php');

    if(isset($_POST['userTypeEmp'])){
        $count = getEmpCount($_POST['userTypeEmp']);
        if($count != "" || $count != null || $count != 0){
            echo $count;
        }
        else{
            echo 0;
        }
    }
    else if(isset($_POST['userTypeCus'])){
        $count = getCustomerCount($_POST['userTypeCus']);
        if($count != "" || $count != null || $count != 0){
            echo $count;
        }
        else{
            echo 0;
        }
    }
    else if(isset($_POST['submit'])){
        
        $count = count_item();
        
        echo $count;
    }
    else if(isset($_POST['getEmp'])){
        $empList = getEmployeeList();
        $pageName = $_POST['getEmp'];
        echo writeEmpData($empList,$pageName);
    }
    else if(isset($_POST['getCustomer'])){
        $cusList = getCustomerList();
        $pageName = $_POST['getCustomer'];
        echo writeCusData($cusList,$pageName);
    }
    else if(isset($_POST['getMenu'])){
        $menu_list = getFoodMenuList();
        $pageName = $_POST['getMenu'];
        echo writeMenuData($menu_list, $pageName);
    }
    else if(isset($_POST['getRequest'])){
        $req_list = getFoodMenuList();
        $pageName = $_POST['getRequest'];
        echo writeRequestData($req_list, $pageName);
    }

    function writeEmpData($empList,$pageName){
        $data = "";
        $length = sizeof($empList);
        $countEmp = 0; 
        while($countEmp < $length){
            $sl = $countEmp+1;
            $data .= "<tr>".  
                            "<td>". 
                                "<p>SL#$sl</p>".
                            "</td>".
                            "<td>". 
                                "<p>".$empList[$countEmp]['name']."</p>".
                            "</td>".
                            "<td>". 
                                "<p>".$empList[$countEmp]['email']."</p>".  
                            "</td>".
                            "<td>". 
                                "<p>".$empList[$countEmp]['userType']."</p>".  
                            "</td>".
                    "<tr>";
                if($countEmp === 3 && $pageName == "Admin Home"){
                    break;
                }
            $countEmp++;
        }
        return $data;
    }

    function writeCusData($cusList,$pageName){
        $data = "";
        $length = sizeof($cusList);
        $countCus = 0; 
        while($countCus < $length){
            $sl = $countCus+1;
            $data .= "<tr>".  
                            "<td>". 
                                "<p>SL#$sl</p>".  
                            "</td>".
                            "<td>". 
                                "<p>".$cusList[$countCus]['name']."</p>".
                            "</td>".
                            "<td>". 
                                "<p>".$cusList[$countCus]['email']."</p>".  
                            "</td>".
                            "<td>". 
                                "<p>".$cusList[$countCus]['userType']."</p>".  
                            "</td>".
                    "<tr>";
                if($countCus == 4 && $pageName == "Admin Home"){
                    break;
                }
            $countCus++;
        }
        return $data;
    }

    function writeMenuData($menu_list,$pageName){
        $data = "";
        $length = sizeof($menu_list);
        $countItem = 0; 
        while($countItem < $length){
            $data .= "<tr>".  
                            "<td>". 
                                "<p>".$menu_list[$countItem]['item_no']."</p>".  
                            "</td>".
                            "<td>". 
                                "<p>".$menu_list[$countItem]['item_name']."</p>".
                            "</td>".
                            "<td>". 
                                "<p>".$menu_list[$countItem]['price']."</p>".  
                            "</td>".
                            "<td>". 
                                "<p>".$menu_list[$countItem]['category']."</p>".  
                            "</td>".
                    "<tr>";
                if($countItem == 4 && $pageName == "Admin Home"){
                    break;
                }
                $countItem++;
        }
        return $data;
    }

    function writeRequestData($req_list, $pageName){
        $data = "";
        $length = sizeof($req_list);
        $countItem = 0; 
        while($countItem < $length){
            $data .= "<tr>".  
                            "<td>". 
                                "<p>".$req_list[$countItem]['item_no']."</p>".  
                            "</td>".
                            "<td>". 
                                "<p>".$req_list[$countItem]['item_name']."</p>".
                            "</td>".
                            "<td>". 
                                "<p>".$req_list[$countItem]['price']."</p>".  
                            "</td>".
                            "<td>". 
                                "<p>".$req_list[$countItem]['category']."</p>".  
                            "</td>".
                    "<tr>";
                if($countItem == 4 && $pageName == "Admin Home"){
                    break;
                }
                $countItem++;
        }
        return $data;
    }

?>