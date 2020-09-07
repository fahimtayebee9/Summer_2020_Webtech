<?php
    include "../db/config.php";
    session_start();
    if($_SESSION['uid']){
        $id = $_SESSION['uid'];
        $db = dbConnection();
        $sql = "SELECT * FROM users where id='$id'";
        $users_res = mysqli_query($db, $sql);
        while($row = mysqli_fetch_assoc($users_res)){
            $uid = $row['id'];
            $name = $row['name'];
            $email = $row['email'];
            $pass = $row['password'];
            $role = $row['userType'];
            $pro_pic = $row['profile_picture'];
            $dob = $row['dateOfBirth'];
            $phone = $row['phone'];
            $_SESSION['uid'] = $uid ;
            $_SESSION['name'] = $row['name'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['role'] = $row['userType'];
        }
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link rel="stylesheet" href="../assets/css/profileDetails.css">
    <link rel="stylesheet" href="../assets/css/adminHome.css">

    <title>Profile</title>
</head>
<body>
    <div class="left-sidebar">
        <div class=" main">
            <div class="fixed-area" >
                <div class="heading-area">
                    <img src="../assets/images/logo.png" class="logoimg" alt="Logo HMSP">
                </div>
                <div class="menu-list">
                    <ul>
                        <li></i><a class="menu-title" href="../pages/admin/admin_layouts/admin_home.php"></i>DashBoard</a></li>
                        <li>
                            <a class="menu-title" href="../employee_layouts/Employee.php">Employee Details</a>
                            <ul class="submenu-ul">
                                <li><a href="../pages/admin/employee_layouts/addEmployee.php">Add Employee</a></li>
                                <li><a href="../pages/admin/employee_layouts/Delete_Emp.php">Delete Employee</a></li>
                                <li><a href="../pages/admin/employee_layouts/UpdateEmp.php">Update Employee</a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="menu-title" href="../customer_layouts/CustomerDetails.php">Customer Details</a>
                            <ul class="submenu-ul">
                                <li><a href="../pages/admin/customer_layouts/CustomerReservationInfo.php">Customer Reservations</a></li>
                                <li><a href="../pages/admin/customer_layouts/Update_Customer.php">Update Customer</a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="menu-title" href="../food_item_layouts/Food_Menu.php">Food Menu</a>
                            <ul class="submenu-ul">
                                <li><a href="../pages/admin/food_item_layouts/Add_Food_Item.php">Add Food Items</a></li>
                                <li><a href="../pages/admin/food_item_layouts/Update_Food_Item.php">Update Food Items</a></li>
                                <li><a href="../pages/admin/food_item_layouts/Delete_Food_Item.php">Delete Food Items</a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="menu-title" href="../pages/admin/profit_details/profit_details.php">Profit Details</a>
                        </li>
                        <li>
                            <a class="menu-title" href="../pages/admin/other/package_details.php">Package Details</a>
                        </li>
                        <li>
                            <a class="menu-title" href="../pages/admin/admin_layouts/notifications.php">Join Requests</a>
                        </li>
                        <li>
                            <a class="menu-title" href="../../../common_php/logout.php">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
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
                                ?>
                                </a>
                                <div class="dropdown-content" id="dropContent" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="profile_details.php">Profile Details</a>
                                    <a class="dropdown-item" href="change_password.php">Change Password</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="../common_php/logout.php" id="logout">Logout</a>
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
                                    <td colspan=2 class="pro_img"><img src="<?="../uploads/$pro_pic";?>" alt="" width="300px" height="300px"></td>
                                </tr>
                                <tr>
                                    <td>Name</td>
                                    <td><?php echo $name;?></td>
                                </tr>
                                <tr>
                                    <td>Date Of Birth</td>
                                    <td><?php echo $dob;?></td>
                                </tr>
                                <tr>
                                    <td>Phone No</td>
                                    <td><?php echo $phone;?></td>
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

<?php
    }
    else{
        header('location: login.php');
    }
?>