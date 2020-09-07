function login_validation(){
    var email = document.getElementById('email').nodeValue;
    var password = document.getElementById('password').nodeValue;
    var submit = document.getElementById('submit').value;
    
    if((email != null || email != "") && (password != null || password != "")){
        var xhttp = new XMLHttpRequest();
        xhttp.open('POST', '../common_php/Login_validation.php', true);
        xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhttp.send("email="+email+"&password="+password+"&submit="+submit);
        
        xhttp.onreadystatechange = function (){
            if(this.readyState == 4 && this.status == 200){
                if(this.responseText != ""){
                    if(this.responseText == "true"){
                        window.location = "../pages/admin/admin_home.php";
                    }
                    else{
                        document.getElementById('error').innerHTML = "Invalid Information..";
                        document.getElementById('error').style.color = 'red';
                        window.location = "../common_pages/login.php";
                    }
                }
            }	
        }
    }
}

function emailCheck(){

}