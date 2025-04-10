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
        // Trang Login
            '/' => (new clientController())->trangChu(),
    
            'logout' => (new clientController())->logout(),

            'danh-sach-san-pham' => (new clientSanPhamController())->danhSachSanPham(),

            'chi-tiet-san-pham' => (new clientSanPhamController())->chiTietSanPham(),

            'them-binh-luan' => (new clientSanPhamController())->themBinhLuan(),

            // gio hang

            'gio-hang' => (new clientGioHangController())->gioHang(),

            'them-gio-hang' => (new clientGioHangController())->themGioHang(),

            'post-them-gio-hang' => (new clientGioHangController())->postThemGioHang(),

            'delete-gio-hang' => (new clientGioHangController())->deleteGioHang(),

            'mua-tat-ca' => (new clientGioHangController())->muaTatCa(),

            'post-dat-hang-tat-ca' => (new clientGioHangController())->postDatHangTatCa(),

            'danh-sach-don-hang' => (new clientDonHangController())->danhSachDonHangKhachHang(),
            
            'chi-tiet-don-hang' => (new clientDonHangController())->chiTietDonHang(),

            'sua-thong-tin-nguoi-nhan' => (new clientDonHangController())->formSuaDonHang(),

            'post-sua-thong-tin-nguoi-nhan' => (new clientDonHangController())->postSuaSanPham(),

            'dat-hang' => (new clientDonHangController())->datHang(),

            'post-dat-hang' => (new clientDonHangController())->postDonHang(),

            'san-pham-theo-danh-muc' => (new clientDanhMucController())->filter(),

            // profile
            'profile' => (new clientController())->profileInfo(),
            'update-profile' => (new clientController())->updateProfileForm(),
            'post-update-profile' => (new clientController())->postUpdateProfile(),
            'change-password' => (new clientController())->changePasswordForm(),
            'post-change-password' => (new clientController())->postChangePassword(),

    };
} else {
    header('location:' . BASE_URL);
    exit();
}