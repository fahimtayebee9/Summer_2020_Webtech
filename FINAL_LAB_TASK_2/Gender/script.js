function validation(){
	if(document.getElementById("male").checked){
		alert(document.getElementById("male").value.toUpperCase());
		return true;
    }
  	else if(document.getElementById("female").checked){
		alert(document.getElementById("female").value.toUpperCase());
		return true;
    }
    else if(document.getElementById("other").checked){
		alert(document.getElementById("other").value.toUpperCase());
		return true;
    }
    else{
		alert("No Item Selected");
		document.getElementById("warning").innerHTML = "Not selected";
		return false;
    }
}

function remover(){
	document.getElementById('warning').innerHTML = "";
}

function blurText(){
	if(document.getElementById('male').checked == false){
		alert("this field is required!");
	}
	else if(document.getElementById('female').checked == false){
		alert("this field is required!");
	}
	else if(document.getElementById('other').checked == false){
		alert("this field is required!");
	}
}
