<?php
    include "../Php/DB_Config.php";
    session_start();
    if(isset($_SESSION['name']) && isset($_SESSION['role']) && isset($_SESSION['email']) && isset($_SESSION['username']) ){
        $role=$_SESSION['role'];
        $email = $_SESSION['email'];
        $username =$_SESSION['username'];
        $name=$_SESSION['name'];
    }
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/profileDetails.css">
    <link rel="stylesheet" href="../css/adminHome.css">
    <link rel="stylesheet" href="../css/font-awesome.css">
    <title>Admin Homepage</title>
</head>
<body>
    <div class="left-sidebar">
        <div class="container-fluid">
            <div class="row main">
                <div class="col-2 rmv-pad fixed-area" >
                    <div class="menu-bar " id="menu-bar">
                        <div class="heading-area">
                            <img src="../images/logo.png" class="img-fluid w-50" alt="">
                        </div>
                        <div class="menu-list">
                            <ul>
                                <li></i><a class="menu-title" href="admin_home.php">DashBoard</a></li>
                                <li>
                                    <a class="menu-title" href="../layouts/Employee.php">Employee Details</a>
                                    <ul class="submenu-ul">
                                        <li><a href="../layouts/addEmployee.php">Add Employee</a></li>
                                        <li><a href="../layouts/Delete_Emp.php">Delete Employee</a></li>
                                        <li><a href="../layouts/UpdateEmp.php">Update Employee</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a class="menu-title" href="../layouts/CustomerDetails.php">Customer Details</a>
                                    <ul>
                                        <li><a href="../layouts/CustomerReservationInfo.php">Customer Reservations</a></li>
                                        <li><a href="../layouts/Update_Customer.php">Update Customer</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a class="menu-title" href="../layouts/Food_Menu.php">Food Menu</a>
                                    <ul>
                                        <li><a href="../layouts/Add_Food_Item.php">Add Food Items</a></li>
                                        <li><a href="../layouts/Update_Food_Item.php">Update Food Items</a></li>
                                        <li><a href="../layouts/Delete_Food_Item.php">Delete Food Items</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a class="menu-title" href="../layouts/notifications.php">Join Requests</a>
                                </li>
                                <li>
                                    <a class="menu-title" href="../Php/logout.php">Logout</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-12 rmv-pad scrollable-area">
                    <div class="content-area scrollbar title-header-main">
                        <div class="header-row title-header">
                            <div class="textarea">
                                <h4>Change Profile Setiings</h4>
                                <p>All Informations are shown bellow.</p>
                            </div>
                            <div class="content-holder">
                                <div class="search-area">
                                    <form action="">
                                        <i class="fas fa-search" aria-hidden="true"></i>
                                        <input type="search" name="search_box" id="search_box">
                                        <input type="submit" value="Search" class="btn btn-primary">
                                    </form>
                                </div>
                                <span class="border-span"></span>
                                <div class="profile-settings nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <?php 
                                        if(isset($name)){
                                            echo $name;
                                        }   
                                        else{
                                            echo "Login";
                                        }
                                    ?>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="profile_details.php">Profile Details</a>
                                        <a class="dropdown-item" href="change_password.php">Change Password</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="../Php/logout.php">Logout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row row-pad">
                            <form action="../Php/profile_update_validation.php" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Full Name</label>
                                    <input type="text" name="name" class="form-control" required="required" value="<?php $name;?>">
                                </div>
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input type="email" name="email" class="form-control" required="required" value="<?php $email;?>">
                                    <?php
                                        if(isset($_SESSION['errorEmail'])){
                                            ?>
                                            <h5><?php echo $_SESSION['errorEmail'];?></h5>
                                    <?php
                                        }
                                    ?>
                                </div>
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" name="username" class="form-control" required="required" value="<?php $username;?>">
                                    <?php
                                        if(isset($_SESSION['errorText2'])){
                                            ?>
                                            <p class="errorText"><?php echo $_SESSION['errorText2'];?></p>
                                            <p class="suggestText"><?php echo 'Suggested Username : '.$_SESSION['suggest'];?></p>
                                    <?php
                                        }
                                    ?>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="password" class="form-control" required="required" >
                                </div>
                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input type="password" name="confirm_password" class="form-control" required="required">
                                </div>
                                <div class="form-group">
                                    <label>Gender</label>
                                    <input name="gender" type="radio" value="Male">Male
                                    <input name="gender" type="radio" value="FeMale">Female
                                    <input name="gender" type="radio" value="Other">Other
                                </div>
                                <div class="form-group">
                                    <label>Date of Birth</label>    
                                    <input type="text" size="2" name="day"/>/
                                    <input type="text" size="2" name="month" />/
                                    <input type="text" size="4" name="year" />
                                    <font size="3"><i>(dd/mm/yyyy)</i></font>
                                </div>
                                <div class="form-group">
                                    <label>Profile Picture</label>
                                    <input type="file" name="profile_picture" class="form-control" required="required">
                                    <!-- <img src="" alt=""> -->
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="register" class="btn btn-primary" value="Confirm">
                                </div>
                                <div class="error-Area">
                                    <?php
                                        if(isset($_SESSION['errorMessage'])){
                                    ?>
                                        <p><?php echo $_SESSION['errorMessage'];?></p>
                                    <?php
                                        }
                                    ?>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    
</body>
</html>