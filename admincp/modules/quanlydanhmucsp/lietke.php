<?php
$sql_lietke_danhmucsp = "SELECT * FROM tbl_danhmuc ORDER BY thutu ASC";
$query_lietke_danhmucsp = mysqli_query($mysqli, $sql_lietke_danhmucsp);
?>
<table border="1" width="100%" style="border-collapse: collapse;">
    <tr>
        <th>Id</th>
        <th>Tên danh mục</th>
        <th>Quản lý</th>
    </tr>
    <?php
    $i = 0;
    while ($row = mysqli_fetch_array($query_lietke_danhmucsp)) {
        $i++;
    ?>
        <tr>
            <td><?php echo $i ?></td>
            <td><?php echo $row['tendanhmuc'] ?? '' ?></td>
            <td>
                <a href="modules/quanlydanhmucsp/xuly.php?query=xoa&id=<?php echo ($row['id'] ?? '') ?>">Xóa</a> | <a href="?action=quanlydanhmucsanpham&query=sua&id=<?php echo ($row['id'] ?? '') ?>">Sửa</a>
            </td>
        </tr>
    <?php
    }
    ?>
</table>
