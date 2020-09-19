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
    <script src="../../../assets/js/admin/profit_filter.js" ></script>
    
    <link rel="stylesheet" href="../../../assets/css/adminHome.css">
    <link rel="stylesheet" href="../../../assets/css/bookRooms_style.css">
    <link rel="stylesheet" href="../../../assets/css/profitPage_style.css">

    <title>Admin Homepage</title>
</head>
<body onload="get_Profit()">
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
                                <form action="" method="POST" class="form_search">
                                    <p>Search By : </p>
                                    <select name="searchBy" id="searchBy" class="btn searchBox">
                                        <option value="#"></option>
                                        <option value="Customer">Customer</option>
                                        <option value="Employee">Employee</option>
                                        <option value="Food Item">Food Item</option>
                                    </select>
                                    <div class="search">
                                        <input type="search" name="search_box" id="search_box" class="btn searchBox" onkeyup="search_data()" onblur="hide()" onreset="hide()">
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
                    <div class="profit_area">
                        <div class="filter_profitArea">
                            <h1>FILTER PROFITS</h1>
                            <form action="" onsubmit="">
                                <div class="filter_part">
                                    <label for="year" class="title">Year</label>
                                    <select name="year" id="set_year" onchange="get_yearlyProfit()">

                                    </select>
                                </div>
                                <div class="filter_part month" id="month_area" >
                                    <label for="month" class="title">Month</label>
                                    <select name="month" id="month" disabled onchange="get_monthlyProfit()">
                                        
                                    </select>
                                </div>
                                <div class="filter_Reset">
                                    <label for="" class=""></label>
                                    <input type="reset" value="RESET" class="btn" onclick="resetFilter()">
                                </div>
                            </form>
                        </div>
                        <div class="profit_table" id="profit_table">
                            <h1 id="title_header"></h1>
                            <table class="tableData" id="pro_table">
                                <thead class="thead-dark" id="thead_profit">
                                    
                                </thead>
                                <tbody id="tbody_profit" class="tbody_des">
                                    
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
        header('location: ../other/login.php');
    }
?>