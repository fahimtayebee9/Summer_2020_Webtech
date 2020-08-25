function validation(){
	if(document.getElementById("user_id").value == "" || document.getElementById("user_id").value == null){							 // Empty Input Check for User ID
		alert("User Name can not be Empty");
		return false;
    }
  	else if(document.getElementById("profile_picture").value == null || document.getElementById("profile_picture").value == ""){		 // Empty Input Check for Profile Picture
		alert("Profile Picture can not be Empty");
		return false;
    }
    else if(document.getElementById("user_id").value <= 0){ 		 // Negative Input Check for User ID
		alert("User Name can not be Negative");
		return false;
    }
    else{
		alert("User ID : "+document.getElementById("user_id").value + "\nProfile Picture : " + document.getElementById("profile_picture").value);
		return true;
    }
}

function remover(){
	document.getElementById('warning').innerHTML = "";
}

function blurText(){
	if(document.getElementById('user_id').value == ""){
		document.getElementById('warning').innerHTML = "User Id is required...";
	}
	else if(document.getElementById('profile_picture').value == ""){
		document.getElementById('warning').innerHTML = "Profile picture is required.";
	}
}