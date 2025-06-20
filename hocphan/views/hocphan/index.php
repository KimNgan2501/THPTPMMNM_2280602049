<?php include './views/shares/header.php'; ?>

<div class="container mt-4">
    <h2 class="text-center text-primary mb-4">
        <i class="fas fa-book"></i> Danh sách học phần
    </h2>

    <table class="table table-bordered table-hover bg-white shadow-sm">
        <thead class="thead-light">
            <tr class="text-center">
                <th>Mã học phần</th>
                <th>Tên học phần</th>
                <th>Số tín chỉ</th>
                <th>Đăng ký</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($hocphans as $hp): ?>
            <tr class="text-center">
                <td><?= htmlspecialchars($hp['MaHP']) ?></td>
                <td class="text-left"><?= htmlspecialchars($hp['TenHP']) ?></td>
                <td><?= $hp['SoTinChi'] ?></td>
                <td>
                    <a href="index.php?action=giohang&id=<?= $hp['MaHP'] ?>" class="btn btn-success btn-sm">
                        <i class="fas fa-cart-plus"></i> Thêm
                    </a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="text-center mt-4">
        <a href="index.php?action=giohang" class="btn btn-primary btn-lg">
            <i class="fas fa-shopping-cart"></i> Xem giỏ hàng
        </a>
    </div>
</div>

<?php include './views/shares/footer.php'; ?>
