<?php
    require_once('../../../db/config.php');

    function get_Customers(){
        $conn = dbConnection();

        if(!$conn){
            echo "DB connection error";
        }

        $sql = "SELECT users.id, users.name, users.profile_picture, customer_info.totalBookingAmount,customer_info.totalBookedRooms,customer_info.discount,customer_info.position,customer_info.user_id FROM users INNER JOIN customer_info ON users.id = customer_info.user_id where users.userType='Customer'";
        $result = mysqli_query($conn, $sql);

        $cus = [];

		while($row = mysqli_fetch_assoc($result)){
			array_push($cus, $row);
        }
        
        return $cus;
    }

    function get_dataById($cus_id){
        $conn = dbConnection();

        if(!$conn){
            echo "DB connection error";
        }

        $sql = "SELECT users.id, users.name, users.profile_picture, customer_info.totalBookingAmount,customer_info.totalBookedRooms,customer_info.discount,customer_info.position,customer_info.user_id FROM users INNER JOIN customer_info ON users.id = customer_info.user_id where users.userType='Customer'";
        $result = mysqli_query($conn, $sql);

        $cus = (object)array();

		while($row = mysqli_fetch_assoc($result)){
            $cus->id = $row['id'];
            $cus->name = $row['name'];
            $cus->profile_picture = $row['profile_picture'];
            $cus->totalBookingAmount = $row['totalBookingAmount'];
            $cus->totalBookedRooms = $row['totalBookedRooms'];
            $cus->discount = $row['discount'];
            $cus->position = $row['position'];
            $cus->user_id = $row['user_id'];
        }
        
        return $cus;
    }

    function delete($rmv_id){
        $conn = dbConnection();

        if(!$conn){
            echo "DB connection error";
        }

        $rmv_cus = "delete from customer_info where user_id='$rmv_id'";
        $rmv_cusStatus = mysqli_query($conn,$rmv_cus);
        if($rmv_cusStatus){
            $rmv_user = "delete from users where id='$rmv_id'";
            $rmv_userStatus = mysqli_query($conn,$rmv_user);
            if($rmv_userStatus){
                return $rmv_userStatus;
            }
            else{
                return mysqli_error($conn);
            }
        }
    }

    function updateCustomer($update_id,$status,$discount){
        $conn = dbConnection();

        if(!$conn){
            echo "DB connection error";
        }

        $updateSql = "update customer_info set position='$status', discount='$discount' where user_id = '$update_id'";
        $result = mysqli_query($conn,$updateSql);
        if($result){
            return $result;
        }
        else{
            return mysqli_error($conn);
        }
    }

    function get_dataByStatus($filter_type){
        $conn = dbConnection();

        if(!$conn){
            echo "DB connection error";
        }

        $sql = "SELECT users.id, users.name, users.profile_picture, customer_info.totalBookingAmount,customer_info.totalBookedRooms,customer_info.discount,customer_info.position,customer_info.user_id FROM users INNER JOIN customer_info ON users.id = customer_info.user_id where customer_info.position='$filter_type'";
        $result = mysqli_query($conn, $sql);

        $cus = [];

		while($row = mysqli_fetch_assoc($result)){
			array_push($cus, $row);
        }
        
        return $cus;
    }
?>