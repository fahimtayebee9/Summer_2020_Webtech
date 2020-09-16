<?php
    global $countPremium;
    global $countGold;
    global $countNew;

    require_once('../../../services/admin/customer_service.php');
    require_once('../../../services/admin/admin_service.php');

    if(isset($_POST['getAll'])){
        
        $allCus = get_Customers();

        printData($allCus);
    }
    if(isset($_POST['getCount'])){
        $countPremium = 0;
        $countGold = 0;
        $countNew = 0;
        $allCus = get_Customers();
        foreach($allCus as $cus){
            if($cus['position'] == "Premium"){
                $countPremium += 1;
            }
            else if($cus['position'] == "Gold"){
                $countGold += 1;
            }
            else if($cus['position'] == "New"){
                $countNew += 1;
            }
            else{
                $countPremium = 0;
                $countGold =0;
                $countNew = 0;
            }
        }
        $countAll = $countPremium."-".$countGold."-".$countNew;
        echo $countAll;
    }
    if(isset($_POST['cus_id'])){
        $cus_id = $_POST['cus_id'];

        $customer = get_dataById($cus_id);
        $cusObj = json_encode($customer);

        echo $cusObj;
    }   
    if(isset($_POST['rmv_id'])){
        $rmv_id = $_POST['rmv_id'];

        $rmv_status = delete($rmv_id);

        if($rmv_status){
            echo 1;
        }
        else{
            echo $rmv_status;
        }
    }
    if(isset($_POST['update_id']) && isset($_POST['status']) && $_POST['discount']){
        $update_id = $_POST['update_id'];
        $status = $_POST['status'];
        $discount = $_POST['discount'];

        $updateStatus = updateCustomer($update_id,$status,$discount);

        if($updateStatus){
            echo 1;
        }
        else{
            echo $updateStatus;
        }
    }
    if(isset($_POST['filter_type'])){
        $filter_type = $_POST['filter_type'];

        $customersList = get_dataByStatus($filter_type);

        printData($customersList);
    }


    function printData($allCustomer){
        $printDoc = "";
        $count = 1;
        foreach($allCustomer as $customer){
            $printDoc .= "<tr class='rowGap'>".
                            "<th>SL.{$count}</th>".
                            "<td><img src='../../../uploads/{$customer['profile_picture']}' alt='' style='width: 60px; height: 60px; border-radius: 50%;' class='img_pic'></td>".
                            "<td>{$customer['name']}</td>".
                            "<td>{$customer['totalBookingAmount']}</td>".
                            "<td>{$customer['totalBookedRooms']}</td>".
                            "<td>{$customer['discount']}%</td>".
                            "<td>{$customer['position']}</td>".
                            "<td>". 
                                "<a href='Update_Customer.php?id={$customer['id']}' class='btn btn-info'>Edit</a>".
                                "<button id='cus-{$customer['id']}' onclick='removeCus()' class='btn btn-danger'>Remove</button>".
                            "</td>".
                        "</tr>";
            $count++;
        }
        echo $printDoc;
    }
?>