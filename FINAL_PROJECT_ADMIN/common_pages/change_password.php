<?php
    require_once("../db/config.php");
    session_start();
    $db = dbConnection();
    $id = $_SESSION['uid'];
    $sql = "select * from users where id='$id'";
    $res = mysqli_query($db,$sql);
    while($row = mysqli_fetch_assoc($res)){
        $name = $row['name'];
        $uid = $row['id'];
    }
    
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <script src="../assets/js/admin/script.js" type="text/javaScript"></script>

    <link rel="stylesheet" href="../assets/css/profileDetails.css">
    <link rel="stylesheet" href="../assets/css/adminHome.css">
    <link rel="stylesheet" href="../assets/css/media.css">
    
    <title>Reset Password</title>
</head>
<body>
    <div class="left-sidebar">
        <div class="dashboard_controller">
            <div class="fixed-area" >
                <div class="heading-area">
                    <img src="../assets/images/logo.png" class="logoimg" alt="Logo HMSP">
                </div>
                <div class="menu-list">
                    <ul>
                        <li></i><a class="menu-title" href="../pages/admin/admin_layouts/admin_home.php"></i>DashBoard</a></li>
                        <li>
                            <a class="menu-title" href="../employee_layouts/Employee.php">Employee Details</a>
                            <ul class="submenu-ul">
                                <li><a href="../pages/admin/employee_layouts/addEmployee.php">Add Employee</a></li>
                                <li><a href="../pages/admin/employee_layouts/Delete_Emp.php">Delete Employee</a></li>
                                <li><a href="../pages/admin/employee_layouts/UpdateEmp.php">Update Employee</a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="menu-title" href="../customer_layouts/CustomerDetails.php">Customer Details</a>
                            <ul class="submenu-ul">
                                <li><a href="../pages/admin/customer_layouts/CustomerReservationInfo.php">Customer Reservations</a></li>
                                <li><a href="../pages/admin/customer_layouts/Update_Customer.php">Update Customer</a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="menu-title" href="../food_item_layouts/Food_Menu.php">Food Menu</a>
                            <ul class="submenu-ul">
                                <li><a href="../pages/admin/food_item_layouts/Add_Food_Item.php">Add Food Items</a></li>
                                <li><a href="../pages/admin/food_item_layouts/Update_Food_Item.php">Update Food Items</a></li>
                                <li><a href="../pages/admin/food_item_layouts/Delete_Food_Item.php">Delete Food Items</a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="menu-title" href="../pages/admin/profit_details/profit_details.php">Profit Details</a>
                        </li>
                        <li>
                            <a class="menu-title" href="../pages/admin/other/package_details.php">Package Details</a>
                        </li>
                        <li>
                            <a class="menu-title" href="../pages/admin/admin_layouts/notifications.php">Join Requests</a>
                        </li>
                        <li>
                            <a class="menu-title" href="../../../common_php/logout.php">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="scrollable-area">
            <div class="content-area scrollbar title-header-main">
                <div class="header-row title-header">
                    <div class="textarea">
                        <h4>Change Password </h4>
                        <p>All Informations are shown bellow.</p>
                    </div>
                    <div class="content-holder">
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
                                    <a class="dropdown-item" href="profile_details.php">Profile Details</a>
                                    <a class="dropdown-item" href="change_password.php">Change Password</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="../common_php/logout.php" id="logout">Logout</a>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="reset_area">
                    <form action="" method="" onsubmit="return validatePassword()">
                        <div class="form-group">
                            <label class="title" >Password</label>
                            <input type="password" name="password" id="password" class="form-control" required="required" oninput="passwordValidation()" onkeyup="passErrorRemover()">
                            <p id="passError"></p>
                        </div>
                        <div class="form-group">
                            <label class="title">Confirm Password</label>
                            <input type="password" name="confirm_password" id="confirm_password" class="form-control" oninput="confirmPasswordValidation()" onkeyup="confirmPassErrorRemover()" required="required">
                            <p id="confirmPassError"></p>
                        </div>
                        <div class="form-group">
                            <input type="hidden" value="<?=$id;?>" id="uid">
                            <input type="submit" name="submit" class="btn btn-primary" value="Confirm">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>
</html>