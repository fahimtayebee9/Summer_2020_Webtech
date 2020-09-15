<?php
    include "../../../db/DB_Config.php";
    session_start();
    if(isset($_SESSION['username'])){
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

    <script src="../../../assets/js/admin/employee_script.js" ></script>

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
                        <form>
                            <div class="form_update">
                                <label for="fname" class="title">Full Name</label>
                                <input type="text" name="fname" id="fname" class="form_field ftp" onkeyup="validateName()">
                                <p id="nameError"></p>
                            </div>
                            <div class="form_update">
                                <label for="email" class="title">Email</label>
                                <input type="email" name="email" id="email" class="form_field ftp" onkeyup="validateEmail()" onblur="emailBlurText()">
                                <p id="emailError"></p>
                            </div>
                            <div class="form_update">
                                <label for="dob" class="title">Date of Birth</label>
                                <input type="date" name="dob" id="dob" class="form_field ftp" onchange="validateDate()">
                                <p id="dobError"></p>
                            </div>
                            <div class="form_update">
                                <label for="salary" class="title">Salary</label>
                                <input type="text" name="salary" id="salary" class="form_field ftp" onkeyup="validateEmail()">
                                <p id="salaryError"></p>
                            </div>
                            <div class="form_update">
                                <label for="filter" class="title">Job Role : </label>
                                <select name="position" class="form_field ftp" id="position" onchange="validateRole()">
                                    <option value="#" class="form_field">Select</option>
                                    <option value="Manager" class="form_field">Manager</option>
                                    <option value="Chef" class="form_field">Chef</option>
                                    <option value="Staff" class="form_field">Staff</option>
                                </select>
                                <p id="positionError"></p>
                            </div>
                            <div class="form_update">
                                <label for="onepass" class="title">One Time Password</label>
                                <div class="password_area">
                                    <input type="password" name="onePass" id="onepass" class="form_field ftp" onkeyup="validatePassword()">
                                    <button type="button" onclick="setOneTimePass()" id="onetimepass">Generate Password</button>
                                </div>
                                <p id="nameError"></p>
                            </div>
                            <div class="form_update align_btn">
                                <input type="submit" value="Confirm" name="confirm" class="btn btn-success" onclick="addEmployee()">
                            </div>
                            <?php
                                if(isset($_SESSION['confirmation'])){
                                    ?>
                                    <p><?echo $_SESSION['confirmation'];?></p>
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

<?php
    }
    else{
        header('location: ../../../common_pages/login.php');
    }
?>