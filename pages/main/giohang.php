<?php
session_start();
?>
<p>Giỏ hàng
<?php
if (isset($_SESSION['dangky'])) {
    echo 'Xin chào: ' . $_SESSION['dangky'];
}
?>
</p>
<table border="1">
    <tr>
        <th>Id</th>
        <th>Tên sản phẩm</th>
        <th>Mã sản phẩm</th>
        <th>Hình ảnh sản phẩm</th>
        <th>Số lượng sản phẩm</th>
        <th>Giá sản phẩm</th>
        <th>Thành tiền</th>
        <th>Quản lý</th>
    </tr>
    <?php
    if (!empty($_SESSION['cart'])) {
        $tongtien = 0;
        foreach ($_SESSION['cart'] as $cartItem) {
            $thanhtien = ($cartItem['giasp'] ?? 0) * ($cartItem['soluong'] ?? 0);
            $tongtien += $thanhtien;
    ?>
    <tr>
        <td><?php echo $cartItem['id'] ?? '' ?></td>
        <td><?php echo $cartItem['tensanpham'] ?? '' ?></td>
        <td><?php echo $cartItem['masp'] ?? '' ?></td>
        <td><img src="admincp/modules/quanlysp/uploads/<?php echo $cartItem['hinhanh'] ?? '' ?>" width="40px"></td>
        <td>
            <a href="pages/main/themgiohang.php?tru=<?php echo $cartItem['id'] ?? '' ?>">Trừ</a>
            <?php echo $cartItem['soluong'] ?? '' ?>
            <a href="pages/main/themgiohang.php?cong=<?php echo $cartItem['id'] ?? '' ?>">Cộng</a>
        </td>
        <td><?php echo $cartItem['giasp'] ?? '' ?></td>
        <td><?php echo $thanhtien ?></td>
        <td><a href="pages/main/themgiohang.php?xoa=<?php echo $cartItem['id'] ?? '' ?>">Xóa</a></td>
    </tr>
    <?php
    }
        ?>
        <tr>
            <td>Tổng tiền: <?php echo $tongtien;?></td>
            <td><p><a href="pages/main/themgiohang.php?xoatatca=1">Xóa tất cả</a></p></td>
            <div class="clear">
                <?php
                if (isset($_SESSION['dangky'])) {
                ?>
                    <p><a href="index.php?quanly=thanhtoan">Đặt hàng</a></p>
                <?php
                } else {
                ?>
                    <p><a href="index.php?quanly=dangky">Đăng ký đặt hàng</a></p>
                <?php
                }
                ?>
            </div>
        </tr>

    <?php
    } else {
    ?>
        <tr>
            <td>Không có sản phẩm nào trong giỏ hàng</td>
        </tr>
    <?php
    }
    ?>

</table>
