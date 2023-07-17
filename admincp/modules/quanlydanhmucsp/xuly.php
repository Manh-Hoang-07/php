<?php
include '../../config/config.php';
$tenloaisp = $_POST['tendanhmuc'] ?? '';
$thutu = $_POST['thutu'] ?? '';
if (isset($_POST['themdanhmuc'])) {
    $sql = "INSERT INTO tbl_danhmuc (tendanhmuc, thutu) VALUES ('" . $tenloaisp . "','" . $thutu ."')";
    mysqli_query($mysqli, $sql);
    header('Location:../../index.php?action=quanlydanhmucsanpham&query=them');
} elseif (isset($_POST['suadanhmuc'])) {
    $sql = "UPDATE tbl_danhmuc SET tendanhmuc='". $tenloaisp ."', thutu='" . $thutu . "' WHERE id = '$_GET[id]'";
    mysqli_query($mysqli, $sql);
    header('Location:../../index.php?action=quanlydanhmucsanpham&query=them');
} else {
    $id = $_GET['id'] ?? '';
    $sql_xoa = "DELETE FROM tbl_danhmuc WHERE id='". $id. "'";
    mysqli_query($mysqli, $sql_xoa);
    header('Location:../../index.php?action=quanlydanhmucsanpham');
}