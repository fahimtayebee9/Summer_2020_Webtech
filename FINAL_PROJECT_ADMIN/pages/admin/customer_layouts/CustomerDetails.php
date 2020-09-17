<?php
    include "../../../db/DB_Config.php";
    session_start();
    if(isset($_SESSION['username'])){
        $name = $_SESSION['username'];
        $adminId = $_SESSION['uid'];
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

    <title>Manage Customer</title>
</head>
<body onload="getAllCustomer()">
    <div class="left-sidebar">
        <?php
            include "../include/left_menu.php";
        ?>
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
                <div class="header-row report" >
                    <div class="textarea">
                        <h4>Overall Reports</h4>
                    </div>
                    <div class="hms-report" onload="">
                        <div class="reports-area">
                            <div class="report-box">
                                <h6>Premium Member</h6>
                                <p id="premium_count"></p>
                            </div>
                            <div class="report-box">
                                <h6>Gold Member</h6>
                                <p id="gold_count"></p>
                            </div>
                            <div class="report-box">
                                <h6>New Member</h6>
                                <p id="new_count"></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content_area">
                    <h4>All Customers List</h4>
                    <div class="filter_area">
                        <form action="" method="POST" class="filter-form">
                            <div class="form-group">
                                <label for="filter" class="title">Filter Customer's : </label>
                                <select name="user_type" class="filter_select searchBox" onchange="filterCustomer()" id="filterSelect">
                                    <option value="#">Select</option>
                                    <option value="Premium">Premium</option>
                                    <option value="Gold">Gold</option>
                                    <option value="New Member">New Member</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <a href="CustomerReservationInfo.php" class="btn btn-success">View Customer Reservations</a>
                            </div>
                        </form>
                    </div>
                    <div class="tableArea">
                        <table class="tableData" id="emp_table">
                            <thead class="thead-dark ">
                                <tr>
                                    <th>SL.</th>
                                    <th>Profile Picture</th>
                                    <th>Full Name</th>
                                    <th>Total Booking Amount</th>
                                    <th>Total Rooms Booked</th>
                                    <th>Discount</th>
                                    <th>Position</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="cusBody" class="tbody_des">

                            </tbody>
                        </table>
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
        header('location: ../../../common_pages/login.php');
    }
?>