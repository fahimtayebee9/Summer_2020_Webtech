<?php
    $target = "../images/logo.png";
    $i=1;
    if(file_exists($target)){
        $target = "../images/$i-logo.png";
        echo $i."<br>";
        echo $target;
    }
    else{
        echo $target;
    }
?>