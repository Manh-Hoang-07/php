<?php
$sql_lietke_danhmucsp = "SELECT * FROM tbl_danhmuc WHERE id='$_GET[id]' LIMIT 1";
$query_lietke_danhmucsp = mysqli_query($mysqli, $sql_lietke_danhmucsp);
?>
<p>Sửa danh muc</p>
<table border="1" width="50%" style="border-collapse: collapse;">
    <form method="POST" action="modules/quanlydanhmucsp/xuly.php?id=<?php echo $_GET['id'] ?? '' ?>">
        <?php
        while ($row = mysqli_fetch_array($query_lietke_danhmucsp)) {
        ?>
        <tr>
            <td>Tên danh mục</td>
            <td><input type="text" value="<?php echo $row['tendanhmuc'] ?? '' ?>" name="tendanhmuc"></td>
        </tr>
        <tr>
            <td>Thứ tự</td>
            <td><input type="text" value="<?php echo $row['thutu'] ?? '' ?>" name="thutu"></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" name="suadanhmuc" value="Sửa danh mục sản phẩm"></td>
        </tr>
        <?php
        }
        ?>
    </form>
</table>