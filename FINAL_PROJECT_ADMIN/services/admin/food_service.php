<?php
    require_once("../../../db/config.php");
    session_start();

    function insert_food($item){
        $db = dbConnection();
        $sql = "insert into food_menu values('{$item['item_no']}', '{$item['item_name']}', '{$item['price']}', '{$item['ingradients']}', '{$item['category']}', '{$item['rating']}')";
        $result = mysqli_query($db,$sql);
        if($result){
            echo true;
        }
        else{
            echo false;
        }
    }

    function update_item($item){
        $valid = search_item($item);
        $db = dbConnection();
        $sql = "update food_menu set item_name='{$item['item_name']}', price='{$item['price']}',ingradients='{$item['ingradients']}',category='{$item['category']}' rating='{$item['rating']}' where item_no='{$item['item_no']}'";
        $result = mysqli_query($db,$sql);
        if($result){
            echo true;
        }
        else{
            echo false;
        }
    }

    function search_item($data){
        $db = dbConnection();
        $sql = "select * from food_menu where item_no like '%{$data['item_no']}%' or item_name like '%{$data['item_name']}%'";
        $result = mysqli_query($db,$sql);
        if(mysqli_num_rows($result) == 0){
            echo "No Data Found..";
        }
        else{

        }
    }

    function delete_item($item_no){
        $db = dbConnection();
        $del_sql = "delete from food_menu where item_no='$item_no'";
        $del_result = mysqli_query($db,$del_sql);
        if($del_result){
            echo true;
        }
        else{
            echo false;
        }
    }

    function filter_menu($category){
        $db = dbConnection();
        $sql = "select * from food_menu where category like '%{$data['item_no']}%'";
        $result = mysqli_query($db,$sql);
        if(mysqli_num_rows($result) == 0){
            echo false;
        }
        else{
            while($row = mysqli_fetch_assoc($result)){
                echo $row;
            }
        }
    }

    function getFoodMenuList(){
        $db = dbConnection();
        $sql = "select * from food_menu";
        $result = mysqli_query($db,$sql);

        $menu_items = [];

		while($row = mysqli_fetch_assoc($result)){
			array_push($menu_items, $row);
        }
        
        return $menu_items;
    }
    

    function count_item(){
        $db = dbConnection();
        $sql = "select * from food_menu";
        $result = mysqli_query($db,$sql);

        echo mysqli_num_rows($result);
    }
?>
