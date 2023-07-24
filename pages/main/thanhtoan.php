<?php
$id_khachhang = $_SESSION['id_khachhang'] ?? '';
$code = rand(0,9999);
$insert_cart = "INSERT INTO tbl_cart (id_khachhang, code, status) VALUES ('$id_khachhang', '$code', 1)";
$query_cart = mysqli_query($mysqli, $insert_cart);
if ($query_cart) {
    foreach ($_SESSION['cart'] as $key =>  $cart) {
        $id_sanpham = $cart['id'] ?? 0;
        $soluong = $cart['soluong'] ?? 0;
        $code = $code ?? '';
        $insert_cart_details = "INSERT INTO tbl_cart_details (code_cart, id_sanpham, soluong) VALUES ('$code', $id_sanpham, $soluong)";
        mysqli_query($mysqli, $insert_cart_details);
    }
    //unset($_SESSION['cart']);
    header("Location: index.php?quanly=camon");
}


?>