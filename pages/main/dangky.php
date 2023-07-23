<?php
if (isset($_POST['dangky'])) {
    session_start();
    $tenkhachhang = $_POST['tenkhachhang'] ?? '';
    $email = $_POST['email'] ?? '';
    $diachi = $_POST['diachi'] ?? '';
    $dienthoai = $_POST['dienthoai'] ?? '';
    $matkhau = md5($_POST['matkhau'] ?? '');
    $sql = "INSERT INTO tbl_dangky (tenkhachhang, email, diachi, dienthoai, matkhau) VALUES ('$tenkhachhang', '$email', '$diachi', '$dienthoai', '$matkhau')";
    $row = mysqli_query($mysqli, $sql);
    if ($row) {
        echo "Đăng ký tài khoản thành công";
        $_SESSION['dangky'] = $tenkhachhang;
        header("Location: index.php?quanly=giohang");
    }
}
?>
<p>Đăng ký thành viên</p>
<form action="" method="POST">
<table border="1">
    <tr>
        <td>Họ và tên</td>
        <td><input type="text" name="tenkhachhang"></td>
    </tr>
    <tr>
        <td>Email</td>
        <td><input type="text" name="email"></td>
    </tr>
    <tr>
        <td>Địa chỉ</td>
        <td><input type="text" name="diachi"></td>
    </tr>
    <tr>
        <td>Điện thoại</td>
        <td><input type="text" name="dienthoai"></td>
    </tr>
    <tr>
        <td>Mật khẩu</td>
        <td><input type="text" name="matkhau"></td>
    </tr>
    <tr>
        <td><input type="submit" name="dangky" value="Đăng ký"></td>
    </tr>
</table>
</form>