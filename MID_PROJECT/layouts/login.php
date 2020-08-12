<?php 
include "../Php/DB_Config.php";
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/logRegStyle.css">
    <title>Hotel Management System Portal</title>
</head>
<body>
    <section class="main-body">
        <div class="container">
            <div class="row justify-content-center m-auto row-height align-items-center">
                <div class="col-6 form-background">
                    <div class="row text-center justify-content-center align-items-center">
                        <div class="col-12">
                            <h1>Hotel Management System Portal</h1>
                            <p>Login To Continue</p>
                        </div>
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
                    <form action="../Php/Login_validation.php" method="POST">
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
                            <button type="submit" name="submit" class="btn btn-primary btn-custom">Submit</button>
                        </div>
                        <div class="reg-area">
                            <p>Don't have an Account? <a href="../layouts/register.php">Click Here.</a></p>
                            <p><a href="../index.php" class="text-center text-secondary">Go Home</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>        
    </section>
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>