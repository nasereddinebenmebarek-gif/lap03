<?php
require_once "controllers/AuthController.php";
require_once "controllers/AdminController.php";

$page = $_GET['page'] ?? 'login';

switch($page) {

    case 'login':
        (new AuthController())->login();
        break;

    case 'admin':
    case 'admin.dashboard':
        (new AdminController())->dashboard();
        break;

    case 'admin.semesters':
        (new AdminController())->semesters();
        break;

    case 'admin.saveSemester':
        (new AdminController())->saveSemester();
        break;

    case 'admin.courses':
        (new AdminController())->courses();
        break;

    case 'admin.saveCourse':
        (new AdminController())->saveCourse();
        break;

    default:
        echo "Page not found";
}
