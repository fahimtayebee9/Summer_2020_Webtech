<?php
    session_start();
    if(isset($_SESSION['username'])){
        $name = $_SESSION['username'];
        if(isset($_GET['id'])){
            $apId = $_GET['id'];
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <script src="../../../assets/js/join_applicationScript.js" type="text/javaScript"></script>
    
    <link rel="stylesheet" href="../../../assets/css/adminHome.css">
    <link rel="stylesheet" href="../../../assets/css/employeeList.css">
    <link rel="stylesheet" href="../../../assets/css/join_requestStyle.css">
    <link rel="stylesheet" href="../../../assets/css/profileDetails.css">
    <link rel="stylesheet" href="../../../assets/css/leftMenu_style.css">

    <script src="../../../assets/js/admin/dashboard_script.js" ></script>
    <script src="../../../assets/js/admin/joinApp_script.js" ></script>

    <title>Join Application</title>
</head>
<body onload="getApplicationById(<?=$apId;?>)">
    <div class="left-sidebar">
        <div class="dashboard_controller">
            <?php
                include "../include/left_menu.php";
            ?>
        </div>
        <div class="scrollable-area">
            <div class="content-area scrollbar title-header-main">
                <div class="header-row title-header">
                    <div class="textarea">
                        <h4>Join Applications</h4>
                        <p>All Applications are shown bellow.</p>
                    </div>
                    <div class="content-holder">
                        <div class="search-area">
                            <form action="" method="POST" class="form_search">
                                <p>Search By : </p>
                                <select name="searchBy" id="searchBy" class="searchBox">
                                    <option value="#"></option>
                                    <option value="Customer">Customer</option>
                                    <option value="Employee">Employee</option>
                                    <option value="Food Item">Food Item</option>
                                </select>
                                <div class="search">
                                    <input type="search" name="search_box" id="search_box" class="searchBox" onkeyup="search_data()"  onblur="hide()" onreset="hide()">
                                    <input type="submit" value="Search" id="" class="btn_search btn" onclick="showSearchData()">
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
                
                <div class="table_area">
                    <table class="table_details table_join">
                        <thead class="thead-dark">
                            <tr>
                                <th colspan="2">Application Details</th>
                            </tr>
                        </thead>
                        <tbody id="applicationBody">
                            <tr>
                                <th>Applicant Name</th>
                                <td><p id="name"></p></td>
                            </tr>
                            <tr>
                                <th>Applicant Email</th>
                                <td><p id="email"></p></td>
                            </tr>
                            <tr>
                                <th>Selected Post</th>
                                <td><p id="position"></p></td>
                            </tr>
                            <tr>
                                <th>Expected Salary</th>
                                <td><p id="expected_salary"></p></td>
                            </tr>
                            <tr>
                                <th>Resume</th>
                                <td>
                                    <a href="" download class="fileDownload" id="cv_fileLink"><p id="cv_file"></p></a>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" style="text-align: center;">
                                    <a href="../../../pages/admin/admin_layouts/notifications.php" class="btn btn-info">Back</a>
                                    <button class="btn btn-success" onclick="approveApplication(<?=$apId;?>)">Approve</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<?php
        }
    }
    else{
        header('location: ../../../common_pages/login.php');
    }
?>