<?php

$connect = mysqli_connect(hostname: 'localhost', username: 'root', password: '', database: 'laravel');
mysqli_set_charset(mysql: $connect, charset: 'utf8');

$sql = "select*from mon_an";
$result = mysqli_query(mysql: $connect, query: $sql);

switch ($action) {
    case '':
        $sql = "select*from mon_an";
        $result = mysqli_query(mysql: $connect, query: $sql);
        break;
    case 'store':
        $sql = "insert into mon_an(name)
     values ('$name')";
        mysqli_query(mysql: $connect, query: $sql);
        break;
    case 'edit':
        $sql = "select*from mon_an where id='$id'";
        $result = mysqli_query(mysql: $connect, query: $sql);
        $each = mysqli_fetch_array(result:$result);
        break;
    case 'update':
        $sql = "update mon_an set name='$name' where id='$id'";
        mysqli_query(mysql: $connect, query: $sql);
   
        break;
    case 'delete':
        $sql = "delete from mon_an where id='$id'";
        mysqli_query(mysql: $connect, query: $sql);
        break;
    default:
        echo 'Not case';
        break;
}
