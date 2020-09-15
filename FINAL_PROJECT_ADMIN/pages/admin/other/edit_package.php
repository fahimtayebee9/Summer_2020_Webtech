<?php
    session_start();
    if(isset($_SESSION['username'])){
        $name = $_SESSION['username'];
        $id = "";
        if(isset($_GET['id'])){
            $id = $_GET['id'];
        }
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

    <title>Package Edit</title>
</head>
<body onload="editButtonClick()">
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
                    <div class="body_content">
                        <div class="package_insert">
                            <form class="form_addPackage" method="POST">
                                <div class="form-group">
                                    <label for="name_edit" class="title">Name</label>
                                    <input type="text" name="name_edit" id="nameEdit">
                                </div>
                                <div class="form-group">
                                    <label for="edit_type" class="title">Type</label>
                                    <select name="edit_type" id="edit_type" class="btn pack_typeAdd">
                                        <option value="#"></option>
                                        <option value="Birthday">Birthday</option>
                                        <option value="Wedding">Wedding</option>
                                        <option value="Dinner">Dinner</option>
                                    </select>
                                </div>
                                <div class="form-group" id="add_facilityArea">
                                    <label for="facility" class="title">Facility</label>
                                    <textarea name="facility" id="facility_edit" class="text_facility" column='30'></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="price_edit" class="title">Price</label>
                                    <input type="text" name="price_edit" id="price_edit">
                                </div>
                                <div class="form-group">
                                    <label for="available_edit" class="title">Availability</label>
                                    <select name="available_edit" id="available_edit" class="btn pack_typeAdd">
                                        <option value="1"></option>
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                </div>
                                <div class="form-group btn-area">
                                    <input type="hidden" name="id" id="id" value="">
                                    <input type="submit" value="Save Changes" id="edit" name="edit" onclick="editPackageData()" class="confirm_btn">
                                </div>
                            </form>
                            <a href="package_details.php" class="view_btn">Back</a>
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
        header('location: ../other/login.php');
    }
?>