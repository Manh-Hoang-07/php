<?php
include '../../config/config.php';
$tensanpham = $_POST['tensanpham'] ?? '';
$masp = $_POST['masp'] ?? '';
$giasp = $_POST['giasp'] ?? 0;
$soluong = $_POST['soluong'] ?? 0;
$tomtat = $_POST['tomtat'] ?? '';
$noidung = $_POST['noidung'] ?? '';
$status = $_POST['status'] ?? 1;
$id_danhmuc = $_POST['id_danhmuc'] ?? 1;

$hinhanh_name = $_FILES['hinhanh']['name'] ?? '';
$hinhanh_tmp = $_FILES['hinhanh']['tmp_name'] ?? '';
$hinhanh_name = time() . '_' . $hinhanh_name;

if (isset($_POST['themsanpham'])) {
    $sql = "INSERT INTO tbl_sanpham (tensanpham, masp, giasp, soluong, tomtat, noidung, status, hinhanh, id_danhmuc) VALUES ('" . $tensanpham . "','" . $masp ."','" . $giasp ."','" . $soluong ."','" . $tomtat ."','" . $noidung ."','" . $status ."','" . $hinhanh_name ."','" . $id_danhmuc ."')";
    move_uploaded_file($hinhanh_tmp, 'uploads/' . $hinhanh_name);
    mysqli_query($mysqli, $sql);
    header('Location:../../index.php?action=quanlysanpham&query=them');
} elseif (isset($_POST['suasanpham'])) {
    if (!empty($hinhanh_tmp)) {
        $sql_select = "SELECT * FROM tbl_sanpham WHERE id = '" . $_GET['id'] . "' LIMIT 1";
        $sanpham = mysqli_query($mysqli, $sql_select);
        while ($row = mysqli_fetch_array($sanpham)) {
            unlink('uploads/' . $row['hinhanh']);
        }
        $sql = $sql = "UPDATE tbl_sanpham SET tensanpham='" . $tensanpham . "', masp='" . $masp . "', giasp='" . $giasp . "', soluong='" . $soluong . "', tomtat='" . $tomtat . "', noidung='" . $noidung . "', status='" . $status . "', hinhanh='" . $hinhanh_name . "', id_danhmuc='" . $id_danhmuc . "' WHERE id = '$_GET[id]'";
        move_uploaded_file($hinhanh_tmp, 'uploads/' . $hinhanh_name);
    } else {
        $sql = "UPDATE tbl_sanpham SET tensanpham='" . $tensanpham . "', masp='" . $masp . "', giasp='" . $giasp . "', soluong='" . $soluong . "', tomtat='" . $tomtat . "', noidung='" . $noidung . "', status='" . $status . "', id_danhmuc='" . $id_danhmuc . "' WHERE id = '$_GET[id]'";
    }
    mysqli_query($mysqli, $sql);
    header('Location:../../index.php?action=quanlysanpham&query=them');
} else {
    $id = $_GET['id'] ?? '';
    $sql_select = "SELECT * FROM tbl_sanpham WHERE id = '" . $id . "' LIMIT 1";
    $sanpham = mysqli_query($mysqli, $sql_select);
    while ($row = mysqli_fetch_array($sanpham)) {
        unlink('uploads/' . $row['hinhanh']);
    }

    $sql_xoa = "DELETE FROM tbl_sanpham WHERE id='". $id. "'";
    mysqli_query($mysqli, $sql_xoa);
    header('Location:../../index.php?action=quanlysanpham&query=them');
}