<?php

$action = '';
if (isset($_GET['action'])) {
    $action = $_GET['action'];
}

switch ($action) {
    case '':
        require 'model.php';
        require 'view/index.php';
        break;
    case 'create':
        require 'view/create.php';
        break;
    case 'store':
        $name = $_POST['name'];
        require 'model.php';
        header('location: index.php');
        break;
    case 'edit':
        $id = $_GET['id'];
        require 'model.php';
        require 'view/edit.php';
        break;
    case 'update':
        $id = $_POST['id'];
        $name = $_POST['name'];
        require 'model.php';
        header('location: index.php');
        break;
    case 'delete':
        $id = $_GET['id'];
        require 'model.php';
        header('location: index.php');
        break;
    
    default:
        echo 'Not case';
        break;
}

mysqli_close( mysql: $connect);