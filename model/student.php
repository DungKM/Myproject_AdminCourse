<?php


require_once 'model/connect.php';


function student_select_all()
{
    $connect =  connect();
    $sql = "select
    student.*,
    l.name as class_name
    from student 
    left join class l on student.id_class = l.id";
   
    $result = mysqli_query(mysql: $connect, query: $sql);
    mysqli_close(mysql: $connect);
    return $result;
}
function student_insert($name, $id_class)
{
    $connect =  connect();
    $sql = "insert into student (name, id_class)
    value ('$name','$id_class')";
    mysqli_query(mysql: $connect, query: $sql);
    mysqli_close(mysql: $connect);
  
}
function student_show_edit($id){
    $connect =  connect();
    $sql = "select*from student where id = '$id'";
    $result = mysqli_query(mysql: $connect, query: $sql);
    $each = mysqli_fetch_array(result: $result);

    mysqli_close(mysql: $connect);
    return $each;

}
function update_student($id, $name, $id_class){
    $connect =  connect();
    $sql = "update student set name='$name', id_class='$id_class'  where id = '$id'";
    mysqli_query(mysql: $connect, query: $sql);
    mysqli_close(mysql: $connect);
}
function delete_student($id){
    $connect = connect();
    $sql = "delete from student where id='$id'";
    mysqli_query(mysql: $connect, query: $sql);
    mysqli_close(mysql: $connect);
}


