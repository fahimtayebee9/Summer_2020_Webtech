function validation(){
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
	document.getElementById('warning').innerHTML = "";
}

function blurText(){
	if(document.getElementById("blood_group").value != "#" || document.getElementById("blood_group").value != ""){
		alert("Blood Group is required!");
	}
}