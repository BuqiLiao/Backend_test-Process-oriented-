<?php

$file = $_GET["f"];

$arr =[

    '9044e670c6a07cbcc9a0e84edbc7a29f' => ['Download_files/favicon_io.zip','favicon_io.zip'],

    'e1e1d3d40573127e9ee0480caf1283d6' => ['Download_files/R.png','R.png']
];

$handle = fopen($arr[$file][0],"rb");
//Tells the browser that the content type is an octet binary stream.
header("Content-Type:application/octet-stream");
//Tells the browser to conduct the downloading.
header("Content-Disposition:attachment;filename=".$arr[$file][1]);

while($str = fread($handle,1024)){

    echo $str;

}
?>