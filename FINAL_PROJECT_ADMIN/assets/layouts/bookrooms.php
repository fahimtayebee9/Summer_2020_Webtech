<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../css/bookRooms_style.css">
    <link rel="stylesheet" href="../css/new_styles.css">
    <title>Packages - Hotel Management System</title>
</head>
<body>
    <!-- Header or Banner Area Start-->
    <section class="header-area">
        <div class="menu-container">
            <nav class="navbar">
                <a class="navbar-link" href="../../new_index.php"><img class="logo-img" src="../images/logo.png" style="max-width: 150px;" alt="Company Logo"></a>
                <div class="navbar-menulist" id="navbarMenuList">
                    <ul class="navbar-list">
                        <li class="nav-item">
                            <a class="nav-link hover-ani" href="../../new_index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link hover-ani" href="about.html">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link hover-ani" href="packages.php">Packages</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link hover-ani" href="bookrooms.php">Book Rooms</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link hover-ani" href="contactus.html">Contact Us</a>
                        </li>
                        <li class="nav-item btn-align">
                            <a class="nav-link btn-custom" href="../../admin/pages/other/login.php">Login</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="hg align-items-center">
            <div class="banner-content">
                <h3>Hotel Management System</h5>
                <h2 class="h1-bottom-border">Our Available Rooms</h2>
                <span></span>
                <p>Select Your Suitable Room From Bellow</p>
            </div>
        </div>
    </section>
    <!-- Header or Banner Area End-->

    <!-- PHP CODE FOR GETTINGS PACKAGE DATA FROM TEXT FILE (FILE I/O) -->
    <!-- Packages Section -->
    <section class="packages">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Room No</th>
                                <th scope="col">Room Rent</th>
                                <th scope="col">Room Capacity</th>
                                <th scope="col">Facility</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">RM-<?php echo rand(10,100)?></th>
                                <td>2800</td>
                                <td>2 Beds</td>
                                <td>
                                    <ul>
                                        <li><p>Wifi Service</p></li>
                                        <li><p>Hot water Service</p></li>
                                        <li><p>Room Cleaning Service</p></li>
                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">RM-<?php echo rand(10,100)?></th>
                                <td>2800</td>
                                <td>2 Beds</td>
                                <td>
                                    <ul>
                                        <li><p>Wifi Service</p></li>
                                        <li><p>Hot water Service</p></li>
                                        <li><p>Room Cleaning Service</p></li>
                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">RM-<?php echo rand(10,100)?></th>
                                <td>2800</td>
                                <td>2 Beds</td>
                                <td>
                                    <ul>
                                        <li><p>Wifi Service</p></li>
                                        <li><p>Hot water Service</p></li>
                                        <li><p>Room Cleaning Service</p></li>
                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">RM-<?php echo rand(10,100)?></th>
                                <td>2800</td>
                                <td>2 Beds</td>
                                <td>
                                    <ul>
                                        <li><p>Wifi Service</p></li>
                                        <li><p>Hot water Service</p></li>
                                        <li><p>Room Cleaning Service</p></li>
                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">RM-<?php echo rand(10,100)?></th>
                                <td>2800</td>
                                <td>2 Beds</td>
                                <td>
                                    <ul>
                                        <li><p>Wifi Service</p></li>
                                        <li><p>Hot water Service</p></li>
                                        <li><p>Room Cleaning Service</p></li>
                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">RM-<?php echo rand(10,100)?></th>
                                <td>2800</td>
                                <td>2 Beds</td>
                                <td>
                                    <ul>
                                        <li><p>Wifi Service</p></li>
                                        <li><p>Hot water Service</p></li>
                                        <li><p>Room Cleaning Service</p></li>
                                    </ul>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <!-- FOOTER MENU SECTION -->
    <section class="footer-menu" id="footermenu">
        <div class="menu-area">
            <div class="fmenu-items">
                <h4><img src="../images/logo.png" alt=""></h4>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. At laborum ipsam maxime officiis unde commodi recusandae magni sit explicabo corporis. Omnis facilis enim veritatis iusto aliquid voluptate deserunt placeat voluptas!</p>
            </div>
            <div class="fmenu-items">
                <h4>Usefull Links</h4>
                <ul>
                    <li><a href="../layouts/packages.php">Our Packages</a></li>
                    <li><a href="../layouts/bookrooms.php">Our Room Details</a></li>
                    <li><a href="../layouts/contactus.html">Contact Us</a></li>
                </ul>
            </div>
            <div class="fmenu-items">
                <h4>Contact</h4>
                <ul>
                    <li><a href="../layouts/contactus.html">Location</a></li>
                    <li><a href="../layouts/about.html">About Us</a></li>
                </ul>
            </div>
        </div>
    </section>
    <!-- Footer Menu END -->

</body>
</html>
