<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đăng nhập</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        body {
            background: linear-gradient(135deg, #dfe9f3, #ffffff);
            min-height: 100vh;
        }

        .login-box {
            max-width: 420px;
            margin: 80px auto;
            padding: 30px;
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        .login-box h2 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 20px;
        }

        .form-control::placeholder {
            color: #bbb;
        }

        .btn-custom {
            background-color: #3498db;
            color: white;
        }

        .btn-custom:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>

<div class="login-box">
    <h2><i class="fas fa-user-lock"></i> Đăng nhập hệ thống</h2>

    <?php if (!empty($error)): ?>
        <div class="alert alert-danger mt-3"><i class="fas fa-exclamation-circle"></i> <?= $error ?></div>
    <?php endif; ?>

    <form method="post" class="mt-4">
        <div class="form-group">
            <label for="MaSV"><i class="fas fa-id-card"></i> Mã sinh viên</label>
            <input type="text" class="form-control" id="MaSV" name="MaSV" placeholder="Nhập mã sinh viên" required>
        </div>

        <div class="form-group">
            <label for="Password"><i class="fas fa-key"></i> Mật khẩu</label>
            <input type="password" class="form-control" id="Password" name="Password" placeholder="Nhập mật khẩu" required>
        </div>

        <button type="submit" class="btn btn-custom btn-block"><i class="fas fa-sign-in-alt"></i> Đăng nhập</button>
    </form>
</div>

<!-- Optional JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
