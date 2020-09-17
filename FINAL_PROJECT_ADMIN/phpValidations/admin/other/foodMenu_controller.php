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
                            "<button id='item-{$item['id']}' onclick='removeItem()' class='btn btn-danger'>Remove</button>".
                        "</td>".
                    "</tr>";
        }
        return $doc;
    }
?>