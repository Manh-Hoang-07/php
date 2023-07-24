<?php
$page = $_GET['trang'] ?? 1;
if ($page == 1) {
    $begin = 0;
} else {
    $begin = ($page*2) - 1;
}
$sql_pro = "SELECT *, tbl_sanpham.id as id, tbl_danhmuc.id as tbl_danhmuc_id FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id LIMIT $begin,2";
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
    <?php
    $sql_trang = mysqli_query($mysqli, "SELECT * FROM tbl_sanpham");
    $count = mysqli_num_rows($sql_trang);
    $trang = ceil($count/2);
    ?>
    <p>Trang hiện tại: <?php echo $page; ?>/<?php echo $trang; ?></p>
    <ul class="list-trang">
        <?php
        for ($i = 1; $i <= $trang ; $i++) {
        ?>
            <li><a <?php if ($page == $i) { ?> style="color: red;" <?php } ?> href="index.php?trang=<?php echo $i; ?>"><?php echo $i; ?></a></li>
        <?php
        }
        ?>
    </ul>
</div>