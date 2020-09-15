function rejectButtonClick(){
    var reject = confirm("Are You sure to reject?");
    if(reject){
        alert("Join Application Rejected...");
        // request to php
    }
    else{
        alert("Join Application Not Rejected...");
    }
}

function viewButtonClick(){
    window.location = "../../pages/admin_layouts/approve_request.php";
}

function loadData(){
    var xhttp = new XMLHttpRequest();
    xhttp.open('POST', '../../Php/admin_validations/get_joinRequest.php', true);
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhttp.send();
    
    xhttp.onreadystatechange = function (){
        if(this.readyState == 4 && this.status == 200){
            if(this.responseText != ""){
                var responseText = this.responseText.split('&');
                var len = 0;
                while(len < responseText.length){
                    document.getElementById('name').innerHTML = responseText[0];
                    document.getElementById('email').innerHTML = responseText[1];
                    document.getElementById('position').innerHTML = responseText[2];
                    document.getElementById('salary').innerHTML = responseText[3];
                    document.getElementById('resume').innerHTML = responseText[4];
                    len++;
                }
                alert(this.responseText + "\n" + this.responseText.length);
            }
            else{
                alert('Password not updated!\n'+this.responseText);
            }
        }	
        alert(this.responseText);
    }
}