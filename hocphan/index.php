<?php
// Bắt đầu session (chỉ khi chưa có)
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Kết nối CSDL
require_once './config/database.php';

// Tự động load class controller, model...
spl_autoload_register(function ($class) {
    $paths = [
        'controllers/',
        'models/',
        'config/'
    ];
    foreach ($paths as $path) {
        $file = $path . $class . '.php';
        if (file_exists($file)) {
            require_once $file;
            return;
        }
    }
});

// Mặc định: nếu đã đăng nhập thì vào trang chủ, chưa thì vào login
$action = $_GET['action'] ?? (isset($_SESSION['user']) ? 'home' : 'login');

try {
    switch ($action) {
        // Đăng nhập / đăng xuất
        case 'login':
            (new AuthController())->login();
            break;
        case 'logout':
            (new AuthController())->logout();
            break;

        // Trang chủ (danh sách học phần)
        case 'home':
            if (!isset($_SESSION['user'])) {
                header('Location: index.php?action=login');
                exit;
            }
            (new HocphanController())->index();
            break;

        // Học phần
        case 'hocphan':
            (new HocphanController())->index();
            break;

        // Giỏ hàng học phần
        case 'giohang':
            (new DangkyController())->giohang();
            break;
        case 'xoaHP':
            (new DangkyController())->xoaHP();
            break;
        case 'xoaAll':
            (new DangkyController())->xoaAll();
            break;

        // Lưu đăng ký học phần
        case 'luu':
            (new DangkyController())->luu();
            break;
        case 'ketqua':
            (new DangkyController())->ketqua();
            break;

        // CRUD sinh viên
        case 'sinhvien':
            (new SinhVienController())->index();
            break;
        case 'sinhvien_create':
            (new SinhVienController())->create();
            break;
        case 'sinhvien_edit':
            (new SinhVienController())->edit();
            break;
        case 'sinhvien_delete':
            (new SinhVienController())->delete();
            break;
        case 'sinhvien_detail':
            (new SinhVienController())->detail();
            break;

        // Mặc định: 404
        default:
            throw new Exception("404 Not Found", 404);
    }
} catch (Exception $e) {
    http_response_code($e->getCode() ?: 500);
    echo "<h2>Error: " . $e->getMessage() . "</h2>";
    error_log($e->getMessage());
}
