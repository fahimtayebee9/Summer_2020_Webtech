<?php
    include "../../Php/db/DB_Config.php";
    session_start();
    if(isset($_SESSION['username'])){
    $name = "Admin";
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <script src="../../../assets/js/dashboard_script.js" ></script>

    <link rel="stylesheet" href="../../../assets/css/adminHome.css">
    <link rel="stylesheet" href="../../../assets/css/bookRooms_style.css">

    <title>Admin Homepage</title>
</head>
<body onload="loadS()">
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
                                    else{
                                        $name = "Login";
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
                                    <h6>Total Customers</h6>
                                    <p id="cus_count"></p>
                                </div>
                                <div class="report-box">
                                    <h6>Total Employess</h6>
                                    <p id="emp_count"></p>
                                </div>
                                <div class="report-box">
                                    <h6>Total Food Items</h6>
                                    <p><?php echo 356;?></p>
                                </div>
                                <div class="report-box">
                                    <h6>Total Inventories</h6>
                                    <p><?php echo 356;?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="report_tableView">
                        <div class="tableView">
                            <div class="textarea">
                                <h4>Customer List</h4>
                            </div>
                            <div id="customerData">
                                <table class="tableData" id="cus_table">
                                    <thead class="thead_des">
                                        <tr>
                                        <th scope="col">Sl.</th>
                                        <th scope="col">Name </th>
                                        <th scope="col">Email</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbodyCustomer" class="tbody_des">
                                    
                                    </tbody>
                                </table>
                                
                                <input type="button" value="View All" id="view_customer" class="btn_view" onclick="viewCustomer()"></input >
                            </div>
                        </div>
                        <div class="tableView">
                            <div class="textarea">
                                <h4>Employee List</h4>
                            </div>
                            <div class="profit_area" id="basic">
                                <table class="tableData" id="emp_table">
                                    <thead class="thead-dark ">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Name </th>
                                            <th scope="col">Email</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbodyEmp" class="tbody_des">
                                        
                                    </tbody>
                                </table>
                                <a href="Employee.php" class="btn_view" >View Full Details</a>
                            </div>
                        </div>
                    </div>
                    <div class="report_tableView">
                        <div class="tableView">
                            <div class="textarea">
                                <h4>Food Menu</h4>
                            </div>
                            <div id="foodMenu">
                                <table class="tableData" id="food_table">
                                    <thead class="thead_des">
                                        <tr>
                                            <th scope="col">Item No</th>
                                            <th scope="col">Item Name</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Ingradients</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbodyFood" class="tbody_des">
                                    
                                    </tbody>
                                </table>
                                <input type="button" value="View All" id="view_customer" class="btn_view" onclick="viewCustomer()"></input >
                            </div>
                        </div>
                        <div class="tableView">
                            <div class="textarea">
                                <h4>Join Application</h4>
                            </div>
                            <div class="profit_area" id="basic">
                                <table class="tableData" id="emp_table">
                                    <thead class="thead-dark ">
                                        <tr>
                                            <th scope="col">Sl.</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Position</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbodyApplication" class="tbody_des">
                                        
                                    </tbody>
                                </table>
                                <a href="Employee.php" class="btn_view" >View Full Details</a>
                            </div>
                        </div>
                    </div>
                    <div class="sales-report">
                        <div class="sales-info">
                            <p>$ <span class="amount">869</span></p>
                            <p>Last month sales</p>
                        </div>
                        <div class="sales-info">
                            <p>$ <span class="amount">869</span></p>
                            <p>Annual Profit</p>
                        </div>
                        <div class="sales-info">
                            <p>$ <span class="amount">869</span></p>
                            <p>Average Profit</p>
                        </div>
                        <div class="sales-info">
                            <p>$ <span class="amount">869</span></p>
                            <p>Food Item Sales</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        
    </script>
</body>
</html>
<?php
    }
    else{
        header('location: ../other/login.php');
    }
?>