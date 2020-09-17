// GET DATA ON LOAD
function getAllCustomer(){
    var xhttp = new XMLHttpRequest();
    xhttp.open('POST', '../../../phpValidations/admin/other/customer_controller.php', true);
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhttp.send('getAll='+"true");

    xhttp.onreadystatechange = function (){
        if(this.readyState == 4 && this.status == 200){
            if(this.responseText != ""){
                document.getElementById('cusBody').innerHTML = this.responseText;
            }else{
                document.getElementById('cusBody').innerHTML = "";
            }
        }	
    }

    getAllCustomerCount();
}

// GET CUSTOMER COUNT
function getAllCustomerCount(){
    var xhttp = new XMLHttpRequest();
    xhttp.open('POST', '../../../phpValidations/admin/other/customer_controller.php', true);
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhttp.send('getCount='+"true");

    xhttp.onreadystatechange = function (){
        if(this.readyState == 4 && this.status == 200){
            if(this.responseText != ""){
                var countStr = this.responseText.split('-');
                document.getElementById('premium_count').innerHTML = countStr[0];
                document.getElementById('gold_count').innerHTML = countStr[1];
                document.getElementById('new_count').innerHTML = countStr[2];
            }else{
                document.getElementById('premium_count').innerHTML = 0;
                document.getElementById('gold_count').innerHTML = 0;
                document.getElementById('new_count').innerHTML = 0;
            }
        }	
    }
}

// Update CUSTOMER PAGE 
function getCustomerData(cus_id){
    var xhttp = new XMLHttpRequest();
    xhttp.open('POST', '../../../phpValidations/admin/other/customer_controller.php', true);
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhttp.send('cus_id='+cus_id);

    xhttp.onreadystatechange = function (){
        if(this.readyState == 4 && this.status == 200){
            if(this.responseText != ""){
                var customer = JSON.parse(this.responseText);
                validateData(customer);
                document.getElementById('fname').value = customer.name;
                document.getElementById('totalBookedRooms').value = customer.totalBookedRooms;
                document.getElementById('totalBookingAmount').value = customer.totalBookingAmount;
                document.getElementById('status').value = customer.position;
                document.getElementById('discount').value = customer.discount;
                document.getElementById('user_id').value = customer.user_id;
                var imgPath = "../../../uploads/"+customer.profile_picture;
                document.getElementById('userImg').src = imgPath;

            }else{
                document.getElementById('fname').value = "";
                document.getElementById('totalBookedRooms').value = "";
                document.getElementById('status').value = "";
                document.getElementById('discount').value = "";
                document.getElementById('user_id').value = "";
                document.getElementById('totalBookingAmount').value = "";
            }
        }	
    }
    
}

// CHECKING FOR CUSTOMER IF AVAILABLE TO GET DISCOUNT : 1. Booking Amount >= 20000 , 2. Total ROoms Booked >= 5 , 3. Status is Premium or Gold
function validateData(customer){
    var checkStatus = checkPosition(customer.position);
    var validAmount = checkAmount(customer.totalBookingAmount);
    var validBookingRoomCount = checkRoomCount(customer.totalBookedRooms);
    
    if(checkStatus && validAmount && validBookingRoomCount){
        document.getElementById('discount').disabled = false;
    }
    else{
        document.getElementById('discount').disabled = true;
        document.getElementById('discount').readOnly = true;
    }
}

function checkPosition(position){
    if(position == "Premium" || position == "Gold"){
        return true;
    }
    else{
        return false;
    }
}
function checkAmount(amount){
    if(amount >= 20000){
        return true;
    }
    else{
        return false;
    }
}
function checkRoomCount(count){
    if(count >= 5){
        return true;
    }
    else{
        return false;
    }
}

// REMOVE CUSTOMER
function removeCus(){
    var rmv_id = (event.target.id).split('-')[1];
    var confirmation = confirm("Are You Sure You want to remove this Customer?");
    if(confirmation){
        var xhttp = new XMLHttpRequest();
        xhttp.open('POST', '../../../phpValidations/admin/other/customer_controller.php', true);
        xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhttp.send('rmv_id='+rmv_id);

        xhttp.onreadystatechange = function (){
            if(this.readyState == 4 && this.status == 200){
                if(this.responseText != ""){
                    if(this.responseText == 1){
                        alert("Customer Removed...");
                        getAllCustomer();
                    }
                }else{
                    alert("Customer Not Removed...\n" + this.responseText);
                    getAllCustomer();
                }
            }	
        }
    }
}

// UPDATE CUSTOMER DATA
function updateCusData(update_id){
    var status = document.getElementById('status').value ;
    var discount = document.getElementById('discount').value ; 
    var xhttp = new XMLHttpRequest();
    xhttp.open('POST', '../../../phpValidations/admin/other/customer_controller.php', true);
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhttp.send('update_id='+update_id+"&status="+status+"&discount="+discount);

    xhttp.onreadystatechange = function (){
        if(this.readyState == 4 && this.status == 200){
            if(this.responseText != ""){
                if(this.responseText == 1){
                    alert("Customer Updated...");
                    window.location = "../../../pages/admin/customer_layouts/CustomerDetails.php";
                }
            }else{
                alert("Customer Not Updated...\n" + this.responseText);
                window.location = "../../../pages/admin/customer_layouts/CustomerDetails.php";
            }
        }	
    }
}

function filterCustomer(){
    var filter_type = document.getElementById('filterSelect').value;
    if(filter_type != "#"){
        var xhttp = new XMLHttpRequest();
        xhttp.open('POST', '../../../phpValidations/admin/other/customer_controller.php', true);
        xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhttp.send('filter_type='+filter_type);
    
        xhttp.onreadystatechange = function (){
            if(this.readyState == 4 && this.status == 200){
                if(this.responseText != ""){
                    document.getElementById('cusBody').innerHTML = this.responseText;
                }else{
                    document.getElementById('cusBody').innerHTML = "";
                }
            }	
        }
    }
    else{
        getAllCustomer();
    }
}

// LOAD RESERVATION DATA
function loadReservationData(){
    var str = "valid";
    var xhttp = new XMLHttpRequest();
    xhttp.open('POST', '../../../phpValidations/admin/other/customer_controller.php', true);
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhttp.send('getAllRev='+str);

    xhttp.onreadystatechange = function (){
        if(this.readyState == 4 && this.status == 200){
            if(this.responseText != ""){
                document.getElementById('revBody').innerHTML = this.responseText;
            }else{
                document.getElementById('revBody').innerHTML = "";
            }
        }	
    }
    getAllCustomerCount();
}

// GET RESERVATION BY DATE
function getReservationByDate(){
    var dateFrom = document.getElementById('revfrom').value;
    var dateTo = document.getElementById('revto').value;
    alert(dateFrom + "\n" + dateTo);
    if(dateFrom != null && dateTo != null){
        var xhttp = new XMLHttpRequest();
        xhttp.open('POST', '../../../phpValidations/admin/other/customer_controller.php', true);
        xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhttp.send('dateFrom='+dateFrom+"&dateTo="+dateTo);

        xhttp.onreadystatechange = function (){
            if(this.readyState == 4 && this.status == 200){
                if(this.responseText != ""){
                    document.getElementById('revBody').innerHTML = this.responseText;
                }else{
                    document.getElementById('revBody').innerHTML = "";
                }
            }	
        }
    }
}

function load_dataById(view_id){
    var xhttp = new XMLHttpRequest();
    xhttp.open('POST', '../../../phpValidations/admin/other/customer_controller.php', true);
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhttp.send('view_id='+view_id);

    xhttp.onreadystatechange = function (){
        if(this.readyState == 4 && this.status == 200){
            if(this.responseText != ""){
                var customer = JSON.parse(this.responseText);
                document.getElementById('name').innerHTML                = customer.name;
                document.getElementById('email').innerHTML               = customer.email;
                document.getElementById('dob').innerHTML                 = customer.dateOfBirth;
                document.getElementById('totalBooking').innerHTML        = customer.totalBookingAmount +" BDT";
                document.getElementById('totalReservation').innerHTML    = customer.totalBookedRooms;
                document.getElementById('discount').innerHTML            = customer.discount;
                document.getElementById('status').innerHTML              = customer.position;
                var imgPath = "../../../uploads/"+customer.profile_picture;
                document.getElementById('userImg').src = imgPath;
            }else{
                document.getElementById('name').innerHTML                = "";
                document.getElementById('email').innerHTML               = "";
                document.getElementById('dob').innerHTML                 = "";
                document.getElementById('totalBooking').innerHTML        = "";
                document.getElementById('totalReservation').innerHTML    = "";
                document.getElementById('discount').innerHTML            = "";
                document.getElementById('status').innerHTML              = "";
            }
        }	
    }
}