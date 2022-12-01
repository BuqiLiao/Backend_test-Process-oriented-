<?php

require 'connection.php';

if($_POST['Change'] == 'Change'){

    if (is_string($_POST['username'])) {

        $username = $_POST['username'];

        $sql = "select username from user where username ='$username' ";

        $result = mysqli_query($conn, $sql);

        $data = mysqli_fetch_assoc($result);

        if($data){

            if (trim($_POST['new_username'])) {

                $new_username = $_POST['new_username'];

                if ($data['username'] == $new_username){

                    echo 'new username is same as the old one!';

                }else{

                    $sql = "update user set username='$new_username' where username = '$username'";

                    $result = mysqli_query($conn, $sql);

                    if ($result) {
                        echo 'Change successfully!';
                    }else{
                        echo 'Change unsuccessfully!';
                    }

                }

            }else{

                echo "Please input new username!";
            }

        }else{

            echo "Username does not exist!";
        }
    }else{

        echo "Please input valid username!";
    }
}

?>

?>