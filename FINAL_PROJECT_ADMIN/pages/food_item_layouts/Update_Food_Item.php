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
                            <h4>Update Menu Item(Food)</h4>
                            <p>Select Food Item To Update....</p>
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
                    <!-- Update Table From DB Data -->
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
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Chicken Fry</td>
                                        <td>FastFood</td>
                                        <td>250</td>
                                        <td><img src="" alt="">-</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>Rice with Curry</td>
                                        <td>Dinner</td>
                                        <td>450</td>
                                        <td><img src="" alt="">-</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Chicken Fry</td>
                                        <td>Breakfast</td>
                                        <td>180</td>
                                        <td><img src="" alt="">-</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Chicken Fry</td>
                                        <td>Breakfast</td>
                                        <td>180</td>
                                        <td><img src="" alt="">-</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Chicken Fry</td>
                                        <td>Breakfast</td>
                                        <td>180</td>
                                        <td><img src="" alt="">-</td>
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
                            <form action="../Php/update_food_validation.php" method="POST">
                                <div class="form-group">
                                    <label for="ino">Item No</label>
                                    <input type="text" name="ino" id="ino" class="form-control"> <!-- Will be Inactive on selection -->
                                </div>
                                <div class="form-group">
                                    <label for="item_name">Item Name</label>
                                    <input type="text" name="item_name" id="item_name" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="category">Category</label>
                                    <select name="category" class="" class="form-control">
                                        <option value="#">Select</option>
                                        <option value="Breakfast">Breakfast</option>
                                        <option value="Dinner">Dinner</option>
                                        <option value="Launch">Launch</option>
                                        <option value="Fast-Food">Fast-Food</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="price">Price</label>
                                    <input type="number" name="price" id="price" class="form-control"> 
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
    
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    
</body>
</html>