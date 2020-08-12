<?php
    include "../Php/DB_Config.php";
    session_start();
    $name = "Admin";
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    
    <link rel="stylesheet" href="../css/adminHome.css">
    <link rel="stylesheet" href="../css/font-awesome.css">
    <title>Admin Homepage</title>
</head>
<body>
    <div class="left-sidebar">
        <div class="container-fluid">
            <div class="row main">
                <div class="col-2 rmv-pad fixed-area" >
                    <div class="menu-bar " id="menu-bar">
                        <div class="heading-area">
                            <img src="../images/logo.png" class="img-fluid w-50" alt="">
                        </div>
                        <div class="menu-list">
                            <ul>
                                <li></i><a class="menu-title" href="admin_home.php">DashBoard</a></li>
                                <li>
                                    <a class="menu-title" href="../layouts/Employee.php">Employee Details</a>
                                    <ul class="submenu-ul">
                                        <li><a href="../layouts/addEmployee.php">Add Employee</a></li>
                                        <li><a href="../layouts/Delete_Emp.php">Delete Employee</a></li>
                                        <li><a href="../layouts/UpdateEmp.php">Update Employee</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a class="menu-title" href="../layouts/CustomerDetails.php">Customer Details</a>
                                    <ul>
                                        <li><a href="../layouts/CustomerReservationInfo.php">Customer Reservations</a></li>
                                        <li><a href="../layouts/Update_Customer.php">Update Customer</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a class="menu-title" href="../layouts/Food_Menu.php">Food Menu</a>
                                    <ul>
                                        <li><a href="../layouts/Add_Food_Item.php">Add Food Items</a></li>
                                        <li><a href="../layouts/Update_Food_Item.php">Update Food Items</a></li>
                                        <li><a href="../layouts/Delete_Food_Item.php">Delete Food Items</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a class="menu-title" href="../layouts/notifications.php">Join Requests</a>
                                </li>
                                <li>
                                    <a class="menu-title" href="../Php/logout.php">Logout</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-12 rmv-pad scrollable-area">
                    <div class="content-area scrollbar title-header-main">
                        <div class="header-row title-header">
                            <div class="textarea">
                                <h4>Add New Food Item</h4>
                                <p>Add New Food Menu Item Informations Below</p>
                            </div>
                            <div class="content-holder">
                                <div class="search-area">
                                    <form action="">
                                        <i class="fas fa-search" aria-hidden="true"></i>
                                        <input type="search" name="search_box" id="search_box">
                                        <input type="submit" value="Search" class="btn btn-primary">
                                    </form>
                                </div>
                                <span class="border-span"></span>
                                <div class="profile-settings nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <?php
                                            if($name =='Login'){
                                                $settings_1 = 'Register';
                                                $settings_1_path = 'register.php';
                                                $settings_2 = 'Go To Home';
                                                $settings_2_path = '../index.php';
                                                $settings_3 = '';
                                                $settings_3_path = '';
                                            }
                                            else{
                                                $settings_1 = 'Profile Details';
                                                $settings_1_path = 'profile_details.php';
                                                $settings_2 = 'Change Password';
                                                $settings_2_path = 'change_password.php';
                                                $settings_3 = 'Logout';
                                                $settings_3_path = '../Php/logout.php';
                                            }
                                        ?>
                                        <a class="dropdown-item" href="<?php echo $settings_1_path;?>"><?php echo $settings_1;?></a>
                                        <a class="dropdown-item" href="<?php echo $settings_2_path;?>"><?php echo $settings_2;?></a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="<?php echo $settings_3_path;?>"><?php echo $settings_3;?></a>
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
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    
</body>
</html>