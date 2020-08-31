<?php
    include "../../Php/db/DB_Config.php";
    session_start();
    $name = "Admin";
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <script src="../../../assets/js/join_applicationScript.js" type="text/javaScript"></script>
    
    <link rel="stylesheet" href="../../../assets/css/adminHome.css">
    <link rel="stylesheet" href="../../../assets/css/join_requestStyle.css">
    <link rel="stylesheet" href="../../../assets/css/profileDetails.css">

    <title>Join Application</title>
</head>
<body>
    <div class="left-sidebar">
        <div class="dashboard_controller">
            <div class="fixed-area" >
                <div class="heading-area">
                    <img src="../../../assets/images/logo.png" class="logoimg" alt="">
                </div>
                <div class="menu-list">
                    <ul>
                        <li></i><a class="menu-title" href="admin_home.php">DashBoard</a></li>
                        <li>
                            <a class="menu-title" href="../employee_layouts/Employee.php">Employee Details</a>
                            <ul class="submenu-ul">
                                <li><a href="../employee_layouts/addEmployee.php">Add Employee</a></li>
                                <li><a href="../employee_layouts/Delete_Emp.php">Delete Employee</a></li>
                                <li><a href="../employee_layouts/UpdateEmp.php">Update Employee</a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="menu-title" href="../customer_layouts/CustomerDetails.php">Customer Details</a>
                            <ul>
                                <li><a href="../customer_layouts/CustomerReservationInfo.php">Customer Reservations</a></li>
                                <li><a href="../customer_layouts/Update_Customer.php">Update Customer</a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="menu-title" href="../food_item_layouts/Food_Menu.php">Food Menu</a>
                            <ul>
                                <li><a href="../food_item_layouts/Add_Food_Item.php">Add Food Items</a></li>
                                <li><a href="../food_item_layouts/Update_Food_Item.php">Update Food Items</a></li>
                                <li><a href="../food_item_layouts/Delete_Food_Item.php">Delete Food Items</a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="menu-title" href="../other/notifications.php">Join Requests</a>
                        </li>
                        <li>
                            <a class="menu-title" href="../../Php/logout.php">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="scrollable-area">
            <div class="content-area scrollbar title-header-main">
                <div class="header-row title-header">
                    <div class="textarea">
                        <h4>Join Applications</h4>
                        <p>All Applications are shown bellow.</p>
                    </div>
                    <div class="content-holder">
                        <div class="search-area">
                            <form action="" method="POST">
                                <input type="search" name="search_box" id="search_box" class="btn" >
                                <input type="submit" value="Search" id="" class="btn_search btn">
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
                                <a class="dropdown-item" href="profile_details.php">Profile Details</a>
                                <a class="dropdown-item" href="change_password.php">Change Password</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="../../Php/logout.php" id="logout">Logout</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="filter_area">
                    <form action="../Php/filter_user_application.php" method="" class="filter-form">
                        <div class="form-group filter">
                            <label for="filter" class="title lbl">Filter Employee's : </label>
                            <select name="user_type" class="filter_select" onchange="filterRequest()">
                                <option value="#">Select</option>
                                <option value="Manager">Managers</option>
                                <option value="Chef">Chef's</option>
                                <option value="Staff">Staffs</option>
                            </select>
                        </div>
                        <div class="form-group lbl">
                            <input type="submit" value="Filter" name="filter" class="btn">
                        </div>
                    </form>
                </div>
                <div class="table_area">
                    <h4>Joining Applications</h4>
                    <table class="table_details table_join">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="">Application No</th>
                                <th scope="">Applicant Name</th>
                                <th scope="">Selected Post</th>
                                <th scope="">Expected Salary</th>
                                <th scope="">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">#JAPP-1221</th>
                                <td>Ahmed Zubayer</td>
                                <td>Manager</td>
                                <td>25000</td>
                                <td>
                                    <button href="" class="view_btn" onclick="viewButtonClick()">View</button>
                                    <button href="" class="delete_btn" onclick="rejectButtonClick()">Reject</button>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">#JAPP-1221</th>
                                <td>Ahmed Zubayer</td>
                                <td>Manager</td>
                                <td>25000</td>
                                <td>
                                    <button href="" class="view_btn" onclick="viewButtonClick()">View</button>
                                    <button href="" class="delete_btn" onclick="rejectButtonClick()">Reject</button>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">#JAPP-1221</th>
                                <td>Wahid Neon</td>
                                <td>Manager</td>
                                <td>25000</td>
                                <td>
                                    <button href="" class="view_btn" onclick="viewButtonClick()">View</button>
                                    <button href="" class="delete_btn" onclick="rejectButtonClick()">Reject</button>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">#JAPP-1221</th>
                                <td>Mohaiminul Siyam</td>
                                <td>Chef</td>
                                <td>20000</td>
                                <td>
                                    <button href="" class="view_btn" onclick="viewButtonClick()">View</button>
                                    <button href="" class="delete_btn" onclick="rejectButtonClick()">Reject</button>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">#JAPP-1221</th>
                                <td>Ullas Chowdhury</td>
                                <td>Staff</td>
                                <td>55000</td>
                                <td>
                                    <button href="" class="view_btn" onclick="viewButtonClick()">View</button>
                                    <button href="" class="delete_btn" onclick="rejectButtonClick()">Reject</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>