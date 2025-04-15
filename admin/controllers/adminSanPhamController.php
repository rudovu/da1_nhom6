<?php

class adminSanPhamController
{

    public $modelSanPham;
    public $modelDanhMuc;

    public function __construct()
    {
        $this->modelSanPham = new modelSanPham;
        $this->modelDanhMuc = new modelDanhMuc;
    }
    public function danhSachSanPham()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $listSanPham = [];
            $sanPham = $this->modelSanPham->getAllSanPham();
            $search = $_POST['search'];

            foreach ($sanPham as $key => $value) {

                if (
                    strpos(strtolower($value['ten_san_pham']), strtolower($search)) !== false
                    || strpos(strtolower($value['ten_danh_muc']), strtolower($search)) !== false

                ) {
                    $listSanPham[] = $value;
                }
            }
        } else {
            $listSanPham = $this->modelSanPham->getAllSanPham();
        }
        require './views/sanPham/danhSachSanPham.php';
    }

    public function formThemSanPham()
    {
        $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();
        require './views/sanPham/formThemSanPham.php';
        deleteSessionError();
    }

    public function postThemSanPham()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $ten_san_pham = $_POST['ten_san_pham'];
            $gia_san_pham = $_POST['gia_san_pham'];
            $gia_khuyen_mai = $_POST['gia_khuyen_mai'];
            $so_luong = $_POST['so_luong'];
            $ngay_nhap = $_POST['ngay_nhap'];
            $danh_muc_id = $_POST['danh_muc_id'];
            $trang_thai = $_POST['trang_thai'];
            $mo_ta = $_POST['mo_ta'];

            $hinh_anh = $_FILES['hinh_anh'];
            $file_thumb = upLoad($hinh_anh, './uploads/');

            $error = [];
            if (empty($ten_san_pham)) {
                $error['ten_san_pham'] = "Không để trống tên sản phẩm";
            }
            if (empty($gia_san_pham)) {
                $error['gia_san_pham'] = "Không để trống giá sản phẩm";
            }
            if (empty($gia_khuyen_mai)) {
                $error['gia_khuyen_mai'] = "Không để trống giá khuyến mãi ";
            }
            if (empty($so_luong)) {
                $error['so_luong'] = "Không để trống ";
            }
            if (empty($ngay_nhap)) {
                $error['ngay_nhap'] = "Không để trống ngày nhập";
            }
            if (empty($danh_muc_id)) {
                $error['danh_muc_id'] = "Không để trống danh mục";
            }
            if (empty($trang_thai)) {
                $error['trang_thai'] = "Không để trống trạng thái";
            }

            if (empty($error)) {

                if ($this->modelSanPham->insertSanPham(
                    $ten_san_pham,
                    $gia_san_pham,
                    $gia_khuyen_mai,
                    $so_luong,
                    $ngay_nhap,
                    $danh_muc_id,
                    $trang_thai,
                    $mo_ta,
                    $file_thumb
                )) {
                    header('location:' . BASE_URL_ADMIN . '?act=danh-sach-san-pham');
                    exit();
                }
            } else {
                $_SESSION['flash'] = true;
                $_SESSION['error'] = $error;
                header('location:' . BASE_URL_ADMIN . '?act=form-them-san-pham');
                exit();
            }
        }
    }
    public function formSuaSanPham()
    {
        $id = $_GET['id'];
        $detailSanPham = $this->modelSanPham->getDetailSanPham($id);
        $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();
        if ($detailSanPham) {
            require './views/sanPham/formSuaSanPham.php';
            deleteSessionError();
        } else {

            header('location:' . BASE_URL_ADMIN . '?act=danh-sach-san-pham');
            exit();
        }
    }

    public function postSuaSanPham()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $ten_san_pham = $_POST['ten_san_pham'];
            $gia_san_pham = $_POST['gia_san_pham'];
            $gia_khuyen_mai = $_POST['gia_khuyen_mai'];
            $so_luong = $_POST['so_luong'];
            $ngay_nhap = $_POST['ngay_nhap'];
            $danh_muc_id = $_POST['danh_muc_id'];
            $trang_thai = $_POST['trang_thai'];
            $mo_ta = $_POST['mo_ta'];



            $hinh_anh = $_FILES['hinh_anh'];
            $detailSanPham = $this->modelSanPham->getDetailSanPham($id);
            $old_img = $detailSanPham['hinh_anh'];
            if (isset($hinh_anh) && $hinh_anh['error'] == UPLOAD_ERR_OK) {
                if (!empty($old_img)) {

                    deleteImg($old_img);
                }
                $new_img = upLoad($hinh_anh, './uploads/');
            } else {
                $new_img = $old_img;
            }




            $error = [];
            if (empty($ten_san_pham)) {
                $error['ten_san_pham'] = "Không để trống tên sản phẩm";
            }
            if (empty($gia_san_pham)) {
                $error['gia_san_pham'] = "Không để trống giá sản phẩm";
            }
            if (empty($gia_khuyen_mai)) {
                $error['gia_khuyen_mai'] = "Không để trống giá khuyến mãi ";
            }
            if (!isset($so_luong) || $so_luong === '') {
                $error['so_luong'] = "Không để trống";
            }
            
            if (empty($ngay_nhap)) {
                $error['ngay_nhap'] = "Không để trống ngày nhập";
            }
            if (empty($danh_muc_id)) {
                $error['danh_muc_id'] = "Không để trống danh mục";
            }
            if (empty($trang_thai)) {
                $error['trang_thai'] = "Không để trống trạng thái";
            }

            if (empty($error)) {
                $this->modelSanPham->suaSanPham(
                    $id,
                    $ten_san_pham,
                    $gia_san_pham,
                    $gia_khuyen_mai,
                    $so_luong,
                    $ngay_nhap,
                    $danh_muc_id,
                    $trang_thai,
                    $mo_ta,
                    $new_img
                );
                header('location:' . BASE_URL_ADMIN . '?act=danh-sach-san-pham');
                exit();
            } else {
                $_SESSION['flash'] = true;
                $_SESSION['error'] = $error;
                header('location:' . BASE_URL_ADMIN . '?act=form-sua-san-pham&id=' . $id);
                exit();
            }
        }
    }
    public function deleteSanPham()
    {
        $id = $_GET['id'];
        $detailSanPham = $this->modelSanPham->getDetailSanPham($id);
        deleteImg($detailSanPham['hinh_anh']);
        $this->modelSanPham->deleteSanPham($id);
        header('location:' . BASE_URL_ADMIN . '?act=danh-sach-san-pham');
        exit();
    }
    public function chiTietSanPham()
    {
        $id = $_GET['id'];
        $detailSanPham = $this->modelSanPham->getSanPhamChiTiet($id);
        $binhLuan = $this->modelSanPham->getAllBinhLuan($id);
        require './views/sanPham/chiTietSanPham.php';
    }

    public function anBinhLuan(){
        $id = $_GET['id'];
        $trang_thai = 0;
        $san_pham_id = $this->modelSanPham->getIdSanPham($id);
        $this->modelSanPham->trangThaiBinhLuan($id, $trang_thai);
        header('location:'. BASE_URL_ADMIN . '?act=chi-tiet-san-pham&id='.$san_pham_id['san_pham_id']);
        exit();
    }
    public function hienBinhLuan(){
        $id = $_GET['id'];
        $trang_thai = 1;
        $san_pham_id = $this->modelSanPham->getIdSanPham($id);
        $this->modelSanPham->trangThaiBinhLuan($id, $trang_thai);
        header('location:'. BASE_URL_ADMIN . '?act=chi-tiet-san-pham&id='.$san_pham_id['san_pham_id']);
        exit();
    }
    public function xoaBinhLuan(){
        $id = $_GET['id'];
        $san_pham_id = $this->modelSanPham->getIdSanPham($id);
        $this->modelSanPham->deleteBinhLuan($id);
        header('location:'. BASE_URL_ADMIN . '?act=chi-tiet-san-pham&id='.$san_pham_id['san_pham_id']);
        exit();
    }
}
