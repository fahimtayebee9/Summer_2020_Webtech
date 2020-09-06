var valid = false;
function usernameValidate(){
    var username = document.getElementById('username').value;
    var passwor = document.getElementById('password').value;
    var author_name = document.getElementById('author_name').value;
    var contact_number = document.getElementById('contact').vlaue;
    if(username == ""){
        document.getElementById('errorMsgUsername').innerHTML = "username Can not be empty";
    }
    else{
        var xhttp = new XMLHttpRequest();
        xhttp.open('POST', '../php/usernameCheck.php', true);
        xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhttp.send('username='+username+"&");

        xhttp.onreadystatechange = function (){
            if(this.readyState == 4 && this.status == 200){

                if(this.responseText != ""){
                    if(this.responseText == "false"){
                        document.getElementById('errorMsg').innerHTML = "username Exists..";
                        document.getElementById('errorMsg').style.color = 'red';
                        valid = false;
                    }
                    else{
                        document.getElementById('errorMsg').innerHTML = "";
                        valid = true;
                    }
                }else{
                    document.getElementById('errorMsg').innerHTML = "";
                }
                
            }	
            else{
                document.getElementById('errorMsg').innerHTML = this.responseText;
            }
        }
    }
}

function submitForm(){
    if(valid){
        var email = document.getElementById('email').value;
        var username = document.getElementById('username').value;
        var password = document.getElementById('password').value;
        var xhttp = new XMLHttpRequest();
        xhttp.open('POST', '../php/regCheck.php', true);
        xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhttp.send('email='+email+"&username="+username+"&password="+password);

        xhttp.onreadystatechange = function (){
            if(this.readyState == 4 && this.status == 200){

                if(this.responseText != ""){
                    if(this.responseText == "true"){
                        document.getElementById('formError').innerHTML = "Registration Done";
                        document.getElementById('formError').style.color = 'Green';
                        document.getElementById('login').style.display = "inline";
                    }
                    else{ 
                        document.getElementById('formError').innerHTML = "Not Registered" + this.responseText;
                        document.getElementById('formError').style.color = 'red';
                    }
                }else{
                    document.getElementById('formError').innerHTML = "" + this.responseText;
                }
                
            }	
            else{
                document.getElementById('formError').innerHTML = this.responseText;
            }
        }
    }
    
}

function login(){

}
