<?php
    require_once('../db/config.php');
    function search_user($email){
        $conn = dbConnection();

        if(!$conn){
            echo "DB connection error";
        }

        $sql = "select * from users where email='$email'";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) == 0){
            return true;
        }
        else{
            return false;
        }
    }

    function update_profile($user){
        $db = dbConnection();
        $name = $user['name'];
        $email = $user['email'];
        $password = $user['password'];
        $username = $user['username'];
        $role = $user['role'];
        $uid = $user['userId']; 
        $id = $user['id'];
        $dob = $user['dob'];
        $gender = $user['gender'];
        $balance = $user['balance'];
        $profile_picture = $user['profile_picture'];

        $sql_user = "UPDATE users set name='$name', email='$email', username='$username' ,password='$password', role='$role' where id = '$uid'";
        $res_user = mysqli_query($db,$sql_user);
        
        $sql_admin = "UPDATE admininfo set name = '$name', dob='$dob', gender='$gender', balance ='$balance', profile_picture='$profile_picture' where id = '$id'";
        $res_admin = mysqli_query($db,$sql_admin);

        if($res_user && $res_admin){
            return true;
        }
        else{
            return false; 
        }
        
    }

    function changePassword($password,$uid){
        $db = dbConnection();
        
        $sql_user = "UPDATE users set password='$password' where id = '$uid'";
        $res_user = mysqli_query($db,$sql_user);

        if($res_user){
            return true;
        }
        else{

            ?>
            <script>
                alert("<?php echo mysqli_error($db)?>");

            </script>
            <?php
            return false; 
        }
    }

    
?>