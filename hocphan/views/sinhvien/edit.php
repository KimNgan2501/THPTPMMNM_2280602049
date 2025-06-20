<?php include './views/shares/header.php'; ?>
<h2>Cập nhật sinh viên</h2>
<form method="post">
    Họ tên: <input type="text" name="HoTen" value="<?= $sv['HoTen'] ?>" required><br>
    Giới tính: <input type="text" name="GioiTinh" value="<?= $sv['GioiTinh'] ?>"><br>
    Ngày sinh: <input type="date" name="NgaySinh" value="<?= $sv['NgaySinh'] ?>"><br>
    Hình ảnh: <input type="text" name="Hinh" value="<?= $sv['Hinh'] ?>"><br>
    Mã ngành: <input type="text" name="MaNganh" value="<?= $sv['MaNganh'] ?>"><br>
    <button type="submit">Cập nhật</button>
</form>
<?php include './views/shares/footer.php'; ?>