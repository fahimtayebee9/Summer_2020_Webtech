function validation(){
	var email = document.getElementById('email').value;
	var errorElement = document.getElementById('emailWarnigng');

	// 2. character check a-z, @ and .
	var val = stringCheck(email);
	
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
function stringCheck(email){
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

function remover(){
	document.getElementById('emailWarnigng').innerHTML = "";
	document.getElementById('2nd_error').innerHTML = "";
}

function blurText(){
	if(document.getElementById('email').value == ""){
		document.getElementById('emailWarnigng').innerHTML = "this field is required!";
	}
}
