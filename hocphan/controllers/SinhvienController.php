<?php
require_once './models/SinhVien.php';

class SinhVienController {
    public function index() {
        $page = $_GET['page'] ?? 1;
        $limit = 4;
        $offset = ($page - 1) * $limit;

        $sinhviens = SinhVien::getAll($offset, $limit);
        $total = SinhVien::countAll();
        $totalPages = ceil($total / $limit);

        include './views/sinhvien/index.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = $_POST;
            SinhVien::create($data);
            header("Location: index.php?action=sinhvien");
            exit;
        }
        include './views/sinhvien/create.php';
    }

    public function edit() {
        $maSV = $_GET['id'];
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = $_POST;
            $data['MaSV'] = $maSV;
            SinhVien::update($data);
            header("Location: index.php?action=sinhvien");
            exit;
        }
        $sv = SinhVien::getById($maSV);
        include './views/sinhvien/edit.php';
    }

    public function delete() {
        $maSV = $_GET['id'];
        SinhVien::delete($maSV);
        header("Location: index.php?action=sinhvien");
        exit;
    }

    public function detail() {
        $maSV = $_GET['id'];
        $sv = SinhVien::getById($maSV);
        include './views/sinhvien/detail.php';
    }
}
