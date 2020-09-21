// VIEW PACKAGE 
function resetFilter_package(){
    this.loadPackagesList();
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
function addNewPackagee(form){
    var name = document.getElementById('name').value;
    var type = document.getElementById('add_type').value;
    var price = document.getElementById('price').value;

    var checkboxes_pkg = document.getElementsByName('facility');
    var selected_item = [];
    for (var i=0; i<checkboxes_pkg.length; i++) {
        if (checkboxes_pkg[i].checked) {
            selected_item.push(checkboxes_pkg[i].value);
        }
    }

    var facility = selected_item.toString().replaceAll(","," | ");
    var available = document.getElementById('available').value;

    var package_image = document.getElementById('package_imageUpload').files[0].name;

    if(Boolean(type) && Boolean(price) && Boolean(facility) && Boolean(name) && Boolean(available)){
        var obj = {
            'name': name, 
            'type': type, 
            'price': price, 
            'facility': facility, 
            'available': available,
            "pacakge_image" : package_image
        };
        var object = JSON.stringify(obj);
        
        var xhttp = new XMLHttpRequest();
        xhttp.open('POST', '../../../phpValidations/admin/admin_validations/package_data.php', true);
        xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhttp.send('addpackage='+object);
    
        xhttp.onreadystatechange = function (){
            if(this.readyState == 4 && this.status == 200){
                if(this.responseText != ""){
                    var upl = uploadFile(form);
                    if(upl){
                        alert("Package Added Successfully");
                    }
                    else{
                        alert("Package Added Successfully But image not uploaded");
                    }
                    window.location = "../../../pages/admin/other/package_details.php";
                    // if(this.responseText == 1){ 
                    //     var upl = uploadFile(form);
                    //     if(upl){
                    //         alert("Package Added Successfully");
                    //     }
                    //     else{
                    //         alert("Package Added Successfully But image not uploaded");
                    //     }
                    //     window.location = "../../../pages/admin/other/package_details.php";
                    // }
                    // else{
                    //     alert("Package Not Added..." + this.responseText);
                    //     window.location = "../../../pages/admin/other/package_details.php";
                    // }
                }else{
                    alert(this.responseText);
                    loadPackages();
                }
            }	
        }
    }
    else{
        alert("Please Insert All Informations...");
    }
    
}
function uploadFile(fileobj){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open("POST", "../../../phpValidations/admin/other/upload_file.php", true);
    xmlhttp.send(new FormData(fileobj));
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            if (xmlhttp.responseText != "") {
                alert("Uploaded");
                return true;
            }
            else{
                alert("Not Uploaded");
                return false;
            }
        }
    }
}


function loadPackagesList(){
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

function loadPackages(){
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
        }	
    }
}

function loadPackageById(package_id){
    var xhttp = new XMLHttpRequest();
    xhttp.open('POST', '../../../phpValidations/admin/admin_validations/package_data.php', true);
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhttp.send('package_id='+package_id);

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

// ADD NEW INPUT AREA
function changeImage(){
    var file = document.getElementById('package_imageUpload');
    document.getElementById('package_image').src = window.URL.createObjectURL(file.files[0]);
}