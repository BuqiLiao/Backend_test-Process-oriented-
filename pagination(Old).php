<?php

require 'connection.php';

date_default_timezone_set("America/Vancouver");

$count_sql = 'select * from user';

$result_1 = mysqli_query($conn, $count_sql);

$data = mysqli_fetch_assoc($result_1);

$count = mysqli_affected_rows($conn);

$page = isset($_GET['page']) ? (int) $_GET['page'] : 1;

$num = 1;

$total = ceil($count / $num);

if ($page <= 1) {
    $page = 1;
}
if ($page >= $total) {
    $page = $total;
}

$offset = ($page-1) * $num;

$sql = "select username,email,time from user order by time desc limit $offset,$num";

$result_2 = mysqli_query($conn, $sql);

$All = mysqli_fetch_all($result_2, MYSQLI_ASSOC);

// var_dump($All);

if ($result_2 and mysqli_num_rows($result_2)) {

    echo '<form action="delete.php" method="post">';
    echo '<table width="800" border="1">';

    while ($All = mysqli_fetch_assoc($result_2)) {

    echo '<tr>';
    echo '<td><input type="checkbox" name="username[]" value="'. $row['username'] .'" /></td>';
    echo '<td>' . $row['username'] . '</td>';
    echo '<td>' . date('Y-m-d H:i:s', $row['time']) . '</td>';
    echo '<td><a href="edit.php?username=' . $row['username'] . '">edit user</a></td>';
    echo '<td><a href="delete.php?username='. $row['username'] .'">delete user</a></td>';
    echo '</tr>';
    }

    echo '</table>';
    echo '<input type="submit" value="delete" />';
    echo '</form>';

    echo '<tr>
    <td colspan="5">
    <a href="page.php?page=1">Home</a>
    <a href="page.php?page=' . ($page - 1) . '">Previous</a>
    <a href="page.php?page=' . ($page + 1) . '">Next</a>  
    <a href="page.php?page=' . $total . '">Last Page</a>  
    page: ' . $page . '  Total:' . $total . '</td></tr>';
    echo '</table>';

}else{
echo 'no data';
echo mysqli_error($conn);

}
mysqli_close($conn);

?>