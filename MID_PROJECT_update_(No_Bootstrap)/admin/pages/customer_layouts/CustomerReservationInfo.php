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

    <link rel="stylesheet" href="../../../assets/css/employeeList.css">
    <link rel="stylesheet" href="../../../assets/css/adminHome.css">
    
    <title>Admin Homepage</title>
</head>
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
                            <h4>Customer ID : 567</h4>
                            <p>All Reservations are shown bellow.</p>
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
                    <div class="row-pad">
                        <div class="col-4">
                            <h4>Total Reservations</h4>
                            <h2 class="count">397</h2>
                        </div>
                        <div class="col-4">
                            <h4>Active Reservations</h4>
                            <h2 class="count">47</h2>
                        </div>
                        <div class="col-4">
                            <h4>Expired</h4>
                            <h2 class="count">350</h2>
                        </div>
                    </div>
                    <div class="row row-pad">
                        <div class="col-6">
                            <form action="../Php/filter_user_reservations.php" method="POST" class="filter-form">
                                <div class="form-group">
                                    <label for="revfrom">Filter Reservation : </label>
                                    <input type="date" name="revfrom" id="revfrom" class="form-control">(From)
                                </div>
                                <div class="form-group">
                                    <label for="revto"></label>
                                    <input type="date" name="revto" id="revto"  class="form-control">(To)
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="Filter" name="filter" class="form-control btn btn-success">
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row row-pad">
                        <div class="col-12">
                            <h4>All Customers Reservation List</h4>
                            <table class="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Reservation No</th>
                                        <th scope="col">Customer ID</th>
                                        <th scope="col">Reserved From</th>
                                        <th scope="col">Reserved To</th>
                                        <th scope="col">Total Amount</th>
                                        <th scope="col">Paid Amount</th>
                                        <th scope="col">Due Amount</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $rev_list = fopen("../../../assets/files/reservations.txt", "r") or die("Unable to open file!");
                                    $i = 1;
                                    $rowCount = 1;
                                    while(!feof($rev_list)) {
                                        $rev = fgets($rev_list);
                                        $rev = explode('|', $rev);
                                        $revFromDate = trim($rev[0]);
                                        $revToDate = trim($rev[1]);
                                        $totalAmount = trim($rev[2]);
                                        $paid = trim($rev[3]);
                                        $due = trim($rev[4]);
                                ?>
                                        <tr>
                                            <th scope="row">#REV-<?php echo rand(1000,2000)?></th>
                                            <td>HMS-<?php echo rand(10000,100000)?>-C</td>
                                            <td><?php echo $revFromDate?></td>
                                            <td><?php echo $revToDate?></td>
                                            <td><?php echo $totalAmount?></td>
                                            <td><?php echo $paid?></td>
                                            <td><?php echo $due?></td>
                                            <td><a href="User_Reservation_information.php" class="btn btn-light">View</a></td> <!--If clicked then the data for this row will be passed to another page -->
                                        </tr>
                                <?php
                                    }
                                ?>
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