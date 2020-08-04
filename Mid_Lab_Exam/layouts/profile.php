<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <style>
        table,tr,td{
            border-collapse: collapse;
            border: 2px solid black;
        }
    </style>
</head>
<body>
    <?php
        session_start();
        $file = fopen('../php/user.txt', 'r');
        $data = fread($file, filesize('../php/user.txt'));
        $user = explode('|', $data);
    ?>
    <table>
        <tr>
            <td colspan=2 style="text-align: center;">Profile</td>
        </tr>
        <tr>
            <td>Id </td>
            <td><?php echo $user[0]?></td>
        </tr>
        <tr>
            <td>Name </td>
            <td><?php echo $user[2]?></td>
        </tr>
        <tr>
            <td>Email </td>
            <td><?php echo $user[3]?></td>
        </tr>
        <tr>
            <td>User Type </td>
            <td><?php echo $user[4]?></td>
        </tr>
    </table>
</body>
</html>
