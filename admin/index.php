<?php 
session_start();
    require_once '../commons/env.php'; // Khai báo biến môi trường
    require_once '../commons/function.php'; // Hàm hỗ trợ
    
    // Require toàn bộ file Controllers
    require_once './controllers/adminDanhMucController.php';
    require_once './controllers/adminSanPhamController.php';
    require_once './controllers/adminDonHangController.php';
    
    // Require toàn bộ file Models
    require_once './models/modelDanhMuc.php';
    require_once './models/modelSanPham.php';
    require_once './models/modelDonHang.php';

if (isset($_SESSION['username'])) {

    
    
    // Route
    $act = $_GET['act'] ?? '/';
    
    // Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match
    
    match ($act) {
        // Trang Login
             '/' => (new adminDanhMucController())->danhMucSanPham(),
    
             'logout' => (new adminDanhMucController())->logout(),
    
             'form-them-danh-muc' => (new adminDanhMucController())->formThemDanhMuc(),
    
             'post-them-danh-muc' => (new adminDanhMucController())->postThemDanhMuc(),
    
             'delete-danh-muc' => (new adminDanhMucController())->deleteDanhmuc(),
    
             'form-sua-danh-muc' => (new adminDanhMucController())->formSuaDanhMuc(),
    
             'post-sua-danh-muc' => (new adminDanhMucController())->postSuaDanhMuc(),
    
             'tim-kiem-danh-muc' => (new adminDanhMucController())->danhMucSanPham(),
    
    
            //  san pham
            'danh-sach-san-pham' => (new adminSanPhamController())->danhSachSanPham(),
    
            'tim-kiem-san-pham' => (new adminSanPhamController())->danhSachSanPham(),
    
            'form-them-san-pham' => (new adminSanPhamController())->formThemSanPham(),
    
            'post-them-san-pham' => (new adminSanPhamController())->postThemSanPham(),
    
            'form-sua-san-pham' => (new adminSanPhamController())->formSuaSanPham(),
    
            'post-sua-san-pham' => (new adminSanPhamController())->postSuaSanPham(),
    
            'delete-san-pham' => (new adminSanPhamController())->deleteSanPham(),
    
            'chi-tiet-san-pham' => (new adminSanPhamController())->chiTietSanPham(),

            'an-binh-luan' => (new adminSanPhamController())->anBinhLuan(),
            
            'hien-binh-luan' => (new adminSanPhamController())->hienBinhLuan(),

            'xoa-binh-luan' => (new adminSanPhamController())->xoaBinhLuan(),
    
            // don hang
            'danh-sach-don-hang' => (new adminDonHangController())->danhSachDonHang(),
    
    
            'chi-tiet-don-hang' => (new adminDonHangController())->chiTietDonHang(),
    
            'post-trang-thai' => (new adminDonHangController())->postTrangThai(),
    
            'thong-ke' => (new adminDonHangController())->thongKe(),   

            'huy-cam-tai-khoan' => (new adminDonHangController())->boCamTaiKhoan(),

            'cam-tai-khoan' => (new adminDonHangController())->camTaiKhoan(),

     
    };
    
} else {
    header('location:' . BASE_URL);
    exit();
}



// Require file Common
