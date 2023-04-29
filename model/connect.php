<?php
function connect (){
    $connect = mysqli_connect(hostname: 'localhost', username: 'root', password: '', database: 'laravel');
    mysqli_set_charset(mysql: $connect, charset: 'utf8');
    
     return $connect;
}

