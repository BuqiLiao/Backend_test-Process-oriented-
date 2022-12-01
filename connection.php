<?php

require "config.php"; 

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PWD, DB_NAME);
if (mysqli_errno($conn)) {
    mysqli_error($conn);
    exit;
}
mysqli_set_charset($conn, DB_CHARSET);

?>