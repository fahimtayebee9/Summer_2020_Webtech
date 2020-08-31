<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Homepage</title>
    <style>
        .box{
            margin: auto;
            text-align: center;
        }
        a{
            display: block;
        }
    </style>
</head>
<body>
    <?php
        session_start();
    ?>
        <div class="box">
            <h1>Welcome <?php echo $_SESSION['username']?></h1>
            <a href="profile_details.php">Profile</a>
            <a href="change_password.php">Change Password</a>
            <a href="../Php/logout.php">Logout</a>
        </div>
        
    <?php

    ?>
</body>
</html>