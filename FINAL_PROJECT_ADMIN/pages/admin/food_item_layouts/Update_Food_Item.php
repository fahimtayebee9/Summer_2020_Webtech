<?php
    include "../../../db/DB_Config.php";
    session_start();
    if(isset($_SESSION['username'])){
        $name = $_SESSION['username'];
        if(isset($_GET['id'])){
            $f_id = $_GET['id'];
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="../../../assets/css/adminHome.css">
    <link rel="stylesheet" href="../../../assets/css/bookRooms_style.css">
    <link rel="stylesheet" href="../../../assets/css/foodMenu_style.css">
    <link rel="stylesheet" href="../../../assets/css/employeeList.css">

    <script src="../../../assets/js/admin/foodMenu_script.js" ></script>

    <title>Update Item</title>
</head>
<body onload="getItem_byId(<?=$f_id;?>,'update')">
    <section class="left-sidebar">
        <div class="dashboard_controller">
            <?php
                include "../include/left_menu.php";
            ?>
        </div>
        <div class="main">
            <div class="rmv-pad scrollable-area">
                <div class="content-area scrollbar title-header-main">
                    <div class="header-row title-header">
                        <div class="textarea">
                            <h4 id="item_title"></h4>
                            <p>Insert Food Item Informations To Update....</p>
                        </div>
                        <div class="content-holder">
                            <div class="search-area">
                                <form action="" method="POST" class="form_search">
                                    <p>Search By : </p>
                                    <select name="searchBy" id="searchBy" class="searchBox">
                                        <option value="#"></option>
                                        <option value="Customer">Customer</option>
                                        <option value="Employee">Employee</option>
                                        <option value="Food Item">Food Item</option>
                                    </select>
                                    <div class="search">
                                        <input type="search" name="search_box" id="search_box" class="searchBox" onkeyup="search_data()" >
                                        <input type="submit" value="Search" id="" class="btn_search btn" onclick="showSearchData()">
                                        <div class="search_result" id="search_result">

                                        </div>
                                    </div>
                                </form>
                            </div>
                            <span class="border-span"></span>
                            <div class="profile-settings dropdown">
                                <a class="dropbtn" href="#" id="dropMenu" onclick="dropMenuAction()"  role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php 
                                    if(isset($name)){
                                        echo $name;
                                    } 
                                ?>
                                </a>
                                <div class="dropdown-content" id="dropContent" aria-labelledby="navbarDropdown">
                                    <?php
                                        include "../include/profile_settings.php"
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="contentHolder">
                        <div class="form_areaHolder">
                            <form>
                                <div class="form_fieldHolder">
                                    <div class="filed_holder">
                                        <div class="form_update">
                                            <label for="item_no" class="title">Item No</label>
                                            <input type="text" name="item_no" id="item_no" class="form_field ftp" disabled> <!-- Will be Inactive on selection -->
                                        </div>
                                        <div class="form_update">
                                            <label for="item_name" class="title">Item Name</label>
                                            <input type="text" name="item_name" id="item_name" class="form_field ftp">
                                        </div>
                                        <div class="form_update">
                                            <label for="category" class="title">Category</label>
                                            <select name="item_category" id="item_category" class="filter_select form_field searchBox ftp">
                                                <option value="#">Select</option>
                                                <option value="Breakfast">Breakfast</option>
                                                <option value="Dinner">Dinner</option>
                                                <option value="Launch">Launch</option>
                                                <option value="Fast-Food">Fast Food</option>
                                            </select>
                                        </div>
                                        <div class="form_update">
                                            <label for="price" class="title">Price</label>
                                            <input type="number" name="price" id="price" class="form_field ftp"> 
                                        </div>
                                        <div class="form_update">
                                            <label for="ingradients" class="title">Ingradients</label>
                                            <div class="ingrad_check">
                                                <div class="part_ing">
                                                    <label for="" class="check_label">
                                                        <input type="checkbox" name="ingradient" value="Oil">Oil
                                                    </label>
                                                    <label for="" class="check_label">
                                                        <input type="checkbox" name="ingradient" value="Salt">Salt
                                                    </label>
                                                    <label for="" class="check_label">
                                                        <input type="checkbox" name="ingradient" value="Sugar">Sugar
                                                    </label>
                                                    <label for="" class="check_label">
                                                        <input type="checkbox" name="ingradient" value="Chicken">Chicken
                                                    </label>
                                                    <label for="" class="check_label">
                                                        <input type="checkbox" name="ingradient" value="Spices">Spices
                                                    </label>
                                                </div>
                                                <div class="part_ing">
                                                    <label for="" class="check_label">
                                                        <input type="checkbox" name="ingradient" value="Vinegar">Vinegar
                                                    </label>
                                                    <label for="" class="check_label">
                                                        <input type="checkbox" name="ingradient" value="Rice">Rice
                                                    </label>
                                                    <label for="" class="check_label">
                                                        <input type="checkbox" name="ingradient" value="Bread">Bread
                                                    </label>
                                                    <label for="" class="check_label">
                                                        <input type="checkbox" name="ingradient" value="Cheese">Cheese
                                                    </label>
                                                    <label for="" class="check_label">
                                                        <input type="checkbox" name="ingradient" value="Vegetables">Vegetables
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="profileImage_holder">
                                        <h5 id="tit">Item Image</h5>
                                        <img src="" id="item_image_upload" alt="Item Image">
                                        <input type="file" name="item_image_change"  accept="image/*" id="item_image_change" class="form_field file_ftp" onchange="changeImage()">
                                    </div>
                                </div>
                                <div class="form_update btn_holderArea">
                                    <input type="hidden" name="id" id="id" value="">
                                    <a href="../../../pages/admin/food_item_layouts/Food_Menu.php" class="btn btn-info">Back</a>
                                    <input type="submit" value="Save Changes" name="confirm" class="btn save_btn" onclick="updateItemData()">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
<?php
        }
        else{
            header('location: ../../../pages/admin/food_item_layouts/Food_Menu.php');
        }
    }
    else{
        header('location: ../../../common_pages/login.php');
    }
?>