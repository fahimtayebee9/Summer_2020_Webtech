function get_yearlyProfit(){
    var year = document.getElementById('year').value;
    var curYear = new Date().getFullYear();
    if(year <= curYear){
        alert("valid");
    }
    else{
        alert("Invalid");
    }
}

function get_monthlyProfit(){
    var year = document.getElementById('year').value;
    var curYear = new Date().getFullYear();
    if(year <= curYear){
        alert("valid");
    }
    else{
        alert("Invalid");
    }
}