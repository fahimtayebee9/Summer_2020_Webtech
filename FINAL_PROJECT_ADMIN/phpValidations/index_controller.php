<?php
    require_once("../services/common/index_service.php");
    if(isset($_POST['getPackageList'])){
        $packageList = get_all();

        echo printData($packageList);
    }

    function printData($list){
        if($list != null){
            $count = sizeof($list);
            $innerHTML = "";
            $i = 1;
            $colName = 'margin-up'; 
            foreach($list as $package){
                $colCount = 1;
                $facilityListData = "";
                $facilityList = explode('|',$package['facility']);
                foreach($facilityList as $value){ 
                    $innerHTML .= "<li><p>{$value}</p></li>";
                }
                $innerHTML .= "<div class='package-boxArea' id='package_area'>";
                    for($colCount=1; $colCount <=2; $colCount++){
                        $innerHTML .= "<div class='package-width $colName'>".
                                            "<div class='package-info'>".
                                            "<img src='assets/images/{$package['package_image']}' class='img-fluid w-75' alt='image not Foundd {$package['package_image']}.jpg'>".
                                            "<h4>{$package['name']}</h4>".
                                            "<p>Category : {$package['type']}</p>".
                                            "<div class='facility_row'>".
                                                "<p>Facilities :</p>".
                                                "<ul class='facilities-list'>".
                                                    $facilityListData.
                                                "</ul>".
                                            "</div>".
                                        "</div>".
                                    "</div>";
                    }   
                $innerHTML .= "</div>";
                if($i == 6){
                    break;
                }
                else{
                    $i++;
                }
            }
            return $innerHTML;
        }
    }
?>