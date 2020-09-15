<?php
    include "../../../db/DB_Config.php";
    session_start();
    global $userId;
    global $fd_id;

    if(isset($_SESSION['username'])){
        $name = $_SESSION['username'];
        
        if(isset($_GET['userId'])){
            $userId .= $_GET['userId'];
        }
        else if(isset($_GET['food_id'])){
            $fd_id .= $_GET['food_id'];
        }
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="../../../assets/css/adminHome.css">
    <link rel="stylesheet" href="../../../assets/css/bookRooms_style.css">

    <script src="../../../assets/js/admin/dashboard_script.js" ></script>

    <title>Admin Homepage</title>
</head>
<body onload="<?php if(isset($userId)){echo "getUserData($userId)";}else{ echo "getUserData($fd_id)";}?>">
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
                            <h4>DASHBOARD <?=$userId;?></h4>
                            <p>All Informations are shown bellow.</p>
                        </div>
                        <div class="content-holder">
                            <div class="search-area">
                                <form action="" method="POST" class="form_search">
                                    <p>Search By : </p>
                                    <select name="searchBy" id="searchBy" class="btn">
                                        <option value="#"></option>
                                        <option value="Customer">Customer</option>
                                        <option value="Employee">Employee</option>
                                        <option value="Food Item">Food Item</option>
                                    </select>
                                    <div class="search">
                                        <input type="search" name="search_box" id="search_box" class="btn" onkeyup="search_data()" >
                                        <input type="submit" value="Search" id="" class="btn_search btn">
                                        <div class="search_result" id="search_result">

                                        </div>
                                    </div>
                                </form>
                            </div>
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
                    <div class="searchResult">
                        <table class="tableData" id="cus_table">
                            <thead class="thead_des">
                                <tr>
                                    <th scope="col" colspan=2>Search Details</th>
                                </tr>
                            </thead>
                            <tbody id="tbodySearch" class="tbody_des">
                                <tr>
                                    <td colspan=2>
                                        <img src="" id="pro_pic" alt="" style="width: 200px; height: 200px; text-align: center;">
                                    </td>
                                </tr>    
                                <tr>
                                    <td>Name</td>
                                    <td><p id="search_name"></p></td>
                                    
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td><p id="search_email"></p></td>
                                </tr>
                                <tr>
                                    <td>Phone</td>
                                    <td><p id="search_phone"></p></td>
                                </tr>
                                <tr>
                                    <td>Date of Birth</td>
                                    <td><p id="search_dob"></p></td>
                                </tr>
                                <tr>
                                    <td>Status</td>
                                    <td><p id="search_Status"></p></td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="button-area">
                            <?php
                                $userType = "<script>print(document.getElementById('search_Status').innerHTML);</script>";
                            ?>
                            <a href="<?=$userType;?>" class="btn-delete">Remove</a>
                            <a href="" class="btn-edit">Edit</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <script>
        
    </script>
</body>
</html>
<?php
    }
    else{
        header('location: ../../../common_pages/login.php');
    }
?>