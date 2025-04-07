<?php
require './models/SanPhamModel.php';
require './config/database.php';
// File cấu hình kết nối DB
// Tạo đối tượng Model và gọi hàm
$sanPhamModel = new SanPhamModel($db);
$listSanPham = $sanPhamModel->layTatCaSanPham();
// Truyền dữ liệu sang view
require './views/clientViews/trangChu.php';
?>
