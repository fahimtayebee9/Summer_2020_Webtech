<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/css/bootstrap.min.css">
    
    <link rel="stylesheet" href="css/styles.css">
    <title>Home - Hotel Management System</title>
</head>
<body>
    <section class="banner ">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand" href="#"><img class="logo-img" src="images/logo.png" style="max-width: 150px;" alt=""></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto ul-align">
                        <li class="nav-item">
                            <a class="nav-link hover-ani" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link hover-ani" href="layouts/about.html">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link hover-ani" href="layouts/packages.php">Packages</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link hover-ani" href="layouts/bookrooms.php">Book Rooms</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link hover-ani" href="layouts/contactus.html">Contact Us</a>
                        </li>
                        <li class="nav-item btn-align">
                            <a class="nav-link hover-ani last-hover-ani btn btn-custom" href="layouts/login.php">Login</a>
                        </li>
                    </ul>
                </div>
            </nav>
            <div class="container">
                <div class="row w320 hg align-items-center ">
                    <div class="col-10 col-lg-8 col-md-8 col-sm-8 text-center m-auto">
                        <div class="banner-content">
                            <h1>Hotel Management System</h1>
                            <p>The special charm and the cosy mood of Hotel will make you feel as a true fiorentine in Florence.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Us -->
    <section class="about-us">
        <div class="container">
            <div class="row justify-content-center align-items-center m-auto">
                <div class="col-8 col-sm-6 col-md-5 col-lg-5">
                    <div class="about-img">
                        <!-- <img src="images/banner-1.jpg" alt=""> -->
                    </div>
                </div>
                <div class="col-8 col-sm-10 col-md-7 col-lg-7 about-content">
                    <h1>About Us</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut porro aliquam blanditiis expedita hic ut, doloremque atque natus eius quidem corporis explicabo consequuntur quis dolor ullam, qui eligendi sint ipsam praesentium? Magnam voluptatem sint nemo unde numquam aliquid excepturi magni? Adipisci distinctio quae numquam laboriosam rerum accusamus? Illum, doloribus excepturi.</p>
                </div>
            </div>
        </div>
    </section>


    <!-- PHP CODE FOR GETTINGS PACKAGE DATA -->
    <!-- Packages Section -->
    <section class="packages">
        <div class="container">
            <div class="row justify-content-center align-items-center m-auto text-center">
                <div class="col-6 col-sm-8 col-md-6 col-lg-6 package-header-info">
                    <div class="package-heading heading-text">
                        <h1 class="h1-bottom-border">Our Packages</h1>
                        <span></span>
                        <p>Select Your Suitable Package From Bellow</p>
                    </div>
                    
                </div>
            </div>
            <div class="row">
                <?php
                    $packageData = fopen("packages.txt", "r") or die("Unable to open file!");
                    $i = 1;
                    $colCount = 1;
                    $colName = 'margin-up'; 
                    while(!feof($packageData)) {
                        $package = fgets($packageData);
                        $package = explode('|', $package);
                        $title = $package[0];
                        $date = $package[1];
                        $stay = $package[2];
                        $fac = explode(',', $package[3]);
                        if($colCount > 2){
                ?>
                    <div class="col-6 col-sm-6 col-md-6 col-lg-6 <?php echo $colName?>">
                        <div class="package-info">
                            <img src="<?php echo "images/pack-".$i.".jpg"?>" class="img-fluid w-75" alt="<?php echo "image not Foundd pack-".$i.".jpg"?>">
                            <h4><?php echo $title?></h4>
                            <p>Available From : <?php echo $date?></p>
                            <p>Minimum Stay : <?php echo $stay?></p>
                            <div class="row">
                                <div class="col-5"> <p>Facilities : </p> </div>
                                <div class="col-7">
                                <ul class="facilities-list">
                                <?php foreach($fac as $value){ ?>
                                    <li><p><?php  echo $value;?></p></li>
                                <?php } ?>
                                </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php   }
                        else{     
                ?>
                        <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                            <div class="package-info">
                                <img src="<?php echo "images/pack-".$i.".jpg"?>" class="img-fluid w-75" alt="<?php echo "image not Foundd pack-".$i.".jpg"?>">
                                <h4><?php echo $title?></h4>
                                <p>Available From : <?php echo $date?></p>
                                <p>Minimum Stay : <?php echo $stay?></p>
                                <div class="row">
                                    <div class="col-5"> <p>Facilities : </p> </div>
                                    <div class="col-7">
                                    <ul class="facilities-list">
                                    <?php foreach($fac as $value){ ?>
                                        <li><p><?php  echo $value;?></p></li>
                                    <?php } ?>
                                    </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php
                        }
                        $i++;
                        $colCount++;
                    }
                    fclose($packageData);
                ?>
                <div class="col-12 text-center load-btn-area">
                    <a href="layouts/packages.html" class="btn btn-custom btn-view">View More</a>
                </div>
            </div>
        </div>
    </section>

    <!-- BOOK ROOMS SECTION -->
    <section class="book-rooms" id="bookrooms">

    </section>

    <!-- CONTACT US -->
    <section class="contact-us map" id="map">
        <div class="container-fluid ">
			<div class="row map-area">
                <div class="col-12 map-con">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7300.078682580148!2d90.41947597294167!3d23.817200038225753!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c62fb95f16c1%3A0xb333248370356dee!2sJamuna%20Future%20Park!5e0!3m2!1sen!2sbd!4v1592081458354!5m2!1sen!2sbd" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>
                <div class="col-8 col-sm-8 col-md-6 col-lg-6">

                </div>
            </div>
        </div>
    </section>

    <!-- FOOTER MENU SECTION -->
    <section class="footer-menu" id="footermenu">
        <div class="container">
            <div class="row ">
                <div class="col-6 col-sm-6 col-md-4 col-lg-4 fmenu-items">
                    <h4>Usefull Links</h4>
                    <ul>
                        <li><a href="#packages">Our Packages</a></li>
                        <li><a href="#services">Our Services</a></li>
                        <li><a href="#contact">Contact Us</a></li>
                    </ul>
                </div>
                <div class="col-6 col-sm-6 col-md-4 col-lg-4 fmenu-items">
                    <h4></h4>
                    <ul>
                        <li><a href="#map">Location</a></li>
                        <li><a href="#services">About Us</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" ></script>
</body>
</html>
