<?php
    session_start();
    if(isset($_POST['confirm'])){
        $item_no = $_SESSION['ino'];
        $item_name = $_POST['item_name'];
        if(isset($_POST['category'])){
            if($_POST['category'] == '#'){
                $_SESSION['categoryError'] = 'Invalid Category';
                header('location: ../layouts/Add_Food_Item.php');
            }
            else{
                $category = $_POST['category'];
                $price = $_POST['price'];
                $item_info = $item_no." | ".$item_name." | ".$category." | ".$price.PHP_EOL;
                file_put_contents('../files/foom_info.txt', $item_info, FILE_APPEND);
                $_SESSION['success'] = 'Food Item Added Successfully..';
                header("Location: ../layouts/Add_Food_Item.php");
            }
        }
    }
    else{
        echo "File can not be opened..";
    }
?>