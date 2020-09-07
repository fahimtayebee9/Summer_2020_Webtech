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
    <link rel="stylesheet" href="../../../assets/css/approve_style.css">

    <script src="../../../assets/js/join_applicationScript.js" type="text/javaScript"></script>

    <title>View Applications</title>
</head>
<body onload="loadData()">
    <section class="left-sidebar">
        <div class="dashboard_controller">
            <?php
                include "../include/left_menu.php";
            ?>
        </div>
        <div class="main">
            <div class="scrollable-area">
                <div class="content-area scrollbar title-header-main">
                    <div class="header-row title-header">
                        <div class="textarea">
                            <h4>Join Applications</h4>
                            <p>All Details are shown bellow.</p>
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
                                        header("location: ../../Php/login.php");
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
                    <div class="row row-pad">
                        <div class="col-12">
                            <h5>Joining Application Code : #JOAPP-1443</h5>
                            <p>Application Details</p>
                            <table class="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Title</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">Name</th>
                                        <td>Ahmed Zubayer</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Email</th>
                                        <td>ahmed@gmail.com</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Phone</th>
                                        <td>01711002233</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Age</th>
                                        <td>25</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Gender</th>
                                        <td>Male</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Selected Post</th>
                                        <td>Manager</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Expected Salary</th>
                                        <td>25000</td>
                                    </tr>
                                    <tr>
                                        <td colspan=2> 
                                            <form action="../Php/approve_validation.php" method="POST">
                                                <input type="submit" value="Approve" name="approve" class="btn btn-success">
                                                <input type="submit" value="Reject" name="reject" class="btn btn-danger">
                                            </form>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <h3 id="name"></h3>
                    <h3 id="email"></h3>
                    <h3 id="position"></h3>
                    <h3 id="salary"></h3>
                    <h3 id="resume"></h3>
                </div>
            </div>
        </div>
        
    </section>
    
</body>
</html>