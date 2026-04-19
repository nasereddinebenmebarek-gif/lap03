<?php
session_start();

$page = $_GET['page'] ?? 'login';

require_once "controllers/AuthController.php";

switch ($page) {
    case 'login':
        (new AuthController())->login();
        break;

    case 'logout':
        (new AuthController())->logout();
        break;

    default:
        echo "Page not found";
}
