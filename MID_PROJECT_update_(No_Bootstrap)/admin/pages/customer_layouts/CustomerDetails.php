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
                        <h4>Premium Members</h4>
                        <h2 class="count">3</h2>
                    </div>
                    <div class="col-4">
                        <h4>Gold Members</h4>
                        <h2 class="count">47</h2>
                    </div>
                    <div class="col-4">
                        <h4>New Members</h4>
                        <h2 class="count">91</h2>
                    </div>
                </div>
                <div class="row row-pad">
                    <div class="col-6">
                        <form action="../Php/filter_user.php" method="POST" class="filter-form">
                            <div class="form-group">
                                <label for="filter">Filter Customer's : </label>
                                <select name="user_type" class="" class="form-control">
                                    <option value="#">Select</option>
                                    <option value="Premium">Premium</option>
                                    <option value="Gold">Gold</option>
                                    <option value="New Member">New Member</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Filter" name="filter" class="form-control">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row row-pad">
                    <div class="col-12">
                        <h4>All Customers List</h4>
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Full Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Total Booking Amount</th>
                                    <th scope="col">Total Rooms Booked</th>
                                    <th scope="col">Discount</th>
                                    <th scope="col">Role/Position</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>mark@gmail.com</td>
                                    <td>25000</td>
                                    <td>5000</td>
                                    <td>50%</td>
                                    <td>Premium</td>
                                </tr>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>mark@gmail.com</td>
                                    <td>20000</td>
                                    <td>4500</td>
                                    <td>25%</td>
                                    <td>Gold</td>
                                </tr>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Anthony</td>
                                    <td>anthony@gmail.com</td>
                                    <td>30000</td>
                                    <td>3000</td>
                                    <td>10%</td>
                                    <td>New Member</td>
                                </tr>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Anthony</td>
                                    <td>anthony@gmail.com</td>
                                    <td>30000</td>
                                    <td>3000</td>
                                    <td>10%</td>
                                    <td>New Member</td>
                                </tr>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Anthony</td>
                                    <td>anthony@gmail.com</td>
                                    <td>30000</td>
                                    <td>3000</td>
                                    <td>10%</td>
                                    <td>New Member</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row justify-content-end">
                    <div class="col-4">
                        <div class="button-area text-center">
                            <a href="CustomerReservationInfo.php" class="btn btn-success">View Customer Reservations</a>
                            <a href="Update_Customer.php" class="btn btn-info">Update Customer Details</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>