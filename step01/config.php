<?php
$pdo = new PDO("mysql:host=localhost;dbname=gpa_system", "root", "");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

function requireRole($role) {
    session_start();

    if (!isset($_SESSION['role']) || time() - $_SESSION['last_activity'] > 1800) {
        session_destroy();
        header("Location: ?page=login");
        exit;
    }

    if ($_SESSION['role'] != $role) {
        http_response_code(403);
        echo "Access Denied";
        exit;
    }

    $_SESSION['last_activity'] = time();
}
