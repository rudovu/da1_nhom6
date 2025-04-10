<?php
class clientDonHangController
{
    public $modelDonHang;
    public $modelSanPham;
    public function __construct()
    {
        $this->modelDonHang = new modelDonHang;
        $this->modelSanPham = new modelSanPham;
    }
    public function danhSachDonHangKhachHang()
    {

        $tai_khoan_id  = $this->modelSanPham->getIdclient($_SESSION['username']);
      
        $listDonHangKhachHang = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $search = $_POST['search'];
            $listDonHang = $this->modelDonHang->getAllDonHang($tai_khoan_id['id']);
            foreach ($listDonHang as $key => $value) {
                if (strpos(strtolower($value['ma_don_hang']), strtolower($search)) !== false) {
                    $listDonHangKhachHang[] = $value;
                }
            }
        } else {
            $listDonHangKhachHang = $this->modelDonHang->getAllDonHang($tai_khoan_id['id']);
        }



        require './views/donHang/danhSachDonHangKhachHang.php';
    }
    public function chiTietDonHang()
    {
        if (!isset($_GET['don_hang_id']) || empty($_GET['don_hang_id'])) {
            echo "<div class='alert alert-danger'>Thiếu mã đơn hàng.</div>";
            return;
        }
    
        $id = $_GET['don_hang_id'];
    
        $listTrangThai = $this->modelDonHang->getAllTrangThai();
    
        $detailDonHang = $this->modelDonHang->getDetailDonHang($id);
        if (!$detailDonHang) {
            echo "<div class='alert alert-danger'>Không tìm thấy thông tin đơn hàng.</div>";
            return;
        }
    
        $getIdSanPham = $this->modelDonHang->getIdSanPham($id);
        $detailSanPham = null;
        if ($getIdSanPham && isset($getIdSanPham['san_pham_id'])) {
            $detailSanPham = $this->modelDonHang->getDetailSanPham($getIdSanPham['san_pham_id']);
        }
    
        $listSanPhamDonhang = $this->modelDonHang->getListSPDonHang($id);
    
        require './views/donHang/chiTietDonHang.php';
    }
    
    public function formSuaDonHang()
    {
        $id = $_GET['don_hang_id'];


        $detailDonHang = $this->modelDonHang->getDetailDonHang($id);

        require_once './views/donHang/formSuaDonHang.php';

        deleteSessionError();
    }

    public function postSuaSanPham()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $don_hang_id = $_POST['don_hang_id'];
            $ten_nguoi_nhan = $_POST['ten_nguoi_nhan'];
            $email_nguoi_nhan = $_POST['email_nguoi_nhan'];
            $sdt_nguoi_nhan = $_POST['sdt_nguoi_nhan'];
            $dia_chi_nguoi_nhan = $_POST['dia_chi_nguoi_nhan'];
            $ghi_chu = $_POST['ghi_chu'];

            $error = [];
            if (empty($ten_nguoi_nhan)) {
                $error['ten_nguoi_nhan'] = 'Không để trống tên người nhận';
            }
            if (empty($ten_nguoi_nhan)) {
                $error['email_nguoi_nhan'] = 'Không để trống email người nhận';
            }
            if (empty($sdt_nguoi_nhan)) {
                $error['sdt_nguoi_nhan'] = 'Không để trống số điện thoại người nhận';
            }
            if (empty($dia_chi_nguoi_nhan)) {
                $error['dia_chi_nguoi_nhan'] = 'Không để trống địa chỉ người nhận';
            }


            if (empty($error)) {
                $this->modelDonHang->upDateDonHang(
                    $don_hang_id,
                    $ten_nguoi_nhan,
                    $email_nguoi_nhan,
                    $sdt_nguoi_nhan,
                    $dia_chi_nguoi_nhan,
                    $ghi_chu

                );

                header('location:' . BASE_URL_CLIENT . '?act=chi-tiet-don-hang&don_hang_id=' . $don_hang_id);
                exit;
            } else {
                $_SESSION['flash'] = true;
                $_SESSION['error'] = $error;
                header('location:' . BASE_URL_CLIENT . '?act=sua-thong-tin-nguoi-nhan&don_hang_id=' . $don_hang_id);
                exit();
            }
        }
    }
    public function datHang()
    {
        if (!isset($_GET['san_pham_id']) || empty($_GET['san_pham_id'])) {
            header('location:' . BASE_URL_CLIENT . '?act=mua-tat-ca');
            exit();
        }
        
        $san_pham_id = $_GET['san_pham_id'];

        $detailSanPham = $this->modelDonHang->getDetailSanPham($san_pham_id);
        
        if (!$detailSanPham) {
            $_SESSION['error_message'] = "Không tìm thấy thông tin sản phẩm!";
            header('location:' . BASE_URL_CLIENT . '?act=gio-hang');
            exit();
        }
        
        $phuongThucThanhToan = $this->modelDonHang->getPhuongThucThanhToan();
        
        require './views/donhang/formDatHang.php';

        deleteSessionError();
    }

    
    public function postDonHang()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $san_pham_id = $_POST['san_pham_id'];
            // lấy toàn bộ các giá trị cần thiết trong bảng đơn hàng
            $ma_don_hang = 'DH-' . rand(100000000, 10000000000);
            $tai_khoan_id  = $this->modelSanPham->getIdclient($_SESSION['username']);
            $ten_nguoi_nhan = $_POST['ten_nguoi_nhan'];
            $email_nguoi_nhan = $_POST['email_nguoi_nhan'];
            $sdt_nguoi_nhan = $_POST['sdt_nguoi_nhan'];
            $dia_chi_nguoi_nhan = $_POST['dia_chi_nguoi_nhan'];
            $ngay_dat = date('Y-m-d');
            $ghi_chu = $_POST['ghi_chu'];
            $phuong_thuc_thanh_toan_id = $_POST['phuong_thuc_thanh_toan_id'];

            // lấy ra id lớn nhất sắp đc tạo ở đơn hàng
            $allDonHang = $this->modelDonHang->AllDonHang();
            $maxIdDonHang = 0;
            foreach ($allDonHang as $key => $value) {
                if ($value['id'] > $maxIdDonHang) {
                    $maxIdDonHang = $value['id'];
                }
            }
            $don_hang_id  = $maxIdDonHang + 1;




            $trang_thai_id = 1;

            $error = [];
            if (empty($_POST['so_luong'])) {
                $error['so_luong'] = 'Vui lòng nhập lớn hơn 0';
            } else {
                $tong_tien = $_POST['so_luong'] * $_POST['don_gia'];
            }
            if (empty($ten_nguoi_nhan)) {
                $error['ten_nguoi_nhan'] = 'Vui lòng nhập tên người nhận ';
            }
            if (empty($email_nguoi_nhan)) {
                $error['email_nguoi_nhan'] = 'Vui lòng nhập email ';
            }
            if (empty($sdt_nguoi_nhan)) {
                $error['sdt_nguoi_nhan'] = 'Vui lòng nhập số điện thoại';
            }
            if (empty($dia_chi_nguoi_nhan)) {
                $error['dia_chi_nguoi_nhan'] = 'Vui lòng nhập địa chỉ';
            }


            if (empty($error)) {
                $this->modelDonHang->insertDonHang(
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
                    $dia_chi_nguoi_nhan,
                );
                $e =  $this->modelDonHang->insertChiTietDonHang($don_hang_id, $san_pham_id, $_POST['don_gia'], $_POST['so_luong'], $tong_tien);

                header('location:' . BASE_URL_CLIENT . '?act=danh-sach-don-hang');
                exit();
            } else {
                $_SESSION['flash'] = true;
                $_SESSION['error'] = $error;
                header('location:' . BASE_URL_CLIENT . '?act=dat-hang&san_pham_id=' . $san_pham_id);
                exit();
            }
        }
    }

    
}
