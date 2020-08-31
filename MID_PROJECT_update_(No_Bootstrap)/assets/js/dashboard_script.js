function dropMenuAction(){
    document.getElementById('dropContent').style.visibility = 'visible';
}
function removeDropMenu(){
    document.getElementById('dropContent').style.display = 'none';
}

// LOAD CUSTOMER DATA
function countAllUser(){
    alert("Section Loading");
}

function loadS(){
    var name = "Customer";
    var xhttp = new XMLHttpRequest();
    xhttp.open('POST', '../../Php/customer_validations/customer_data.php', true);
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhttp.send('role='+name);

    xhttp.onreadystatechange = function (){
        if(this.readyState == 4 && this.status == 200){
            if(this.responseText != ""){
                document.getElementById('tbodyCustomer').innerHTML = this.responseText;
            }else{
                document.getElementById('tbodyCustomer').innerHTML = "";
            }
        }	
    }
    loadEmp();
    count();
}
function loadEmp(){
    var name = "Employee";
    var xhttp = new XMLHttpRequest();
    xhttp.open('POST', '../../Php/employee_validations/employee_data.php', true);
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhttp.send('role='+name);

    xhttp.onreadystatechange = function (){
        if(this.readyState == 4 && this.status == 200){
            if(this.responseText != ""){
                document.getElementById('tbodyEmp').innerHTML = this.responseText;
            }else{
                document.getElementById('tbodyEmp').innerHTML = "";
            }
        }	
    }
}

function count(){
    document.getElementById('cus_count').innerHTML = document.getElementById('cus_row').children.length;
    alert(document.getElementById('cus_row').children.length);
}

function viewCustomer(){
    window.location = "../../pages/customer_layouts/CustomerDetails.php";
}

// SEARCH
function searchData(){
    var type = document.getElementById('searchBy').value;
    if(type == "#"){
        return;
    }
    else if(type == "Customer"){
        var name = "Customer";
        var xhttp = new XMLHttpRequest();
        xhttp.open('POST', '../../Php/employee_validations/employee_data.php', true);
        xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhttp.send('role='+name);

        xhttp.onreadystatechange = function (){
            if(this.readyState == 4 && this.status == 200){
                if(this.responseText != ""){
                    document.getElementById('tbodyEmp').innerHTML = this.responseText;
                }else{
                    document.getElementById('tbodyEmp').innerHTML = "";
                }
            }	
        }
    }
    else if(type == "Employee"){
        var name = "Employee";
        var xhttp = new XMLHttpRequest();
        xhttp.open('POST', '../../Php/employee_validations/employee_data.php', true);
        xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhttp.send('role='+name);

        xhttp.onreadystatechange = function (){
            if(this.readyState == 4 && this.status == 200){
                if(this.responseText != ""){
                    document.getElementById('tbodyEmp').innerHTML = this.responseText;
                }else{
                    document.getElementById('tbodyEmp').innerHTML = "";
                }
            }	
        }
    }
    else if(type == "Food Menu"){
        var name = "Food Menu";
        var xhttp = new XMLHttpRequest();
        xhttp.open('POST', '../../Php/employee_validations/employee_data.php', true);
        xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhttp.send('role='+name);

        xhttp.onreadystatechange = function (){
            if(this.readyState == 4 && this.status == 200){
                if(this.responseText != ""){
                    document.getElementById('tbodyEmp').innerHTML = this.responseText;
                }else{
                    document.getElementById('tbodyEmp').innerHTML = "";
                }
            }	
        }
    }
}

function profileClickEvent(){
    var value = document.getElementById(event.target.id).innerHTML;
    if(value == "Logout"){
        window.location = "../../Php/logout.php";
    }
}



