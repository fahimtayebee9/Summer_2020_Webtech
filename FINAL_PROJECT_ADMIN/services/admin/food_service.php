<?php
    require_once("../../../db/config.php");
    session_start();

    function insert_food($item){
        $db = dbConnection();
        $sql = "insert into food_menu(id,item_no,item_name,price,category,ingradients,item_image,rating) values('','$item->item_no', '$item->item_name', '$item->price','$item->category', '$item->ingradients', '$item->item_image','0')";
        $result = mysqli_query($db,$sql);
        if($result){
            return $result;
        }
        else{
            return mysqli_error($db);
        }
    }

    function update_item($item){
        $db = dbConnection();
        if(!$db){
            echo "DB NOT CONNECTED";
        }

        $sql = "update food_menu set item_name='$item->item_name', price='$item->price',ingradients='$item->ingradients',category='$item->category',item_image='$item->item_image' where id='$item->id'";
        $result = mysqli_query($db,$sql);
        if($result){
            echo 1;
        }
        else{
            echo mysqli_error($db);
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
        $del_sql = "delete from food_menu where id='$item_no'";
        $del_result = mysqli_query($db,$del_sql);
        if($del_result){
            return $del_result;
        }
        else{
            return "Item Not Deleted\n" + mysqli_error($db);
        }
    }

    function filter_menu($category){
        $db = dbConnection();
        $sql = "select * from food_menu where category like '%$category%'";
        $result = mysqli_query($db,$sql);
        if(mysqli_num_rows($result) == 0){
            return 0;
        }
        else{
            $items = [];
            while($row = mysqli_fetch_assoc($result)){
                array_push($items,$row);
            }
            return $items;
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

    function getItem_byId($f_id){
        $db = dbConnection();
        if(!$db){
            echo "DB NOT CONNECTED";
        }
        $sql = "select * from food_menu where id='$f_id'";
        $result = mysqli_query($db,$sql);

        $menu_item = (object)array();
		while($row = mysqli_fetch_assoc($result)){
            $menu_item->id = $row['id'];
            $menu_item->item_no = $row['item_no'];
            $menu_item->item_name = $row['item_name'];
            $menu_item->price = $row['price'];
            $menu_item->category = $row['category'];
            $menu_item->ingradients = $row['ingradients'];
            $menu_item->item_image = $row['item_image'];
        }
        return $menu_item;
    }
?>
