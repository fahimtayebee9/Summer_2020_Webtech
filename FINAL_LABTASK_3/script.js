function validation(){
    var nameValidation = nameValidation();
    var emailValidation = emailValidation();
    var genderValidation = genderValidation();
    var bloodGroupValidation = bloodGroupValidation();
    var dateOfBirthValidation = dateOfBirthValidation();
    var degreValidation = degreValidation();
    var profilePictureValidation = profilePictureValidation();

    if(nameValidation == true && emailValidation  == true && genderValidation  == true && bloodGroupValidation   == true && dateOfBirthValidation  == true && degreValidation  == true && profilePictureValidation  == true){
        alert('Valid Data');
        return true;
    }
    else{
        if(!nameValidation){
            alert('Name Invalid');
        }
        else if(!emailValidation){
            alert('Email Invalid');
        }
        else if(!genderValidation){
            alert('Gender Invalid');
        }
        else if(!bloodGroupValidation){
            alert('Blood Group Invalid');
        }   
        else if(!dateOfBirthValidation){
            alert('Date Of Birth Invalid');
        }
        else if(!degreValidation){
            alert('Degree Invalid');
        }
        else if(!profilePictureValidation){
            alert('Profile Picture Invalid');
        }
        else{
            alert("Not valid");
        }
        return false;
    }
    
}

// Gender Validation
function genderValidation(){
    if(document.getElementById("male").checked){
        return true;
    }
    else if(document.getElementById("female").checked){
        return true;
    }
    else if(document.getElementById("other").checked){
        return true;
    }
    else{
        alert("No Item Selected");
        document.getElementById("genderWarning").innerHTML = "Not selected";
        return false;
    }
}
function g_remover(){
    if(document.getElementById('male').checked){
		document.getElementById("genderWarning").innerHTML = "";
	}
	else if(document.getElementById('female').checked){
		document.getElementById("genderWarning").innerHTML = "";
	}
	else if(document.getElementById('other').checked){
		document.getElementById("genderWarning").innerHTML = "";
    }
}

function genderBlurText(){
	if(!document.getElementById('male').checked){
		document.getElementById("genderWarning").innerHTML = "Gender Not selected";
	}
	else if(!document.getElementById('female').checked){
		document.getElementById("genderWarning").innerHTML = "Gender Not selected";
	}
	else if(!document.getElementById('other').checked){
		document.getElementById("genderWarning").innerHTML = "Gender Not selected";
	}
}

// Name validation
function nameValidation(){
    var name = document.getElementById('name').value;
	var errorElement = document.getElementById('nameWarnigng');

	// 2. Word count
	var count = wordCountCheck(name);

	// 3. character check a-z,A-Z,- and .
	var val = stringCheck(name);

	// 4. first character check
	var charVal = charCheck(name);
	
	// 1. Empty check
	if(name == "" || name == null){
		errorElement.innerHTML = "Name can't left empty";
		return false;
	}
	else if(!count || !charVal || !val){
		document.getElementById('nameWarnigng').innerHTML = "Not a valid Name";
		return false;
	}
	else{
		return true;
	}
}
function stringCheck(name){
	var output = name.split('');
	for(var x =0; x< output.length; x++){
		if(output[x] >= '0' || output[x] <= '9'){
			document.getElementById('2nd_error').innerHTML = "Name can contain a-z or A-Z or (-) or (.)....";
			return false;
		}
		else if(output[x] >= 'a' || output[x] >= 'A' || output[x] <= 'Z' || output[x] <= 'z' || output[x] == '.' || output[x] == '-'){
			return true;
		}	
		else{
			document.getElementById('2nd_error').innerHTML = "Name can contain a-z or A-Z or (-) or (.)....";
			return false;
		}
	}
}
function charCheck(){
	if(name.charAt(0) >= 'a' || name.charAt(0) >= 'A' || name.charAt(0) <= 'Z' || name.charAt(0) <= 'z'){
		return true;
	}	
	else{
		document.getElementById('2nd_error').innerHTML = "Must start with a letter....";
		return false;
	}
}
function wordCountCheck(name){
	if(name.split(" ").length < 2){
		document.getElementById('2nd_error').innerHTML = "Name must be atleast 2 words";
		return false;
	}
	else{
		return true;
	}
}

function nameRemover(){
	document.getElementById('nameWarnigng').innerHTML = "";
	document.getElementById('2nd_error').innerHTML = "";
}

function nameBlurText(){
	if(document.getElementById('name').value == ""){
		document.getElementById('nameWarnigng').innerHTML = "this field is required!";
	}
}

// Email Validation FUnctions
function emailValidation(){
	var email = document.getElementById('email').value;
	var errorElement = document.getElementById('emailWarnigng');

	// 2. character check a-z, @ and .
	var val = emailCheck(email);
	
	// 1. Empty check
	if(email == "" || email == null){
		errorElement.innerHTML = "email can't left empty";
		return false;
	}
	else if(!val){
		document.getElementById('emailWarnigng').innerHTML = "Not a valid email";
		return false;
	}
	else{
		return true;
	}
}
function emailCheck(email){
	var output = email.split('');
	for(var x =0; x< output.length; x++){
		if(output[x] >= 'a' || output[x] <= 'z' || output[x] == '.' || output[x] == '@'){
			return true;
		}	
		else{
			document.getElementById('2nd_error').innerHTML = "email can contain a-z or  (@) or (.)....";
			return false;
		}
	}
}

function emailremover(){
	document.getElementById('emailWarnigng').innerHTML = "";
	document.getElementById('2nd_error').innerHTML = "";
}

function emailBlurText(){
	if(document.getElementById('email').value == ""){
		document.getElementById('emailWarnigng').innerHTML = "Email field is required!";
	}
}

// DEgree Validation
function degreeValidation(){
    var ssc = document.getElementById("ssc").checked;
    var hsc = document.getElementById("hsc").checked;
    var bsc = document.getElementById("bsc").checked;
	if(ssc == 'true'){
		return true;
    }
  	else if(hsc == 'true'){
		return true;
    }
    else if(bsc == 'true'){
		return true;
    }
    else{
		document.getElementById("deg_warning").innerHTML = "No Item selected";
		return false;
    }
}

function deg_remover(){
	document.getElementById('deg_warning').innerHTML = "";
}

function degreeblurText(){
    var ssc = document.getElementById("ssc").checked;
    var hsc = document.getElementById("hsc").checked;
    var bsc = document.getElementById("bsc").checked;
	if(document.getElementById('ssc').checked == 'false'){
		alert("Degree field is required!");
	}
	else if(document.getElementById('hsc').checked  == 'false'){
		alert("Degree field is required!");
	}
	else if(document.getElementById('bsc').checked  == 'false'){
		alert("Degree field is required!");
	}
}


// DATE OF BIRTH
function dateOfBirthValidation(){
	var dayElement = document.getElementById('day');
	var monthElement = document.getElementById('month');
	var yearElement = document.getElementById('year');

	if(dayElement.value == "" || monthElement.value == "" || yearElement.value ==""){
		  alert("Invalid Date");
		  return false;
    }
  	else if(dayElement.value < 1 || dayElement.value > 31 ){ //Checking Day Value from 0-31
		alert("Day Must Be with in 0-31");
		dayElement.value = 0;
		return false;
    }
    else if(monthElement.value < 1 || dayElement.value > 12 ){ //Checking Month Value from 1-12
		alert("Month  Must Be with in 1-12");
		monthElement.value = 0;
		return false;
    }
    else if(yearElement.value < 1900 || yearElement.value > 2016 ){ //Checking Day Value from 1900-2016
		alert("Year Must Be with in 1900-2016");
		yearElement.value = 0;
		return false;
	}
	else{
		return true;
	}
}

function remover(){
	document.getElementById('warning').innerHTML = "";
}

function dateblurText(){
	if(document.getElementById('day').value == ""){
		document.getElementById('warning').innerHTML = "Day field is required!";
	}
	else if(document.getElementById('month').value ==""){
		document.getElementById('warning').innerHTML = "Month field is required!";
	}
	else if(document.getElementById('year').value == ""){
		document.getElementById('warning').innerHTML = "Year field is required!";
	}
}

// Blood Group
function bloodGroupValidation(){
	if(document.getElementById("blood_group").value == "#" || document.getElementById("blood_group").value == ""){
		alert("No Item selected");
		return false;
    }
    else{
		alert("Blood Group is " + document.getElementById('blood_group').value);
		return true;
    }
}

function remover(){
	document.getElementById('blood_group_warning').innerHTML = "";
}

function bloodblurText(){
	if(document.getElementById("blood_group").value == "#" || document.getElementById("blood_group").value == ""){
		document.getElementById('blood_group_warning').innerHTML = "Blood Group Not Selected";
	}
}

// Profile Picture
function profilePictureValidation(){
  	if(document.getElementById("profile_picture").value == null || document.getElementById("profile_picture").value == ""){		 // Empty Input Check for Profile Picture
		alert("Profile Picture can not be Empty");
		return false;
    }
    else{
		alert("Profile Picture : " + document.getElementById("profile_picture").value);
		return true;
    }
}

function remover(){
	document.getElementById('pic_warning').innerHTML = "";
}

function pictureblurText(){
	if(document.getElementById('profile_picture').value == ""){
		document.getElementById('pic_warning').innerHTML = "Profile picture is required.";
	}
}