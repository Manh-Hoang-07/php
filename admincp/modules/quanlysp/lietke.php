<?php
$sql_lietke_sp = "SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc= tbl_danhmuc.id";
$query_lietke_sp = mysqli_query($mysqli, $sql_lietke_sp);
?>
<table border="1" width="100%" style="border-collapse: collapse;">
    <tr>
        <th>Id</th>
        <th>Tên sản phẩm</th>
        <th>Mã sản phẩm</th>
        <th>Số lượng</th>
        <th>Giá</th>
        <th>Danh mục sản phẩm</th>
        <th>Hình ảnh</th>
        <th>Trạng thái</th>
    </tr>
    <?php
    $i = 0;
    while ($row = mysqli_fetch_array($query_lietke_sp)) {
        $i++;
    ?>
        <tr>
            <td><?php echo $i ?></td>
            <td><?php echo $row['tensanpham'] ?? '' ?></td>
            <td><?php echo $row['masp'] ?? '' ?></td>
            <td><?php echo $row['soluong'] ?? '' ?></td>
            <td><?php echo $row['giasp'] ?? '' ?></td>
            <td><?php echo $row['tendanhmuc'] ?? '' ?></td>
            <td><img src="modules/quanlysp/uploads/<?php echo $row['hinhanh'] ?? '' ?>" width="150px;"></td>
            <td><?php echo (!empty($row['status']) && $row['status'] == 1 ? 'kích hoạt' : 'không kích hoạt') ?></td>
            <td>
                <a href="modules/quanlysp/xuly.php?query=xoa&id=<?php echo ($row['id'] ?? '') ?>">Xóa</a> | <a href="?action=quanlysanpham&query=sua&id=<?php echo ($row['id'] ?? '') ?>">Sửa</a>
            </td>
        </tr>
    <?php
    }
    ?>
</table>
