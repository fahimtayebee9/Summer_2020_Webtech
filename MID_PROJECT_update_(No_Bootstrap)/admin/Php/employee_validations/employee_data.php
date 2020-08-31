<?php
    //include "../../Php/db/DB_Config.php";
    //$sql= "select * from users where role='Customer'";
    //$allResult = mysqli_query($db, $sql);
    include "../../Php/db/DB_Config.php";

        $role = 'Customer';
        $sql= "select * from users where role='Employee' or role='Manager'";
        $result = mysqli_query($db, $sql);
        $i=1;
        $data = "";
    while ($row = mysqli_fetch_assoc($result)) {
    $data .= "<tr>
                    <td>{$i}</td>
                    <td>{$row['username']}</td>
                    <td>{$row['email']}</td>
            </tr>";
    if($i == 4){
            break;
    }
        $i++;
    }
    echo $data;
    
?>