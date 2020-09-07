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
                            <h4>Add New Food Item</h4>
                            <p>Add New Food Menu Item Informations Below</p>
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
                    <div class="row justify-content-center m-auto">
                        <div class="col-5">
                            <h5 class="text-center">Add Item Informations</h5>
                            <form action="../Php/add_fooditem_validation.php" method="POST">
                                <div class="form-group">
                                    <label for="ino">Item No</label>
                                    <input type="text" name="ino" id="ino" class="form-control" value="<?php $_SESSION['ino']="FI-".rand(100,1000); echo "FI-".rand(100,1000);?>" disabled> <!-- Will be Inactive and serial no will be calculated from database data row count -->
                                </div>
                                <div class="form-group">
                                    <label for="item_name">Item Name</label>
                                    <input type="text" name="item_name" id="item_name" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="category">Category</label>
                                    <select name="category" class="" class="form-control" data-live-search="true">
                                        <option value="#">Select</option>
                                        <option value="Breakfast" >Breakfast</option>
                                        <option value="Dinner" >Dinner</option>
                                        <option value="Launch">Launch</option>
                                        <option value="Fast-Food" >Fast-Food</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="price">Price</label>
                                    <input type="number" name="price" id="price" class="form-control"> 
                                </div>
                                <?php
                                    if(isset($_SESSION['categoryError'])){
                                        unset($_SESSION['success']);
                                ?>
                                        <p class="text-danger"><?php echo $_SESSION['categoryError'];?></p>
                                <?php
                                    }
                                ?>
                                <div class="form-group">
                                    <input type="submit" value="Confirm" name="confirm" class="btn btn-primary">
                                </div>
                                <?php
                                    unset($_SESSION['categoryError']);
                                    if(isset($_SESSION['success'])){
                                        unset($_SESSION['categoryError']);
                                ?>
                                        <p class="text-success"><?php echo $_SESSION['success'];?></p>
                                <?php
                                    }
                                    unset($_SESSION['success']);
                                ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
</body>
</html>