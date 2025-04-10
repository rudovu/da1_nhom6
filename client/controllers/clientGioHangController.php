<?php 
class clientGioHangController{
    public $modelGioHang;
    public $modelSanPham;
    public $modelDonHang;
    public function __construct()
    {
        $this->modelGioHang = new modelGioHang;
        $this->modelSanPham = new modelSanPham;
        $this->modelDonHang = new modelDonHang;
    }

    public function gioHang(){

        // lây ra id của giỏ hàng
        $tai_khoan_id = $this->modelSanPham->getIdClient($_SESSION['username']);
        
        if($this->modelGioHang->getIdGioHang($tai_khoan_id['id']) == false){
            $this->modelGioHang->insertIdGioHang($tai_khoan_id['id']);
        }
        $idGioHang = $this->modelGioHang->getIdGioHang($tai_khoan_id['id']);
        $listSanPham = $this->modelGioHang->getAllSanPham($idGioHang['id']);
        require './views/gioHang/gioHang.php';
    }

    public function muaTatCa(){
        // Lấy id của người dùng hiện tại
        $tai_khoan_id = $this->modelSanPham->getIdClient($_SESSION['username']);
        
        // Lấy id giỏ hàng
        if($this->modelGioHang->getIdGioHang($tai_khoan_id['id']) == false){
            $this->modelGioHang->insertIdGioHang($tai_khoan_id['id']);
        }
        $idGioHang = $this->modelGioHang->getIdGioHang($tai_khoan_id['id']);
        
        // Lấy tất cả sản phẩm trong giỏ hàng
        $listSanPham = $this->modelGioHang->getAllSanPham($idGioHang['id']);
        
        // Lấy thông tin phương thức thanh toán
        $phuongThucThanhToan = $this->modelDonHang->getPhuongThucThanhToan();
        
        require './views/gioHang/formDatHangTatCa.php';
        deleteSessionError();
    }

    public function themGioHang(){
        $id = $_GET['id'];
        $sanPham = $this->modelSanPham->getSanPhamChiTiet($id);
        $tai_khoan_id = $this->modelSanPham->getIdClient($_SESSION['username']);
        require './views/gioHang/formThemGioHang.php';

    }
    public function postThemGioHang(){
        if($_SERVER['REQUEST_METHOD']){
            $tai_khoan_id = $_POST['tai_khoan_id'];
            if($this->modelGioHang->getIdGioHang($tai_khoan_id) == false){
                $this->modelGioHang->insertIdGioHang($tai_khoan_id);
            }
            $idGioHang = $this->modelGioHang->getIdGioHang($tai_khoan_id);
            

            $san_pham_id = $_POST['san_pham_id'];
            $so_luong = $_POST['so_luong'];

            $this->modelGioHang->insertChiTietGioHang($idGioHang['id'], $san_pham_id, $so_luong);
            header('location:'.BASE_URL_CLIENT . '?act=danh-sach-san-pham');
        }
    }

    public function deleteGioHang(){
        $id = $_GET['id'];
        $this->modelGioHang->deleteGiohang($id);
        header('location:'. BASE_URL_CLIENT . '?act=gio-hang');
        exit();
    }

    public function postDatHangTatCa(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            // Lấy thông tin khách hàng
            $tai_khoan_id = $this->modelSanPham->getIdClient($_SESSION['username']);
            
            // Lấy id giỏ hàng
            $idGioHang = $this->modelGioHang->getIdGioHang($tai_khoan_id['id']);
            
            // Lấy danh sách sản phẩm trong giỏ
            $listSanPham = $this->modelGioHang->getAllSanPham($idGioHang['id']);
            
            // Kiểm tra nếu giỏ hàng trống
            if (empty($listSanPham)) {
                $_SESSION['error_message'] = "Giỏ hàng của bạn đang trống!";
                header('location:' . BASE_URL_CLIENT . '?act=gio-hang');
                exit();
            }
            
            // Tạo mã đơn hàng
            $ma_don_hang = 'DH-' . rand(100000000, 10000000000);
            
            // Lấy thông tin người nhận từ form
            $ten_nguoi_nhan = $_POST['ten_nguoi_nhan'];
            $email_nguoi_nhan = $_POST['email_nguoi_nhan'];
            $sdt_nguoi_nhan = $_POST['sdt_nguoi_nhan'];
            $dia_chi_nguoi_nhan = $_POST['dia_chi_nguoi_nhan'];
            $ngay_dat = date('Y-m-d');
            $ghi_chu = $_POST['ghi_chu'];
            $phuong_thuc_thanh_toan_id = $_POST['phuong_thuc_thanh_toan_id'];
            $trang_thai_id = 1; // Trạng thái mặc định (chờ xác nhận)
            
            // Tính tổng tiền toàn bộ đơn hàng
            $tong_tien = 0;
            foreach($listSanPham as $item){
                // Sử dụng gia_khuyen_mai hoặc gia_san_pham
                $donGia = isset($item['gia_khuyen_mai']) ? $item['gia_khuyen_mai'] : $item['gia_san_pham'];
                $tong_tien += $donGia * $item['so_luong'];
            }
            
            // Validate form
            $error = [];
            if(empty($ten_nguoi_nhan)){
                $error['ten_nguoi_nhan'] = 'Vui lòng nhập tên người nhận';
            }
            if(empty($email_nguoi_nhan)){
                $error['email_nguoi_nhan'] = 'Vui lòng nhập email';
            }
            if(empty($sdt_nguoi_nhan)){
                $error['sdt_nguoi_nhan'] = 'Vui lòng nhập số điện thoại';
            }
            if(empty($dia_chi_nguoi_nhan)){
                $error['dia_chi_nguoi_nhan'] = 'Vui lòng nhập địa chỉ';
            }
            
            if(empty($error)) {
                // Tạo đơn hàng
                $don_hang_id = $this->modelDonHang->insertDonHang(
                    $ma_don_hang,
                    $tai_khoan_id['id'],
                    $ten_nguoi_nhan,
                    $email_nguoi_nhan,
                    $sdt_nguoi_nhan,
                    $ngay_dat,
                    $tong_tien,
                    $ghi_chu,
                    $phuong_thuc_thanh_toan_id,
                    $trang_thai_id,
                    $dia_chi_nguoi_nhan
                );
                
                // Thêm chi tiết đơn hàng cho từng sản phẩm
                foreach($listSanPham as $item){
                    // Sử dụng gia_khuyen_mai hoặc gia_san_pham
                    $donGia = isset($item['gia_khuyen_mai']) ? $item['gia_khuyen_mai'] : $item['gia_san_pham'];
                    
                    $this->modelDonHang->insertChiTietDonHang(
                        $don_hang_id,
                        $item['id_san_pham'],
                        $donGia,
                        $item['so_luong'],
                        $donGia * $item['so_luong']
                    );
                    
                    // Xóa sản phẩm khỏi giỏ hàng
                    $this->modelGioHang->deleteGiohang($item['id']);
                }
                
                header('location:' . BASE_URL_CLIENT . '?act=danh-sach-don-hang');
                exit();
            } else {
                $_SESSION['flash'] = true;
                $_SESSION['error'] = $error;
                header('location:' . BASE_URL_CLIENT . '?act=mua-tat-ca');
                exit();
            }
        }
    }
}