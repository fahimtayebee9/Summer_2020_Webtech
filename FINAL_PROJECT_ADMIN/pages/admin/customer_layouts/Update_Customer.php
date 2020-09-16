<?php
    include "../../../db/DB_Config.php";
    session_start();
    $cus_id = "";
    if(isset($_SESSION['username'])){
        $name = $_SESSION['username'];
        $adminId = $_SESSION['uid'];
        if(isset($_GET['id'])){
            $cus_id = $_GET['id'];
        
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="../../../assets/css/employeeList.css">
    <link rel="stylesheet" href="../../../assets/css/adminHome.css">
    <link rel="stylesheet" href="../../../assets/css/bookRooms_style.css">
    <link rel="stylesheet" href="../../../assets/css/customer_style.css">

    <script src="../../../assets/js/admin/customer_script.js" ></script>

    <title>Admin Homepage</title>
    
    <style>
        .show{
            display: block;
        }
        .hide{
            display: none;
        }
        .complete{
            height: 100px;
            width: 100px;
            background: red;
        }
    </style>
</head>
<body onload="getCustomerData(<?=$cus_id;?>)">
    <div class="left-sidebar">
        <div class="dashboard_controller">
            <?php
                include "../include/left_menu.php";
            ?>
        </div>
        <div class="main">
            <div class="scrollable-area">
                <div class="content-area scrollbar title-header-main">
                    <div class="header-row title-header">
                        <div class="textarea">
                            <h4>Customer Details</h4>
                            <p>All Customer informations are shown bellow.</p>
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
                        <h5>Update Informations</h5>
                        <div class="contentHolder_sub">
                            <div class="form_areaHolder">
                                <form>
                                    <div class="form_update">
                                        <label for="fname" class="title">Full Name</label>
                                        <input type="text" name="fname" id="fname" class="form_field ftp" disabled>
                                    </div>
                                    <div class="form_update">
                                        <label for="totalBookedRooms" class="title">Total Booked Rooms</label>
                                        <input type="text" name="totalBookedRooms" id="totalBookedRooms" class="form_field ftp" disabled>
                                    </div>
                                    <div class="form_update">
                                        <label for="totalBookingAmount" class="title">Total Booking Amount</label>
                                        <input type="text" name="totalBookingAmount" id="totalBookingAmount" class="form_field ftp" disabled>
                                    </div>
                                    <div class="form_update">
                                        <label for="rating" class="title">Status</label>
                                        <select name="customer_status" id="status" class="form_field ftp">
                                            <option value="New">Select</option>
                                            <option value="Premium">Premium</option>
                                            <option value="Gold">Gold</option>
                                        </select>
                                    </div>
                                    <div class="form_update">
                                        <label for="discount" class="title">discount</label>
                                        <input type="text" name="discount" id="discount" class="form_field ftp"> 
                                    </div>
                                    <div class="form_update txt">
                                        <input type="hidden" name="id" id="user_id" value="">
                                        <input type="submit" value="Save Changes" name="confirm" class="btn save_btn" onclick="updateCusData(<?=$cus_id;?>)">
                                        <a href="../../../pages/admin/customer_layouts/CustomerDetails.php" class="btn save_btn back_btn">Back</a>
                                    </div>
                                </form>
                            </div>
                            <div class="profileImage_holder">
                                <h5>Profile Picture</h5>
                                <img src="" id="userImg" alt="User Image">
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>
<?php
        }
        else{
            header('location: ../../../pages/admin/customer_layouts/CustomerDetails.php');
        }
    }
    else{
        header('location: ../../../common_pages/login.php');
    }
?>