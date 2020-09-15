// VIEW PACKAGE 
function viewButtonClick(){
    var packageId = (event.target.id).split('-')[1];
    alert(packageId);
    var xhttp = new XMLHttpRequest();
    xhttp.open('POST', '../../../phpValidations/admin/admin_validations/package_data.php', true);
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhttp.send('package_id='+packageId);

    xhttp.onreadystatechange = function (){
        if(this.readyState == 4 && this.status == 200){
            if(this.responseText != ""){
                document.getElementById('package_detailView').innerHTML = this.responseText;
            }else{
                document.getElementById('package_detailView').innerHTML = "";
            }
            alert(this.status);
        }	
        alert(this.responseText);
    }
}

// DELETE PACKAGE PERMANENTLY
function rejectButtonClick(){
    var packageId = (event.target.id).split('-')[1];
    var confirmText = confirm("Are you sure to remove?");
    if(confirmText){
        var xhttp = new XMLHttpRequest();
        xhttp.open('POST', '../../../phpValidations/admin/admin_validations/package_data.php', true);
        xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhttp.send('remove='+confirmText+"&id="+packageId);

        xhttp.onreadystatechange = function (){
            if(this.readyState == 4 && this.status == 200){
                if(this.responseText != ""){
                    alert(this.responseText);
                    loadPackages();
                }
            }
        }
    }
}

// EDIT PACKAGE 
function editButtonClick(){
    var url = document.URL;
    if(url.includes('?id=')){
        var packageId = url.split('?')[1].split('=')[1];
        var xhttp = new XMLHttpRequest();
        xhttp.open('POST', '../../../phpValidations/admin/admin_validations/package_data.php', true);
        xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhttp.send("id="+packageId);

        alert("id="+packageId);

        xhttp.onreadystatechange = function (){
            if(this.readyState == 4 && this.status == 200){
                if(this.responseText != ""){
                    document.getElementById('id').value = packageId;
                    var packageData = JSON.parse(this.responseText);
                    document.getElementById('nameEdit').value = packageData[0].name;
                    var sel = document.getElementById('available_edit');
                    for ( var i = 0, len = sel.options.length; i < len; i++ ) {
                        var opt = sel.options[i];
                        if ( opt.value == packageData[0].available ) {
                            opt.selected = 'selected';
                        }
                    }
                    document.getElementById('price_edit').value = packageData[0].price;
                    document.getElementById('facility_edit').value = packageData[0].facility;
                }else{
                    // alert(this.responseText);
                    // document.getElementById('package_detailView').innerHTML = "";
                }
            }
        }
    }
    else{
        window.location = "../../../pages/admin/other/package_details.php";
    }
}

// EDIT PACKAGE BUTTON PRESS
function editPackageData(){
    var id = document.getElementById('id').value;
    var type = document.getElementById('edit_type').value;
    var price = document.getElementById('price_edit').value;
    var facility = document.getElementById('facility_edit').value;
    var name = document.getElementById('name_edit').value;
    var available = document.getElementById('available_edit').value;
    
    var obj = {"id": id, "name": name, "type": type, "price":price, "facility":facility, "available": available};
    var packObj = JSON.stringify(obj);

    var xhttp = new XMLHttpRequest();
    xhttp.open('POST', '../../../phpValidations/admin/admin_validations/package_data.php', true);
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhttp.send('id='+id+"&name="+name+"&type="+type+"&facility="+facility+"&price="+price+"&available="+available+"&package_edit="+"true");

    alert(500);

    xhttp.onreadystatechange = function (){
        if(this.readyState == 4 && this.status == 200){
            if(this.responseText != ""){
                if(this.responseText == 1){
                    alert("Package Updated Successfully");
                    window.location = "../../../pages/admin/other/package_details.php";
                }
                else{
                    alert("Package Not Updated...");
                    var urlSet = "../../../pages/admin/other/edit_package.php?id="+id;
                    window.location = urlSet;
                }
            }else{
                alert(this.responseText);
                var urlSet = "../../../pages/admin/other/edit_package.php?id="+id;
                window.location = urlSet;
            }
        }	
        else{
            alert("Package Not Updated...");
            var urlSet = "../../../pages/admin/other/edit_package.php?id="+id;
            window.location = urlSet;
        }
    }
}

// ADD NEW PACKAGE USING AJAX AND JSON
function addNewPackagee(){
    var id = document.getElementById('id').value;
    var type = document.getElementById('add_type').value;
    var price = document.getElementById('price').value;
    var facility = document.getElementById('facility').value;
    var name = document.getElementById('name').value;
    var available = document.getElementById('available').value;
    alert(id + " | " + name + " | " + type + " | " + price + " | " + facility + " | " + available);
    if(type != "None" && price != null && facility != null && name != null){
        var obj = {
            'id': id,
            'name': name, 
            'type': type, 
            'price': price, 
            'facility': facility, 
            'available': available
        };
        var object = JSON.stringify(obj);
        
        var xhttp = new XMLHttpRequest();
        xhttp.open('POST', '../../../phpValidations/admin/admin_validations/package_data.php', true);
        xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhttp.send('addpackage='+object);
    
        xhttp.onreadystatechange = function (){
            if(this.readyState == 4 && this.status == 200){
                if(this.responseText != ""){
                    if(this.responseText == 1){
                        alert("Package Updated Successfully");
                        window.location = "../../../pages/admin/other/package_details.php";
                    }
                    else{
                        alert("Package Not Updated...");
                        window.location = "../../../pages/admin/other/package_details.php";
                    }
                }else{
                    loadPackages();
                }
            }	
        }
    }
    else{
        alert("Please Insert All Informations...");
    }
    
}

function loadPackages(){
    var url = document.URL;
    if(url.includes('?option=')){
        return;
    }
    else{
        var type = document.getElementById('package_type').value;
        var xhttp = new XMLHttpRequest();
        xhttp.open('POST', '../../../phpValidations/admin/admin_validations/package_data.php', true);
        xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhttp.send('package_type='+type);
    
        xhttp.onreadystatechange = function (){
            if(this.readyState == 4 && this.status == 200){
                if(this.responseText != ""){
                    document.getElementById('packageBody').innerHTML = this.responseText;
                }else{
                    document.getElementById('packageBody').innerHTML = "";
                }
            }	
        }
    }
    
}

function getData_byType(){
    var type = document.getElementById('package_type').value;
    var xhttp = new XMLHttpRequest();
    xhttp.open('POST', '../../../phpValidations/admin/admin_validations/package_data.php', true);
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhttp.send('package_type='+type);

    xhttp.onreadystatechange = function (){
        if(this.readyState == 4 && this.status == 200){
            if(this.responseText != ""){
                document.getElementById('packageBody').innerHTML = this.responseText;
            }else{
                document.getElementById('packageBody').innerHTML = "";
            }
            alert(this.status);
        }	
    }
}

// ADD NEW INPUT AREA
function add_input(){
    var element = document.getElementById('add_facilityArea');
    var count = element.getElementsByTagName('input').length;
    alert(count);
    count -= 1;
    var html = '<input type="text" name="mytext[]"/>';
    element.append(html);
}