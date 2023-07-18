<?php
$sql_pro = "SELECT * FROM tbl_sanpham WHERE tbl_sanpham.id_danhmuc='$_GET[id]' ORDER BY id DESC";
$query_pro = mysqli_query($mysqli, $sql_pro);
$sql_cate = "SELECT * FROM tbl_danhmuc WHERE tbl_danhmuc.id='$_GET[id]'";
$query_cate = mysqli_query($mysqli, $sql_cate);
$row_title = mysqli_fetch_array($query_cate);
?>
<h3>Danh mục sản phẩm : <?php echo $row_title['tendanhmuc'] ?? '' ?></h3>
<ul class="product-list">
    <?php
    while ($row_pro = mysqli_fetch_array($query_pro)) {
    ?>
        <li>
            <a href="">
                <img src="admincp/modules/quanlysp/uploads/<?php echo $row_pro['hinhanh'] ?? '' ?>">
                <p class="title-product">Tên sản phẩm : <?php echo $row_pro['tensanpham'] ?? '' ?></p>
                <p class="price-product">Giá sản phẩm : <?php echo $row_pro['giasp'] ?? '' ?></p>
            </a>
        </li>
    <?php
    }
    ?>
</ul>