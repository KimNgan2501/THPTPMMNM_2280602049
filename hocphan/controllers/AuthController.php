<?php
require_once './models/SinhVien.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


class AuthController
{
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $maSV = $_POST['MaSV'];
            $password = $_POST['Password'];
            $user = SinhVien::checkLogin($maSV, $password);
            if ($user) {
                $_SESSION['user'] = $user;
                header("Location: index.php?action=home");
                exit;
            } else {
                $error = "Sai tài khoản hoặc mật khẩu!";
                include './views/auth/login.php';
            }
        } else {
            include './views/auth/login.php';
        }
    }

    public function logout() {
        unset($_SESSION['user']);
        session_destroy();
        header("Location: index.php?action=login");
        exit;
    }
}