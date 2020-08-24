function validation(){
	if(document.getElementById("ssc").checked == true){
		alert(document.getElementById("ssc").value.toUpperCase());
		return true;
    }
  	else if(document.getElementById("hsc").checked == true){
		alert(document.getElementById("hsc").value.toUpperCase());
		return true;
    }
    else if(document.getElementById("bsc").checked == true){
		alert(document.getElementById("bsc").value.toUpperCase());
		return true;
    }
    else{
		alert("No Item Selected");
		document.getElementById("warning").innerHTML = "No Item selected";
		return false;
    }
}

function remover(){
	document.getElementById('warning').innerHTML = "";
}

function blurText(){
	if(document.getElementById('ssc').checked == false){
		alert("this field is required!");
	}
	else if(document.getElementById('hsc').checked == false){
		alert("this field is required!");
	}
	else if(document.getElementById('bsc').checked == false){
		alert("this field is required!");
	}
}