<?php
    include "../../Php/db/DB_Config.php";
    session_start();
    $name = $_SESSION['username'];
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="../../../assets/css/adminHome.css">
    <link rel="stylesheet" href="../../../assets/css/employeeList.css">

    <title>Add New Employee</title>

</head>
<body>
    <div class="left-sidebar">
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
                            <h4>Add New Employee</h4>
                            <p>Insert Informations To Add New Employee</p>
                        </div>
                        <div class="content-holder">
                            <span class="border-span"></span>
                            <div class="profile-settings dropdown">
                                <a class="dropbtn" href="#" id="dropMenu" onclick="dropMenuAction()"  role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php 
                                    if(isset($name)){
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
                    <div class="add_form_area">
                        <h4>Insert Employee Details</h4>
                        <form action="../Php/add_emp_validation.php" method="POST">
                            <div class="form-group">
                                <label for="fname" class="title">Full Name</label>
                                <input type="text" name="fname" id="fname" class="form_field">
                                <p id="nameError"></p>
                            </div>
                            <div class="form-group">
                                <label for="email" class="title">Email</label>
                                <input type="email" name="email" id="email" class="form_field" required>
                                <p id="emailError"></p>
                            </div>
                            <div class="form-group">
                                <label for="dob" class="title">Date of Birth</label>
                                <input type="date" name="dob" id="dob" class="form_field">
                                <p id="dobError"></p>
                            </div>
                            <div class="form-group">
                                <label for="salary" class="title">Salary</label>
                                <input type="number" name="salary" id="salary" class="form_field">
                                <p id="salaryError"></p>
                            </div>
                            <div class="form-group">
                                <label for="filter" class="title">Job Role : </label>
                                <select name="position" class="form_field" id="position">
                                    <option value="#" class="form_field">Select</option>
                                    <option value="Manager" class="form_field">Manager</option>
                                    <option value="Chef" class="form_field">Chef</option>
                                    <option value="Staff" class="form_field">Staff</option>
                                </select>
                                <p id="positionError"></p>
                            </div>
                            <div class="form-group">
                                <label for="onepass" class="title">One Time Password</label>
                                <input type="password" name="onePass" id="onepass" class="form_field">
                                <p id="nameError"></p>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Confirm" name="confirm" class="btn">
                            </div>
                            <?php
                                if(isset($_SESSION['confirmation'])){
                                    ?>
                                    <p class="text-success"><?echo $_SESSION['confirmation'];?></p>
                            <?php
                                }
                                else if(isset($_SESSION['roleError'])){
                                ?>
                                    <p class="text-danger"><?echo $_SESSION['roleError'];?></p>
                            <?php
                                }
                            ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>