var nameWordCount = false;
var nameCharCheck = false;
var nameStringCheck = false;
var genderCheckValid = false;
var genderPicked = "";

function validate(){
    var nameValidate = nameValidation();
    var emailValidate = emailValidation();
    var genderValidate = genderValidation();
    var passValidate = passwordValidation();
    var dobValidate = dobValidation();
    var fileUpload = fileUploadValidation();
    var confirmPassValidate = confirmPasswordValidation();
    if(nameValidate && emailValidate && genderValidate && passValidate && dobValidate && fileUpload && confirmPassValidate){
        return true;
    }
    else{
        return false;
    }
}

// NAME VALIDATION
function nameValidation(){
	var name = document.getElementById('name').value;
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

function nameErrorRemover(){
    if(nameCharCheck && nameStringCheck && nameWordCount){
        document.getElementById('nameError').innerHTML = "";
    }
}

function blurText(){
	if(document.getElementById('name').value == ""){
        document.getElementById('nameError').style.color = 'red';
        document.getElementById('nameError').style.fontWeight = '600';
		document.getElementById('nameWarnigng').innerHTML = "Name field is required!";
	}
}

// EMAIL VALIDATION
function emailValidation(){
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
	else if(!val){
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
        xhttp.open('POST', '../../Php/emailCheck.php', true);
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

// USERNAME VALIDATION
function getUsername(emailAddress){
    var username = emailAddress.split('@')[0];
    return username;
}
function setUsername(){
    document.getElementById('username').value = document.getElementById('suggestUsername').innerHTML;
}
function hoverText(){
    document.getElementById('suggestUsername').style.color = 'darkslategrey';
    document.getElementById('suggestUsername').style.fontWeight='600';
    document.getElementById('suggestUsername').style.cursor = 'pointer';
}
function hoverRemove(){
    document.getElementById('suggestUsername').style.color = 'black';
    document.getElementById('suggestUsername').style.fontWeight='500';
}

// PASSWORD VALIDATION
function passwordValidation(){
    var password = document.getElementById('password').value;
    
    // password length check
    if(password.length < 8){
        document.getElementById('passError').innerHTML = "Password must be 8 character long..";
        document.getElementById('passError').style.color = 'red';
        document.getElementById('passError').style.fontWeight = '600';
        return false;
    }
    else{
        var result = checkStrength(password);
        if(result){
            return true;
        }
    }
}

function checkStrength(password){
    var sameChar = false;
    var lowerCase = false;
    var upperCase = false;
    var symbol = false;
    var i = 0;
    for(var x = 0; x < password.length; x++){
        if(password[x] >= 'a' && password[x] <= 'z' ){
            lowerCase = true;
        }
        else if(password[x] >= 'A' && password[x] <= 'Z' ){
            upperCase = true;
        }
        else if(password[x] == password[x+i]){
            sameChar = true;
        }
        else if(password[x] >= '0' && password[x] <= '9'){
            symbol =  true;
        }
        i++;
    }
    if(sameChar && (!upperCase || !lowerCase || !symbol)){
        document.getElementById('passError').innerHTML = "Poor Password..";
        document.getElementById('passError').style.color = 'red';
        document.getElementById('passError').style.fontWeight = '600';
        return false;
    }
    else if(!symbol && upperCase && lowerCase){
        document.getElementById('passError').innerHTML = "Password must contain numbers from 0-9.";
        document.getElementById('passError').style.color = 'red';
        document.getElementById('passError').style.fontWeight = '600';
        return false;
    }
    else if(symbol && lowerCase && upperCase){
        document.getElementById('passError').innerHTML = "Strong Password";
        document.getElementById('passError').style.color = 'green';
        document.getElementById('passError').style.fontWeight = '600';
        return true;
    }
}

function passErrorRemover(){
    if(checkStrength(document.getElementById('password').value)){
        document.getElementById('passError').innerHTML = "";
    }
}
// CONFIRM PASSWORD
function confirmPasswordValidation(){
    var confirmPass = document.getElementById('confirm_password').value;
    if(confirmPass != document.getElementById('password').value){
        document.getElementById('confirmPassError').innerHTML = "Password Not Matched..";
        document.getElementById('confirmPassError').style.color = 'red';
        document.getElementById('confirmPassError').style.fontWeight = '600';
        return false;
    }
    else{
        document.getElementById('confirmPassError').innerHTML = "";
        return true;
    }
}

function confirmPassErrorRemover(){
    if(document.getElementById('confirm_password').value == document.getElementById('password').value){
        document.getElementById('confirmPassError').innerHTML = "";
    }
}

// GENDER VALIDATION
function genderValidation(){
    var rbs = document.querySelectorAll('input[name="gender"]');
    for (const rb of rbs) {
        if (rb.checked) {
            genderCheckValid = true;
            genderPicked = rb.value;
            break;
        }
        else{
            document.getElementById('genderError').innerHTML = "Gender is required";
            document.getElementById('genderError').style.color = 'red';
            document.getElementById('genderError').style.fontWeight = '600';
            genderCheckValid = false;
        }
    }
    if(!genderCheckValid){
        document.getElementById('genderError').innerHTML = "Gender is required";
        document.getElementById('genderError').style.color = 'red';
        document.getElementById('genderError').style.fontWeight = '600';
        return false;
    }
    else{
        document.getElementById('genderError').innerHTML = "";

        return true;
    }
}
function genderErrorRemover(){
    if(document.getElementById('male').checked || document.getElementById('female').checked || document.getElementById('other').checked){
        document.getElementById('genderError').innerHTML = "";
    }
}
function genderCheck(){
    
}

// DATE OF BIRTH VALIDATION
var dayValid=false;
var monthValid = false;
var yearValid = false;
function dobValidation(){
    var day = document.getElementById('day').value;
    var month = document.getElementById('month').value;
    var year = document.getElementById('year').value;
    dayValid = between(day,1,31);
    monthValid = between(month,1,12);
    yearValid = between(year,1900,2020);
    
    if(!dayValid){
        document.getElementById('dobError').innerHTML = "Not a valid Day inserted..";
        document.getElementById('dobError').style.color = 'red';
        document.getElementById('dobError').style.fontWeight = '600';
        return false;
    }
    else if(!monthValid){
        document.getElementById('dobError').innerHTML = "Not a valid Month inserted..";
        document.getElementById('dobError').style.color = 'red';
        document.getElementById('dobError').style.fontWeight = '600';
        return false;
    }   
    else if(!yearValid){
        document.getElementById('dobError').innerHTML = "Not a valid Year inserted..";
        document.getElementById('dobError').style.color = 'red';
        document.getElementById('dobError').style.fontWeight = '600';
        return false;
    }
    else {
        document.getElementById('dobError').innerHTML = "";
        return true;
    }
}
function between(x, min, max) {
    return x >= min && x <= max;
}
function dobErrorRemover(){
    var value = dobValidation();
    if(dayValid && monthValid && yearValid){
        document.getElementById('genderError').innerHTML = "";
    }
}
function dobNullCheck(){
    if(document.getElementById('day').value != "" && document.getElementById('month').value != "" && document.getElementById('year').value != ""){
        document.getElementById('dobError').innerHTML = "";
        return true;
    }
    else if(dayValid && monthValid && yearValid){
        document.getElementById('dobError').innerHTML = "";
        return true;
    }
    else{
        document.getElementById('dobError').innerHTML = "Invalid Date..";
        return false;
    }
}

// FILE UPLOAD VALIDATION
function fileUploadValidation(){
    var fileUpload = document.getElementById('profile_picture').value;
    if(fileUpload.length == ""){
        document.getElementById('imgError').innerHTML= "Picture not selected";
        document.getElementById('imgError').style.color = 'red';
        document.getElementById('imgError').style.fontWeight = '600';
        return false;
    }
    else{
        document.getElementById('imgError').innerHTML= "";
        return true;
    }
}

// UPDATE PROFILE INFORMATION
function updateProfile(){
    var validData = validate();
    if(validData){
        var uid=document.getElementById('uid').value;
        var name = document.getElementById('name').value;
        var email = document.getElementById('email').value;
        var username = document.getElementById('username').value;
        var password = document.getElementById('password').value;
        var confirmPass = document.getElementById('confirm_password').value;
        var gender = genderPicked;
        var day = document.getElementById('day').value;
        var month = document.getElementById('month').value;
        var year = document.getElementById('year').value;
        var fileUpload = document.getElementById('profile_picture');
        var fileName = fileUpload.files[0].name; 
        var filePath = fileUpload.value;
        var balance = document.getElementById('balance').value;
        
        var xhttp = new XMLHttpRequest();
        xhttp.open('POST', '../../Php/admin_validations/profile_update_validation.php', true);
        xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhttp.send('id='+uid+'&name='+name+"&email="+email+"&username="+username+"&password="+password+"&confirmPass="+confirmPass+"&gender="+gender+"&day="+day+"&month="+month+"&year="+year+"&fileUpload="+fileName+"&filePath="+filePath+"&balance="+balance);
        
        xhttp.onreadystatechange = function (){
            if(this.readyState == 4 && this.status == 200){
                if(this.responseText != ""){
                    document.getElementById('msg').innerHTML = this.responseText;
                    if(this.responseText == "true"){
                        alert('Profile Updated successfully!');
                        window.location = "../../pages/admin_layouts/profile_details.php";
                    }
                    else{
                        alert('Profile not Updated successfully!'+this.responseText);
                        window.location = "../../pages/admin_layouts/profile_details.php";
                    }
                }else{
                    document.getElementById('msg').innerHTML = "Not Updated.";
                }
            }	
        }
        
    }
}

// RESET PASSWORD PAGE VALIDATIONS
function validatePassword(){
    var validPass = passwordValidation();
    var validConfirmPass = confirmPasswordValidation();
    
    if(validPass && validConfirmPass){
        var password = document.getElementById('password').value;
        var confirmPass = document.getElementById('confirm_password').value;
        var uid =   document.getElementById('uid').value;
        var xhttp = new XMLHttpRequest();
        xhttp.open('POST', '../common_php/change_password_validation.php', true);
        xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhttp.send("id"+uid+"&password="+password+"&confirm_password="+confirmPass);
        alert("id="+uid+"\n&password="+password+"\n&confirm_password="+confirmPass);
        
        xhttp.onreadystatechange = function (){
            if(this.readyState == 4 && this.status == 200){
                if(this.responseText != ""){
                    var responseText = this.responseText;
                    if(responseText == "1"){
                        alert('Password Updated successfully!');
                        window.location = "../common_pages/profile_details.php";
                    }
                    else{
                        alert('Password not Updated!\n'+this.responseText);
                        window.location = "../common_pages/profile_details.php";
                    }
                }
                else{
                    alert('Password not updated!\n'+this.responseText);
                }
            }
        }
    }
}