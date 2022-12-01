<?php

require 'connection.php';

if($_POST['Change'] == 'Change'){
    //Check valid username.
    if (is_string($_POST['Username'])) {

        $Old_username = $_POST['Username'];

        $sql = "select username,password, from user where username ='$Old_username' ";

        $result = mysqli_query($conn, $sql);

        $data = mysqli_fetch_assoc($result);

        if($data){

            if (trim($_POST['new_password'])) {

                $new_password = $_POST['new_password'];

                if ($data['password'] == $new_password){

                    echo 'new password is same as the old one!';

                }else{

                    $sql = "update user set password='$new_password' where username = '$username'";

                    $result = mysqli_query($conn, $sql);

                    if ($result) {
                        echo 'Change successfully!';
                    }else{
                        echo 'Change unsuccessfully!';
                    }

                }

            }else{

                echo 'please input new password!';

            }

        }else{

            echo "Username does not exist!";
        }
    }else{

        echo "Please input valid username!";
    }
}


mysqli_close($conn);

?>