function validation(){
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
		alert(dayElement.value + " / " + monthElement.value + " / " + yearElement.value);
		return true;
	}
}

function remover(){
	document.getElementById('warning').innerHTML = "";
}

function blurText(){
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