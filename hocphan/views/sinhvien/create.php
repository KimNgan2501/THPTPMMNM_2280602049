<?php include './views/shares/header.php'; ?>

<div class="container mt-4">
    <h2 class="text-center text-primary mb-4">
        <i class="fas fa-user-plus"></i> Thêm sinh viên mới
    </h2>

    <form method="post" class="bg-light p-4 shadow-sm rounded border border-primary">
        <div class="form-group">
            <label for="MaSV" class="text-primary">Mã sinh viên</label>
            <input type="text" class="form-control border-primary" id="MaSV" name="MaSV" required>
        </div>

        <div class="form-group">
            <label for="HoTen" class="text-primary">Họ tên</label>
            <input type="text" class="form-control border-primary" id="HoTen" name="HoTen" required>
        </div>

        <div class="form-group">
            <label for="GioiTinh" class="text-primary">Giới tính</label>
            <select class="form-control border-primary" id="GioiTinh" name="GioiTinh">
                <option value="">-- Chọn giới tính --</option>
                <option value="Nam">Nam</option>
                <option value="Nữ">Nữ</option>
            </select>
        </div>

        <div class="form-group">
            <label for="NgaySinh" class="text-primary">Ngày sinh</label>
            <input type="date" class="form-control border-primary" id="NgaySinh" name="NgaySinh">
        </div>

        <div class="form-group">
            <label for="Hinh" class="text-primary">Hình ảnh (đường dẫn)</label>
            <input type="text" class="form-control border-primary" id="Hinh" name="Hinh">
        </div>

        <div class="form-group">
            <label for="MaNganh" class="text-primary">Mã ngành</label>
            <input type="text" class="form-control border-primary" id="MaNganh" name="MaNganh" required>
        </div>

        <div class="form-group">
            <label for="Password" class="text-primary">Mật khẩu</label>
            <input type="password" class="form-control border-primary" id="Password" name="Password" required>
        </div>

        <button type="submit" class="btn btn-primary">
            <i class="fas fa-save"></i> Lưu
        </button>
        <a href="index.php?action=sinhvien" class="btn btn-outline-primary ml-2">
            <i class="fas fa-arrow-left"></i> Quay lại
        </a>
    </form>
</div>

<?php include './views/shares/footer.php'; ?>
