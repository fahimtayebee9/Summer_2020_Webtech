function getAllItems(){
    var xhttp = new XMLHttpRequest();
    xhttp.open('POST', '../../../phpValidations/admin/other/foodMenu_controller.php', true);
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhttp.send('getAll='+"true");

    xhttp.onreadystatechange = function (){
        if(this.readyState == 4 && this.status == 200){
            if(this.responseText != ""){
                document.getElementById('tbodyFood').innerHTML = this.responseText;
            }else{
                document.getElementById('tbodyFood').innerHTML = "";
            }
        }	
    }
    // getAllCustomerCount();
}

// GET ITEM BY ID
function getItem_byId(f_id){
    var xhttp = new XMLHttpRequest();
    xhttp.open('POST', '../../../phpValidations/admin/other/foodMenu_controller.php', true);
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhttp.send('f_id='+f_id);

    xhttp.onreadystatechange = function (){
        if(this.readyState == 4 && this.status == 200){
            if(this.responseText != ""){
                var item_obj = JSON.parse(this.responseText);
                document.getElementById('f_id').innerHTML = "Item No : " + item_obj.item_no + " Details";
                document.getElementById('item_name').innerHTML = item_obj.item_name;
                document.getElementById('price').innerHTML = item_obj.price;
                document.getElementById('category').innerHTML = item_obj.category;
                document.getElementById('ingredients').innerHTML = item_obj.ingradients;
                var imgPath = "../../../assets/images/foodMenu/"+item_obj.item_image;
                document.getElementById('item_image').src = imgPath;
            }else{
                document.getElementById('tbodyFood').innerHTML = "";
            }
        }	
    }
}