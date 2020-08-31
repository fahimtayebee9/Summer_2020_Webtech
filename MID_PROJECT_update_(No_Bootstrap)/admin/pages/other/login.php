<?php 
include "../../Php/db/DB_Config.php";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="../../../assets/css/logRegStyle.css">
    <title>Hotel Management System Portal</title>
</head>
<body>
    <section class="main-body">
        <div class="form-background">
            <div class="heading">
                <h1>Hotel Management System Portal</h1>
                <p>Login To Continue</p>
            </div>
            <?php
                if(isset($_COOKIE['email']) && isset($_COOKIE['password'])){
                    $email = $_COOKIE['email'] ;
                    $pass = $_COOKIE['password'] ;
                }
                else{
                    $email = '' ;
                    $pass = '';
                }
            ?>
            <form action="../../Php/Login_validation.php" method="POST">
                <div class="form-group">
                    <input type="email" name="email" class="form-control" id="Email" aria-describedby="emailHelp" placeholder="Email address" value="<?php echo $email?>">
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" id="password" placeholder="Password" value="<?php echo $pass?>">
                    <?php
                        session_start();
                        if(isset($_SESSION['loginError'])){
                    ?>
                            <p class="text-danger"><?php echo $_SESSION['loginError'];?></p>
                    <?php
                        }
                        session_destroy();
                    ?>
                </div>
                <div class="error-message">
                    <button type="submit" name="submit" class="form-control btn-custom">Submit</button>
                </div>
                <div class="reg-area">
                    <p>Don't have an Account? <a href="register.php">Click Here.</a></p>
                    <p><a href="../../../new_index.php" class="text-center text-secondary">Go Home</a></p>
                </div>
            </form>
        </div>      
    </section>

</body>
</html>