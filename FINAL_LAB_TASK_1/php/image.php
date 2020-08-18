<?php
    if(isset($_POST['create'])){
        if(isset($_FILES['profile_picture'])){
            $errors= array();
            $file_name = $_FILES['profile_picture']['name'];
            $file_size =$_FILES['profile_picture']['size'];
            $file_tmp =$_FILES['profile_picture']['tmp_name'];
            $file_type=$_FILES['profile_picture']['type'];
            // $file_ext=strtolower(end(explode('.',$_FILES['profile_picture']['name'])));
            
            // $extensions= array("jpeg","jpg","png");
            
            // if(in_array($file_ext,$extensions)=== false){
                // $errors[]="extension not allowed, please choose a JPEG or PNG file.";
            // }
            
            // if($file_size > 2097152){
                // $errors[]='File size must be excately 2 MB';
            // }
            
            // if(empty($errors)==true){
                // move_uploaded_file($file_tmp,"images/".$file_name);
                echo "Success";
            // }else{
                // print_r($errors);
            // }
        }
        echo "8999";
        echo $file_name."<br>".$file_size;
        // echo $company_logo;
    }
    
?>