function loadPackage(){
    var getMenu = "Admin Home";
    var xhttp = new XMLHttpRequest();
    xhttp.open('POST', 'phpValidations/index_controller.php', true); 
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhttp.send('getPackageList='+getMenu);

    xhttp.onreadystatechange = function (){
        if(this.readyState == 4 && this.status == 200){
            if(this.responseText != ""){
                alert(this.status);
                document.getElementById('packages').innerHTML = this.responseText;
            }else{
                document.getElementById('packages').innerHTML = "";
            }
            alert(this.status);
        }	
        alert(this.status);
    }
}