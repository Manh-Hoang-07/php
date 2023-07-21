<?php
if (isset($_GET['action']) && $_GET['action'] == 'dangxuat') {
    unset($_SESSION['taikhoan']);
    header("Location: login.php");
}
?>
<ul class="admincp-list">
    <li><a href="index.php?action=quanlydanhmucsanpham&query=them">Quản lý danh mục sản phẩm</a></li>
    <li><a href="index.php?action=quanlysanpham&query=them">Quản lý sản phẩm</a></li>
    <li><a href="index.php?action=quanlydanhmucbaiviet">Quản lý danh mục bài viết</a></li>
    <li><a href="index.php?action=quanlybaiviet">Quản lý bài viết</a></li>
    <li><a href="index.php?action=dangxuat">Đăng xuất</a></li>
</ul>