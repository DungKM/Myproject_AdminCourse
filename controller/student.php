<?php


switch ($action) {
    case '':
        require 'model/student.php';
        $result = student_select_all();
        require 'view/student/index.php';
        break;
    case 'create':
        require 'model/class.php';
        $class = class_select_all();
        require 'view/student/create.php';
        break;
    case 'store':
        $name = $_POST['name'];
        $id_class = $_POST['id_class'];
        require 'model/student.php';
        student_insert($name, $id_class);
        header('location:index.php?controller=student');
        break;
    case 'edit':
        $id = $_GET['id'];
        require 'model/student.php';
        require 'model/class.php';
        $each = student_show_edit($id);
        $class = class_select_all();
        require 'view/student/edit.php';
        break;
    case 'update':
        $id = $_POST['id'];
        $name = $_POST['name'];
        $id_class = $_POST['id_class'];
        require 'model/student.php';
        update_student($id, $name,$id_class);
        header('location:index.php?controller=student');
        break;
    case 'delete':
        $id = $_GET['id'];
        require 'model/student.php';
        delete_student($id);
        header('location:index.php?controller=student');
    default:
        echo "Not action";
        break;
}
