<?php
    include "../Php/DB_Config.php";
    session_start();
    $name = "Admin";
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    
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
                                    <a class="menu-title" href="Employee.php">Employee Details</a>
                                    <ul class="submenu-ul">
                                        <li><a href="addEmployee.php">Add Employee</a></li>
                                        <li><a href="Delete_Emp.php">Delete Employee</a></li>
                                        <li><a href="UpdateEmp.php">Update Employee</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a class="menu-title" href="CustomerDetails.php">Customer Details</a>
                                    <ul>
                                        <li><a href="CustomerReservationInfo.php">Customer Reservations</a></li>
                                        <li><a href="Update_Customer.php">Update Customer</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a class="menu-title" href="Food_Menu.php">Food Menu</a>
                                    <ul>
                                        <li><a href="Add_Food_Item.php">Add Food Items</a></li>
                                        <li><a href="Update_Food_Item.php">Update Food Items</a></li>
                                        <li><a href="Delete_Food_Item.php">Delete Food Items</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a class="menu-title" href="notifications.php">Join Requests</a>
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
                                <h4>DASHBOARD</h4>
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
                                            $name = "Login";
                                            echo $name;
                                        }
                                    ?>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
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
                                                $settings_3_path = '../Php/logout.php';
                                            }
                                            
                                        ?>
                                        <a class="dropdown-item" href="<?php echo $settings_1_path;?>"><?php echo $settings_1;?></a>
                                        <a class="dropdown-item" href="<?php echo $settings_2_path;?>"><?php echo $settings_2;?></a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="<?php echo $settings_3_path;?>"><?php echo $settings_3;?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="header-row report">
                            <div class="textarea">
                                <h4>Overall Reports</h4>
                            </div>
                            <div class="hms-report">
                                <div class="reports-area">
                                    <div class="report-box">
                                        <h6>Total Customers</h6>
                                        <p><?php echo 2789;?></p>
                                    </div>
                                    <div class="report-box">
                                        <h6>Total Employess</h6>
                                        <p><?php echo 789;?></p>
                                    </div>
                                    <div class="report-box">
                                        <h6>Total Food Items</h6>
                                        <p><?php echo 356;?></p>
                                    </div>
                                    <div class="report-box">
                                        <h6>Total Inventories</h6>
                                        <p><?php echo 356;?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 report">
                                <div class="textarea">
                                    <h4>Customer List</h4>
                                </div>
                                <div class="profit_area" id="basic">
                                    <table class="table table-striped table-hover">
                                        <thead class="thead-dark ">
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Name </th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Total Reservations</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>Mark</td>
                                                <td>Otto</td>
                                                <td>@mdo</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">2</th>
                                                <td>Jacob</td>
                                                <td>Thornton</td>
                                                <td>@fat</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">3</th>
                                                <td>Larry</td>
                                                <td>the Bird</td>
                                                <td>@twitter</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <a href="CustomerDetails.php" class="btn btn-info float-right">View Full Details</a>
                                </div>
                            </div>
                            <div class="col-6 report">
                                <div class="textarea">
                                    <h4>Employee List</h4>
                                </div>
                                <div class="profit_area" id="basic">
                                <table class="table table-striped table-hover">
                                        <thead class="thead-dark ">
                                            <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Name </th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Rating</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>Mark</td>
                                                <td>Otto</td>
                                                <td>3.5</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">2</th>
                                                <td>Jacob</td>
                                                <td>Thornton</td>
                                                <td>3.5</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">3</th>
                                                <td>Larry</td>
                                                <td>the Bird</td>
                                                <td>3.5</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <a href="Employee.php" class="btn btn-info float-right">View Full Details</a>
                                </div>
                            </div>
                        </div>
                        <div class="row sales-report">
                            <div class="col-3">
                                <div class="sales-info">
                                    <p>$ <span class="amount">869</span></p>
                                    <p>Last month sales</p>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="sales-info">
                                    <p>$ <span class="amount">869</span></p>
                                    <p>Annual Profit</p>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="sales-info">
                                    <p>$ <span class="amount">869</span></p>
                                    <p>Average Profit</p>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="sales-info">
                                    <p>$ <span class="amount">869</span></p>
                                    <p>Food Item Sales</p>
                                </div>
                            </div>
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