<?php
    include "../../Php/db/DB_Config.php";
    session_start();
    if($_SESSION['username']){
        $uname = $_SESSION['username'];
        $sql = "SELECT * FROM users where username='$uname'";
        $users_res = mysqli_query($db, $sql);
        while($row = mysqli_fetch_assoc($users_res)){
            $uid = $row['id'];
            $name = $row['name'];
            $email = $row['email'];
            $pass = $row['password'];
            $role = $row['role'];
            $_SESSION['uid'] = $uid ;
            $adminData = "select * from admininfo where userId='$uid'";
            $resAdmin = mysqli_query($db,$adminData);
            while($rowAdmin = mysqli_fetch_assoc($resAdmin)){
                $pro_pic = $rowAdmin['profile_picture'];
                $balance = $rowAdmin['balance'];
            }
            $_SESSION['name'] = $row['name'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['role'] = $row['role'];
        }
    }
    else{
        $name = 'Login';
    }
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link rel="stylesheet" href="../../../assets/css/profileDetails.css">
    <link rel="stylesheet" href="../../../assets/css/adminHome.css">

    <title>Profile</title>
</head>
<body>
    <div class="left-sidebar">
        <div class=" main">
            <?php
                include "../include/left_menu.php";
            ?>
            <div class="scrollable-area">
                <div class="content-area scrollbar title-header-main">
                    <div class="header-row title-header">
                        <div class="textarea">
                            <h4>Profile Setiings</h4>
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
                    <div class="">
                        <table class="table_details">
                            <thead>
                                <tr>
                                    <th scope="col" colspan=3 class="text-center">Profile Informations</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan=2 class="pro_img"><img src="<?="../../Php/uploads/$pro_pic";?>" alt="" width="300px" height="300px"></td>
                                </tr>
                                <tr>
                                    <td>Name</td>
                                    <td><?php echo $name;?></td>
                                </tr>
                                <tr>
                                    <td>Username</td>
                                    <td><?php echo $uname;?></td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td><?php echo $email;?></td>
                                </tr>
                                <tr>
                                    <td>Password</td>
                                    <td>
                                        <?php 
                                            $charCount = strlen($pass);
                                            $i=0;
                                            while($i < $charCount){
                                                echo "*";
                                                $i++;
                                            }
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Balance</td>
                                    <td><?php echo $balance;?></td>
                                </tr>
                                <tr>
                                    <td>Role</td>
                                    <td><?php echo $role?></td>
                                </tr>
                            </tbody>
                        </table>
                        <?php
                            if(isset($_SESSION['updateError'])){
                                ?>
                                    <p><?php echo $_SESSION['updateError'];?></p>
                        <?php
                                unset($_SESSION['updateError']);
                            }
                            else if(isset($_SESSION['updateRes'])){
                        ?>
                                    <p><?php echo $_SESSION['updateRes'];?></p>
                        <?php
                                unset($_SESSION['updateRes']);
                            }
                        ?>
                        <a href="update_profile.php" class="btn_view btn-primary">Change Informations</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>