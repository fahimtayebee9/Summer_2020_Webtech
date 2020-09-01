<?php
    include "../../Php/dbDB_Config.php";
    session_start();
    $name = "Admin";
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="../css/employeeList.css">
    <link rel="stylesheet" href="../css/adminHome.css">
    <link rel="stylesheet" href="../css/font-awesome.css">
    
    <title>Customer Information</title>
</head>
<body>
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
                <div class="row row-pad">
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
                <?php
                    $customer_list = fopen("../files/customer_list.txt", "r") or die("Unable to open file!");
                    while(!feof($customer_list)) {
                        $customer = fgets($customer_list);
                        $customer = explode('|', $customer);
                        $name = trim($customer[1]);
                        $email = trim($customer[2]);
                        $gender = trim($customer[3]);
                        $dob = trim($customer[4]);
                        $totalRevAmount = trim($customer[5]);
                        $totalReservation = trim($customer[6]);
                        $discount = trim($customer[7]);
                        $status = trim($customer[8]);
                        break;
                    }
                ?>
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
                        <h4>Customer Id : HMS-<?php echo rand(10000,100000)?>-C</h4>
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Title</th>
                                    <th scope="col">Information</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">Customer Name</th>
                                    <td><?php echo $name?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Customer email</th>
                                    <td><?php echo $email?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Gender</th>
                                    <td><?php echo $gender?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Date Of Birth</th>
                                    <td><?php echo $dob?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Total Reservations</th>
                                    <td><?php echo $totalReservation?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Total Reservations</th>
                                    <td><?php echo $totalReservation?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Discount</th>
                                    <td><?php echo $discount?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Status</th>
                                    <td><?php echo $status?></td>
                                </tr>
                                <tr>
                                    <td colspan=2>
                                        <a href="../index.php" class="btn btn-light">Go To Home</a>
                                        <a href="CustomerReservationInfo.php" class="btn btn-light">Back To Reservations List</a>
                                        <a href="Update_Customer.php" class="btn btn-secondary">Update Customer</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>