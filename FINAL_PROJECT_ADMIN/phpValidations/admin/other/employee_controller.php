<?php
    global $countManager;
    global $countStaff;
    global $countCheff;

    require_once('../../../services/admin/employee_service.php');
    require_once('../../../services/admin/admin_service.php');

    if(isset($_POST['empData_add'])){
        $empDataAdd = $_POST['empData_add'];
        $empDataAdd = (object) json_decode( $empDataAdd, true);
        $statusValid = validateData($empDataAdd);

        if($statusValid){
            $statusAdd = insertEmp($empDataAdd);
            if($statusAdd){
                echo 1;
            }
            else{
                echo 0;
            }
        }
        else{
            echo "Invalid Data...";
        }
    }
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
    if(isset($_POST['paySalary'])){
        $employees = get_Employees();
        $adminId = $_POST['adminId'];
        $empCount = sizeof($employees);
        $totalSalary = 0;
        foreach($employees as $empSal){
            $totalSalary = $empSal['salary'] + $empSal['bonus'] + $totalSalary;
        }
        $adminInfo = getData($adminId);
        if(date("d") != "15"){
            $str = "Can not pay salary today. Pay Salary on 7th Day of every Month.";
            echo $str;
        }
        else{
            if($adminInfo[0]['balance'] < $totalSalary ){
                $str = "Can not pay salary today. Your Balance Is Low.";
                echo $str;
            }
            else{
                $newBalance = $adminInfo[0]['balance'] - $totalSalary;
                $adminInfo[0]['balance'] = $newBalance;
                $empUpdateCount = 0;
                foreach($employees as $emp){
                    $emp['balance'] = $emp['salary'] + $emp['balance'] + $emp['bonus'];
                    $empObj = json_encode($emp);
                    $updateEmp = updateEmp($empObj);
                    if($updateEmp){
                        $empUpdateCount+=1;
                    }
                }
                // echo $empCount." | ".$empUpdateCount;
                $statusUpdate = updateAdmin($adminInfo[0]);
                if($statusUpdate){
                    echo 1;
                }
                else{
                    echo "All Employee Salary Not Paid.";
                }
            }
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
        $length = sizeof((array)$empObject);
        $countValids = 0;
        if(!empty($empObject->name) && !empty($empObject->email) && !empty($empObject->password) && !empty($empObject->salary) && !empty($empObject->role) && !empty($empObject->date) ){
            
            if(str_word_count($empObject->name) >= 2){
                $countValids+=1;
            }
            if(checkEmail($empObject->email)){
                $countValids+=1;
            }
            if(strlen($empObject->password) >= 8){
                $countValids+=1;
            }
            if($empObject->salary >= 0){
                $countValids+=1;
            }
            if(in_array($empObject->role,$positions)){
                $countValids+=1;
            }
            if($empObject->date < "2000-01-01"){
                $countValids+=1;
            }
        }

        if($countValids == $length){
            return 1;
        }
        else{
            return 0;
        }
    }

    // Email Validation
    function checkEmail($email){
        $emailCode = 0;
        $validEmailCode = false;
        if(isset($email)){
            $email_array = str_split($email);
            foreach($email_array as $email_char){
                if($email_char >= 'a' || $email_char <= 'z' || $email_char == '@' || $email_char == '.'){
                    $emailCode++;
                }
            }
            if($emailCode == strlen($email)){
                $validEmailCode = true;
            }
        }
        return $validEmailCode;
    }
?>