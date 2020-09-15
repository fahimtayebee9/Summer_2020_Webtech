<?php
    require_once("../../../services/admin/package_service.php");
    if(isset($_POST['package_edit'])){
        $id = $_POST['id'];
        $name = $_POST['name'];
        $type = $_POST['type'];
        $facility = $_POST['facility'];
        $available = $_POST['available'];
        $price = $_POST['price'];

        $packageObj = array($id, $name, $type,$facility ,$price , $available);
        // $packageJSObj = json_decode($package);

        $status = update($packageObj);

        if($status){
            echo 1;
        }
        else{
            echo 0;
        }
    }
    if(isset($_POST['package_id'])){
        $id = $_POST['package_id'];
        
        $packageObj = getData_byId($id);

        $facilities = $packageObj['facility'];
        $facilities = explode('|',$facilities);
        $facility = "<ul>";
        $count = 0;
        while($count <sizeof($facilities)){
            $facility .= "<li><p>".$facilities[$count]."</p></li>";
        }
        $facility .= "</ul>";

        $print = "";
        $print .= "<tr>".
                        "<td><p>Name</p></td>".
                        "<td>{$packageObj['name']}</td>".
                    "</tr>".
                    "<tr>".
                        "<td><p>Type</p></td>".
                        "<td>{$packageObj['type']}</td>".
                    "</tr>".
                    "<tr>".
                        "<td><p>Facility</p></td>".
                        "<td>$facility</td>".
                    "</tr>".
                    "<tr>".
                        "<td><p>Price</p></td>".
                        "<td>{$packageObj['price']}</td>".
                    "</tr>".
                    "<tr>".
                        "<td><p>Availability</p></td>".
                        "<td>{$packageObj['available']}</td>".
                    "</tr>";
        echo $print;
    }
    else if(isset($_POST['package_type'])){

        $type = $_POST['package_type'];
        $packages = null;
        if($type == "all"){
            $packages = get_all();
            $length = sizeof($packages);
            $count = 0;
            $printDoc = "";
            while($count < $length){
                $available = $packages[$count]['available'];
                $availableText = "Inactive";
                $class =  "badge-inactive";
                if($available == 1){
                    $availableText = "Active";
                    $class =  "badge-active";
                }
                $printDoc .= "<tr>".
                                "<td>{$packages[$count]['name']}</td>".
                                "<td>{$packages[$count]['type']}</td>".
                                "<td>{$packages[$count]['facility']}</td>".
                                "<td>{$packages[$count]['price']}</td>".
                                "<td><p class='$class'>{$availableText}</p></td>".
                                "<td>".
                                    "<a href='package_details.php?option=view' class='view_btn' id='packageView-{$packages[$count]['id']}' onclick='viewButtonClick()'>View</a>".
                                    "<button href='' class='delete_btn' onclick='rejectButtonClick()' id='packageRemove-{$packages[$count]['id']}'>Reject</button>".
                                    "<a href='edit_package.php?id={$packages[$count]['id']}' class='edit_btn' onclick='' id='packageEdit-{$packages[$count]['id']}'>Edit</a>".
                                "</td>".
                            "</tr>";
                $count++;
            }
        }
        else{
            $packages = getData_byType($type);
            $length = sizeof($packages);
            $count = 0;
            $printDoc = "";
            while($count < $length){
                $available = $packages[$count]['available'];
                $availableText = "Inactive";
                $class =  "badge-inactive";
                if($available == 1){
                    $availableText = "Active";
                    $class =  "badge-active";
                }
                $printDoc .= "<tr>".
                    "<td>{$packages[$count]['name']}</td>".
                    "<td>{$packages[$count]['type']}</td>".
                    "<td>{$packages[$count]['facility']}</td>".
                    "<td>{$packages[$count]['price']}</td>".
                    "<td><p class='$class'>{$availableText}</p></td>".
                    "<td>".
                        "<a href='package_details.php?option=view' class='view_btn' id='package-{$packages[$count]['id']}' onclick='viewButtonClick()'>View</a>".
                        "<button class='delete_btn' onclick='rejectButtonClick()' id='package-{$packages[$count]['id']}'>Reject</button>".
                        "<a href='package_details.php?option=edit&id={$packages[$count]['id']}' class='edit_btn' onclick='' id='package-{$packages[$count]['id']}'>Edit</a>".
                    "</td>".
                "</tr>";
                $count++;
            }
        }
        echo $printDoc;
    }
    else if(isset($_POST['remove'])){
        $id = $_POST['id'];
        $status = $_POST['remove'];
        if($status){
            $delete = removePackage($id);
            if($delete){
                echo "Package Removed Successfuly..";
            }
            else{
                echo "Package Not Removed...";
            }
        }
    }
    else if (isset($_POST['id'])){
        $id = $_POST['id'];

        $update = getData_byId($id);
        $packageObj = json_encode($update);

        echo $packageObj;
    }
    else if(isset($_POST['addpackage'])){
        $package_new = $_POST['addpackage'];

        $packageJSObj = json_decode($package_new);

        $status = insert($packageJSObj);

        if($status){
            echo 1;
        }
        else{
            echo 0;
        }
    }
?>