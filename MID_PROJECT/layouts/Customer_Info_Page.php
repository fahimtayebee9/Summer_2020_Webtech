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
                                <h4>Customer ID : 567</h4>
                                <p>All Reservations are shown bellow.</p>
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
                                <h4>Total Reservations</h4>
                                <h2 class="count">397</h2>
                            </div>
                            <div class="col-4">
                                <h4>Active Reservations</h4>
                                <h2 class="count">47</h2>
                            </div>
                            <div class="col-4">
                                <h4>Expired</h4>
                                <h2 class="count">350</h2>
                            </div>
                        </div>
                        <?php
                            $customer_list = fopen("../files/customer_list.txt", "r") or die("Unable to open file!");
                            while(!feof($customer_list)) {
                                $customer = fgets($customer_list);
                                $customer = explode('|', $customer);
                                $name = trim($customer[1]);
                                $email = trim($customer[2]);
                                $gender = trim($customer[3]);
                                $dob = trim($customer[4]);
                                $totalRevAmount = trim($customer[5]);
                                $totalReservation = trim($customer[6]);
                                $discount = trim($customer[7]);
                                $status = trim($customer[8]);
                                break;
                            }
                        ?>
                        <div class="row row-pad">
                            <div class="col-6">
                                <form action="../Php/filter_user_reservations.php" method="POST" class="filter-form">
                                    <div class="form-group">
                                        <label for="revfrom">Filter Reservation : </label>
                                        <input type="date" name="revfrom" id="revfrom" class="form-control">(From)
                                    </div>
                                    <div class="form-group">
                                        <label for="revto"></label>
                                        <input type="date" name="revto" id="revto"  class="form-control">(To)
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" value="Filter" name="filter" class="form-control btn btn-success">
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="row row-pad">
                            <div class="col-12">
                                <h4>Customer Id : HMS-<?php echo rand(10000,100000)?>-C</h4>
                                <table class="table">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col">Title</th>
                                            <th scope="col">Information</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">Customer Name</th>
                                            <td><?php echo $name?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Customer email</th>
                                            <td><?php echo $email?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Gender</th>
                                            <td><?php echo $gender?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Date Of Birth</th>
                                            <td><?php echo $dob?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Total Reservations</th>
                                            <td><?php echo $totalReservation?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Total Reservations</th>
                                            <td><?php echo $totalReservation?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Discount</th>
                                            <td><?php echo $discount?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Status</th>
                                            <td><?php echo $status?></td>
                                        </tr>
                                        <tr>
                                            <td colspan=2>
                                                <a href="../index.php" class="btn btn-light">Go To Home</a>
                                                <a href="CustomerReservationInfo.php" class="btn btn-light">Back To Reservations List</a>
                                                <a href="Update_Customer.php" class="btn btn-secondary">Update Customer</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" ></script>
    
</body>
</html>