<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/css/bootstrap.min.css">
    
    <link rel="stylesheet" href="../css/styles.css">
    <title>Packages - Hotel Management System</title>
</head>
<body>
    <section class="banner ">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand" href="#"><img class="logo-img" src="../images/logo.png" style="max-width: 150px;" alt=""></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto ul-align">
                        <li class="nav-item">
                            <a class="nav-link hover-ani" href="../index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link hover-ani" href="about.html">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link hover-ani" href="packages.php">Packages</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link hover-ani" href="bookroom.html">Book Rooms</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link hover-ani" href="contactus.html">Contact Us</a>
                        </li>
                        <li class="nav-item btn-align">
                            <a class="nav-link hover-ani last-hover-ani btn btn-custom" href="login.php">Login</a>
                        </li>
                    </ul>
                </div>
            </nav>
            <div class="container">
                <div class="row w320 align-items-center packages">
                    <div class="col-10 col-lg-8 col-md-8 col-sm-8 text-center m-auto">
                        <div class="banner-content">
                            <h2>Hotel Management System</h2>
                            <h1> All Package Details</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- PHP CODE FOR GETTINGS PACKAGE DATA FROM TEXT FILE (FILE I/O) -->
    <!-- Packages Section -->
    <section class="packages">
        <div class="container">
            <div class="row">
                <?php
                    $packageData = fopen("../packages.txt", "r") or die("Unable to open file!");
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
                            <img src="<?php echo "../images/pack-".$i.".jpg"?>" class="img-fluid w-75" alt="<?php echo "image not Foundd pack-".$i.".jpg"?>">
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
                                <img src="<?php echo "../images/pack-".$i.".jpg"?>" class="img-fluid w-75" alt="<?php echo "image not Foundd pack-".$i.".jpg"?>">
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
