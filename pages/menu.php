<?php
session_start();
$sql_danhmuc = "SELECT * FROM tbl_danhmuc";
$query_danhmuc = mysqli_query($mysqli, $sql_danhmuc);
if (isset($_SESSION['dangky'])
    && isset($_GET['quanly'])
    && $_GET['quanly'] == 'dangxuat'
) {
    unset($_SESSION['dangky']);
}
?>
<div class="menu">
    <ul class="list-menu">
        <li><a href="index.php">Trang chủ</a></li>
        <?php
        while ($row_danhmuc = mysqli_fetch_array($query_danhmuc)) {
            ?>
            <li>
                <a href="index.php?quanly=danhmucsanpham&id=<?php echo $row_danhmuc['id'] ?? '' ?>"><?php echo $row_danhmuc['tendanhmuc'] ?? '' ?></a>
            </li>
            <?php
        }
        ?>
        <li><a href="index.php?quanly=giohang">Giỏ hàng</a></li>
        <!--        <li><a href="index.php?quanly=tintuc">Tin tức</a></li>-->
        <!--        <li><a href="index.php?quanly=lienhe">Liên hệ</a></li>-->
        <?php
        if (isset($_SESSION['dangky'])) {
            ?>
            <li><a href="index.php?quanly=dangxuat">Đăng xuất</a></li>
            <?php
        } else {
            ?>
            <li><a href="index.php?quanly=dangky">Đăng ký</a></li>
            <li><a href="index.php?quanly=dangnhap">Đăng nhập</a></li>
            <?php
        }
        ?>

    </ul>
    <p>
    <form action="index.php?quanly=timkiem" method="POST">
        <input type="text" name="tukhoa" placeholder="Tìm kiếm sản phẩm...">
        <input type="submit" name="timkiem" value="Tìm kiếm">
    </form>
    </p>
</div>