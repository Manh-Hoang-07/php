<div class="clear"></div>
<div class="main">
<?php
$tam = $_GET['action'] ?? '';
$query = $_GET['query'] ?? '';
if ($tam == 'quanlydanhmucsanpham' && $query == 'them') {
    include "quanlydanhmucsp/them.php";
    include "quanlydanhmucsp/lietke.php";
} elseif ($tam == 'quanlydanhmucsanpham' && $query == 'sua') {
    include "quanlydanhmucsp/sua.php";
}elseif ($tam == 'quanlysanpham' && $query == 'them') {
    include "quanlysp/them.php";
    include "quanlysp/lietke.php";
}elseif ($tam == 'quanlysanpham' && $query == 'sua') {
    include "quanlysp/sua.php";
} else {
    include "dashboard.php";
}
?>
</div>