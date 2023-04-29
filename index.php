<?php

$controller =$_GET['controller'] ?? '';
$action = $_GET['action'] ?? '';


switch ($controller) {
    case '':
        require 'controller/root.php';
        break;
    case 'class':
        require 'controller/class.php';
        break;
    case 'student':
        require 'controller/student.php';
        break;
    default:
        echo "Không tìm thấy phù hợp";
        break;
}
