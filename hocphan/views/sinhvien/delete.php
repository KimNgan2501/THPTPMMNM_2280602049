<?php
require_once 'models/SinhVien.php';

$id = $_GET['id'];
$result = SinhVien::delete($id);
header("Location: index.php");
