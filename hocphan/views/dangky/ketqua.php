<?php include './views/shares/header.php'; ?>
<h2>Kết quả đăng ký</h2>
<?php if (!empty($_SESSION['success'])): unset($_SESSION['success']); ?>
<p style="color:green">Đăng ký thành công!</p>
<?php endif; ?>
<table border="1">
    <tr><th>Mã</th><th>Tên học phần</th><th>Số tín chỉ</th></tr>
    <?php foreach ($result as $hp): ?>
    <tr>
        <td><?= $hp['MaHP'] ?></td>
        <td><?= $hp['TenHP'] ?></td>
        <td><?= $hp['SoTinChi'] ?></td>
    </tr>
    <?php endforeach; ?>
</table>
<?php include './views/shares/footer.php'; ?>
