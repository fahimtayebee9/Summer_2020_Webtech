<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGGED IN DASHBOARD</title>
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
            display: block;
            padding-left: 30px;
        }
        h2{
            padding: 30px;
        }
        h4{
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
        .logo{
            width: 50%;
            height: 100%;
        }
        .user_menu{
            list-style: inside;
            display: block;
            float: left;
        }
		.fld-profile{
			border: none;
		}
		.fld-profile td{
			border: none;
		}
		.fld-profile-row{
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
                    <li><a href="../Layouts/edit_profile.php">Edit Profile</a></li>
                    <li><a href="../Layouts/picture.php">Change Profile Picture</a></li>
                    <li><a href="../Layouts/change_password_layout.php">Change Password</a></li>
                    <li><a href="../php/logout.php">Logout</a></li>
                </ul>
            </td>
            <td>
				<fieldset>
					<legend><b>PROFILE</b></legend>
					<form action="" method="POST">
						<br/>
						<table cellpadding="0" cellspacing="0" class="fld-profile">
							<tr class="fld-profile-row">
								<td>Name</td>
								<td>:</td>
								<td><?php echo $name; ?></td>
								<td rowspan="7" align="center">
									<img width="128" src= ""/>
									<br/>
									<a href="../Layouts/picture.html">Change</a>
								</td>
							</tr>		
							<tr class="fld-profile-row"><td colspan="3"><hr/></td></tr>
							<tr class="fld-profile-row">
								<td>Email</td>
								<td>:</td>
								<td><?php echo $email; ?></td>
							</tr>		
							<tr class="fld-profile-row"><td colspan="3"><hr/></td></tr>			
							<tr class="fld-profile-row">
								<td>Gender</td>
								<td>:</td>
								<td><?php echo $gender; ?></td>
							</tr>
							<tr class="fld-profile-row"><td colspan="3"><hr/></td></tr>
							<tr class="fld-profile-row">
								<td>Date of Birth</td>
								<td>:</td>
								<td><?php echo $name; ?></td>
							</tr>
						</table>	
						<hr/>
						<a href="../write/edit_profile.html">Edit Profile</a>	
					</form>
				</fieldset>
            </td>
        </tr>
        <tr>
            <td colspan=2><h4>Copyright 2020</h4></td>
        </tr>
    </table>
</body>
</html>
