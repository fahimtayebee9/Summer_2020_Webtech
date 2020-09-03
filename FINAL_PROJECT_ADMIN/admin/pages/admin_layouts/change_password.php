<?php
    include "../../Php/db/DB_Config.php";
    session_start();
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

    <script src="../../../assets/js/script.js" type="text/javaScript"></script>

    <link rel="stylesheet" href="../../../assets/css/profileDetails.css">
    <link rel="stylesheet" href="../../../assets/css/adminHome.css">
    <link rel="stylesheet" href="../../../assets/css/font-awesome.css">
    
    <title>Reset Password</title>
</head>
<body>
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
                                    <?php
                                        include "../include/profile_settings.php"
                                    ?>
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