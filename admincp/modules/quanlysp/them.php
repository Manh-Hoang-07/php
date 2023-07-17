<p>Thêm danh muc</p>
<table border="1" width="50%" style="border-collapse: collapse;">
    <form method="POST" action="modules/quanlysp/xuly.php" enctype="multipart/form-data">
        <tr>
            <td>Tên sản phẩm</td>
            <td><input type="text" name="tensanpham"></td>
        </tr>
        <tr>
            <td>Mã sản phẩm</td>
            <td><input type="text" name="masp"></td>
        </tr>
        <tr>
            <td>Giá sản phẩm</td>
            <td><input type="text" name="giasp"></td>
        </tr>
        <tr>
            <td>Số lượng sản phẩm</td>
            <td><input type="text" name="soluong"></td>
        </tr>
        <tr>
            <td>Hình ảnh sản phẩm</td>
            <td><input type="file" name="hinhanh"></td>
        </tr>
        <tr>
            <td>Danh mục sản phẩm</td>
            <td>
                <select name="id_danhmuc">
                    <?php
                    $sql_select_category = "SELECT * FROM tbl_danhmuc";
                    $query_select_category = mysqli_query($mysqli, $sql_select_category);
                    while ($row = mysqli_fetch_array($query_select_category)) {
                        ?>
                        <option value="<?php echo $row['id'] ?? '' ?>"><?php echo $row['tendanhmuc'] ?? '' ?></option>
                        <?php
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Tóm tắt sản phẩm</td>
            <td><textarea name="tomtat"></textarea></td>
        </tr>
        <tr>
            <td>Nội dung sản phẩm</td>
            <td><textarea name="noidung"></textarea></td>
        </tr>
        <tr>
            <td>Trạng thái</td>
            <td>
                <select name="status">
                    <option value="1">Kích hoạt</option>
                    <option value="0">Không kích hoạt</option>
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" name="themsanpham" value="Thêm sản phẩm"></td>
        </tr>
    </form>
</table>