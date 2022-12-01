<?php

require 'connection.php';

if($_POST['Change'] == 'Change'){
    //Check valid username.
    if (is_string($_POST['Old_Username'])) {

        $old_username = $_POST['Old_Username'];

        $sql = "select username,email,password from user where username ='$old_username' ";

        $result = mysqli_query($conn, $sql);

        $data = mysqli_fetch_assoc($result);

        if($data){

            if (trim($_POST['New_Username']) and trim($_POST['Old_Username'])) {

                $new_username = $_POST['New_Username'];

                if ($old_username == $new_username){

                    echo 'New username is same as the old one!';
                    echo '<br>';
                }else{

                    $sql_2 = "select username from user where username ='$new_username'";

                    $result_2 = mysqli_query($conn, $sql_2);

                    $repeat_user = mysqli_fetch_assoc($result_2);

                    if(!$repeat_user){

                        $sql = "update user set username='$new_username' where username = '$old_username'";

                        $result = mysqli_query($conn, $sql);

                        if ($result) {
                            echo 'Change username successfully!';
                            echo '<br>';
                        }else{
                            echo 'Change username unsuccessfully!';
                            echo '<br>';
                        }
                    }else{
                        echo "New username is already exist!";
                    }

                }

            }

            if (trim($_POST['New_Email'])) {

                $new_email = $_POST['New_Email'];

                if ($data['email'] == $new_email){

                    echo 'New email is same as the old one!';
                    echo '<br>';
                }else{

                    $sql = "update user set email='$new_email' where username = '$old_username'";

                    $result = mysqli_query($conn, $sql);

                    if ($result) {
                        echo 'Change email successfully!';
                        echo '<br>';
                    }else{
                        echo 'Change email unsuccessfully!';
                        echo '<br>';
                    }

                }

            }
            if(trim($_POST['New_Password'])){

                if (trim($_POST['Old_Password'])) {

                    $new_password = $_POST['New_Password'];

                    $old_password = $_POST['Old_Password'];

                    if($data['password'] == $old_password){

                        if ($data['password'] == $new_password){

                            echo 'New password is same as the old one!';
                            echo '<br>';
                        }else{

                            $sql = "update user set password='$new_password' where username = '$old_username'";

                            $result = mysqli_query($conn, $sql);

                            if ($result) {
                                echo 'Change password successfully!';
                                echo '<br>';
                            }else{
                                echo 'Change password unsuccessfully!';
                                echo '<br>';
                            }

                        }

                    }else{

                        echo "Please input correct old password!";
                    }

                }else{

                    echo "Please input old password first!";
                }
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