<div class="fixed-area" >
    <div class="heading-area">
        <img src="../../../assets/images/logo.png" class="logoimg" alt="Logo HMSP">
    </div>
    <div class="menu-list">
        <ul>
            <li class="menu-li"></i><a class="menu-title" href="../admin_layouts/admin_home.php"></i>DashBoard</a></li>
            <li class="menu-li">
                <a class="menu-title" href="../employee_layouts/Employee.php" >Employee Details</a>
                <ul class="submenu-ul">
                    <li class="menu-li"><a href="../employee_layouts/addEmployee.php">Add Employee</a></li>
                    <li class="menu-li"><a href="../employee_layouts/UpdateEmp.php" onclick="checkId()">Update Employee</a></li>
                </ul>
            </li>
            <li class="menu-li">
                <a class="menu-title cusMenu" id="cusMenu" href="../customer_layouts/CustomerDetails.php">Customer Details</a>
                <ul class="submenu-ul">
                    <li class="menu-li"><a href="../customer_layouts/CustomerReservationInfo.php">Customer Reservations</a></li>
                    <li class="menu-li"><a href="../customer_layouts/Update_Customer.php">Update Customer</a></li>
                </ul>
            </li>
            <li class="menu-li">
                <a class="menu-title" href="../food_item_layouts/Food_Menu.php">Food Menu</a>
                <ul class="submenu-ul">
                    <li class="menu-li"><a href="../food_item_layouts/Add_Food_Item.php">Add Food Items</a></li>
                    <li class="menu-li"><a href="../food_item_layouts/Update_Food_Item.php">Update Food Items</a></li>
                </ul>
            </li>
            <li class="menu-li">
                <a class="menu-title" href="../profit_details/profit_details.php">Profit Details</a>
            </li>
            <li class="menu-li">
                <a class="menu-title" href="../other/package_details.php">Package Details</a>
            </li>
            <li class="menu-li">
                <a class="menu-title" href="../admin_layouts/notifications.php">Join Requests</a>
            </li>
            <li class="menu-li">
                <a class="menu-title" href="../food_item_layouts/manageInventories.php">Manage Inventories</a>
            </li>
            <li class="menu-li">
                <a class="menu-title" href="../../../common_php/logout.php">Logout</a>
            </li>
        </ul>
    </div>
</div>