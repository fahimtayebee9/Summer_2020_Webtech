function dropMenuAction(){
    document.getElementById('dropContent').style.visibility = 'visible';
}
function removeDropMenu(){
    document.getElementById('dropContent').style.display = 'none';
}

function loadData(){
    setEmployeeData();
    countAllUser();
    countAllEmployee();
    countAllFood();
    setCustomerData();
    setFoodMenuData();
}




// LOAD CUSTOMER DATA
function countAllUser(){
    var type = "Customer";
    var xhttp = new XMLHttpRequest();
    xhttp.open('POST', '../../../phpValidations/admin/other/dashBoard_data.php', true);
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhttp.send('userTypeCus='+type);

    xhttp.onreadystatechange = function (){
        if(this.readyState == 4 && this.status == 200){
            if(this.responseText != ""){
                document.getElementById('cus_count').innerHTML = this.responseText;
            }else{
                document.getElementById('cus_count').innerHTML = "";
            }
        }	
    }
}

function setCustomerData(){
    var getEmp = "Admin Home";
    var xhttp = new XMLHttpRequest();
    xhttp.open('POST', '../../../phpValidations/admin/other/dashBoard_data.php', true);
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhttp.send('getCustomer='+true);

    xhttp.onreadystatechange = function (){
        if(this.readyState == 4 && this.status == 200){
            if(this.responseText != ""){
                document.getElementById('tbodyCustomer').innerHTML = this.responseText;
            }else{
                document.getElementById('tbodyCustomer').innerHTML = "";
            }
        }	
    }
}

// LOAD EMP DATA
function countAllEmployee(){
    var role1 = "Employee";
    var xhttp = new XMLHttpRequest();
    xhttp.open('POST', '../../../phpValidations/admin/other/dashBoard_data.php', true);
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhttp.send('userTypeEmp='+role1);

    xhttp.onreadystatechange = function (){
        if(this.readyState == 4 && this.status == 200){
            if(this.responseText != ""){
                document.getElementById('emp_count').innerHTML = this.responseText;
            }else{
                document.getElementById('emp_count').innerHTML = "";
            }
        }	
    }
}

function setEmployeeData(){
    var getEmp = "Admin Home";
    var xhttp = new XMLHttpRequest();
    xhttp.open('POST', '../../../phpValidations/admin/other/dashBoard_data.php', true);
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhttp.send('getEmp='+getEmp);

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

// LOAD FOOD DATA
function countAllFood(){
    var submit = "true";
    var xhttp = new XMLHttpRequest();
    xhttp.open('POST', '../../../phpValidations/admin/other/dashBoard_data.php', true);
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhttp.send('submit='+submit);

    xhttp.onreadystatechange = function (){
        if(this.readyState == 4 && this.status == 200){
            if(this.responseText != ""){
                document.getElementById('item_count').innerHTML = this.responseText;
            }else{
                document.getElementById('item_count').innerHTML = "";
            }
        }	
    }
}

function setFoodMenuData(){
    var getMenu = "Admin Home";
    var xhttp = new XMLHttpRequest();
    xhttp.open('POST', '../../../phpValidations/admin/other/dashBoard_data.php', true);
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhttp.send('getMenu='+getMenu);

    xhttp.onreadystatechange = function (){
        if(this.readyState == 4 && this.status == 200){
            if(this.responseText != ""){
                document.getElementById('tbodyFood').innerHTML = this.responseText;
            }else{
                document.getElementById('tbodyFood').innerHTML = "";
            }
        }	
    }
}

function viewCustomer(){
    window.location = "../../pages/customer_layouts/CustomerDetails.php";
}

// SEARCH DATA
function search_data(){
    var type = document.getElementById('searchBy').value;
    if(type == "#"){
        return;
    }
    else{
        var value =  document.getElementById('search_box').value;
        if(value != "" && type != null){
            var xhttp = new XMLHttpRequest();
            xhttp.open('POST', '../../../phpValidations/admin/other/Search_Controller.php', true);
            xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xhttp.send('value='+value+"&type="+type);

            xhttp.onreadystatechange = function (){
                if(this.readyState == 4 && this.status == 200){
                    if(this.responseText != ""){
                        document.getElementById('search_result').innerHTML = this.responseText;
                        document.getElementById('search_result').style.display = "block";
                        var width = document.getElementById('search_box').offsetWidth;
                        document.getElementById('search_result').style.width = width+"px";
                    }else{
                        document.getElementById('search_result').innerHTML = "";
                        document.getElementById('search_result').style.display = "none";
                    }
                }	
            }
        }
        else{
            document.getElementById('search_result').style.display = "none";
            document.getElementById('search_result').innerHTML = "";
        }
        
    }
}

function viewData(){
    var value = document.getElementById(event.target.id).innerHTML;
    var elementId = event.target.id;
    var userId = elementId.split('-')[1];
    window.location = "../other/search_detail.php?userId="+userId;
}


// IN SEARCH DETAIL PAGE GET DATA
function getUserData(id){
    var xhttp = new XMLHttpRequest();
    xhttp.open('POST', '../../../phpValidations/admin/other/Search_Controller.php', true);
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhttp.send('userId='+id);
    xhttp.onreadystatechange = function (){
        if(this.readyState == 4 && this.status == 200){
            if(this.responseText != ""){
                var userData = JSON.parse(this.responseText);
                alert(this.responseText);
                document.getElementById('search_name').innerHTML = userData.name;
                document.getElementById('search_email').innerHTML = userData.email;
                document.getElementById('search_phone').innerHTML = userData.phone;
                document.getElementById('search_dob').innerHTML = userData.dateOfBirth;
                var src = "../../../uploads/"+userData.profile_picture;
                document.getElementById('pro_pic').setAttribute('src',src)
                document.getElementById('search_Status').innerHTML = userData.userType;
            }else{
                document.getElementById('search_name').innerHTML = "";
                document.getElementById('search_email').innerHTML = "";
                document.getElementById('search_phone').innerHTML = "";
                document.getElementById('search_dob').innerHTML = "";
                document.getElementById('search_picture').innerHTML = "";
                document.getElementById('search_Status').innerHTML = "";
            }
        }	
    }
}

function showSearchData(){
    
}