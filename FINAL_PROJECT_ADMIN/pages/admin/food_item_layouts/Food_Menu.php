<?php
    include "../../../db/DB_Config.php";
    session_start();
    if(isset($_SESSION['username'])){
        $name = $_SESSION['username'];
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

    <title>Manage Food Menu</title>
</head>
<?php
    $do = isset($_GET['do']) ? $_GET['do'] : "all" ;
    if($do == "all"){
?>
<body onload="getAllItems()">
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
                            <h4>Manage Menu Items(Food)</h4>
                            <p>Select Food Item To Update....</p>
                        </div>
                        <div class="content-holder">
                            <div class="search-area">
                                <form action="" method="POST" class="form_search">
                                    <p>Search By : </p>
                                    <select name="searchBy" id="searchBy" class="btn searchBox">
                                        <option value="#"></option>
                                        <option value="Customer">Customer</option>
                                        <option value="Employee">Employee</option>
                                        <option value="Food Item">Food Item</option>
                                    </select>
                                    <div class="search">
                                        <input type="search" name="search_box" id="search_box" class="btn searchBox" onkeyup="search_data()" >
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
                                    <a class="dropdown-item" href="../../../common_pages/profile_details.php">Profile Details</a>
                                    <a class="dropdown-item" href="../../../common_pages/change_password.php">Change Password</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="../../../common_php/logout.php" id="logout">Logout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="content_area">
                        <h4>MANAGE MENU</h4>
                        <div class="filter_area">
                            <form action="" method="POST" class="filter-form">
                                <div class="form-group">
                                    <label for="filter" class="title">Filter Menu : </label>
                                    <select name="searchBy" id="filter_type" class="searchBox" onchange="filterItems()">
                                        <option value="#"></option>
                                        <option value="BreakFast">BreakFast</option>
                                        <option value="Launch">Launch</option>
                                        <option value="Dinner">Dinner</option>
                                        <option value="Fast-Food">Fast Food</option>
                                    </select>
                                    <button type="reset" class="btn btn-reset" onclick="getAllItems()">Reset</button>
                                </div>
                                <div class="form-group">
                                    <a href="Add_Food_Item.php" class="btn btn-success">Add New Food Item</a>
                                </div>
                            </form>
                        </div>
                        <div class="tableView">
                            <div id="foodMenu">
                                <table class="tableData" id="food_table">
                                    <thead class="thead_des">
                                        <tr>
                                            <th>Item No</th>
                                            <th>Item Name</th>
                                            <th>Price</th>
                                            <th>Category</th>
                                            <th>Ingredients</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbodyFood" class="tbody_des">
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
<?php
    }
    else if($do == "view"){
        if(isset($_GET['id'])){
            $f_id = $_GET['id'];
?>  
<body onload="getItem_byId(<?=$f_id;?>,'view')">
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
                            <h4>Manage Menu Items(Food)</h4>
                            <p>Select Food Item To Update....</p>
                        </div>
                        <div class="content-holder">
                            <div class="search-area">
                                <form action="" method="POST" class="form_search">
                                    <p>Search By : </p>
                                    <select name="searchBy" id="searchBy" class="btn">
                                        <option value="#"></option>
                                        <option value="Customer">Customer</option>
                                        <option value="Employee">Employee</option>
                                        <option value="Food Item">Food Item</option>
                                    </select>
                                    <div class="search">
                                        <input type="search" name="search_box" id="search_box" class="btn" onkeyup="search_data()" >
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
                                    <a class="dropdown-item" href="../../../common_pages/profile_details.php">Profile Details</a>
                                    <a class="dropdown-item" href="../../../common_pages/change_password.php">Change Password</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="../../../common_php/logout.php" id="logout">Logout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="content_area view_page">
                        <h4 id="f_id"></h4>
                        <div class="tableView view_pageTable">
                            <div id="foodMenu" class="tableBoxArea">
                                <table class="tableData" id="food_table">
                                    <thead class="thead_des">
                                        <tr>
                                            <th colspan="2">Informations</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbodyFood" class="tbody_des">
                                        <tr>
                                            <th>Item Name</th>
                                            <td><p  id="item_name"></p></td>
                                        </tr>
                                        <tr>
                                            <th>Price</th>
                                            <td><p id="price"></p></td>
                                        </tr>
                                        <tr>
                                            <th>Category</th>
                                            <td><p id="category"></p></td>
                                        </tr>
                                        <tr>
                                            <th>Ingredients</th>
                                            <td>
                                                <ul id="ingredients">

                                                </ul>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="item_img">
                                <h4>ITEM IMAGE</h4>
                                <img src="" id="item_image" alt="">
                            </div>
                        </div>
                        <div class="btn_area_item">
                            <a href="../../../pages/admin/food_item_layouts/Food_Menu.php" class="btn btn-info">Back</a>
                            <a href="../../../pages/admin/food_item_layouts/Update_Food_Item.php?id=<?=$f_id;?>" class="btn btn-success">Update</a>
                            <button id="item-<?=$f_id;?>" onclick='removeItem(<?=$f_id;?>)' class='btn btn-danger'>Remove</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
<?php
        }
        else{
?>
            <script>
                alert("Please Select a Item To View");
                window.location = "../../../pages/admin/food_item_layouts/Food_Menu.php?do=all";
            </script>
<?php
        }
    }
?>
</html>
<?php
    }
    else{
        header('location: ../../../common_pages/login.php');
    }
?>