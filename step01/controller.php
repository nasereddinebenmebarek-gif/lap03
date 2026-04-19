<?php
require_once "models/User.php";

class AuthController {

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $email = $_POST['email'];
            $password = $_POST['password'];

            $user = User::findByEmail($email);

            if ($user && password_verify($password, $user['password'])) {

                session_start();
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['role'] = $user['role'];
                $_SESSION['name'] = $user['name'];
                $_SESSION['last_activity'] = time();

                if ($user['role'] == 'admin') {
                    header("Location: ?page=admin.dashboard");
                } elseif ($user['role'] == 'professor') {
                    header("Location: ?page=professor.grades");
                } else {
                    header("Location: ?page=student.dashboard");
                }

            } else {
                echo "Invalid email or password";
            }

        } else {
            include "views/login.php";
        }
    }

    public function logout() {
        session_start();
        session_destroy();
        header("Location: ?page=login");
    }
}
