<div class="main" id="main">
    <?php
        include "sidebar/sidebar.php"
    ?>
    <div class="main-content">
        <?php
            $tam = $_GET['quanly'] ?? '';
            if ($tam == 'danhmucsanpham') {
                include "main/danhmuc.php";
            } elseif ($tam == 'giohang') {
                include "main/giohang.php";
            } elseif ($tam == 'tintuc') {
                include "main/tintuc.php";
            } elseif ($tam == 'lienhe') {
                include "main/lienhe.php";
            } elseif ($tam == 'sanpham') {
                include "main/sanpham.php";
            } elseif ($tam == 'dangky') {
                include "main/dangky.php";
            } elseif ($tam == 'thanhtoan') {
                include "main/thanhtoan.php";
            } elseif ($tam == 'dangnhap') {
                include "main/dangnhap.php";
            } elseif ($tam == 'timkiem') {
                include "main/timkiem.php";
            } elseif ($tam == 'camon') {
                include "main/camon.php";
            } elseif ($tam == 'doimatkhau') {
                include "main/doimatkhau.php";
            } else {
                include "main/index.php";
            }
        ?>
    </div>
</div>