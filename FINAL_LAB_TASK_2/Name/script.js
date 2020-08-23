function validation(){
	var name = document.getElementById('name').value;
	var errorElement = document.getElementById('nameWarnigng');
	if(name == "" || name == null){
		errorElement.innerHTML = "Name can't left empty";
		return false;
	}
	else if(name.split(" ").length < 2){
		document.getElementById('nameWarnigng').innerHTML = "Name must be atleast 2 words";
		return false;
	}else{
		return true;
	}
	
function remover(){
	document.getElementById('nameWarnigng').innerHTML = "";
}

function blurText(){
	if(document.getElementById('name').value == ""){
		document.getElementById('nameWarnigng').innerHTML = "this field is required!";
	}
}
