<div class="sidebar">
    <ul class="list-sidebar">
        <?php
        $sql_danhmuc = "SELECT * FROM tbl_danhmuc";
        $query_danhmuc = mysqli_query($mysqli, $sql_danhmuc);
        while ($row_danhmuc = mysqli_fetch_array($query_danhmuc)) {
        ?>
            <li><a href="index.php?quanly=danhmucsanpham&id=<?php echo $row_danhmuc['id'] ?? '' ?>"><?php echo $row_danhmuc['tendanhmuc'] ?? '' ?></a></li>
        <?php
        }
        ?>
    </ul>
</div>