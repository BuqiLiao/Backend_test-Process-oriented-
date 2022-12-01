<?php

if(isset($_POST["submit"]) && $_POST["submit"] == "submit"){

    $user = trim($_POST["Username"]);

    $email= trim($_POST["Email"]);

    $psw = $_POST["Password"];

    if($user == "" || $psw == ""){  

        echo "<script>alert('Please complete your Adding form!'); history.go(-1);</script>";  

    }else{  

        include "connection.php";

        $sql = "select username from user where username = '$user'";  

        $result = mysqli_query($conn,$sql);

        $num = mysqli_num_rows($result);

        if($num){  

            echo "<script>alert('user is already exist, please readd.'); history.go(-1);</script>";  

        }else{  

            $time = time();

            $sql_insert = "insert into user (username,email,password,time) values('$user','$email','$psw','$time')";  

            $res_insert = mysqli_query($conn,$sql_insert);  

            if($res_insert){  

                echo "<script>alert('Add successfully!'); history.go(-1);</script>";  

            }else{  
  
                echo "<script>alert('System has errors, please try agin later.'); history.go(-1);</script>";  

            }  

        } 

    }  

}

@mysqli_close($conn);

?>


<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add User</title>
</head>

<body> 
    <div style="text-align:center; padding:auto;">
    <h2>User Management----Add User</h2>
    <a href="List.php">Turn Back</a>
    </div>

    <form method="POST" action="">
    <table width="400" border="1" align="center" rules="all" cellpadding="10">
    <tr>
    <td>Username:</td>
    <td><input type="text" name="Username"></td>
    </tr>
    <tr>
    <td>Email:</td>
    <td><input type="text" name="Email"></td>
    </tr>
    </tr>
    <tr>
    <td>Password:</td>
    <td><input type="password" name="Password"></td>
    </tr>
    <tr>
    <td></td>
    <td><input type="submit" name="submit" value="submit">
        <input type="reset" value="reset"></td>
    </tr>

</form>

</body>

</html>
