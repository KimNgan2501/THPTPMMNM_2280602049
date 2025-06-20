<?php
require_once './config/database.php';

class SinhVien
{
    public static function getAll($offset = 0, $limit = 10) {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM sinhvien LIMIT :limit OFFSET :offset");
        $stmt->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', (int)$offset, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public static function countAll() {
        global $pdo;
        $stmt = $pdo->query("SELECT COUNT(*) FROM sinhvien");
        return $stmt->fetchColumn();
    }

    public static function getById($maSV) {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM sinhvien WHERE MaSV = ?");
        $stmt->execute([$maSV]);
        return $stmt->fetch();
    }

    public static function create($data) {
        global $pdo;
        $stmt = $pdo->prepare("INSERT INTO sinhvien (MaSV, HoTen, GioiTinh, NgaySinh, Hinh, MaNganh, Password) 
                               VALUES (?, ?, ?, ?, ?, ?, ?)");
        return $stmt->execute([
            $data['MaSV'],
            $data['HoTen'],
            $data['GioiTinh'],
            $data['NgaySinh'],
            $data['Hinh'],
            $data['MaNganh'],
            $data['Password'] ?? '123456'
        ]);
    }

    public static function update($data) {
        global $pdo;
        $stmt = $pdo->prepare("UPDATE sinhvien 
            SET HoTen = ?, GioiTinh = ?, NgaySinh = ?, Hinh = ?, MaNganh = ? 
            WHERE MaSV = ?");
        return $stmt->execute([
            $data['HoTen'],
            $data['GioiTinh'],
            $data['NgaySinh'],
            $data['Hinh'],
            $data['MaNganh'],
            $data['MaSV']
        ]);
    }

    public static function delete($maSV) {
        global $pdo;
        $stmt = $pdo->prepare("DELETE FROM sinhvien WHERE MaSV = ?");
        return $stmt->execute([$maSV]);
    }

    public static function checkLogin($maSV, $password) {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM sinhvien WHERE MaSV = ? AND Password = ?");
        $stmt->execute([$maSV, $password]);
        return $stmt->fetch();
    }
}
