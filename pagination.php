<?php

require 'connection.php';

date_default_timezone_set("America/Vancouver");

$count_sql = 'select * from user';

$result_1 = mysqli_query($conn, $count_sql);

$count = mysqli_affected_rows($conn);

$page = isset($_GET['page']) ? (int) $_GET['page'] : 1;

$num = 2;

$total= ceil($count / $num);

if ($page <= 1) {
    $page = 1;
}
if ($page >= $total) {
    $page = $total;
}

$start = $page - 2;

if($page <= 4){
    $start = 1;
}
if($page >= $total-3){
    $start = $total-6;
}
if($total < 7){
    $start = 1;
}

$page_next = $page+1;

$offset = ($page-1) * $num;

$sql = "select * from user order by time desc limit $offset,$num";

$result_2 = mysqli_query($conn, $sql);

$All = mysqli_fetch_all($result_2, MYSQLI_ASSOC);

// var_dump($All);

if ($result_2 and mysqli_num_rows($result_2)) {
}else{

echo 'no data';
echo mysqli_error($conn);
}

//The function of showing the pagination bottons.
function pagination(){   
    global $total,$start,$page,$page_next;     
    if($total >= 7){
        for($i=$start;$i<=($start+7);$i++){
            if($page == $i){
                echo "<span>$i</span>";
            }elseif($i ==($start+6) and ($i-1) != ($total-1)){
                echo "<span>...</span>";
            }elseif($i ==($start+6) and ($i-1) == ($total-1)){
                continue;
            }elseif($i ==($start+7) and $page != $total){
                echo "<a href='?page=$total'>$total</a>";
            }elseif($i ==($start+7) and $page == $total){
                continue;
            }else{
                echo "<a href='?page=$i'>$i</a>";
            }
        }
    }else{
        for($i=$start;$i<=$total;$i++){
            if($page == $i){
                echo "<span>$i</span>";

            }else{
                echo "<a href='?page=$i'>$i</a>";
            }
        }
    }
    echo "<a href='?page=$page_next'>Next</a>";
}

mysqli_close($conn);

?>