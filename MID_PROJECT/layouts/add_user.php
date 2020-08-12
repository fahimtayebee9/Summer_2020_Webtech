<?php 
include "Config.php";
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Hotel Management System Portal</title>
</head>
<body>
    <section class="main-body">
        <div class="container">
            <div class="row justify-content-center m-auto row-height align-items-center">
                <div class="col-6 form-background">
                    <div class="row">
                        <div class="col-12 text-center">
                            <h1>Hotel Management System Portal</h1>
                            <p>Login To Continue</p>
                        </div>
                    </div>
                    <form action="../php/add_user_validation.php" method="POST">
                        <div class="form-group">
                            <label>Full Name</label>
                            <input type="text" name="name" class="form-control" required="required">
                        </div>
                        <div class="form-group">
                            <label>Email Address</label>
                            <input type="email" name="email" class="form-control" required="required">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="text" name="password" class="form-control" required="required">
                        </div>
                        <div class="form-group">
                            <label>User Type</label>
                            <select name="user_type" class="">
                                <option value="Admin">Customer</option>
                                <option value="User">Manager</option>
                                <option value="Worker">Worker</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <input type="submit" name="register" class="btn btn-primary" value="Confirm">
                        </div>
                    </form>
                </div>
            </div>
        </div>        
    </section>
    <?php
        session_start();
        if(isset($_POST['register'])){
            if(empty($_POST['email']) || empty($_POST['password']) || empty($_POST['name']) || empty($_POST['user_type'])){
                echo "<h4>Invalid Input</h4>";
            }
            else{
                $email = $_POST['email'];
                $password = $_POST['password'];
                $name = $_POST['name'];
                $user = strstr($email, '@', true);
                $role = $_POST['user_type'];
                $query = "INSERT INTO users (name, username, email,  password,role) VALUES ( '$name', '$user', '$email', '$password', '$role')";
                $adduser = mysqli_query($db, $query);
                if ( $adduser ){
                    echo "User Added...";
                }
                else{
                    die("Connection Failed. Please try again later..." . mysqli_error($db));
                }
            }
        }
    ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>