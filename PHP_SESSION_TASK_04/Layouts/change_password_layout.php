<fieldset>
    <legend><b>CHANGE PASSWORD</b></legend>
    <form action="../php/change_password.php" method="POST">
        <table>
            <tr>
                <td><font size="3">Current Password</font></td>
				<td>:</td>
                <td><input type="password" name="old_password"/></td>
                <td></td>
            </tr>
            <tr>
                <td><font size="3" color="green">New Password</font></td>
				<td>:</td>
                <td><input type="password" name="new_password"/></td>
                <td></td>
            </tr>
            <tr>
                <td><font size="3" color="red">Retype New Password</font></td>
				<td>:</td>
                <td><input type="password" name="retype_password"/></td>
                <td></td>
            </tr>
        </table>
        <hr />
        <input type="submit" value="Submit" name="submit"/>
        <?php
            session_start();
            if($_SESSION['update']=='OK'){
                echo "<h1>Password Updated...</h1>";
            }
        ?>
    </form>
</fieldset>