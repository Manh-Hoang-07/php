<?php
session_start();
include 'config/config.php';
if (isset($_POST['dangnhap'])) {
    $username = $_POST['username'] ?? '';
    $password = md5($_POST['password'] ?? '');
    $sql = "SELECT * FROM tbl_admin WHERE username = '$username' AND password = '$password' LIMIT 1";
    $row = mysqli_query($mysqli, $sql);
    $count = mysqli_num_rows($row);
    if ($count > 0) {
        $_SESSION['taikhoan'] = $username;
        header("Location: index.php");
    } else {
        echo 'Tài khoản hoặc mật khẩu không chính xác';
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
<div class="wrapper-login" style="margin: 0 auto;">
    <form action="" method="POST" autocomplete="off">
    <table border="1" class="table-login" style="text-align: center; border-collapse: collapse;">
        <tr>
            <td colspan="2"><h3>Đăng nhập admin</h3></td>
        </tr>
        <tr>
            <td>Mật khẩu</td>
            <td><input type="text" name="username"></td>
        </tr>
        <tr>
            <td>Mật khẩu</td>
            <td><input type="text" name="password"></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" name="dangnhap" value="Đăng nhập"></td>
        </tr>
    </table>
    </form>
</div>
</body>
</html>