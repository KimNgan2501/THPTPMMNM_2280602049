<?php
require_once './config/database.php';

class DangKy
{
    public static function taoPhieuDangKy($maSV) {
        global $pdo;
        $stmt = $pdo->prepare("INSERT INTO dangky (NgayDK, MaSV) VALUES (CURDATE(), ?)");
        $stmt->execute([$maSV]);
        return $pdo->lastInsertId();
    }

    public static function themChiTiet($maDK, $maHP) {
        global $pdo;
        $stmt = $pdo->prepare("INSERT INTO chitietdangky (MaDK, MaHP) VALUES (?, ?)");
        return $stmt->execute([$maDK, $maHP]);
    }

    public static function getBySinhVien($maSV) {
        global $pdo;
        $stmt = $pdo->prepare("SELECT hp.* FROM dangky dk
                              JOIN chitietdangky ct ON dk.MaDK = ct.MaDK
                              JOIN hocphan hp ON ct.MaHP = hp.MaHP
                              WHERE dk.MaSV = ?");
        $stmt->execute([$maSV]);
        return $stmt->fetchAll();
    }
}