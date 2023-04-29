<?php

switch ($action) {
    case '':
        require 'model/class.php';
        $result = class_select_all();
        require 'view/class/index.php';
        break;
    case 'create':
        require 'view/class/create.php';
        break;
    case 'store':
        $name = $_POST['name'];
        require 'model/class.php';
        class_insert($name);
        header('location:index.php?controller=class');
        break;
    case 'edit':
        $id = $_GET['id'];
        require 'model/class.php';
        $each = class_show_edit($id);
        require 'view/class/edit.php';
        break;
    case 'update':
        $id = $_POST['id'];
        $name = $_POST['name'];
        require 'model/class.php';
        update_class($id, $name);
        header('location:index.php?controller=class');
        break;
    case 'delete':
        $id = $_GET['id'];
        require 'model/class.php';
        delete_class($id);
        header('location:index.php?controller=class');
    default:
        echo "Not action";
        break;
}
