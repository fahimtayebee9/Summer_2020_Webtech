<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Public Home</title>
    <style>
        ul{
            list-style: none;
            display: flex;
            float: right;
        }
        ul li{
            padding: 20px;
        }
        table, th, td {
            border-collapse: collapse;
            border: 2px solid black;
        }
        td{
            width: fit-content;
        }
        table{
            width: 60%;
        }
        tr{
            border: 2px solid black;
        }
        h1{
            display: inline;
        }
        h2{
            padding: 30px;
        }
        h6{
            text-align: center;
        }
        .block-set{
            display: flex;
        }
        form{
            padding: 40px;
        }
        input{
            margin-top: 20px;
            margin-bottom: 20px;
        }
        .space{
            padding-right: 30px;
        }
        .user_menu{
            list-style: inside;
            display: block;
            float: left;
        }
        .chng{
            border: none;
        }
        .chng td{
            border: none;
        }
        .chng tr{
            border: none;
        }
    </style>
</head>
<body>
    <?php
        session_start();
        $name = $_SESSION['user']['uname'];
        $email = $_SESSION['user']['email'];
        $dob = $_SESSION['user']['day'] . "/" . $_SESSION['user']['month'] . "/" . $_SESSION['user']['year'];
        $gender = $_SESSION['user']['gender'];
    ?>
    <table>
        <tr >
            <td colspan=2>
                <div class="logo">
                    <h1>X-Company</h1>
                </div>
                <ul>
                    <li>Logged in as : <a href="../Layouts/profile.php"><?php echo $name?></a></li>
                    <li><a href="../php/logout.php">Logout</a></li>
                </ul>
            </td>
        </tr>
        <tr>
            <td>
                <h1>Account</h1>
                <hr>
                <ul class="user_menu">
                    <li><a href="../Layouts/loggedin_home.php">DashBoard</a></li>
                    <li><a href="../Layouts/profile.php">View Profile</a></li>
                    <li><a href="../Layouts/edit_profile.html">Edit Profile</a></li>
                    <li><a href="../Layouts/picture.php">Change Profile Picture</a></li>
                    <li><a href="../Layouts/change_password_layout.php">Change Password</a></li>
                    <li><a href="../php/logout.php">Logout</a></li>
                </ul>
            </td>
            <td>
                <fieldset>
                    <legend><b>CHANGE PASSWORD</b></legend>
                    <form action="../php/change_password.php" method="POST">
                        <table class="chng">
                            <tr>
                                <td><font size="3">Current Password</font></td>
                                <td>:</td>
                                <td><input type="password" name="old_password"/></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td><font size="3" color="green">New Password</font></td>
                                <td>:</td>
                                <td><input type="password" name="new_password"/></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td><font size="3" color="red">Retype New Password</font></td>
                                <td>:</td>
                                <td><input type="password" name="retype_password"/></td>
                                <td></td>
                            </tr>
                        </table>
                        <hr />
                        <input type="submit" value="Submit" name="submit"/>
                    </form>
                </fieldset>
            </td>
        </tr>
        <tr>
            <td colspan=2><h6>Copyright 2020</h6></td>
        </tr>
    </table>
</body>
</html>
