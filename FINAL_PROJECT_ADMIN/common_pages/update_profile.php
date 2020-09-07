<?php
    include "../../Php/db/DB_Config.php";
    session_start();
    $email = $_SESSION['email'];
    $username = $_SESSION['username'];
    $id = $_SESSION['uid'];
    $sql = "select * from users where id='$id'";
    $result = mysqli_query($db,$sql);
    while($row = mysqli_fetch_assoc($result)){
        $role=$row['role'];
        $email = $row['email'];
        $username =$row['username'];
        $name=$row['name'];
        $id=$row['id'];
        $password = $row['password'];
        $adminSql = "select * from admininfo where userId='$id'";
        $adminRes = mysqli_query($db,$adminSql);
        while($row = mysqli_fetch_assoc($adminRes)){
            $pro_pic=$row['profile_picture'];
            $balance = $row['balance'];
            $gender = $row['gender'];
        }
    }
    $_SESSION['userId'] = $id;
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <script src="../../../assets/js/script.js" type="text/javaScript"></script>

    <link rel="stylesheet" href="../../../assets/css/adminHome.css">
    <link rel="stylesheet" href="../../../assets/css/profileDetails.css">

    <title>Update Profile</title>
</head>
<body>
    <div class="left-sidebar">
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
        <div class="scrollable-area">
            <div class="content-area scrollbar title-header-main">
                <div class="header-row title-header">
                    <div class="textarea">
                        <h4>Change Profile Setiings</h4>
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
                            <?php
                                include "../include/profile_settings.php"
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="update_area">
                <form action="" method="" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="name" class="title">Full Name</label>
                        <input type="text" name="name" id="name" class="form-control" oninput="nameValidation()" onkeyup="nameErrorRemover()"  required="required" value="<?=$name;?>">
                        <p id="nameError"></p>
                    </div>
                    <div class="form-group">
                        <label class="title">Email Address</label>
                        <input type="email" name="email" id="email" class="form-control" required="required" placeholder="example@domain.com"  onkeyup="emailRemover()" onblur="emailBlurText()"  value="<?=$email;?>">
                        <p id="emailError"></p>
                        <?php
                            if(isset($_SESSION['errorEmail'])){
                                ?>
                                <p style="color: red;"><?php echo $_SESSION['errorEmail'];?></p>
                        <?php
                            }
                        ?>
                    </div>
                    <div class="form-group">
                        <label class="title">Username</label>
                        <input type="text" name="username" class="form-control" id="username" value="<?=$username;?>">
                        <p id="userNameError"></p>
                        <div class="suggest-area">
                            <p id="default"></p>
                            <p id="suggestUsername" onmouseover="hoverText()" onclick="setUsername()" onmouseover="hoverText()" onmouseout="hoverRemove()"></p>  
                        </div>
                        <?php 
                            if(isset($_SESSION['errorUsername'])){
                                ?>
                                <p class="text-danger"><?php echo $_SESSION['errorUsername'];?></p>
                                <p class="text-info"><?php echo 'Suggested Username : '.$_SESSION['suggest'];?></p>
                        <?php
                            }
                        ?>
                    </div>
                    <div class="form-group">
                        <label class="title">Gender</label>
                        <div class="radio-controller">
                            <div class="radio-box">
                                <input name="gender" type="radio" value="Male" id="male" oninput="genderValidation()" onclick="genderErrorRemover()" onblur="genderCheck()" <?php if($gender=='Male'){echo 'selected';}?>> 
                                <label for="male" class="radio-label">Male</label>
                            </div>
                            <div class="radio-box">
                                <input name="gender" type="radio" value="FeMale" id="female" oninput="genderValidation()" onclick="genderErrorRemover()" onblur="genderCheck()" <?php if($gender=='Female'){echo 'selected';}?>> 
                                <label for="female" class="">FeMale</label>
                            </div>
                            <div class="radio-box">
                                <input name="gender" type="radio" value="Other" id="other" oninput="genderValidation()" onclick="genderErrorRemover()" onblur="genderCheck()" <?php if($gender=='Other'){echo 'selected';}?>> 
                                <label for="other" class="">Other</label>
                            </div>
                        </div>
                        <p id="genderError"></p>
                    </div>
                    <div class="form-group">
                        <label class="title" >Password</label>
                        <input type="password" name="password" id="password" class="form-control" required="required" oninput="passwordValidation()" onkeyup="passErrorRemover()">
                        <p id="passError"></p>
                    </div>
                    <div class="form-group">
                        <label class="title">Confirm Password</label>
                        <input type="password" name="confirm_password" id="confirm_password" class="form-control" oninput="confirmPasswordValidation()" onkeyup="confirmPassErrorRemover()" required="required">
                        <p id="confirmPassError"></p>
                        <?php
                            if(isset($_SESSION['errorMessage2'])){
                        ?>
                                <p id="text_danger"><?php echo $_SESSION['errorMessage2'];?></p>
                        <?php
                            }
                            else if(isset($_SESSION['passLengthError'])){
                        ?>
                                <p id="text_danger"><?php echo $_SESSION['passLengthError'];?></p>
                        <?php
                            }
                        ?>
                    </div>
                    <div class="form-group">
                        <label class="title">Date of Birth</label>   
                        <div class="date-controller">
                            <input type="text" class="form-control dob" size="2" name="day" id="day" oninput="dobValidation()" onkeyup="dobErrorRemover()" onblur="dobNullCheck()"/>
                            <p class="dob_divider"> / </p>
                            <input type="text" class="form-control dob" size="2" name="month" id="month" oninput="dobValidation()" onkeyup="dobErrorRemover()" onblur="dobNullCheck()"/>
                            <p  class="dob_divider"> / </p>
                            <input type="text" class="form-control dob" size="4" name="year" id="year" oninput="dobValidation()" onkeyup="dobErrorRemover()" onblur="dobNullCheck()"/>
                            <p size="2"><i>(dd/mm/yyyy)</i></p>
                        </div>
                        <p id="dobError"></p>
                    </div>
                    <div class="form-group">
                        <label class="title" >Balance</label>
                        <input type="number" name="balance" id="balance" class="form-control" value="<?=$balance;?>">
                        <p id="passError"></p>
                    </div>
                    <div class="form-group">
                        <label class="title">Profile Picture</label>
                        <input type="file" name="profile_picture" id="profile_picture" class="form-control" required="required" oninput="fileUploadValidation()">
                        <p id="imgError"></p>
                    </div>
                    <div class="form-group">
                        <input type="hidden" value="<?=$id;?>" id="uid">
                        <input type="submit" name="register" class="btn_view" value="Confirm" onclick="updateProfile()">
                    </div>
                    <div class="error-Area">
                        <p id="msg"></p>
                        <?php
                            if(isset($_SESSION['errorMessage'])){
                        ?>
                            <p><?php echo $_SESSION['errorMessage'];?></p>
                        <?php
                            }
                        ?>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>