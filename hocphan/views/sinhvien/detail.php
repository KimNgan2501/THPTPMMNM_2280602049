<?php include './views/shares/header.php'; ?>
<h2>Chi tiết sinh viên</h2>
<ul>
    <li>Mã SV: <?= $sv['MaSV'] ?></li>
    <li>Họ tên: <?= $sv['HoTen'] ?></li>
    <li>Giới tính: <?= $sv['GioiTinh'] ?></li>
    <li>Ngày sinh: <?= $sv['NgaySinh'] ?></li>
    <li>Hình ảnh: <?= $sv['Hinh'] ?></li>
    <li>Mã ngành: <?= $sv['MaNganh'] ?></li>
</ul>
<a href="index.php?action=sinhvien">Quay lại danh sách</a>
<?php include './views/shares/footer.php'; ?>