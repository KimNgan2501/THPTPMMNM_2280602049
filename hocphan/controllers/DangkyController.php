<?php
require_once './models/HocPhan.php';
require_once './models/DangKy.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

class DangkyController
{
    // Thêm học phần vào giỏ hoặc hiển thị giỏ
    public function giohang() {
        // Nếu có dữ liệu POST (tức là thêm học phần vào giỏ)
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['MaHP'])) {
            $maHP = $_POST['MaHP'];

            // Khởi tạo giỏ nếu chưa có
            if (!isset($_SESSION['cart'])) {
                $_SESSION['cart'] = [];
            }

            // Tránh thêm trùng
            if (!in_array($maHP, $_SESSION['cart'])) {
                $_SESSION['cart'][] = $maHP;
            }

            // Quay lại danh sách học phần
            header("Location: index.php?action=hocphan");
            exit;
        }

        // Nếu chỉ truy cập trang xem giỏ
        $cart = $_SESSION['cart'] ?? [];
        include './views/dangky/giohang.php';
    }

    // Xoá 1 học phần khỏi giỏ hàng
    public function xoaHP() {
        $maHP = $_GET['id'] ?? null;
        if ($maHP && isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array_filter($_SESSION['cart'], function($item) use ($maHP) {
                return $item !== $maHP;
            });
        }
        header("Location: index.php?action=giohang");
    }

    // Xoá toàn bộ giỏ hàng
    public function xoaAll() {
        unset($_SESSION['cart']);
        header("Location: index.php?action=giohang");
    }

    // Lưu đăng ký vào CSDL
    public function luu() {
        if (!isset($_SESSION['user'])) {
            header("Location: index.php?action=login");
            exit;
        }

        $user = $_SESSION['user'];
        $maSV = $user['MaSV'];
        $cart = $_SESSION['cart'] ?? [];

        if (empty($cart)) {
            header("Location: index.php?action=giohang");
            exit;
        }

        $maDK = DangKy::taoPhieuDangKy($maSV);

        foreach ($cart as $maHP) {
            DangKy::themChiTiet($maDK, $maHP);
            HocPhan::giamSoLuong($maHP);
        }

        unset($_SESSION['cart']);
        $_SESSION['success'] = true;

        header("Location: index.php?action=ketqua");
    }

    // Hiển thị kết quả đã đăng ký
    public function ketqua() {
        if (!isset($_SESSION['user'])) {
            header("Location: index.php?action=login");
            exit;
        }

        $user = $_SESSION['user'];
        $result = DangKy::getBySinhVien($user['MaSV']);
        include './views/dangky/ketqua.php';
    }
}