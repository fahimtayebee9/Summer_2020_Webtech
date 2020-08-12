<?php
    include "../Php/DB_Config.php";
    session_start();
    if(isset($_POST['register'])){
        $name               = $_POST['name'];
        $email              = $_POST['email'];
        $password           = $_POST['password'];
        $user               = strstr($email, '@', true);
        $username           = $_POST['username'];
        $role               = "Admin";
        $confirmPassword    = $_POST['confirm_password'];
        $gender             = $_POST['gender'];
        $day                = $_POST['day'];
        $month              = $_POST['month'];
        $year               = $_POST['year'];
        $dob                = NULL;
        $profile_picture    = $_FILES["profile_picture"]["name"];
        $errorPassCode = 0;
        if(empty($name) || empty($email) || empty($password) || empty($username) || empty($gender) ||empty($day) || empty($month) || empty($year) || empty($profile_picture)){
            $_SESSION['errorMessage'] = "Please Insert All Informations...";
            $errorPassCode = 1;
            echo "Done...133";
            header('location: ../layouts/register.php');
        }
        // Password Match Checking
        else if($password != $confirmPassword){
            $_SESSION['errorMessage2'] = "Password did not matched...";
            $errorPassCode = 1;
            echo "Done...12";
            header('location: ../layouts/register.php');
        }
        else{
            $validName = validateName($name);
            $validEmail = validateEmail($email);
            $validPassword = validatePassword($password);
            $validDate = validateDate($day,$month,$year);
            $_SESSION['suggest'] = $user;
            $errorCode=NULL;
            if($validName == $validEmail = $validPassword = $validDate){
                $sql = "SELECT email,username FROM users where email='$email';";
                $result = mysqli_query($db, $sql);
                while($data = mysqli_fetch_assoc($result)){
                    $email_db    = $data['email'];
                    $username_db   = $data['username'];
                    echo $email_db."<br>".$username_db.'<br>';
                    if($email == $email_db){
                        $errorText = 'Email Already Exists!Try another email...';
                        $_SESSION['errorText'] = $errorText;
                        $_SESSION['email'] = $email;
                        $_SESSION['name'] = $name;
                        $_SESSION['username'] = $username;
                        $_SESSION['dob'] = $dob;
                        $errorCode = 404;
                        header('location: ../layouts/update_profile.php');
                        break;
                    }
                    else if($username == $username_db || $user == $username_db){
                        $errorText = 'Email Already Exists!Try another email...';
                        $_SESSION['errorText2'] = $errorText;
                        $errorCode = 404;
                        header('location: ../layouts/update_profile.php');
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
                    if(isset($_SESSION['uid'])){
                        $uid = $_SESSION['uid'];
                        $query      = "UPDATE users set name='$name', username='$username', email='$email',  password='$password' where id = '$uid'";
                        $adduser    = mysqli_query($db, $query);
                        if ( $adduser ){
                            $getIdQuery     = "SELECT id,email,username FROM users where email='$email' and username='$username';";
                            $resultIdSet    = mysqli_query($db, $getIdQuery);
                            if(mysqli_num_rows($resultIdSet) == 1){
                                $row = mysqli_fetch_assoc($resultIdSet);
                                $id = $row['id'];
                            }
                            else{
                                while($row = mysqli_fetch_assoc($resultIdSet)){
                                    if($row['email'] == $email && $row['username'] == $username){
                                        $id = $row['id'];
                                    }
                                }
                            }
                            if(isset($id)){
                                $balance = 0;
                                if(!empty($_FILES["profile_picture"]["name"])){
                                    $fileName = basename($_FILES["profile_picture"]["name"]); 
                                    $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
                                    
                                    // Allow certain file formats 
                                    $allowTypes = array('jpg','png','jpeg','gif'); 
                                    if(in_array($fileType, $allowTypes)){ 
                                        $image = $_FILES['profile_picture']['tmp_name']; 
                                        $imgContent = addslashes(file_get_contents($image)); 
                                    
                                        // Insert image content into database 
                                        $add_query  = "INSERT INTO admininfo (name, profile_picture, balance, userId ) VALUES ( '$name', '$profile_picture', '$balance', '$id')";
                                        $add_admin_data    = mysqli_query($db, $add_query);
                                        if($add_admin_data){
                                            $_SESSION['percentage'] = 100;
                                            $percentage = 100;
                                            setcookie('percentage', $percentage, time() + (3600 * 30), "/");
                                            $_SESSION['username'] = $username;
                                            header('location: ../layouts/profile_details.php');
                                        }
                                    }else{ 
                                        $_SESSION['errorMessage'] = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.'; 
                                    } 
                                }
                            }
                            echo "<script type='text/javascript'>alert('Profile Updated successfully!');window.location='../layouts/profile_details.php';</script>";//
                        }
                        else{
                            die("Connection Failed. Please try again later..." . mysqli_error($db));
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
        // $validPasswordCode = 0;
        if(strlen($password) >= 8){
            $validPasswordCode = 1;
        }
        // if($errorPassCode == 0){ }
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
?>