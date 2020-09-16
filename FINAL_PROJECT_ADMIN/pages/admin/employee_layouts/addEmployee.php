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

    <script src="../../../assets/js/admin/employee_script.js" type="text/javaScript"></script>

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
                                <input type="text" name="fname" id="name" class="form_field ftp" >
                            </div>
                            <div class="form_update">
                                <label for="email"  class="title">Email</label>
                                <input type="email" name="email" id="email" class="form_field ftp" >
                            </div>
                            <div class="form_update">
                                <label for="role" class="title">Role</label>
                                <select name="role" id="position" class="filter_select form_field searchBox ftp">
                                    <option value="#">Select</option>
                                    <option value="Manager">Manager</option>
                                    <option value="Chef">Chef</option>
                                    <option value="Staff">Staff</option>
                                </select>
                            </div>
                            <div class="form_update">
                                <label for="dob" class="title">Date of Birth</label>
                                <input type="date" name="dob" id="dob" class="form_field ftp" onchange="validateDate()">
                                <p id="dobError"></p>
                            </div>
                            <div class="form_update">
                                <label for="salary" class="title">Salary</label>
                                <input type="text" name="salary" id="salary" class="form_field ftp" onkeyup="validateSalary()"> 
                            </div>
                            <div class="form_update">
                                <label for="onepass" class="title">One Time Password</label>
                                <div class="password_area">
                                    <input type="password" name="onePass" id="onepass" class="form_field ftp" onkeyup="validatePassword()">
                                    <button type="button" onclick="setOneTimePass()" id="onetimepass">Generate Password</button>
                                </div>
                                <p id="nameError"></p>
                            </div>
                            <div class="form_update">
                                <input type="hidden" name="id" id="id" value="">
                                <input type="submit" value="Save Changes" name="confirm" class="btn save_btn" onclick="addNewEmp()">
                            </div>
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