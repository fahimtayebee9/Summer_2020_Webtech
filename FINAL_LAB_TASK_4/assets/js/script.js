function emailValidate(){
    var email = document.getElementById('email').value;
    if(email == ""){
        document.getElementById('errorMsg').innerHTML = "Email Can not be empty";
    }
    else{
        var xhttp = new XMLHttpRequest();
        xhttp.open('POST', '../php/emailCheck.php', true);
        xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhttp.send('email='+email);

        xhttp.onreadystatechange = function (){
            if(this.readyState == 4 && this.status == 200){

                if(this.responseText != ""){
                    if(this.responseText == "false"){
                        document.getElementById('errorMsg').innerHTML = "Email Exists..";
                        document.getElementById('errorMsg').style.color = 'red';
                    }
                    else{
                        document.getElementById('errorMsg').innerHTML = "";
                    }
                    document.getElementById('searchdata').innerHTML = this.responseText;
                }else{
                    document.getElementById('searchdata').innerHTML = "";
                }
                
            }	
            else{
                document.getElementById('errorMsg').innerHTML = this.responseText;
            }
        }
    }
}