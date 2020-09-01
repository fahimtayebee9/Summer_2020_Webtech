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
                            <h4>Update Employee's</h4>
                            <p>Select Employee To Update....</p>
                        </div>
                        <div class="content-holder">
                            <div class="search-area">
                                <form action="" method="POST">
                                    <p>Search By : </p>
                                    <select name="searchBy" id="searchBy" class="input_des">
                                        <option value="#"></option>
                                        <option value="Customer">Customer</option>
                                        <option value="Employee">Employee</option>
                                        <option value="Food Item">Food Item</option>
                                    </select>
                                    <input type="search" name="search_box" id="search_box" class="input_des" >
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
                            <h4>All Employee List</h4>
                            <table class="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Full Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Salary</th>
                                        <th scope="col">Bonus</th>
                                        <th scope="col">Rating</th>
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
                                        <td>3.87</td>
                                        <td>Manager</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Mark</td>
                                        <td>mark@gmail.com</td>
                                        <td>20000</td>
                                        <td>4500</td>
                                        <td>3.87</td>
                                        <td>Staff</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Anthony</td>
                                        <td>anthony@gmail.com</td>
                                        <td>30000</td>
                                        <td>3000</td>
                                        <td>4.87</td>
                                        <td>Chef</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row justify-content-end">
                        <div class="col-4">
                            <div class="button-box text-right">
                                <!-- If 1 row is clicked then the data of that row will be shown in bellow form and then can be updated. -->
                                <a href="../Php/Update_Emp_Validation.php" class="btn btn-danger">Update</a>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center m-auto">
                        <div class="col-5">
                            <h5 class="text-center">Update Informations</h5>
                            <form action="../Php/update_emp_validation.php" method="POST">
                                <div class="form-group">
                                    <label for="fname">Full Name</label>
                                    <input type="text" name="fname" id="fname" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" id="email" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="rating">Rating</label>
                                    <input type="text" name="rating" id="rating" class="form-control"> <!-- Will be Inactive on selection -->
                                </div>
                                <div class="form-group">
                                    <label for="salary">Salary</label>
                                    <input type="number" name="salary" id="salary" class="form-control"> 
                                </div>
                                <div class="form-group">
                                    <label for="bonus">bonus</label>
                                    <input type="number" name="bonus" id="bonus" class="form-control"> 
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="Confirm" name="confirm">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
</body>
</html>