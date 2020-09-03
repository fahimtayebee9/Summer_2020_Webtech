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
<body>
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
                            <h4>Update Customer's</h4>
                            <p>Select Customer To Update....</p>
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
                        <div class="col-12">
                            <table class="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Customer ID</th>
                                        <th scope="col">Full Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Total Amount Paid (BDT)</th>
                                        <th scope="col">Total Rooms Booked</th>
                                        <th scope="col">Discount</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Select</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $customer_list = fopen("../../../assets/files/customer_list.txt", "r") or die("Unable to open file!");
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
                                    ?>
                                        <tr>
                                            <th scope="row">HMS-<?php echo rand(10000,100000)?>-C</th>
                                            <td><?php echo $name;?></td>
                                            <td><?php echo $email;?></td>
                                            <td><?php echo $totalRevAmount;?></td>
                                            <td><?php echo $totalReservation;?></td>
                                            <td><?php echo $discount;?></td>
                                            <td><?php echo $status;?></td>
                                            <td>
                                                <!-- If View Clicked then the bellow row will be visible else disabled -->
                                                <input type="submit" name="select_update" id="update" class="text-center btn btn-secondary" Value="View">
                                            </td>
                                        </tr>
                                <?php
                                    }
                                ?>
                                </tbody>
                            </table>
                            
                        </div>
                    </div>
                    <div class="row justify-content-center m-auto hide">
                        <div class="col-6">
                            <h5 class="text-center">Update Informations</h5>
                            <form action="../Php/update_Customer_validation.php" method="POST">
                                <div class="form-group">
                                    <label for="fname">Full Name</label>
                                    <input type="text" name="fname" id="fname" class="form-control" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" id="email" class="form-control" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="rating">Status</label>
                                    <select name="customer_status" id="status">
                                        <option value="#">Select</option>
                                        <option value="Premium">Premium</option>
                                        <option value="Gold">Gold</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="bonus">bonus</label>
                                    <input type="number" name="bonus" id="bonus" class="form-control"> 
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="Confirm Update" name="update">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>