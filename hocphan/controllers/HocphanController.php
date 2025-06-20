<?php
require_once './models/HocPhan.php';

class HocphanController
{
    public function index() {
        $hocphans = HocPhan::getAll();
        include './views/hocphan/index.php';
    }
}