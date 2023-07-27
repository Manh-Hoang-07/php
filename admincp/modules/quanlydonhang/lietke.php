<?php
$sql_lietke_dh = "SELECT *, tbl_dangky.id as tbl_dangky_id FROM tbl_cart,tbl_dangky WHERE tbl_cart.id_khachhang = tbl_dangky.id ORDER BY tbl_cart.id DESC";
$query_lietke_dh = mysqli_query($mysqli, $sql_lietke_dh);
?>
<table border="1" width="100%" style="border-collapse: collapse;">
    <tr>
        <th>Id</th>
        <th>Mã đơn hàng</th>
        <th>Tên khách hàng</th>
        <th>Địa chỉ</th>
        <th>Email</th>
        <th>Số điện thoại</th>
        <th>Quản lý</th>
    </tr>
    <?php
    $i = 0;
    while ($row = mysqli_fetch_array($query_lietke_dh)) {
        $i++;
        ?>
        <tr>
            <td><?php echo $i ?></td>
            <td><?php echo $row['code'] ?? '' ?></td>
            <td><?php echo $row['tenkhachhang'] ?? '' ?></td>
            <td><?php echo $row['diachi'] ?? '' ?></td>
            <td><?php echo $row['email'] ?? '' ?></td>
            <td><?php echo $row['dienthoai'] ?? '' ?></td>
            <td>
                <a href="index.php?action=donhang&query=xemdonhang&code=<?php echo ($row['code'] ?? '') ?>">Xem đơn hàng</a>
            </td>
        </tr>
        <?php
    }
    ?>
</table>
