<?php
$sql_chitiet = "SELECT *,tbl_danhmuc.id as tbl_danhmuc_id, tbl_sanpham.id as id FROM tbl_sanpham, tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id AND tbl_sanpham.id='$_GET[id]' LIMIT 1";
$query_chitiet = mysqli_query($mysqli, $sql_chitiet);
while ($row_chitiet = mysqli_fetch_array($query_chitiet)) {
    print_r('<pre class="hoangvm">');
    print_r($row_chitiet);
    print_r('</pre>');
    ?>
    <p>Chi tiết sản phẩm</p>
    <div class="wrapper-chitiet">
        <div class="hinhanh-sanpham">
            <img src="admincp/modules/quanlysp/uploads/<?php echo $row_chitiet['hinhanh'] ?? '' ?>" width="20%">
        </div>
        <form action="pages/main/themgiohang.php?id=<?php echo $row_chitiet['id'] ?? '' ?>" method="POST">
        <div class="chitiet-sanpham">
            <h3>Tên sản phẩm: <?php echo $row_chitiet['tensanpham'] ?? '' ?></h3>
            <p>Mã sản phẩm: <?php echo $row_chitiet['masp'] ?? '' ?></p>
            <p>Giá sản phẩm: <?php echo $row_chitiet['giasp'] ?? '' ?></p>
            <p>Số lượng sản phẩm: <?php echo $row_chitiet['soluong'] ?? '' ?></p>
            <p>Danh mục sản phẩm: <?php echo $row_chitiet['tendanhmuc'] ?? '' ?></p>
            <p><input type="submit" name="themgiohang" value="Thêm giỏ hàng" class="themgiohang"></p>
        </div>
        </form>
    </div>
    <?php
}
?>