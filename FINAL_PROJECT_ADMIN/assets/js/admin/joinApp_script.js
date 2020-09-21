function getAllApplication(page){
    var xhttp = new XMLHttpRequest();
    xhttp.open('POST', '../../../phpValidations/admin/admin_validations/admin_controller.php', true);
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhttp.send('getAll='+page);

    xhttp.onreadystatechange = function (){
        if(this.readyState == 4 && this.status == 200){
            if(this.responseText != ""){
                document.getElementById('applicationBody').innerHTML = this.responseText;
            }else{
                document.getElementById('applicationBody').innerHTML = "";
            }
        }	
    }
}

function getApplicationById(app_id){
    var xhttp = new XMLHttpRequest();
    xhttp.open('POST', '../../../phpValidations/admin/admin_validations/admin_controller.php', true);
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhttp.send('app_id='+app_id);

    xhttp.onreadystatechange = function (){
        if(this.readyState == 4 && this.status == 200){
            if(this.responseText != ""){
                var app_obj = JSON.parse(this.responseText);
                document.getElementById('name').innerHTML               = app_obj.name;
                document.getElementById('email').innerHTML              = app_obj.email;
                document.getElementById('position').innerHTML           = app_obj.position;
                document.getElementById('expected_salary').innerHTML    = "BDT."+app_obj.expected_salary;
                document.getElementById('cv_file').innerHTML            = app_obj.cv_file;
                document.getElementById('cv_fileLink').href             = "../../../assets/files/"+app_obj.cv_file;
            }else{
                document.getElementById('applicationBody').innerHTML = "";
            }
        }	
    }
}

function approveApplication(update_id){
    var xhttp = new XMLHttpRequest();
    xhttp.open('POST', '../../../phpValidations/admin/admin_validations/admin_controller.php', true);
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhttp.send('update_id='+update_id);

    xhttp.onreadystatechange = function (){
        if(this.readyState == 4 && this.status == 200){
            if(this.responseText != ""){
                if(this.responseText == "1"){
                    alert("Job Application Accepted..");
                    window.location = "../../../pages/admin/admin_layouts/notifications.php";
                }
            }else{
                alert(this.responseText);
                document.getElementById('applicationBody').innerHTML = "";
                window.location = "../../../pages/admin/admin_layouts/notifications.php";
            }
        }	
    }
}