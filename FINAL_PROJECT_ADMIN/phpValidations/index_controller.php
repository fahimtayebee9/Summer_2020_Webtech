<?php
    require_once("../services/common/index_service.php");
    if(isset($_POST['getPackageList'])){
        $page = $_POST['getPackageList'];
        $packageList = get_all();

        echo printData($packageList,$page);
    }

    function printData($list,$page){
        if($list != null){
            $count = sizeof($list);
            $innerHTML = "";
            $i = 0;
            $colName = 'margin-up'; 
            for($cn = 0; $cn < $count; $cn++){
                
                
                    for($colCount=1; $colCount <=2; $colCount++){
                        
                    }   
                
                
            }
            if($page == "Package"){
                foreach($list as $package){
                    $colCount = 1;
                    $innerHTML .= "<div class='package-boxArea' id='package_area'>";
                    if($colCount == 2){
                        break;
                    }
                    else{
                            $innerHTML .= "<div class='package-width $colName'>".
                                                "<div class='package-info'>".
                                                "<img src='../images/{$package['package_image']}' class='img-fluid w-75' alt='image not Foundd {$package['package_image']}.jpg'>".
                                                "<h4>{$package['name']}</h4>".
                                                "<p>Category : {$package['type']}</p>".
                                                "<p>Price    : {$package['price']}</p>".
                                            "</div>".
                                        "</div>";
                        $innerHTML .= "</div>";
                        if($i == 6){
                            break;
                        }
                        else{
                            $i++;
                        }
                        $colCount++;
                    }
                }
            }
            else{
                foreach($list as $package){
                    $colCount = 1;
                    $innerHTML .= "<div class='package-boxArea' id='package_area'>";
                    if($colCount == 2){
                        break;
                    }
                    else{
                        $innerHTML .= "<div class='package-width $colName'>".
                                            "<div class='package-info'>".
                                            "<img src='assets/images/{$package['package_image']}' class='img-fluid w-75' alt='image not Foundd {$package['package_image']}.jpg'>".
                                            "<h4>{$package['name']}</h4>".
                                            "<p>Category : {$package['type']}</p>".
                                            "<p>Price    : {$package['price']}</p>".
                                        "</div>".
                                    "</div>";
                        $innerHTML .= "</div>";
                        if($i == 6){
                            break;
                        }
                        else{
                            $i++;
                        }
                        $colCount++;
                    }
                }
            }
            
            return $innerHTML;
        }
    }
?>