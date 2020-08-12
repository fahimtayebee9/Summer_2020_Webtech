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
    <link rel="stylesheet" href="../css/employeeList.css">
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
                                <h4>Customer Details</h4>
                                <p>All Customer informations are shown bellow.</p>
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
                                    <?php echo $name;?>
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
                            <div class="col-4">
                                <h4>Premium Members</h4>
                                <h2 class="count">3</h2>
                            </div>
                            <div class="col-4">
                                <h4>Gold Members</h4>
                                <h2 class="count">47</h2>
                            </div>
                            <div class="col-4">
                                <h4>New Members</h4>
                                <h2 class="count">91</h2>
                            </div>
                        </div>
                        <div class="row row-pad">
                            <div class="col-6">
                                <form action="../Php/filter_user.php" method="POST" class="filter-form">
                                    <div class="form-group">
                                        <label for="filter">Filter Customer's : </label>
                                        <select name="user_type" class="" class="form-control">
                                            <option value="#">Select</option>
                                            <option value="Premium">Premium</option>
                                            <option value="Gold">Gold</option>
                                            <option value="New Member">New Member</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" value="Filter" name="filter" class="form-control">
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="row row-pad">
                            <div class="col-12">
                                <h4>All Customers List</h4>
                                <table class="table">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Full Name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Total Booking Amount</th>
                                            <th scope="col">Total Rooms Booked</th>
                                            <th scope="col">Discount</th>
                                            <th scope="col">Role/Position</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>Mark</td>
                                            <td>mark@gmail.com</td>
                                            <td>25000</td>
                                            <td>5000</td>
                                            <td>50%</td>
                                            <td>Premium</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>Mark</td>
                                            <td>mark@gmail.com</td>
                                            <td>20000</td>
                                            <td>4500</td>
                                            <td>25%</td>
                                            <td>Gold</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>Anthony</td>
                                            <td>anthony@gmail.com</td>
                                            <td>30000</td>
                                            <td>3000</td>
                                            <td>10%</td>
                                            <td>New Member</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>Anthony</td>
                                            <td>anthony@gmail.com</td>
                                            <td>30000</td>
                                            <td>3000</td>
                                            <td>10%</td>
                                            <td>New Member</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>Anthony</td>
                                            <td>anthony@gmail.com</td>
                                            <td>30000</td>
                                            <td>3000</td>
                                            <td>10%</td>
                                            <td>New Member</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row justify-content-end">
                            <div class="col-4">
                                <div class="button-area text-center">
                                    <a href="CustomerReservationInfo.php" class="btn btn-success">View Customer Reservations</a>
                                    <a href="Update_Customer.php" class="btn btn-info">Update Customer Details</a>
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