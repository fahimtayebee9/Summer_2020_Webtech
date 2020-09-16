<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/new_styles.css">
    <title>Home-Hotel Management System</title>
</head>
<body >

<!-- Content Area Start-->
    <!-- Header or Banner Area Start-->
    <section class="header-area">
        <div class="menu-container">
            <nav class="navbar">
                <a class="navbar-link" href="new_index.php"><img class="logo-img" src="assets/images/logo.png" style="max-width: 150px;" alt="Company Logo"></a>
                <div class="navbar-menulist" id="navbarMenuList">
                    <ul class="navbar-list">
                        <li class="nav-item">
                            <a class="nav-link hover-ani" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link hover-ani" href="assets/layouts/about.php">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link hover-ani" href="assets/layouts/packages.php">Packages</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link hover-ani" href="assets/layouts/bookrooms.php">Book Rooms</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link hover-ani" href="assets/layouts/contactus.php">Contact Us</a>
                        </li>
                        <li class="nav-item btn-align">
                            <a class="nav-link btn-custom" href="common_pages/login.php">Login</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="hg">
            <div class="banner-content">
                <h1>Hotel Management System</h1>
                <p>The special charm and the cosy mood of Hotel will make you feel as a true fiorentine in Florence.</p>
            </div>
        </div>
    </section>
    <!-- Header or Banner Area End-->

    <!-- About Area Start -->
    <section class="about-us">
        <div class="about-parent">
            <div class="img-area">
                <div class="about-img img-box">
                    
                </div>
            </div>
            <div class="about-content">
                <h1>About Us</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut porro aliquam blanditiis expedita hic ut, doloremque atque natus eius quidem corporis explicabo consequuntur quis dolor ullam, qui eligendi sint ipsam praesentium? Magnam voluptatem sint nemo unde numquam aliquid excepturi magni? Adipisci distinctio quae numquam laboriosam rerum accusamus? Illum, doloribus excepturi.</p>
            </div>
        </div>
    </section>
    <!-- About Area End -->

    <!-- PHP CODE FOR GETTINGS PACKAGE DATA -->
    <!-- Packages Section Start-->
    <section class="packages">
        <div class="packages-mainArea">
            <div class="package-header-info">
                <div class="package-heading heading-text">
                    <h1 class="h1-bottom-border">Our Packages</h1>
                    <span></span>
                    <p>Select Your Suitable Package From Bellow</p>
                </div>
                
            </div>
        </div>
        
            <?php
                $packageData = fopen("assets/files/packages.txt", "r") or die("Unable to open file!");
                $i = 1;
                $colName = 'margin-up'; 
                while(!feof($packageData)) {
                    $package = fgets($packageData);
                    $package = explode('|', $package);
                    $title = $package[0];
                    $date = $package[1];
                    $stay = $package[2];
                    $fac = explode(',', $package[3]);
            ?>
                <div class="package-boxArea">
                    <?php
                        $colCount = 1;
                        for($colCount=1; $colCount <=2; $colCount++){
                    ?>  
                        <div class="package-width <?php echo $colName?>">
                            <div class="package-info">
                                <img src="<?php echo "assets/images/pack-".$i.".jpg"?>" class="img-fluid w-75" alt="<?php echo "image not Foundd pack-".$i.".jpg"?>">
                                <h4><?php echo $title?></h4>
                                <p>Available From : <?php echo $date?></p>
                                <p>Minimum Stay : <?php echo $stay?></p>
                                <div class="facility_row">
                                    <p>Facilities :</p>
                                    <ul class="facilities-list">
                                    <?php foreach($fac as $value){ ?>
                                        <li><p><?= $value; ?></p></li>
                                    <?php } ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    <?php
                            $no_of_lines = count(file('assets/files/packages.txt')); 
                            if($no_of_lines == $i){
                                break;
                            }
                            else{
                                $i++;
                            }
                        }
                    ?>
                </div>
            <?php
                    if($no_of_lines == $i){
                        break;
                    }
                }
                fclose($packageData);
            ?>
            <div class="load-btn-area">
                <a href="assets/layouts/packages.php" class="btn btn-custom btn-view">View More</a>
            </div>
        
    </section>
    <!-- Packages Section End-->

    <!-- BOOK ROOMS SECTION -->
    <section class="book-rooms" id="bookrooms">

    </section>
    <!-- Book Rooms Section END -->

    <!-- CONTACT US -->
    <section class="contact-us-map" id="">
        <iframe id="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7300.078682580148!2d90.41947597294167!3d23.817200038225753!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c62fb95f16c1%3A0xb333248370356dee!2sJamuna%20Future%20Park!5e0!3m2!1sen!2sbd!4v1592081458354!5m2!1sen!2sbd" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
    </section>
    <!-- End -->

    <!-- FOOTER MENU SECTION -->
    <section class="footer-menu" id="footermenu">
        <div class="menu-area">
            <div class="fmenu-items">
                <h4><img src="assets/images/logo.png" alt=""></h4>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. At laborum ipsam maxime officiis unde commodi recusandae magni sit explicabo corporis. Omnis facilis enim veritatis iusto aliquid voluptate deserunt placeat voluptas!</p>
            </div>
            <div class="fmenu-items">
                <h4>Usefull Links</h4>
                <ul>
                    <li><a href="#packages">Our Packages</a></li>
                    <li><a href="#services">Our Services</a></li>
                    <li><a href="#contact">Contact Us</a></li>
                </ul>
            </div>
            <div class="fmenu-items">
                <h4>Contact</h4>
                <ul>
                    <li><a href="#map">Location</a></li>
                    <li><a href="#services">About Us</a></li>
                </ul>
            </div>
        </div>
    </section>

</body>
</html>