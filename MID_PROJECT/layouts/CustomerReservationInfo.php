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
                                <h4>All Customers Reservation List</h4>
                                <table class="table">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col">Reservation No</th>
                                            <th scope="col">Customer ID</th>
                                            <th scope="col">Reserved From</th>
                                            <th scope="col">Reserved To</th>
                                            <th scope="col">Total Amount</th>
                                            <th scope="col">Paid Amount</th>
                                            <th scope="col">Due Amount</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $rev_list = fopen("../files/reservations.txt", "r") or die("Unable to open file!");
                                        $i = 1;
                                        $rowCount = 1;
                                        while(!feof($rev_list)) {
                                            $rev = fgets($rev_list);
                                            $rev = explode('|', $rev);
                                            $revFromDate = trim($rev[0]);
                                            $revToDate = trim($rev[1]);
                                            $totalAmount = trim($rev[2]);
                                            $paid = trim($rev[3]);
                                            $due = trim($rev[4]);
                                    ?>
                                            <tr>
                                                <th scope="row">#REV-<?php echo rand(1000,2000)?></th>
                                                <td>HMS-<?php echo rand(10000,100000)?>-C</td>
                                                <td><?php echo $revFromDate?></td>
                                                <td><?php echo $revToDate?></td>
                                                <td><?php echo $totalAmount?></td>
                                                <td><?php echo $paid?></td>
                                                <td><?php echo $due?></td>
                                                <td><a href="User_Reservation_information.php" class="btn btn-light">View</a></td> <!--If clicked then the data for this row will be passed to another page -->
                                            </tr>
                                    <?php
                                        }
                                    ?>
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