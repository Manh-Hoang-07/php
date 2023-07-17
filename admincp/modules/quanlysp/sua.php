<?php
$sql_lietke_sp = "SELECT * FROM tbl_sanpham WHERE id='$_GET[id]' LIMIT 1";
$query_lietke_sp = mysqli_query($mysqli, $sql_lietke_sp);
?>
<p>Sửa sản phẩm</p>
<table border="1" width="50%" style="border-collapse: collapse;">
    <form method="POST" action="modules/quanlysp/xuly.php?id=<?php echo $_GET['id'] ?? '' ?>"
          enctype="multipart/form-data">
        <?php
        while ($row = mysqli_fetch_array($query_lietke_sp)) {
            ?>
            <tr>
                <td>Tên sản phẩm</td>
                <td><input type="text" name="tensanpham" value="<?php echo $row['tensanpham'] ?? '' ?>"></td>
            </tr>
            <tr>
                <td>Mã sản phẩm</td>
                <td><input type="text" name="masp" value="<?php echo $row['masp'] ?? '' ?>"></td>
            </tr>
            <tr>
                <td>Giá sản phẩm</td>
                <td><input type="text" name="giasp" value="<?php echo $row['giasp'] ?? '' ?>"></td>
            </tr>
            <tr>
                <td>Số lượng sản phẩm</td>
                <td><input type="text" name="soluong" value="<?php echo $row['soluong'] ?? '' ?>"></td>
            </tr>
            <tr>
                <td>Hình ảnh sản phẩm</td>
                <td>
                    <input type="file" name="hinhanh">
                    <img src="modules/quanlysp/uploads/<?php echo $row['hinhanh'] ?? '' ?>" width="150px;">
                </td>
            </tr>
            <tr>
                <td>Danh mục sản phẩm</td>
                <td>
                    <select name="id_danhmuc">
                        <?php
                        $sql_select_category = "SELECT * FROM tbl_danhmuc";
                        $query_select_category = mysqli_query($mysqli, $sql_select_category);
                        while ($row_category = mysqli_fetch_array($query_select_category)) {
                            if ($row_category['id'] == $row['id_danhmuc']) {
                                ?>
                                <option selected
                                        value="<?php echo $row_category['id'] ?? '' ?>"><?php echo $row_category['tendanhmuc'] ?? '' ?></option>
                                <?php
                            } else {
                                ?>
                                <option value="<?php echo $row_category['id'] ?? '' ?>"><?php echo $row_category['tendanhmuc'] ?? '' ?></option>
                                <?php
                            }
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Tóm tắt sản phẩm</td>
                <td><textarea name="tomtat"><?php echo $row['tomtat'] ?? '' ?></textarea></td>
            </tr>
            <tr>
                <td>Nội dung sản phẩm</td>
                <td><textarea name="noidung"><?php echo $row['noidung'] ?? '' ?></textarea></td>
            </tr>
            <tr>
                <td>Trạng thái</td>
                <td>
                    <select name="status">
                        <?php
                        if (!empty($row['status']) && $row['status'] == 1) {
                            ?>
                            <option value="1" selected>Kích hoạt</option>
                            <option value="0">Không kích hoạt</option>
                            <?php
                        } else {
                            ?>
                            <option value="1">Kích hoạt</option>
                            <option value="0" selected>Không kích hoạt</option>
                            <?php
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" name="suasanpham" value="Sửa sản phẩm"></td>
            </tr>
            <?php
        }
        ?>
    </form>
</table>