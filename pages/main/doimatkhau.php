<?php
if (isset($_POST['doimatkhau'])) {
    $email = $_POST['email'] ?? '';
    $matkhaucu = md5($_POST['matkhau'] ?? '');
    $matkhaumoi = md5($_POST['matkhaumoi'] ?? '');
    $sql = "SELECT * FROM tbl_dangky WHERE email='$email' AND matkhau='$matkhaucu' LIMIT 1";
    $row = mysqli_fetch_array(mysqli_query($mysqli, $sql));
    if ($row) {
        $sql_update = "UPDATE tbl_dangky SET matkhau = '$matkhaumoi' WHERE email='$email'";
        mysqli_query($mysqli, $sql_update);
        echo "Mật khẩu đã thay đổi thành công";
    } else {
        echo "Tài khoản hoặc mật khẩu cũ không chính xác";
    }
}
?>
<p>Đổi mật khẩu</p>
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
            <td>Mật khẩu mới</td>
            <td><input type="text" name="matkhaumoi"></td>
        </tr>
        <tr>
            <td><input type="submit" name="doimatkhau" value="Đổi mật khẩu"></td>
        </tr>
    </table>
</form>