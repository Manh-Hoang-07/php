<?php
session_start();
include '../../admincp/config/config.php';

if (isset($_POST['themgiohang'])) {
    $id = $_GET['id'] ?? '';
    $soluong = 1;
    $sql = "SELECT * FROM tbl_sanpham WHERE id = $id LIMIT 1";
    $query = mysqli_query($mysqli, $sql);
    $row = mysqli_fetch_array($query);
    if ($row) {
        $new_product = [
            [
                'tensanpham' => $row['tensanpham'] ?? '',
                'id' => $row['id'] ?? '',
                'soluong' => $soluong,
                'giasp' => $row['giasp'] ?? '',
                'hinhanh' => $row['hinhanh'] ?? '',
                'masp' => $row['masp'] ?? '',
            ]
        ];
        if (!empty($_SESSION['cart'])) {
            $found = false;
            foreach ($_SESSION['cart'] as $cart_item) {
                if (!empty($cart_item['id'])) {
                    if ($cart_item['id'] == $id) {
                        $products[] = [
                            'tensanpham' => $cart_item['tensanpham'] ?? '',
                            'id' => $cart_item['id'],
                            'soluong' => ((int)$cart_item['soluong'] ?? 0) + 1,
                            'giasp' => $cart_item['giasp'] ?? '',
                            'hinhanh' => $cart_item['hinhanh'] ?? '',
                            'masp' => $cart_item['masp'] ?? '',
                        ];
                        $found = true;
                    } else {
                        $products[] = $cart_item;
                    }
                }
            }
            if (!$found) {
                $products = array_merge($products ?? [], $new_product);
            }
            $_SESSION['cart'] = $products ?? [];
        } else {
            $_SESSION['cart'] = $new_product;
        }
    }
    header('Location: ../../index.php?quanly=giohang');
}

if (!empty($_GET['xoatatca'])) {
    unset($_SESSION['cart']);
    header('Location: ../../index.php?quanly=giohang');
}
?>