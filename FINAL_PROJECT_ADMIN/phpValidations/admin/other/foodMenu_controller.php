<?php
    require_once('../../../services/admin/food_service.php');
    if(isset($_POST['getAll'])){
        $itemList = getFoodMenuList();

        echo printMenu($itemList);
    }

    if(isset($_POST['f_id'])){
        $f_id = $_POST['f_id'];
        $item = getItem_byId($f_id);
        $ingradients = explode('|',$item->ingradients);
        $length = sizeof($ingradients);
        $count = 0;
        $ingredDoc = "";
        while($count < $length){
            $ingredDoc .= "<li>".
                                "<p>{$ingradients[$count]}</p>".
                        "</li>";
            $count++;
        }
        $item->ingradients = $ingredDoc;
        $item_obj = json_encode($item);
        echo $item_obj;
    }
    // UPDATE 
    if(isset($_POST['food_item'])){
        $food_item = $_POST['food_item'];
        $food_item_obj = (object) json_decode($food_item,true);
        if($food_item_obj->id != null && $$food_item_obj->item_name != null && $food_item_obj->item_no != null && $food_item_obj->price != null && $food_item_obj->category != null){
            $status = update_item($food_item_obj);

            if($status){
                echo 1;
            }
            else{
                echo $status;
            }
        }
        else{
            echo "NULL OBJECT";
        }
    }

    // REMOVE ITEM
    if(isset($_POST['rmv_id'])){
        $rmv_id = $_POST['rmv_id'];

        $rmvStatus = delete_item($rmv_id);
        if($rmvStatus){
            echo 1;
        }
        else{
            echo $rmvStatus;
        }
    }

    // GET ITEM NO
    if(isset($_POST['getItemNo'])){
        $itemList = getFoodMenuList();
        $last_item_no = end($itemList)['item_no'];
        $arr = explode('-',$last_item_no);
        $new_serial = $arr[1] + 1;
        $new_itemNo = "FD-".$new_serial;
        echo $new_itemNo;
    }
    // ADD NEW ITEM
    if(isset($_POST['new_item'])){
        $new_item = $_POST['new_item'];
        $new_item_obj = (object)json_decode($new_item,true);
        if( !empty($new_item_obj->item_name) && !empty($new_item_obj->item_no) && !empty($new_item_obj->price) && !empty($new_item_obj->category) && !empty($new_item_obj->ingradients) && !empty($new_item_obj->item_image)){
            
            // $fileName = $_FILES['item_image_change']['name'];
            // $fileTmpName  = $_FILES['item_image_change']['tmp_name'];
            // $fileType = $_FILES['item_image_change']['type'];
            
            // $tmp = $new_item_obj->img_tmp;
            
            // $dest = "assets/images/foodMenu/". rand(1000,10000) ."_".$new_item_obj->item_image;
            // $moved = move_uploaded_file($fileTmpName,$dest); //move_uploaded_file($tmp,$dest);
            // if($moved){
                $addStatus = insert_food($new_item_obj);
                if($addStatus){
                    echo 1;
                }
                else{
                    echo $addStatus;
                }
            // }
            // else{
            //     echo "NOT UPLOADED";
            // }
        }
    }

    // FILTER MENU LIST
    if(isset($_POST['filter_type'])){
        $type = $_POST['filter_type'];
        if(!empty($type)){
            $filteredList = filter_menu($type);
            if(!empty($filteredList)){
                echo printMenu($filteredList);
            }
            else{
                echo "<tr><td colspan='7'><h1 style='text-align:center'>NO ITEMS FOUND IN THIS CATEGORY</h1></td></tr>";   
            }
        }
    }



    // PRINT FUNCTION
    function printMenu($itemList){
        $doc = "";
        $i = 1;
        foreach($itemList as $item){
            $i += 1;
            $ingred = $item['ingradients'];
            $ingred_arr = explode('|',$ingred);
            $length = sizeof($ingred_arr);
            $count = 0;

            $ingredDoc = "<ul>";
            while($count < $length){
                $ingredDoc .= "<li>".
                                    "<p>{$ingred_arr[$count]}</p>".
                            "</li>";
                $count++;
            }
            $ingredDoc .= "</ul>";
            $doc .= "<tr>".
                        "<td>{$item['item_no']}</td>".
                        "<td>{$item['item_name']}</td>".
                        "<td>{$item['price']}</td>".
                        "<td>{$item['category']}</td>".
                        "<td>$ingredDoc</td>".
                        "<td><img src='../../../assets/images/foodMenu/{$item['item_image']}' class='foodImg' alt='Item Image'></td>".
                        "<td>". 
                            "<a href='Food_Menu.php?do=view&id={$item['id']}' class='btn btn-info'>View</a>".
                            "<a href='Update_Food_Item.php?id={$item['id']}' class='btn btn-info'>Edit</a>".
                            "<button id='item-{$item['id']}' onclick='removeItem({$item['id']})' class='btn btn-danger'>Remove</button>".
                        "</td>".
                    "</tr>";
        }
        return $doc;
    }
?>