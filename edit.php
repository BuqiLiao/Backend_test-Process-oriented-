<?php

require 'connection.php';

$Old_username = $_GET['username'];

$Old_email = $_GET['email'];
?>

<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit User</title>
</head>

<body> 
    <div style="text-align:center; padding:auto;">
    <h2>User Management----Edit User</h2>
    <a href="List.php">Turn Back</a>
    </div>

    <table width="400" border="1" align="center" rules="all" cellpadding="10">
    <form method="POST" action="Update.php">
        <tr>
        <td>Old Username:</td>
        <td><input type="text" name="Old_Username" value="<?php echo $Old_username ?>"></td>
        </tr>
        <tr>
        <td>New Username:</td>
        <td><input type="text" name="New_Username"></td>
        </tr>
        <tr>
        <td>Old Email:</td>
        <td><input type="text" name="Old_Email" value="<?php echo $Old_email ?>"></td>
        </tr>
        <tr>
        <td>New Email:</td>
        <td><input type="text" name="New_Email"></td>
        </tr>
        <tr>
        <td>Old Password:</td>
        <td><input type="password" name="Old_Password"></td>
        </tr>
        <tr>
        <td>New Password:</td>
        <td><input type="text" name="New_Password"></td>
        </tr>
        <tr>
        <td></td>
        <td><input type="submit" name="Change" value="Change">
            <input type="reset" value="reset"></td>
        </tr>
    </form>
    </table>

</body>

</html>