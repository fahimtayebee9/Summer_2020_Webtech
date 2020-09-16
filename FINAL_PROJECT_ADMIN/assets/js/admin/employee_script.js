// FILTER BY EMP TYPE
function filter_emp(){
    var type = document.getElementById('filterSelect').value;
    if(type != "#"){
        var xhttp = new XMLHttpRequest();
        xhttp.open('POST', '../../../phpValidations/admin/other/employee_controller.php', true);
        xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhttp.send('filterType='+type);

        xhttp.onreadystatechange = function (){
            if(this.readyState == 4 && this.status == 200){
                if(this.responseText != ""){
                    document.getElementById('empBody').innerHTML = this.responseText;
                }else{
                    document.getElementById('empBody').innerHTML = "";
                }
            }	
        }
    }
    else{
        getAllEmployee();
    }
}

function resetFilter(){
    document.getElementById('filterSelect').value = "#";
    getAllEmployee();
}

// FOR EMPLOYE TABLE
function getAllEmployee(){
    var xhttp = new XMLHttpRequest();
    xhttp.open('POST', '../../../phpValidations/admin/other/employee_controller.php', true);
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhttp.send('getAll='+"true");

    xhttp.onreadystatechange = function (){
        if(this.readyState == 4 && this.status == 200){
            if(this.responseText != ""){
                document.getElementById('empBody').innerHTML = this.responseText;
            }else{
                document.getElementById('empBody').innerHTML = "";
            }
        }	
    }
    resetPaymentCount();
    getEmpCount();
}

function getEmpCount(){
    var xhttp = new XMLHttpRequest();
    xhttp.open('POST', '../../../phpValidations/admin/other/employee_controller.php', true);
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhttp.send('getCount='+true);

    xhttp.onreadystatechange = function (){
        if(this.readyState == 4 && this.status == 200){
            if(this.responseText != ""){
                var counts = (this.responseText).split('|');
                document.getElementById('staff_count').innerHTML = counts[2].trim();
                document.getElementById('chef_count').innerHTML = counts[1].trim();
                document.getElementById('manager_count').innerHTML = counts[0].trim();
            }else{
                document.getElementById('staff_count').innerHTML = 0;
                document.getElementById('chef_count').innerHTML = 0;
                document.getElementById('manager_count').innerHTML = 0;
            }
        }	
    }
}

// GET DATA FOR UPDATE 
function get_EmployeeDataById(id){
    if(id != "" || id != null){
        var xhttp = new XMLHttpRequest();
        xhttp.open('POST', '../../../phpValidations/admin/other/employee_controller.php', true);
        xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhttp.send('getId='+id);

        xhttp.onreadystatechange = function (){
            if(this.readyState == 4 && this.status == 200){
                if(this.responseText != ""){
                    var empObj = JSON.parse(this.responseText);
                    document.getElementById('id').value = empObj.id;
                    document.getElementById('fname').value = empObj.name;
                    document.getElementById('email').value = empObj.email;
                    document.getElementById('role').value = empObj.role;
                    document.getElementById('salary').value = empObj.salary;
                    document.getElementById('bonus').value = empObj.bonus;
                    document.getElementById('rating').value = empObj.rating;
                    document.getElementById('balance').value = empObj.balance;
                    var imgPath = "../../../uploads/"+empObj.profile_picture;
                    document.getElementById('userImg').src = imgPath;
                }else{
                    document.getElementById('empBody').innerHTML = "";
                }
            }	
        }
    }
    else{
        alert('Please Select an Employee to update..');
    }
}

// SALARY VALIDATION
function validateSalary(){
    var salary = document.getElementById('salary').value ;
    if(salary < 0){
        alert("Can not be negative");
        return false;
    }
    else {
        return true;
    }
}

// BONUS VALIDATION
function validateBonus(){
    var bonus = document.getElementById('bonus').value ;
    if(bonus < 0){
        alert("Can not be negative");
        return false;
    }
    else {
        return true;
    }
}

// UPDATE DATA
function updateEmpData(){
    var validSalary = validateSalary();
    var validBonus = validateBonus();
    if(validBonus && validSalary){
        var userId =  document.getElementById('id').value;
        var role = document.getElementById('role').value ;
        var salary = document.getElementById('salary').value ;
        var bonus =  document.getElementById('bonus').value ;
        var rating = document.getElementById('rating').value;

        var data = {
            'user_id' : userId,
            'role' : role,
            'salary' : salary,
            'bonus' : bonus,
            'rating' : rating
        }

        var dataObj = JSON.stringify(data);
        // alert(dataObj);

        var xhttp = new XMLHttpRequest();
        xhttp.open('POST', '../../../phpValidations/admin/other/employee_controller.php', true);
        xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhttp.send('dataObj='+dataObj);
        xhttp.onreadystatechange = function (){
            if(this.readyState == 4 && this.status == 200){
                if(this.responseText != ""){
                    if(this.responseText == '1'){
                        alert("Employee Data Updated Successfully");
                        window.location = "../../../pages/admin/employee_layouts/Employee.php";
                    }
                    else{
                        alert("Employee Data Not Updated Successfully");
                    }
                }else{
                    document.getElementById('empBody').innerHTML = "";
                }
                alert(this.responseText);
            }	
        }

    }
    else{
        return;
    }
}

// REMOVE EMPLOYEE 
function removeEmp(){
    var user_id = (event.target.id).split('-')[1];
    
    var confirmation = confirm("Are you sure to remove?");
    if(confirmation){
        var xhttp = new XMLHttpRequest();
        xhttp.open('POST', '../../../phpValidations/admin/other/employee_controller.php', true);
        xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhttp.send('confirm='+confirmation+"&user_id="+user_id);
        xhttp.onreadystatechange = function (){
            if(this.readyState == 4 && this.status == 200){
                if(this.responseText != ""){
                    if(this.responseText == 1){
                        alert("Employee Removed Successfully");
                        getAllEmployee();
                        window.location = "../../../pages/admin/employee_layouts/Employee.php";
                    }
                    else{
                        alert(this.responseText);
                    }
                }
            }	
        }
    }
}

// ADD NEW EMPLOYEE
function addNewEmp(){
    var name = document.getElementById('name').value;
    var email = document.getElementById('email').value;
    var password = document.getElementById('onepass').value;
    var salary = document.getElementById('salary').value;
    var role = document.getElementById('position').value;
    var date = document.getElementById('dob').value;
    if( name.length != 0 && email.length != 0 && date.length != 0 && password.length !=0 && salary.length !=0 && role.length != 0){
        
        var dataObj = {
            "name" : name,
            "email" : email,
            "password" : password,
            "salary" : salary,
            "role" : role,
            "date" : date
        }
        var emp = JSON.stringify(dataObj);

        var xhttp = new XMLHttpRequest();
        xhttp.open('POST', '../../../phpValidations/admin/other/employee_controller.php', true);
        xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhttp.send('empData_add='+emp);
        xhttp.onreadystatechange = function (){
            if(this.readyState == 4 && this.status == 200){
                if(this.responseText != ""){
                    if(this.responseText == 1){
                        alert("Employee Added Successfully");
                        getAllEmployee();
                        window.location = "../../../pages/admin/employee_layouts/Employee.php";
                    }
                    else{
                        alert(this.responseText);
                    }
                }
            }	
        }
    }
    else{
        alert("Not Valid");
    }
    
}

// EMAIL VALIDATION START
function validateEmail(){
    var email = document.getElementById('email').value;
	var errorElement = document.getElementById('emailError');
    // alert(email);
	// 2. character check a-z, @ and .
    var val = emailStringCheck(email);
    
    var exist = emailExist();
	
	// 1. Empty check
	if(email == "" || email == null){
        document.getElementById('emailError').style.color = 'red';
        document.getElementById('emailError').style.fontWeight = '600';
		errorElement.innerHTML = "Email can't left empty ()";
		return false;
	}
	else if(!val && !exist){
        document.getElementById('emailError').style.color = 'red';
        document.getElementById('emailError').style.fontWeight = '600';
		document.getElementById('emailError').innerHTML = "Not a valid email";
		return false;
    }
	else{
        document.getElementById('emailError').innerHTML = "";
        document.getElementById('default').innerHTML = "Suggested Username :  ";
        document.getElementById('suggestUsername').innerHTML = getUsername(email);
		return true;
	}
}
function emailStringCheck(email){
    var count = 0;
	for(var x =0; x< email.length; x++){
		if((email[x] >= 'a' && email[x] <= 'z') || email[x] == '.' || email[x] == '@' || (email[x] >= '0' && email[x] <= '9')){
            count++;
        }	    
		else{
            document.getElementById('emailError').style.color = 'red';
            document.getElementById('emailError').style.fontWeight = '600';
			document.getElementById('emailError').innerHTML = "Email can contain a-z and  (@) and (.)....";
			return false;
		}
    }
    if(count == email.length){
        document.getElementById('emailError').innerHTML = "Email : " + email.length + " valid char : " + count;
        return true;
    }
    else{
        document.getElementById('emailError').style.color = 'red';
        document.getElementById('emailError').style.fontWeight = '600';
        document.getElementById('emailError').innerHTML = "Not a Valid Email";
        return true;
    }
}

function emailRemover(){
	document.getElementById('emailError').innerHTML = "";
}

function emailBlurText(){
	if(document.getElementById('email').value == ""){
        document.getElementById('emailError').style.color = 'red';
        document.getElementById('emailError').style.fontWeight = '600';
        document.getElementById('emailError').innerHTML = "Email field is required!";
        return false;
    }
    else{
        emailValidation();
    }
}

function emailExist(){
    var email = document.getElementById('email').value;
    if(email == ""){
        document.getElementById('emailError').innerHTML = "Email Can not be empty";
    }
    else{
        var xhttp = new XMLHttpRequest();
        xhttp.open('POST', '../../../phpValidations/admin/other/emailCheck.php', true);
        xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhttp.send('email='+email);

        xhttp.onreadystatechange = function (){
            if(this.readyState == 4 && this.status == 200){
                if(this.responseText != ""){
                    if(this.responseText == "false"){
                        document.getElementById('emailError').innerHTML = "Email Exists..";
                        document.getElementById('emailError').style.color = 'red';
                        valid = false;
                    }
                    else{
                        document.getElementById('emailError').innerHTML = "";
                        valid = true;
                    }
                }else{
                    document.getElementById('emailError').innerHTML = "";
                }
                
            }	
            else{
                document.getElementById('emailError').innerHTML = this.responseText;
            }
        }
    }
}
// EMAIL VALIDATION END

// NAME VALIDATION START
function validateName(){
    var name = document.getElementById('fname').value;
	var errorElement = document.getElementById('nameError');

	// 2. Word count
	nameWordCount = wordCountCheck(name);

	// 3. character check a-z,A-Z,- and .
	nameStringCheck = stringCheck(name);

	// 4. first character check
	nameCharCheck = charCheck(name);
	
	// 1. Empty check
	if(name == "" || name == null){
		errorElement.innerHTML = "Name can't left empty";
		return false;
	}
	else if(!nameWordCount || !nameStringCheck || !nameCharCheck){
        document.getElementById('nameError').style.color = 'red';
        document.getElementById('nameError').style.fontWeight = '600';
        document.getElementById('nameError').innerHTML = "Failure : Not a valid Name.";
		return false;
	}
	else{
		return true;
	}
}
function stringCheck(name){
    var countTrue = 0;
    var output = name.replace(" ",'');
    var charX = 0;
	for(var x = 0; x < output.length; x++){
		if((output.charAt(x) >= 'a' && output.charAt(x) <= 'z') || (output.charAt(x) >= 'A' && output.charAt(x) <= 'Z' ) || output.charAt(x) == '-' || output.charAt(x) == '.'){
            countTrue++;
		}	
		else{
            document.getElementById('nameError').style.color = 'red';
            document.getElementById('nameError').style.fontWeight = '600';
            document.getElementById('nameError').innerHTML = "Failure : Name can contain a-z or A-Z or (-) or (.)....";
            countTrue = countTrue;
		}
    }
    if(countTrue == output.length){
        return true;
    }
    else{
        return false;
    }
}
function charCheck(name){
	if((name.charAt(0) >= 'a' && name.charAt(0) <= 'z') || (name.charAt(0) >= 'A' && name.charAt(0) <= 'Z')){
        document.getElementById('nameError').innerHTML = "";
		return true;
	}	
	else{
        document.getElementById('nameError').style.color = 'red';
        document.getElementById('nameError').style.fontWeight = '600';
		document.getElementById('nameError').innerHTML = "Must start with a letter....";
		return false;
	}
}

function wordCountCheck(name){
	if(name.split(" ").length < 2){
        document.getElementById('nameError').style.color = 'red';
		document.getElementById('nameError').innerHTML = "Name must be atleast 2 words";
		return false;
	}
	else{
        document.getElementById('nameError').innerHTML = "";
		return true;
	}
}
// NAME VALIDATION END

// VALIDATE ROLE 
function validateRole(){
    var role = document.getElementById('position').value;
    if(role == "#"){
        document.getElementById('positionError').innerHTML = "Role Can not be NULL";
        document.getElementById('positionError').style.color = 'red';
        document.getElementById('positionError').style.fontWeight = '600';
        return false;
    }
    else{
        document.getElementById('positionError').innerHTML = "";
        return true;
    }
}

// DATE VALIDATION : MAX DATE 2000-01-01
function validateDate(){
    var date = document.getElementById('dob').value;
    if(date < "2000-01-01"){
        document.getElementById('dobError').innerHTML = "";
        return true;
    }
    else{
        document.getElementById('dobError').innerHTML = "Date Must be Less Than 2000-01-01";
        document.getElementById('dobError').style.color = 'red';
        document.getElementById('dobError').style.fontWeight = '600';
        return false;
    }
}

// SET ONE TIME PASSWORD
function setOneTimePass(){
    document.getElementById('onepass').value = Math.floor((Math.random() * 9999999) + 10000000);
}

// PASS LENGTH VALIDATION 
function validatePassword(){
    var password = document.getElementById('onepass').value;
    if(password.length < 8){
        return false;
    }
    else{
        return true;
    }
}

// PAY SALARY (Date : 15 And Count : 1)
var payment = false; 
function paySalary(adminId){
    var date = new Date();
    var day = date.getDate();
    var valid = resetPaymentCount();
    
    if(day == 15 && valid){
        var xhttp = new XMLHttpRequest();
        xhttp.open('POST', '../../../phpValidations/admin/other/employee_controller.php', true);
        xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhttp.send('paySalary='+"emp"+"&adminId="+adminId);
        alert("Paying Salary...");
        xhttp.onreadystatechange = function (){
            if(this.readyState == 4 && this.status == 200){
                if(this.responseText == 1){
                    alert("All Employee Salary Paid.");
                }else{
                    // this.payment = false;
                    alert(this.responseText);
                }
            }	
        }
    }
    else{
        var months = ["January","February","March","April","May","June","July","August","September","October","November","December"];
        var dt = date.getDate()+" "+ months[date.getMonth()] + ", "+ date.getFullYear();
        alert("Can not pay Salary. Today is " + dt);
    }
}

function resetPaymentCount(){
    var date = new Date();
    var day = date.getDate();
    if(day != 15 && !payment || payment){
        return false;
    }
    else if(day == 15 && !payment){
        return true;
    }
}

function checkId(){
    var urlLink = document.URL;
    if(!urlLink.includes('?id=')){
        alert('Please Select an Employee to update..');
        // window.location
    }
}
