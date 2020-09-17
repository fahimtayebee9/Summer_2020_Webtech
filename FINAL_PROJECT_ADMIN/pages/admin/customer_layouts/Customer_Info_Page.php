<?php
    include "../../../db/DB_Config.php";
    session_start();
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
    
    <title>Customer Information</title>
</head>
<body onload="load_dataById(<?=$cus_id;?>)">
    <div class="left-sidebar">
        <div class="dashboard_controller">
            <?php
                include "../include/left_menu.php";
            ?>
        </div>
        <div class="scrollable-area">
            <div class="content-area scrollbar title-header-main">
                <div class="header-row title-header">
                    <div class="textarea">
                        <h4>Customer Detail</h4>
                        <p>All details are shown bellow.</p>
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
                <div class="contentHolder info_sub">
                    <div class="contentHolder_sub">
                        <div class="form_areaHolder">
                            <table class="tableData">
                                <thead class="thead-dark">
                                    <tr>
                                        <th colspan="2">Informations</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th class="tbl_tContent">Customer Name</th>
                                        <td> <p class="tbl_tContent" id="name"></p> </td>
                                    </tr>
                                    <tr>
                                        <th class="tbl_tContent">Customer email</th>
                                        <td><p class="tbl_tContent" id="email"></p></td>
                                    </tr>
                                    <tr>
                                        <th class="tbl_tContent">Date Of Birth</th>
                                        <td><p class="tbl_tContent" id="dob"></p></td>
                                    </tr>
                                    <tr>
                                        <th class="tbl_tContent">Total Booking</th>
                                        <td><p class="tbl_tContent" id="totalBooking"></p></td>
                                    </tr>
                                    <tr>
                                        <th class="tbl_tContent">Total Reservations</th>
                                        <td><p class="tbl_tContent" id="totalReservation"></p></td>
                                    </tr>
                                    <tr>
                                        <th class="tbl_tContent">Discount</th>
                                        <td><p class="tbl_tContent" id="discount"></p></td>
                                    </tr>
                                    <tr>
                                        <th class="tbl_tContent">Status</th>
                                        <td><p class="tbl_tContent" id="status"></p></td>
                                    </tr>
                                    <tr>
                                        <td colspan=2 class="td_btn">
                                            <div class="td_btn">
                                                <a href="../../../index.php" class="btn btn-info">Go To Home</a>
                                                <a href="CustomerDetails.php" class="btn btn-info">Go To Customer List</a>
                                                <a href="Update_Customer.php?id=<?=$cus_id;?>" class="btn btn-info">Update Customer</a>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

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
</body>
</html>
<?php
        }
    }
    else{
        header('location: ../../../common_pages/login.php');
    }
?>