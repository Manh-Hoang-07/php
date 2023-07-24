<?php
if (isset($_POST['dangnhap'])) {
    $email = $_POST['email'] ?? '';
    $matkhau = md5($_POST['matkhau'] ?? '');
    $sql = "SELECT * FROM tbl_dangky WHERE email='$email' AND matkhau='$matkhau' LIMIT 1";
    $row = mysqli_fetch_array(mysqli_query($mysqli, $sql));
    //$count = mysqli_num_rows($row);
    if (!empty($row)) {
        echo "Đăng nhập tài khoản thành công";
        $_SESSION['dangky'] = $email;
        $_SESSION['id_khachhang'] = $row['id'] ?? '';
        header("Location: index.php?quanly=giohang");
    } else {
        echo "Tài khoản hoặc mật khẩu không chính xác";
    }
}
?>
<p>Đăng nhập thành viên</p>
<form action="" method="POST">
    <table border="1">
        <tr>
            <td>Email</td>
            <td><input type="text" name="email"></td>
        </tr>
        <tr>
            <td>Mật khẩu</td>
            <td><input type="text" name="matkhau"></td>
        </tr>
        <tr>
            <td><input type="submit" name="dangnhap" value="Đăng nhập"></td>
        </tr>
    </table>
</form>