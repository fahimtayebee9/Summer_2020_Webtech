<?php
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

    <script src="../../../assets/js/admin/dashboard_script.js" ></script>
    <script src="../../../assets/js/admin/package_script.js" ></script>

    <link rel="stylesheet" href="../../../assets/css/package_style.css">
    <link rel="stylesheet" href="../../../assets/css/adminHome.css">
    <link rel="stylesheet" href="../../../assets/css/bookRooms_style.css">
    <link rel="stylesheet" href="../../../assets/css/employeeList.css">
    <link rel="stylesheet" href="../../../assets/css/foodMenu_style.css">

    <title>Packages</title>
</head>
<?php
    $option = isset($_GET['option']) ? $_GET['option'] : "show";

    if($option == "show"){
?>
<body onload="loadPackagesList()">
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
                            <h4>Manage Package</h4>
                            <p>All Informations are shown bellow.</p>
                        </div>
                        <div class="content-holder">
                            <div class="search-area">
                                <form action="" method="POST">
                                    <p>Search By : </p>
                                    <select name="searchBy" id="searchBy" class="btn searchBox">
                                        <option value="#"></option>
                                        <option value="Customer">Customer</option>
                                        <option value="Employee">Employee</option>
                                        <option value="Food Item">Food Item</option>
                                    </select>
                                    <input type="search" name="search_box" id="search_box" class="btn searchBox" >
                                    <input type="submit" value="Search" id="submit" class="btn_search btn">
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
                </div>
                <div class="body_content">
                    <div class="table_area">
                        <h4>Package Details</h4>
                        <div class="filter_area">
                            <form action="" method="POST" class="filter-form">
                                <div class="form_filter">
                                    <label for="filter" class="title">Filter Package : </label>
                                    <select name="package_type" id="package_type" class="searchBox pack_select" onchange="getData_byType()">
                                        <option value="all" selected></option>
                                        <option value="Birthday">Birthday</option>
                                        <option value="Wedding">Wedding</option>
                                        <option value="Dinner">Dinner</option>
                                    </select>
                                    <button type="reset" class="btn btn-reset" onclick="resetFilter_package()">Reset</button>
                                </div>
                                <div class="form_btn">
                                    <a href="package_details.php?option=insert" class="btn btn-success">Add New Package</a>
                                </div>
                            </form>
                        </div>
                        <table class="table_details table_join packageTable">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="">Package Name</th>
                                    <th scope="">Category</th>
                                    <th scope="">Facility</th>
                                    <th scope="">Price</th>
                                    <th scope="">Availability</th>
                                    <th scope="">Action</th>
                                </tr>
                            </thead>
                            <tbody id="packageBody">
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
<?php
    }
    else if($option == "insert"){
?>
<body>
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
                            <h4>MANAGE PACKAGE</h4>
                            <p>All Informations are shown bellow.</p>
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
                                    <a class="dropdown-item" href="../../../common_pages/profile_details.php">Profile Details</a>
                                    <a class="dropdown-item" href="../../../common_pages/change_password.php">Change Password</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="../../../common_php/logout.php" id="logout">Logout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="contentHolder">
                        <div class="form_areaHolder">
                            <form id="form_insert" method="POST" onsubmit="return addNewPackagee(this)" enctype="multipart/form-data">
                                <div class="form_fieldHolder">
                                    <div class="filed_holder">
                                        <div class="form_update">
                                            <label for="name" class="title">Name</label>
                                            <input type="text" name="name" id="name" class="form_field ftp">
                                        </div>
                                        <div class="form_update">
                                            <label for="add_type" class="title">Type</label>
                                            <select name="add_type" id="add_type" class="form_field ftp">
                                                <option value="None"></option>
                                                <option value="Birthday">Birthday</option>
                                                <option value="Wedding">Wedding</option>
                                                <option value="Dinner">Dinner</option>
                                            </select>
                                        </div>
                                        <div class="form_update">
                                            <label for="price" class="title">Price</label>
                                            <input type="text" name="price" id="price" class="form_field ftp"> 
                                        </div>
                                        <div class="form_update">
                                            <label for="facility" class="title">Facility</label>
                                            <div class="ingrad_check">
                                                <div class="part_ing">
                                                    <label for="" class="check_label">
                                                        <input type="checkbox" name="facility" value="25-50 Persons">25-50 Persons
                                                    </label>
                                                    <label for="" class="check_label">
                                                        <input type="checkbox" name="facility" value="50-100 Persons">50-100 Persons
                                                    </label>
                                                    <label for="" class="check_label">
                                                        <input type="checkbox" name="facility" value="100-150 Persons">100-150 Persons
                                                    </label>
                                                    <label for="" class="check_label">
                                                        <input type="checkbox" name="facility" value="150-250 Persons">150-250 Persons
                                                    </label>
                                                    <label for="" class="check_label">
                                                        <input type="checkbox" name="facility" value="250-350 Persons">250-350 Persons
                                                    </label>
                                                </div>
                                                <div class="part_ing">
                                                    <label for="" class="check_label">
                                                        <input type="checkbox" name="facility" value="Dinner Menu">Dinner Menu
                                                    </label>
                                                    <label for="" class="check_label">
                                                        <input type="checkbox" name="facility" value="Launch Menu">Launch Menu
                                                    </label>
                                                    <label for="" class="check_label">
                                                        <input type="checkbox" name="facility" value="Stage Decoration">Stage Decoration
                                                    </label>
                                                    <label for="" class="check_label">
                                                        <input type="checkbox" name="facility" value="Free Wifi">Free Wifi
                                                    </label>
                                                    <label for="" class="check_label">
                                                        <input type="checkbox" name="facility" value="Roof Top">Roof Top
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form_update">
                                            <label for="available" class="title">Availability</label>
                                            <select name="available" id="available" class="form_field ftp">
                                                <option value="1"></option>
                                                <option value="1">Active</option>
                                                <option value="0">Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="profileImage_holder">
                                        <h5 id="tit">Package Image</h5>
                                        <img src="" id="package_image" alt="Item Image">
                                        <input type="file" name="package_imageUpload"  accept="image/*" id="package_imageUpload" class="form_field file_ftp" onchange="changeImage()">
                                    </div>
                                </div>
                                <div class="form_update btn_holderArea">
                                    <input type="hidden" name="id" id="id" value="">
                                    <a href="../../../pages/admin/food_item_layouts/Food_Menu.php" class="btn btn-info">Back</a>
                                    <input type="submit" value="Add Item" name="confirm" class="btn save_btn" >
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </section>
</body>
<?php
    }
    else if($option == "view" && isset($_GET['id'])){
?>
<body onload="loadPackageById(<?=$_GET['id'];?>)">
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
                            <h4>Manage Package</h4>
                            <p>All Informations are shown bellow.</p>
                        </div>
                        <div class="content-holder">
                            <div class="search-area">
                                <form action="" method="POST">
                                    <p>Search By : </p>
                                    <select name="searchBy" id="searchBy" class="btn searchBox">
                                        <option value="#"></option>
                                        <option value="Customer">Customer</option>
                                        <option value="Employee">Employee</option>
                                        <option value="Food Item">Food Item</option>
                                    </select>
                                    <input type="search" name="search_box" id="search_box" class="btn searchBox" >
                                    <input type="submit" value="Search" id="submit" class="btn_search btn">
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
                </div>
                <div class="body_content">
                    <div class="table_area">
                        <table class="table_details table_join packageTable">
                            <thead class="thead-dark">
                                <tr>
                                    <th colspan="2"><h4>Package Details</h4></th>
                                </tr>
                            </thead>
                            <tbody id="packageBody">
                                
                            </tbody>
                        </table>
                        <div class="action_area">
                            <a href="package_details.php?option=show" class="btn btn-info" id="packageView-<?=$_GET['id']?>">BACK</a>
                            <button class="btn btn-danger" onclick='rejectButtonClick()' id="packageRemove-<?=$_GET['id']?>">REMOVE</button>
                            <a href="edit_package.php?id=<?=$_GET['id']?>" class="edit_btn" id="packageEdit-<?=$_GET['id']?>">EDIT</a>
                        </div>  
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
<?php
    }
?>
</html>
<?php
    }
    else{
        header('location: ../other/login.php');
    }
?>