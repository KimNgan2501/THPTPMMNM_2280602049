<?php include './views/shares/header.php'; ?>
<h2>Giỏ hàng học phần</h2>
<?php if (empty($_SESSION['cart'])): ?>
    <p>Chưa có học phần nào được chọn.</p>
<?php else: ?>
    <ul>
        <?php foreach ($_SESSION['cart'] as $maHP): ?>
            <li><?= $maHP ?> <a href="index.php?action=xoaHP&id=<?= $maHP ?>">Xóa</a></li>
        <?php endforeach; ?>
    </ul>
    <a href="index.php?action=luu">Lưu đăng ký</a>
    <a href="index.php?action=xoaAll">Xóa tất cả</a>
<?php endif; ?>
<?php include './views/shares/footer.php'; ?>