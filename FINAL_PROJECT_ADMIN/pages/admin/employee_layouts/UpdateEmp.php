<?php
    include "../../../db/DB_Config.php";
    session_start();
    $id = "";
    if(isset($_SESSION['username'])){
        $name = $_SESSION['username'];
        if(isset($_GET['id'])){
            $id = $_GET['id'];
        
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="../../../assets/css/employeeList.css">
    <link rel="stylesheet" href="../../../assets/css/adminHome.css">
    <link rel="stylesheet" href="../../../assets/css/bookRooms_style.css">
    
    <script src="../../../assets/js/admin/employee_script.js" ></script>

    <title>Update Employee</title>
</head>
<body onload="get_EmployeeDataById(<?=$id;?>)">
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
                    <div class="contentHolder">
                        <h5>Update Informations</h5>
                        <div class="contentHolder_sub">
                            <div class="form_areaHolder">
                                <form>
                                    <div class="form_update">
                                        <label for="fname" class="title">Full Name</label>
                                        <input type="text" name="fname" id="fname" class="form_field ftp" disabled>
                                    </div>
                                    <div class="form_update">
                                        <label for="email"  class="title">Email</label>
                                        <input type="email" name="email" id="email" class="form_field ftp" disabled>
                                    </div>
                                    <div class="form_update">
                                        <label for="role" class="title">Role</label>
                                        <select name="role" id="role" class="filter_select form_field searchBox ftp">
                                            <option value="#">Select</option>
                                            <option value="Manager">Manager</option>
                                            <option value="Chef">Chef</option>
                                            <option value="Staff">Staff</option>
                                        </select>
                                    </div>
                                    <div class="form_update">
                                        <label for="rating" class="title">Rating</label>
                                        <input type="text" name="rating" id="rating" class="form_field ftp" disabled> <!-- Will be Inactive on selection -->
                                    </div>
                                    <div class="form_update">
                                        <label for="salary" class="title">Salary</label>
                                        <input type="text" name="salary" id="salary" class="form_field ftp" onkeyup="validateSalary()"> 
                                    </div>
                                    <div class="form_update">
                                        <label for="bonus" class="title">bonus</label>
                                        <input type="text" name="bonus" id="bonus" class="form_field ftp" onkeyup="validateBonus()"> 
                                    </div>
                                    <div class="form_update">
                                        <input type="hidden" name="id" id="id" value="">
                                        <input type="hidden" name="balance" id="balance" value="">
                                        <input type="submit" value="Save Changes" name="confirm" class="btn save_btn" onclick="updateEmpData()">
                                    </div>
                                </form>
                            </div>
                            <div class="profileImage_holder">
                                <h5>Profile Picture</h5>
                                <img src="" id="userImg" alt="User Image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
</body>
</html>
<?php
        }
        else{
            echo "<script></script>";
            header('location: ../../../pages/admin/employee_layouts/Employee.php');
        }
    }
    else{
        header('location: ../../../common_pages/login.php');
    }
?>