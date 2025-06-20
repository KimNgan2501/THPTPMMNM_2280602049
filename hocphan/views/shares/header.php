<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đăng ký học phần</title>

    <!-- Bootstrap 4 -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- Tùy chỉnh CSS -->
    <style>
        body {
            background-color: #f5f8fa;
        }

        .navbar-custom {
            background-color: #e3f2fd; /* xanh nhạt */
        }

        .navbar-custom .navbar-brand,
        .navbar-custom .nav-link {
            color: #0d47a1; /* xanh đậm */
            font-weight: 500;
        }

        .navbar-custom .nav-link:hover {
            background-color: #d6e9ff;
            border-radius: 4px;
        }

        .navbar-custom .nav-link i {
            margin-right: 5px;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-custom shadow-sm">
    <a class="navbar-brand" href="index.php?action=home"><i class="fas fa-book-reader"></i> Đăng ký học phần</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarMenu">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarMenu">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="index.php?action=home"><i class="fas fa-home"></i> Trang chủ</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?action=sinhvien"><i class="fas fa-user-graduate"></i> Sinh viên</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?action=giohang"><i class="fas fa-shopping-cart"></i> Giỏ hàng</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?action=logout"><i class="fas fa-sign-out-alt"></i> Đăng xuất</a>
            </li>
        </ul>
    </div>
</nav>

<!-- Nội dung bắt đầu -->
<div class="container mt-4">
