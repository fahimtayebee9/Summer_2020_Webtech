<?php
    $serial = rand(1000,10000);
    $dest = "../../../assets/images/package/_".$_FILES["package_imageUpload"]["name"];
    move_uploaded_file($_FILES['package_imageUpload']['tmp_name'], $dest);
    echo "Done";
?>