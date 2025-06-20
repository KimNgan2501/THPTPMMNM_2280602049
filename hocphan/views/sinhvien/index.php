<?php include './views/shares/header.php'; ?>

<div class="mt-4">
    <h2 class="text-primary text-center mb-4">
        <i class="fas fa-users"></i> Danh sách sinh viên
    </h2>

    <div class="mb-3 text-right">
        <a href="index.php?action=sinhvien_create" class="btn btn-success">
            <i class="fas fa-user-plus"></i> Thêm sinh viên
        </a>
    </div>

    <table class="table table-bordered table-hover bg-white shadow-sm">
        <thead class="thead-dark text-center">
            <tr>
                <th>Mã SV</th>
                <th>Họ tên</th>
                <th>Giới tính</th>
                <th>Ngày sinh</th>
                <th>Ngành</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($sinhviens as $sv): ?>
            <tr class="text-center">
                <td><?= htmlspecialchars($sv['MaSV']) ?></td>
                <td class="text-left"><?= htmlspecialchars($sv['HoTen']) ?></td>
                <td><?= $sv['GioiTinh'] ?></td>
                <td><?= date('d/m/Y', strtotime($sv['NgaySinh'])) ?></td>
                <td><?= $sv['MaNganh'] ?></td>
                <td>
                    <a href="index.php?action=sinhvien_detail&id=<?= $sv['MaSV'] ?>" class="btn btn-info btn-sm">
                        <i class="fas fa-eye"></i>
                    </a>
                    <a href="index.php?action=sinhvien_edit&id=<?= $sv['MaSV'] ?>" class="btn btn-warning btn-sm">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a href="index.php?action=sinhvien_delete&id=<?= $sv['MaSV'] ?>" class="btn btn-danger btn-sm"
                       onclick="return confirm('Xoá sinh viên?')">
                        <i class="fas fa-trash-alt"></i>
                    </a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- Phân trang -->
    <nav class="d-flex justify-content-center">
        <ul class="pagination">
            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                <li class="page-item<?= $i == ($_GET['page'] ?? 1) ? ' active' : '' ?>">
                    <a class="page-link" href="index.php?action=sinhvien&page=<?= $i ?>">Trang <?= $i ?></a>
                </li>
            <?php endfor; ?>
        </ul>
    </nav>
</div>

<?php include './views/shares/footer.php'; ?>
