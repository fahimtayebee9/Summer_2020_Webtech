<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link rel="stylesheet" href="../css/new_styles.css">
    <title>Packages - Hotel Management System</title>
    <script src="../js/indexJS.js"></script>
</head>
<body onload="loadPackage('Package')">
    <!-- Header or Banner Area Start-->
    <section class="header-area">
        <div class="menu-container">
            <?php
                include "../../pages/admin/include/home_menubar.php";
            ?>
        </div>
        <div class="hg align-items-center">
            <div class="banner-content">
                <h3>Hotel Management System</h5>
                <h1 class="h1-bottom-border">Our Packages</h1>
                <span></span>
                <p>Select Your Suitable Package From Bellow</p>
            </div>
        </div>
    </section>
    <!-- Header or Banner Area End-->

    <!-- PHP CODE FOR GETTINGS PACKAGE DATA -->
    <!-- Packages Section Start-->
    <section class="packages">
        <div class="package_controller" id="packages">

        </div>
    </section>
    <!-- Packages Section End-->

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
