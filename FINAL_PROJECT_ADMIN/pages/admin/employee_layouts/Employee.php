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
    
    <script src="../../../assets/js/admin/employee_script.js" ></script>

    <title>Employee Details</title>
</head>
<body onload="getAllEmployee()">
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
                            <h4>Employee Details</h4>
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
                    <div class="header-row report" >
                        <div class="textarea">
                            <h4>Overall Reports</h4>
                        </div>
                        <div class="hms-report" onload="">
                            <div class="reports-area">
                                <div class="report-box">
                                    <h6>Total Staff</h6>
                                    <p id="staff_count"></p>
                                </div>
                                <div class="report-box">
                                    <h6>Total Chef</h6>
                                    <p id="chef_count"></p>
                                </div>
                                <div class="report-box">
                                    <h6>Total Managers</h6>
                                    <p id="manager_count"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="content_area">
                        <h4>All Employee List</h4>
                        <div class="filter_area">
                            <form action="" method="POST" class="filter-form">
                                <div class="form-group">
                                    <label for="filter" class="title">Filter Employee's : </label>
                                    <select name="user_type" class="filter_select searchBox" onchange="filter_emp()" id="filterSelect">
                                        <option value="#">Select</option>
                                        <option value="Manager">Managers</option>
                                        <option value="Chef">Chef's</option>
                                        <option value="Staff">Staffs</option>
                                    </select>
                                    <button type="reset" class="btn btn-reset" onclick="resetFilter()">Reset</button>
                                </div>
                                <div class="form-group">
                                    <a href="addEmployee.php" class="btn btn-success">Add New Employee</a>
                                    <button class="btn btn-info" onclick="paySalary(<?=$adminId;?>)">Pay All Employee's Salary</button>
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
                                        <th>Email</th>
                                        <th>Salary</th>
                                        <th>Bonus</th>
                                        <th>Rating</th>
                                        <th>Role/Position</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="empBody" class="tbody_des">

                                </tbody>
                            </table>
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
        header('location: ../../../common_pages/login.php');
    }
?>