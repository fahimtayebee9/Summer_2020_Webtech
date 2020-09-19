var year = null;
var month = null;
var curYear = new Date().getFullYear();
function get_yearlyProfit(){
    year = document.getElementById('set_year').value;
    if(year <= curYear && year != null || year != "#"){
        document.getElementById('month').removeAttribute("disabled");
        set_availableMonths(year);
        var xhttp = new XMLHttpRequest();
        xhttp.open('POST', '../../../phpValidations/admin/profit_detail/profit_controller.php', true);
        xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhttp.send('yearly_profit='+year);

        xhttp.onreadystatechange = function (){
            if(this.readyState == 4 && this.status == 200){
                if(this.responseText != ""){
                    var mainStr = this.responseText.split('-');
                    document.getElementById('thead_profit').innerHTML = mainStr[0];
                    document.getElementById('tbody_profit').innerHTML = mainStr[1];
                }else{
                    document.getElementById('tbody_profit').innerHTML = "";
                }
            }
        }
    }
    else if(year == null || year == "#"){
        document.getElementById('month').setAttribute("disabled", "disabled");
    }
}

function resetFilter(){
    document.getElementById('set_year').value = "";
    document.getElementById('month').setAttribute("disabled", "disabled");
    get_Profit();
}

function get_monthlyProfit(){
    year = document.getElementById('set_year').value;
    month = document.getElementById('month').value;
    if(year <= curYear){
        var xhttp = new XMLHttpRequest();
        xhttp.open('POST', '../../../phpValidations/admin/profit_detail/profit_controller.php', true);
        xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhttp.send('year='+year+"&month="+month);
        
        xhttp.onreadystatechange = function (){
            if(this.readyState == 4 && this.status == 200){
                if(this.responseText != ""){
                    var mainStr = this.responseText.split('-');
                    document.getElementById('thead_profit').innerHTML = mainStr[0];
                    document.getElementById('tbody_profit').innerHTML = mainStr[1];
                }else{
                    document.getElementById('thead_profit').innerHTML = "NO DATA FOUND";
                    document.getElementById('tbody_profit').innerHTML = "";
                }
            }	
        }
    }
    else{
        alert("Invalid");
    }
}

function get_Profit(){
    var xhttp = new XMLHttpRequest();
    xhttp.open('POST', '../../../phpValidations/admin/profit_detail/profit_controller.php', true);
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhttp.send("getAll="+true);
    document.getElementById('title_header').innerHTML = "All Profits Details";
    xhttp.onreadystatechange = function (){
        if(this.readyState == 4 && this.status == 200){
            if(this.responseText != ""){
                var mainStr = this.responseText.split('-');
                document.getElementById('thead_profit').innerHTML = mainStr[0];
                document.getElementById('tbody_profit').innerHTML = mainStr[1];
            }else{
                document.getElementById('thead_profit').innerHTML = mainStr[0];
                document.getElementById('tbody_profit').innerHTML = "";
            }
        }	
    }
    get_availableYear();
}

function get_availableYear(){
    var xhttp = new XMLHttpRequest();
    xhttp.open('POST', '../../../phpValidations/admin/profit_detail/profit_controller.php', true);
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhttp.send("getYearList="+true);

    xhttp.onreadystatechange = function (){
        if(this.readyState == 4 && this.status == 200){
            if(this.responseText != ""){
                document.getElementById('set_year').innerHTML = this.responseText;
            }else{
                document.getElementById('set_year').innerHTML = "";
            }
        }	
    }
}

function hide(){
    document.getElementById('search_result').style.display = "none";
}

function set_availableMonths(year){
    var xhttp = new XMLHttpRequest();
    xhttp.open('POST', '../../../phpValidations/admin/profit_detail/profit_controller.php', true);
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhttp.send("setMonthList="+true+"&year_val="+year);

    xhttp.onreadystatechange = function (){
        if(this.readyState == 4 && this.status == 200){
            if(this.responseText != ""){
                document.getElementById('month').innerHTML = this.responseText;
            }else{
                document.getElementById('month').innerHTML = "";
            }
        }	
    }
}