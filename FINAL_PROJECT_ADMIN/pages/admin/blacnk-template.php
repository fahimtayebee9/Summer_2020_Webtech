<?php
    include "../../Php/db/DB_Config.php";
    session_start();
    if(isset($_SESSION['username'])){
    $name = "Admin";
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <script src="../../../assets/js/dashboard_script.js" ></script>

    <link rel="stylesheet" href="../../../assets/css/adminHome.css">
    <link rel="stylesheet" href="../../../assets/css/bookRooms_style.css">

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
                            <h4>DASHBOARD</h4>
                            <p>All Informations are shown bellow.</p>
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
                                            $settings_3_path = '../../Php/logout.php';
                                        }
                                        
                                    ?>
                                    <a class="dropdown-item" href="<?php echo $settings_1_path;?>"><?php echo $settings_1;?></a>
                                    <a class="dropdown-item" href="<?php echo $settings_2_path;?>"><?php echo $settings_2;?></a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="../../Php/logout.php" id="logout">Logout</a>
                                </div>
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
        header('location: ../other/login.php');
    }
?>