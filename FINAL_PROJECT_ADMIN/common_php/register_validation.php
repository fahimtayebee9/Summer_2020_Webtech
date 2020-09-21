<?php
    include "../db/DB_Config.php";
    session_start();
    if(isset($_POST['register'])){
        $name               = $_POST['name'];
        $email              = $_POST['email'];
        $password           = $_POST['password'];
        $phone              = $_POST['phone'];
        $role               = "Customer";
        $confirmPassword    = $_POST['confirm_password'];
        $gender             = $_POST['gender'];
        $day                = $_POST['day'];
        $month              = $_POST['month'];
        $year               = $_POST['year'];
        $dob                = $year."-".$month."-".$day;
        $profile_picture    = $_FILES["profile_picture"]["name"];
        $errorPassCode = 0;
        if(empty($name) || empty($email) || empty($password) || empty($gender) ||empty($day) || empty($month) || empty($year) || empty($profile_picture)){
            $_SESSION['errorMessage'] = "Please Insert All Informations...";
            $errorPassCode = 1;
            header('location: ../common_pages/register.php');
        }
        // Password Match Checking
        else if($password != $confirmPassword){
            $_SESSION['errorMessage2'] = "Password did not matched...";
            $errorPassCode = 1;
            echo "Done...12";
            header('location: ../common_pages/register.php');
        }
        else{
            $validName = validateName($name);
            $validEmail = validateEmail($email);
            $validPassword = validatePassword($password);
            $validDate = validateDate($day,$month,$year);
            $errorCode=NULL;
            if($validName == $validEmail = $validPassword = $validDate){
                $sql = "SELECT email FROM users where email='$email';";
                $result = mysqli_query($db, $sql);
                while($data = mysqli_fetch_assoc($result)){
                    $email_db    = $data['email'];
                    $username_db   = $data['username'];
                    if($email == $email_db){
                        $errorText = 'Email Already Exists!Try another email...';
                        $_SESSION['errorEmail'] = $errorText;
                        $_SESSION['email'] = $email;
                        $_SESSION['name'] = $name;
                        $_SESSION['username'] = $username;
                        $_SESSION['suggest'] = $user;
                        $_SESSION['dob'] = $dob;
                        $errorCode = 404;
                        echo $errorCode."<br>".$_SESSION['errorEmail'];
                        header('location: ../common_pages/register.php');
                        break;
                    }
                    else{
                        $errorCode = 0;
                        break;
                    }
                }
                if($errorCode == 404){
                    echo "Error Code 404";
                }
                else{
                    $fileName = $_FILES["profile_picture"]["name"]; 
                    $image_tmp = $_FILES['profile_picture']['tmp_name']; 
                    $dest = "../assets/uploads/".rand(1000,10000)."_".$fileName;
                    $arr = explode('.',$fileName);
                    $fileType = strtolower(end($arr));
                    $allowTypes = array("jpg","png","jpeg","gif"); 
                    if(in_array($fileType, $allowTypes)){
                        if(move_uploaded_file($image_tmp,$dest)){
                            $query      = "INSERT INTO users (name, email,phone , password, dateOfBirth, profile_picture, userType) VALUES ( '$name', '$email', '$phone','$password', '$dob' ,'$profile_picture', '$role' )";
                            $adduser    = mysqli_query($db, $query);
                            if ( $adduser ){
                                echo "<script>alert('Registration Success')</script>";
                                header('location: ../common_pages/login.php');
                            }
                            else{
                                die("Connection Failed. Please try again later..." . mysqli_error($db));
                            }
                        }else{
                            $_SESSION['errorMessage'] = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.'; 
                            header('location: ../common_pages/register.php');
                        }
                    }
                }
            }
        }
    }

    // Name Validation : 1.Value Set, 2. Word Count > 2, 3.Characters from a-z or A-Z or '-', 4.Starts with a letter 
    function validateName($name){
        $valid = 0;
        if(isset($name) && str_word_count($name) >= 2){
            $name_array = str_split($name);
            foreach($name_array as $name_char){
                if($name_char >= 'a' || $name_char <= 'z' || $name_char >= 'A' || $name_char <= 'Z' || $name_char == '-' || $name_char == '.'){
                    $valid++;
                }
            }
            if($valid == strlen($name)){
                if($name_array[0] >= 'a' || $name_array[0] <= 'z' || $name_array[0] >= 'A' || $name_array[0] <= 'Z'){
                    $valid = 1;
                }
            }   
        }
        return $valid;
    }

    // Email Validation
    function validateEmail($email){
        $emailCode = 0;
        $validEmailCode = 0;
        if(isset($email)){
            $email_array = str_split($email);
            foreach($email_array as $email_char){
                if($email_char >= 'a' || $email_char <= 'z' || $email_char == '@' || $email_char == '.'){
                    $emailCode++;
                }
            }
            if($emailCode == strlen($email)){
                $validEmailCode = 1;
            }
        }
        return $validEmailCode;
    }

    // Password Validation
    function validatePassword($password){
        if(strlen($password) >= 8){
            $validPasswordCode = 1;
            unset($_SESSION['errorMessage2']);
            unset($_SESSION['passLengthError']);
        }
        else{
            unset($_SESSION['errorMessage2']);
            $_SESSION['passLengthError'] = "Password Length is less than 8 character...";
            $validPasswordCode = 0;
        }
        return $validPasswordCode;
    }

    // Date validation :
    function validateDate($day,$month,$year){
        $validDateCode =0;
        if($day >=1 || $day <=31 && $month >=1 || $month <=12 && $year >= 1970 || $year >= 2020){
            $dob = $day . "-" .$month . "-" . $year;
            $validDateCode = 1;
        }
        return $validDateCode;
    }
    mysqli_close($db);
?>