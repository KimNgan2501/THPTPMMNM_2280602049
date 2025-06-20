<?php
require_once './config/database.php';

class ChiTietDangKy {
    public static function add($maDK, $maHP) {
        global $pdo;
        $stmt = $pdo->prepare("INSERT INTO chitietdangky (MaDK, MaHP) VALUES (?, ?)");
        return $stmt->execute([$maDK, $maHP]);
    }
}
