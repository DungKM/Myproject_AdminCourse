<?php


require_once 'model/connect.php';

function class_select_all()
{
    $connect =  connect();
    $sql = "select*from class";
    $result = mysqli_query(mysql: $connect, query: $sql);
    mysqli_close(mysql: $connect);
    return $result;
}
function class_insert($name)
{
    $connect =  connect();
    $sql = "insert into class (name)
    value ('$name')";
    mysqli_query(mysql: $connect, query: $sql);
    mysqli_close(mysql: $connect);
  
}
function class_show_edit($id){
    $connect =  connect();
    $sql = "select*from class where id = '$id'";
    $result = mysqli_query(mysql: $connect, query: $sql);
    $each = mysqli_fetch_array(result: $result);

    mysqli_close(mysql: $connect);
    return $each;

}
function update_class($id, $name){
    $connect =  connect();
    $sql = "update class set name='$name'  where id = '$id'";
    mysqli_query(mysql: $connect, query: $sql);
    mysqli_close(mysql: $connect);
}
function delete_class($id){
    $connect = connect();
    $sql = "delete from class where id='$id'";
    mysqli_query(mysql: $connect, query: $sql);
    mysqli_close(mysql: $connect);
}


