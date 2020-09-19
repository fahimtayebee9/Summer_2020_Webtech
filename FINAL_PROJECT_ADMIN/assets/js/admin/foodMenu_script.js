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
function getItem_byId(f_id,page){
    if(page == "update"){
        var xhttp = new XMLHttpRequest();
        xhttp.open('POST', '../../../phpValidations/admin/other/foodMenu_controller.php', true);
        xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhttp.send('f_id='+f_id);
    
        xhttp.onreadystatechange = function (){
            if(this.readyState == 4 && this.status == 200){
                if(this.responseText != ""){
                    var item_obj = JSON.parse(this.responseText);
                    document.getElementById('item_title').innerHTML = "Update Menu Item : " + item_obj.item_no;
                    document.getElementById('id').value = item_obj.id;
                    document.getElementById('item_no').value = item_obj.item_no;
                    document.getElementById('item_name').value = item_obj.item_name;
                    document.getElementById('price').value = item_obj.price;
                    document.getElementById('item_category').value = item_obj.category;
                    var imgPath = "../../../assets/images/foodMenu/"+item_obj.item_image;
                    document.getElementById('item_image_upload').src = imgPath;
                    document.getElementById('item_image_change').value = item_obj.item_image;
                }else{
                    window.location = "../../../pages/admin/food_item_layouts/Food_Menu.php";
                }
            }	
        }
    }
    else{
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
                    window.location = "../../../pages/admin/fooditem_layouts/Food_Menu.php";
                }
            }	
        }
    }
    
}

// CHANGE IMAGE ON SELECT
function changeImage(){
    var file = document.getElementById('item_image_change');
    document.getElementById('item_image_upload').src = window.URL.createObjectURL(file.files[0]);
}

// UPPDATE DATA
function updateItemData(){
    var checkboxes = document.getElementsByName('ingradient');
    var selected = [];
    for (var i=0; i<checkboxes.length; i++) {
        if (checkboxes[i].checked) {
            var str = checkboxes[i].value;
            selected.push(str);
        }
    }
    var dataX = selected.toString();
    var ingradients = dataX.replaceAll(","," | ");
    var item_name = document.getElementById('item_name').value;
    var item_no = document.getElementById('item_no').value;
    var price = document.getElementById('price').value;
    var category =document.getElementById('item_category').value;
    var id = document.getElementById('id').value;
    var item_image = document.getElementById('item_image_change').value;
    if(ingradients != null && (item_name != null || item_name !="") && (price != null || price != "") && category!= "#" ){
        var food_item = {
            "item_name" : item_name,
            "item_no" : item_no,
            "price" : price,
            "category" : category,
            "id" : id,
            "item_image" : item_image,
            "ingradients" : ingradients,
        }
        var food_item_obj = JSON.stringify(food_item);
        var xhttp = new XMLHttpRequest();
        xhttp.open('POST', '../../../phpValidations/admin/other/foodMenu_controller.php', true);
        xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhttp.send('food_item='+food_item_obj);
    
        xhttp.onreadystatechange = function (){
            if(this.readyState == 4 && this.status == 200){
                if(this.responseText != ""){
                    if(this.responseText == 1 ){
                        alert("Item Updated");
                        window.location = "../../../pages/admin/food_item_layouts/Food_Menu.php";
                    }
                    else{
                        alert("Item Not Updated..\n" + this.responseText);
                        window.location = "../../../pages/admin/food_item_layouts/Food_Menu.php";
                    }
                }else{
                    window.location = "../../../pages/admin/food_item_layouts/Food_Menu.php";
                }
            }	
        }
    }
    else{
        alert("Insert All Information");
    }
}

// REMOVE FOOD ITEM
function removeItem(rmv_id){
    var confirmation = confirm("Are You Sure You want to remove?");
    if(confirmation){
        var xhttp = new XMLHttpRequest();
        xhttp.open('POST', '../../../phpValidations/admin/other/foodMenu_controller.php', true);
        xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhttp.send('rmv_id='+rmv_id);

        xhttp.onreadystatechange = function (){
            if(this.readyState == 4 && this.status == 200){
                if(this.responseText != ""){
                    if(this.responseText == 1 ){
                        alert("Item Removed Successfully");
                        window.location = "../../../pages/admin/food_item_layouts/Food_Menu.php";
                    }
                    else{
                        alert("Item Not Updated..\n" + this.responseText);
                        window.location = "../../../pages/admin/food_item_layouts/Food_Menu.php";
                    }
                }else{
                    window.location = "../../../pages/admin/food_item_layouts/Food_Menu.php";
                }
            }	
        }
    }
}

// ADD NEW ITEM
function getItemNo(){
    var item_no = "";
    var xhttp = new XMLHttpRequest();
    xhttp.open('POST', '../../../phpValidations/admin/other/foodMenu_controller.php', true);
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhttp.send('getItemNo='+true);

    xhttp.onreadystatechange = function (){
        if(this.readyState == 4 && this.status == 200){
            if(this.responseText != ""){
                document.getElementById('item_no').value = this.responseText;
            }else{
                document.getElementById('item_no').value = "";
            }
        }	
    }
}

function addNew_item(){
    var item_no = document.getElementById('item_no').value;
    var item_name = document.getElementById('item_name').value;
    var price = document.getElementById('price').value;
    var category = document.getElementById('item_category').value;
    var checkboxes_ing = document.getElementsByName('ingradient');
    var selected_item = [];
    for (var i=0; i<checkboxes_ing.length; i++) {
        if (checkboxes_ing[i].checked) {
            var str = checkboxes_ing[i].value;
            selected_item.push(str);
        }
    }
    var selected_item_str = selected_item.toString();
    var ingradients = selected_item_str.replaceAll(","," | ");
    var item_image = document.getElementById('item_image_change').files[0].name;
    var img_tmp = document.getElementById('item_image_change').value;
    
    if(Boolean(item_no) && Boolean(item_name) && Boolean(price) && Boolean(category) && Boolean(ingradients)&& Boolean(item_image)){
        var item_add = {
            "item_no" : item_no,
            "item_name" : item_name,
            "price" : price,
            "category" : category,
            "ingradients" : ingradients,
            "item_image" : item_image,
            "img_tmp" : img_tmp
        }
        var item_addObj = JSON.stringify(item_add);

        var xhttp = new XMLHttpRequest();
        xhttp.open('POST', '../../../phpValidations/admin/other/foodMenu_controller.php', true);
        xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhttp.send('new_item='+item_addObj);
        
        xhttp.onreadystatechange = function (){
            if(this.readyState == 4 && this.status == 200){
                if(this.responseText != ""){
                    if(this.responseText ==  1){
                        var option = confirm("Item Added Successfully.\nDo you want to add another item or View Items List ?");
                        if(option){
                            window.location = "../../../pages/admin/food_item_layouts/Add_Food_Item.php";
                        }
                        else{
                            // getAllItems();
                            window.location = "../../../pages/admin/food_item_layouts/Food_Menu.php";
                        }
                    }
                    else{
                        alert(this.responseText);
                    }
                }else{
                    alert(this.responseText);
                    alert("Item not Added..\n" + this.responseText);
                }
            }	
        }
    }
    else{
        alert("Insert All Informations");
    }
    
}

// FILTER MENU LIST
function filterItems(){
    var type = document.getElementById('filter_type').value;
    if(Boolean(type)){
        var xhttp = new XMLHttpRequest();
        xhttp.open('POST', '../../../phpValidations/admin/other/foodMenu_controller.php', true);
        xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhttp.send('filter_type='+type);

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
}