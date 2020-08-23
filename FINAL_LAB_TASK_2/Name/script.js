function validation(){
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

function remover(){
	document.getElementById('nameWarnigng').innerHTML = "";
	document.getElementById('2nd_error').innerHTML = "";
}

function blurText(){
	if(document.getElementById('name').value == ""){
		document.getElementById('nameWarnigng').innerHTML = "this field is required!";
	}
}
