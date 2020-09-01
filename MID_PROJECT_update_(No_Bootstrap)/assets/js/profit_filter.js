var year = null;
var month = null;
var curYear = new Date().getFullYear();
function get_yearlyProfit(){
    year = document.getElementById('year').value;
    if(year <= curYear){
        var xhttp = new XMLHttpRequest();
        xhttp.open('POST', '../../Php/profit_detail/profit_controller.php', true);
        xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhttp.send('year='+year);

        xhttp.onreadystatechange = function (){
            if(this.readyState == 4 && this.status == 200){
                if(this.responseText != ""){
                    //monthsObj = JSON.parse(this.responseText);
                    document.getElementById('profit_table').innerHTML = this.responseText;
                }else{
                    document.getElementById('searchdata').innerHTML = "";
                }
            }
        }
    }
    else{
        alert("Invalid");
    }
}

function get_monthlyProfit(){
    month = document.getElementById('month').value;
    if(year <= curYear){
        var xhttp = new XMLHttpRequest();
        xhttp.open('POST', '../../Php/profit_detail/profit_controller.php', true);
        xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhttp.send('year='+year+"&month="+month);

        xhttp.onreadystatechange = function (){
            if(this.readyState == 4 && this.status == 200){
                if(this.responseText != ""){
                    //monthsObj = JSON.parse(this.responseText);
                    document.getElementById('profit_table').innerHTML = this.responseText;
                }else{
                    document.getElementById('searchdata').innerHTML = "";
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
    xhttp.open('POST', '../../Php/profit_detail/profit_controller.php', true);
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhttp.send();

    xhttp.onreadystatechange = function (){
        if(this.readyState == 4 && this.status == 200){
            if(this.responseText != ""){
                //monthsObj = JSON.parse(this.responseText);
                document.getElementById('profit_table').innerHTML = this.responseText;
            }else{
                document.getElementById('searchdata').innerHTML = "";
            }
        }	
    }
}