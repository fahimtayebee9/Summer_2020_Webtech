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
                            <h4>Remove Menu Items</h4>
                            <p>Select the menu items to remove...</p>
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
                            <h4>Menu List</h4>
                            <table class="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Item No</th>
                                        <th scope="col">Item Name</th>
                                        <th scope="col">Category</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Select</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Chicken Fry</td>
                                        <td>FastFood</td>
                                        <td>250</td>
                                        <td><img src="" alt="">-</td>
                                        <td><input type="checkbox" name="delte_check" id="delete_check"></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>Rice with Curry</td>
                                        <td>Dinner</td>
                                        <td>450</td>
                                        <td><img src="" alt="">-</td>
                                        <td><input type="checkbox" name="delte_check" id="delete_check"></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Chicken Fry</td>
                                        <td>Breakfast</td>
                                        <td>180</td>
                                        <td><img src="" alt="">-</td>
                                        <td><input type="checkbox" name="delte_check" id="delete_check"></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Chicken Fry</td>
                                        <td>Breakfast</td>
                                        <td>180</td>
                                        <td><img src="" alt="">-</td>
                                        <td><input type="checkbox" name="delte_check" id="delete_check"></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Chicken Fry</td>
                                        <td>Breakfast</td>
                                        <td>180</td>
                                        <td><img src="" alt="">-</td>
                                        <td><input type="checkbox" name="delte_check" id="delete_check"></td>
                                    </tr>
                                </tbody>
                            </table>
                            <!-- <input type="submit" value="" name="submit"> -->
                        </div>
                    </div>
                    <div class="row justify-content-end">
                        <div class="col-4">
                            <div class="button-area text-right">
                                <a href="../Php/Delete_Emp_Validation.php" class="btn btn-danger">Delete</a>
                            </div>
                        </div>
                    </div>
                    <!-- If Submit is pressed then this div area will appear -->
                    <div class="row">
                        <div class="col-4">
                            <p>If Submit is pressed then this div area will appear</p>
                            <div class="confirmation-box">
                                <h6>Are you sure?</h6>
                                <p>Delete x times from menu list.</p>
                                <input type="submit" value="Confirm" name="submit" class="btn btn-success">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
</body>
</html>