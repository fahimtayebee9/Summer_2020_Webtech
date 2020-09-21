<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <script src="../assets/js/admin/script.js" type="text/javaScript"></script>

    <link rel="stylesheet" href="../assets/css/logRegStyle.css">

    <title>Hotel Management System Portal</title>
</head>
<body>
    <section class="main-body">
        <div class="form-background reg_body">
            <div class="heading">
                <h1>Hotel Management System Portal</h1>
                <p>***Register as Customer To Continue***</p>
            </div>
            <!-- ../Php/register_validation.php -->
            <form action="../common_php/register_validation.php" class="" method="POST" enctype="multipart/form-data" name="reg_form" onsubmit="return validate()">
                <div class="inputField_area">
                    <div class="divider">
                        <div class="form-group">
                            <label for="name" class="title">Full Name</label>
                            <input type="text" name="name" id="name" class="form-control" oninput="nameValidation()" onkeyup="nameErrorRemover()"  required="required" value="">
                            <p id="nameError"></p>
                        </div>
                        <div class="form-group">
                            <label class="title">Email Address</label>
                            <input type="email" name="email" id="email" class="form-control" required="required" placeholder="example@domain.com"  onkeyup="emailExist()" onblur="emailBlurText()"  value="">
                            <p id="emailError"></p>
                            <?php
                                session_start();
                                if(isset($_SESSION['errorEmail'])){
                                    ?>
                                    <p style="color: red;"><?php echo $_SESSION['errorEmail'];?></p>
                            <?php
                                }
                                session_destroy();
                            ?>
                        </div>
                        <div class="form-group">
                            <label class="title">Phone Number</label>
                            <input type="text" name="phone" class="form-control" id="phone" value="" onkeyup="checkNumber()" onblur="removeErrorNumber()">
                            <p id="phoneError"></p>
                        </div>
                        <div class="form-group">
                            <label class="title">Gender</label>
                            <div class="radio-controller">
                                <div class="radio-box">
                                    <input name="gender" type="radio" value="Male" id="male" oninput="genderValidation()" onclick="genderErrorRemover()" onblur="genderCheck()"> 
                                    <label for="male" class="radio-label">Male</label>
                                </div>
                                <div class="radio-box">
                                    <input name="gender" type="radio" value="FeMale" id="female" oninput="genderValidation()" onclick="genderErrorRemover()" onblur="genderCheck()"> 
                                    <label for="female" class="">FeMale</label>
                                </div>
                                <div class="radio-box">
                                    <input name="gender" type="radio" value="Other" id="other" oninput="genderValidation()" onclick="genderErrorRemover()" onblur="genderCheck()"> 
                                    <label for="other" class="">Other</label>
                                </div>
                            </div>
                            <p id="genderError"></p>
                        </div>
                    </div>
                    <div class="divider">
                        <div class="form-group">
                            <label class="title" >Password</label>
                            <input type="password" name="password" id="password" class="form-control" required="required" oninput="passwordValidation()" onkeyup="passErrorRemover()">
                            <p id="passError"></p>
                        </div>
                        <div class="form-group">
                            <label class="title">Confirm Password</label>
                            <input type="password" name="confirm_password" id="confirm_password" class="form-control" oninput="confirmPasswordValidation()" onkeyup="confirmPassErrorRemover()" required="required">
                            <p id="confirmPassError"></p>
                            <?php
                                // session_start();
                                if(isset($_SESSION['errorMessage2'])){
                            ?>
                                    <p id="text_danger"><?php echo $_SESSION['errorMessage2'];?></p>
                            <?php
                                }
                                else if(isset($_SESSION['passLengthError'])){
                            ?>
                                    <p id="text_danger"><?php echo $_SESSION['passLengthError'];?></p>
                            <?php
                                }
                                // session_destroy();
                            ?>
                        </div>
                        <div class="form-group">
                            <label class="title">Date of Birth</label>   
                            <div class="date-controller">
                                <input type="text" class="form-control dob" size="2" name="day" id="day" oninput="dobValidation()" onkeyup="dobErrorRemover()" onblur="dobNullCheck()"/>
                                <p> / </p>
                                <input type="text" class="form-control dob" size="2" name="month" id="month" oninput="dobValidation()" onkeyup="dobErrorRemover()" onblur="dobNullCheck()"/>
                                <p> / </p>
                                <input type="text" class="form-control dob" size="4" name="year" id="year" oninput="dobValidation()" onkeyup="dobErrorRemover()" onblur="dobNullCheck()"/>
                                <p size="2"><i>(dd/mm/yyyy)</i></p>
                            </div>
                            <p id="dobError"></p>
                        </div>
                        <div class="form-group">
                            <label class="title">Profile Picture</label>
                            <input type="file" name="profile_picture" id="profile_picture" class="form-control" required="required" oninput="fileUploadValidation()">
                            <p id="imgError"></p>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <input type="submit" name="register" class="btn-register" value="Confirm">
                    <a href="../../../new_index.php" class="btn-register">Go Home</a>
                </div>
                <div class="error-Area">
                    <?php
                        if(isset($_SESSION['errorMessage'])){
                    ?>
                        <p><?php echo $_SESSION['errorMessage'];?></p>
                    <?php
                        }
                    ?>
                    <p id="errorText"></p>
                </div>
            </form>
        </div>        
    </section>
</body>
</html>

