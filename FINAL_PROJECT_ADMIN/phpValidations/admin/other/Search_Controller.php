<?php
    require_once('../../../services/admin/food_service.php');
    require_once('../../../services/admin/user_service.php');

    if(isset($_POST['value']) && isset($_POST['type'])){
        $value = $_POST['value'];
        $type = $_POST['type'];
        if($type == "Employee"){
            $result = search_user($value,$type);
            $data = "";
            $length = sizeof($result);
            $countItem = 0; 
            while($countItem < $length){
                $data .= "<p id='search_data-{$result[$countItem]['id']}' class='search_data' onclick='viewData()'>".$result[$countItem]['name']."</p>";
                $countItem++;
            }
            echo $data;
        }
        else if($type == "Customer"){
            $result = search_user($value,$type);
            $data = "";
            $length = sizeof($result);
            $countItem = 0; 
            while($countItem < $length){
                $data .= "<p id='search_data-{$result[$countItem]['id']}' class='search_data' onclick='viewData()'>".$result[$countItem]['name']."</p>";
                $countItem++;
            }
            echo $data;
        }
    }
    else if(isset($_POST['userId'])){
        $id = $_POST['userId'];
        $user = get_userData($id);
        
        $userObj = json_encode($user);

        echo $userObj;
    }
?>