<?php


$connect = mysqli_connect(hostname:'localhost',username:'root',password:'',database:'laravel');
mysqli_set_charset(mysql:$connect,charset:'utf8');

$sql = "select*from mon_an where name ='$mon'";
$result = mysqli_query(mysql: $connect, query:$sql);
$each = mysqli_fetch_array(result: $result);