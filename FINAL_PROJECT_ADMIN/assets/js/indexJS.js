function loadPackage(page){
    if(page == 1){
        alert(page);
        var xhttp = new XMLHttpRequest();
        xhttp.open('POST', '../phpValidations/index_controller.php', true); 
        xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhttp.send('getPackageList='+page);
    
        xhttp.onreadystatechange = function (){
            if(this.readyState == 4 && this.status == 200){
                if(this.responseText != ""){
                    document.getElementById('packages').innerHTML = this.responseText;
                }else{
                    document.getElementById('packages').innerHTML = "";
                }
            }	
        }
    }
    else{
        var xhttp = new XMLHttpRequest();
        xhttp.open('POST', '../../phpValidations/index_controller.php', true); 
        xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhttp.send('getPackageList='+page);

        xhttp.onreadystatechange = function (){
            if(this.readyState == 4 && this.status == 200){
                if(this.responseText != ""){
                    document.getElementById('packages').innerHTML = this.responseText;
                }else{
                    document.getElementById('packages').innerHTML = "";
                }
            }	
        }
    }
}