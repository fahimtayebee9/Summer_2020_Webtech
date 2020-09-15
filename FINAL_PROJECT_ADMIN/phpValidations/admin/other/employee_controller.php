<?php
    global $countManager;
    global $countStaff;
    global $countCheff;

    require_once('../../../services/admin/employee_service.php');
    if(isset($_POST['filterType'])){
        $filterType = $_POST['filterType'];

        $employees = get_EmployeesType($filterType);
        
        printData($employees);
    }
    if(isset($_POST['getAll'])){
        $employees = get_Employees();
        
        printData($employees);
    }
    if(isset($_POST['getCount'])){
        $employees = get_Employees();

        $countCheff     = 0;
        $countManager   = 0;
        $countStaff     = 0;
        
        foreach($employees as $emp){
            if($emp['role'] == "Manager"){
                $countManager++;
            }
            else if($emp['role'] == "Staff"){
                $countStaff++;
            }
            else if($emp['role'] == "Chef"){
                $countCheff++;
            }
        }

        $data = $countManager." | ".$countCheff." | ".$countStaff;
        echo $data;
    }
    if(isset($_POST['getId'])){
        $id = $_POST['getId'];

        $emp = get_empDataById($id);
        $empObj = json_encode($emp);

        echo $empObj;
    }
    if(isset($_POST['dataObj'])){
        $dataObj = $_POST['dataObj'];
        $status = updateEmp($dataObj);
        if($status){
            echo 1;
        }
        else{
            echo 0;
        }
    }
    if(isset($_POST['confirm']) && isset($_POST['user_id'])){
        $user_id = $_POST['user_id'];
        $empList = get_Employees();
        $empById = get_empDataById($user_id);
        $managerCount = 0;

        foreach($empList as $emp){
            if($emp['role'] == "Manager"){
                $managerCount++;
            }
        }

        if($managerCount == 1 && $empById->role == "Manager"){
            echo "ERROR 403 : Can not Remove Manager. There must be atleast 1 Manager in the Hotel System.";
        }
        else{
            $status = removeEmp($user_id);
            if($status){
                echo 1;
            }
            else{
                echo "Can not Remove Employee.";
            }
        }

    }
    if(isset($_POST['empData_add'])){
        $empDataAdd = $_POST['empData_add'];
        $empDataAdd = (object) json_decode( $empDataAdd, true);
        $statusValid = validateData($empDataAdd);

        if($statusValid){
            $statusAdd = insertEmp($empDataAdd);
            if($statusAdd){
                echo 1;
            }
        }
        else{
            echo $statusAdd;
        }
    }

    function printData($employees){
        $printDoc = "";
        $count = 1;
        foreach($employees as $employee){
            $printDoc .= "<tr>".
                            "<th>SL.{$count}</th>".
                            "<td><img src='../../../uploads/{$employee['profile_picture']}' alt='' style='width: 60px; height: 60px; border-radius: 50%;' class='img_pic'></td>".
                            "<td>{$employee['name']}</td>".
                            "<td>{$employee['email']}</td>".
                            "<td>{$employee['salary']}</td>".
                            "<td>{$employee['bonus']}</td>".
                            "<td>{$employee['rating']}</td>".
                            "<td>{$employee['role']}</td>".
                            "<td>". 
                                "<a href='UpdateEmp.php?id={$employee['id']}' class='btn btn-info'>Edit</a>".
                                "<button id='emp-{$employee['id']}' onclick='removeEmp()' class='btn btn-danger'>Remove</button>".
                            "</td>".
                        "</tr>";
            $count++;
        }
        echo $printDoc;
    }

    function validateData($empObject){
        $positions = array("Manager","Staff","Chef");
        $length = sizeof($empObject);
        $countValids = 0;
        if(!empty($empObject->name) && !empty($empObject->email) && !empty($empObject->password) && !empty($empObject->salary) && !empty($empObject->role) && !empty($empObject->date) ){
            
            if(str_word_count($empObject->name) >= 2){
                $countValids++;
            }
            if(($empObject->password).length >= 8){
                $countValids++;
            }
            if($empObject->salary > 0){
                $countValids++;
            }
            if(in_array($positions,$empObject->role)){
                $countValids++;
            }
            if($empObject->date < "2000-01-01"){
                $countValids++;
            }
        }

        if($countValids == $length || $countValids == ($length-1)){
            return true;
        }
        else{
            return false;
        }
    }
?>