var valid = false;
function usernameValidate(){
    var username = document.getElementById('username').value;
    if(username == ""){
        document.getElementById('errorMsgUsername').innerHTML = "username Can not be empty";
    }
    else{
        var xhttp = new XMLHttpRequest();
        xhttp.open('POST', '../php/usernameCheck.php', true);
        xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhttp.send('username='+username);

        xhttp.onreadystatechange = function (){
            if(this.readyState == 4 && this.status == 200){

                if(this.responseText != ""){
                    if(this.responseText == "false"){
                        document.getElementById('errorMsgUsername').innerHTML = "username Exists..";
                        document.getElementById('errorMsgUsername').style.color = 'red';
                        valid = false;
                    }
                    else{
                        document.getElementById('errorMsgUsername').innerHTML = "";
                        valid = true;
                    }
                }else{
                    document.getElementById('errorMsgUsername').innerHTML = "";
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
        var username = document.getElementById('username').value;
        var password = document.getElementById('password').value;
        var author_name = document.getElementById('author_name').value;
        var contact_number = document.getElementById('contact_number').vlaue;
        var xhttp = new XMLHttpRequest();
        xhttp.open('POST', '../php/regCheck.php', true);
        xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhttp.send('username='+username+"&password="+password+"&author_name="+author_name+"&contact_number="+contact_number);

        xhttp.onreadystatechange = function (){
            if(this.readyState == 4 && this.status == 200){

                if(this.responseText != ""){
                    if(this.responseText == "true"){
                        document.getElementById('formError').innerHTML = "Registration Done";
                        document.getElementById('formError').style.color = 'Green';
                        window.location = "home.php";
                    }
                    else{ 
                        document.getElementById('formError').innerHTML = "Not Registered\n" + this.responseText;
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

function search(){
    var name = document.getElementById('a_name').value;
    var xhttp = new XMLHttpRequest();
    xhttp.open('POST', '../php/search_data.php', true);
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhttp.send('name='+name);
    xhttp.onreadystatechange = function (){
        if(this.readyState == 4 && this.status == 200){
            if(this.responseText != ""){
                document.getElementById('searchdata').innerHTML = this.responseText;
            }else{
                document.getElementById('searchdata').innerHTML = "";
            }
        }	
    }
}
