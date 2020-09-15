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

    <!-- <script src="../../../assets/js/dashboard_script.js" ></script> -->
    <script src="../../../assets/js/admin/package_script.js" ></script>

    <link rel="stylesheet" href="../../../assets/css/adminHome.css">
    <link rel="stylesheet" href="../../../assets/css/bookRooms_style.css">
    <link rel="stylesheet" href="../../../assets/css/join_requestStyle.css">
    <link rel="stylesheet" href="../../../assets/css/package_style.css">

    <title>Packages</title>
</head>
<body onload="loadPackages()">
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
                            <h4>DASHBOARD</h4>
                            <p>All Informations are shown bellow.</p>
                        </div>
                        <div class="content-holder">
                            <div class="search-area">
                                <form action="" method="POST">
                                    <p>Search By : </p>
                                    <select name="searchBy" id="searchBy" class="btn">
                                        <option value="#"></option>
                                        <option value="Customer">Customer</option>
                                        <option value="Employee">Employee</option>
                                        <option value="Food Item">Food Item</option>
                                    </select>
                                    <input type="search" name="search_box" id="search_box" class="btn" >
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
                    <?php
                        $option = isset($_GET['option']) ? $_GET['option'] : "show";

                        if($option == "show"){
                    ?>
                            <div class="table_area">
                                <h4>Package Details</h4>
                                <form action="" method="" class="form_search form_package">
                                    <p>Filter By : </p>
                                    <select name="package_type" id="package_type" class="btn pack_select" onchange="getData_byType()">
                                        <option value="all" selected></option>
                                        <option value="Birthday">Birthday</option>
                                        <option value="Wedding">Wedding</option>
                                        <option value="Dinner">Dinner</option>
                                    </select>
                                </form>
                                <table class="table_details table_join">
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
                                    <tbody id="packageBody" onload="loadPackages()">
                                        
                                    </tbody>
                                </table>
                            </div>
                            <a href="package_details.php?option=insert" class="view_btn add_btn">Add New Package</a>
                    <?php
                        }
                        else if($option == "insert"){
                    ?>
                            <div class="package_insert">
                                <form action="" class="form_addPackage" >
                                    <div class="form-group">
                                        <label for="name" class="title">Name</label>
                                        <input type="text" name="name" id="name">
                                    </div>
                                    <div class="form-group">
                                        <label for="add_type" class="title">Type</label>
                                        <select name="add_type" id="add_type" class="btn pack_typeAdd">
                                            <option value="None"></option>
                                            <option value="Birthday">Birthday</option>
                                            <option value="Wedding">Wedding</option>
                                            <option value="Dinner">Dinner</option>
                                        </select>
                                    </div>
                                    <div class="form-group" id="add_facilityArea">
                                        <label for="facility" class="title">Facility</label>
                                        <textarea name="facility" id="facility" class="text_facility" column='30'></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="price" class="title">Price</label>
                                        <input type="text" name="price" id="price">
                                    </div>
                                    <div class="form-group">
                                        <label for="available" class="title">Availability</label>
                                        <select name="available" id="available" class="btn pack_typeAdd">
                                            <option value="1"></option>
                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>
                                        </select>
                                    </div>
                                    <div class="form-group btn-area">
                                        <input type="submit" value="Confirm" id="confirm" name="confirm" onclick="addNewPackagee()" class="confirm_btn">
                                    </div>
                                </form>
                                <a href="package_details.php" class="view_btn">Back</a>
                            </div>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </div>
    </section>


</body>
</html>
<?php
    }
    else{
        header('location: ../other/login.php');
    }
?>