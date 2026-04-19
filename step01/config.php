<?php
$pdo = new PDO("mysql:host=localhost;dbname=gpa_db", "root", "");

function requireRole($role) {
    session_start();

    if (!isset($_SESSION['role'])) {
        header("Location: index.php?page=login");
        exit;
    }

    if ($_SESSION['role'] != $role) {
        echo "Access Denied";
        exit;
    }
}
?>
