<?php
session_start();
// Require file Common
require_once '../commons/env.php'; // Khai báo biến môi trường
require_once '../commons/function.php'; // Hàm hỗ trợ
// Require toàn bộ file Controllers
require_once './controllers/clientController.php';
require_once './controllers/clientSanPhamController.php';
require_once './controllers/clientGioHangController.php';
require_once './controllers/clientDonHangController.php';
require_once './controllers/clientDanhMucController.php';
// Require toàn bộ file Models
require_once './models/modelClient.php';
require_once './models/modelSanPham.php';
require_once './models/modelGioHang.php';
require_once './models/modelDonHang.php';
require_once './models/modelDanhMucClient.php';

if (isset($_SESSION['username'])) {

 
    
    // Route
    $act = $_GET['act'] ?? '/';
    
    // Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match
    
    match ($act) {
        // Trang chủ và các trang liên quan
        '/' => (new clientController())->trangChu(),
        'logout' => (new clientController())->logout(),
    
        // Sản phẩm
        'danh-sach-san-pham' => (new clientSanPhamController())->danhSachSanPham(),
        'chi-tiet-san-pham' => (new clientSanPhamController())->chiTietSanPham(),
        'them-binh-luan' => (new clientSanPhamController())->themBinhLuan(),
    
        // Giỏ hàng
        'gio-hang' => (new clientGioHangController())->gioHang(),
        'them-gio-hang' => (new clientGioHangController())->themGioHang(),
        'post-them-gio-hang' => (new clientGioHangController())->postThemGioHang(),
        'delete-gio-hang' => (new clientGioHangController())->deleteGioHang(),
    
        // Đơn hàng
        'danh-sach-don-hang' => (new clientDonHangController())->danhSachDonHangKhachHang(),
        'chi-tiet-don-hang' => (new clientDonHangController())->chiTietDonHang(),
        'sua-thong-tin-nguoi-nhan' => (new clientDonHangController())->formSuaDonHang(),
        'post-sua-thong-tin-nguoi-nhan' => (new clientDonHangController())->postSuaSanPham(),
        'dat-hang' => (new clientDonHangController())->datHang(),
        'post-dat-hang' => (new clientDonHangController())->postDonHang(),
    
        // Danh mục sản phẩm
        'san-pham-theo-danh-muc' => (new clientDanhMucController())->filter(),
    
        // Thêm case cho san-pham nếu cần thiết
        'san-pham' => (new clientSanPhamController())->danhSachSanPham(), // Giả sử là trang danh sách sản phẩm
    };
    
} else {
    header('location:' . BASE_URL);
    exit();
}