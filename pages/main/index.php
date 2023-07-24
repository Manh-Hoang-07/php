<?php
$sql_pro = "SELECT *, tbl_sanpham.id as id, tbl_danhmuc.id as tbl_danhmuc_id FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id";
$query_pro = mysqli_query($mysqli, $sql_pro);
?>
<h3>Sản phẩm mới nhất</h3>
<ul class="product-list">
    <?php
    while ($row_pro = mysqli_fetch_array($query_pro)) {
        ?>
        <li>
            <a href="index.php?quanly=sanpham&id=<?php echo $row_pro['id'] ?? '' ?>">
                <img src="admincp/modules/quanlysp/uploads/<?php echo $row_pro['hinhanh'] ?? '' ?>">
                <p class="title-product">Tên sản phẩm : <?php echo $row_pro['tensanpham'] ?? '' ?></p>
                <p class="price-product">Giá sản phẩm : <?php echo $row_pro['giasp'] ?? '' ?></p>
                <p class="price-product">Danh mục : <?php echo $row_pro['tendanhmuc'] ?? '' ?></p>
            </a>
        </li>
        <?php
    }
    ?>
</ul>
<div class="clear">
    <style type="text/css">
        ul.list-trang {
            padding: 0;
            margin: 0;
            list-style: none;
        }
        ul.list-trang li {
            float: left;
            padding: 5px;
            margin: 5px;
        }
    </style>
    <ul class="list-trang">
        <li><a href="">1</a></li>
        <li><a href="">2</a></li>
        <li><a href="">3</a></li>
    </ul>
</div>