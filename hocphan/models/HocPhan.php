<?php
require_once './config/database.php';

class HocPhan
{
    public static function getAll() {
        global $pdo;
        $stmt = $pdo->query("SELECT * FROM hocphan");
        return $stmt->fetchAll();
    }

    public static function getById($maHP) {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM hocphan WHERE MaHP = ?");
        $stmt->execute([$maHP]);
        return $stmt->fetch();
    }

    public static function giamSoLuong($maHP) {
        global $pdo;
        $stmt = $pdo->prepare("UPDATE hocphan SET SoLuong = SoLuong - 1 WHERE MaHP = ? AND SoLuong > 0");
        return $stmt->execute([$maHP]);
    }

    public static function themSoLuong($maHP) {
        global $pdo;
        $stmt = $pdo->prepare("UPDATE hocphan SET SoLuong = SoLuong + 1 WHERE MaHP = ?");
        return $stmt->execute([$maHP]);
    }
} 