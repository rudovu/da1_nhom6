<?php
class clientSanPhamController
{
    public $modelSanPham;
    public function __construct()
    {
        $this->modelSanPham = new modelSanPham;
    }
    public function danhSachSanPham()
    {
        $listSanPham = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $search = $_POST['search'];
            $sanPham = $this->modelSanPham->getAllSanPham();

            foreach ($sanPham as $key => $value){
                if(strpos( strtolower($value['ten_san_pham']) , strtolower($search)) !== false){
                    $listSanPham[] = $value;
                }
            }

        } else {

            $listSanPham = $this->modelSanPham->getAllSanPham();
        }
        require './views/sanPham/danhSachSanPham.php';
    }
    public function chiTietSanPham()
    {
        $id = $_GET['id'];
        $detailSanPham = $this->modelSanPham->getSanPhamChiTiet($id);
        $binhLuan = $this->modelSanPham->getAllBinhLuan($id);
        $idClient = $this->modelSanPham->getIdClient($_SESSION['username']);

        $luotXem = $this->modelSanPham->luotXem($id);

        require './views/sanPham/chiTietSanPham.php';
        deleteSessionError();
    }
    public function themBinhLuan()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $tai_khoan_id = $_POST['tai_khoan_id'];
            $ngay_dang = $_POST['ngay_dang'];
            $binh_luan = $_POST['binh_luan'];
            $id = $_POST['id_san_pham'];
            $error = [];
            if (empty($binh_luan)) {
                $error['binh_luan'] = 'Không để trống bình luận';
            }
            if (empty($error)) {
                $this->modelSanPham->addBinhLuan($id, $tai_khoan_id, $ngay_dang, $binh_luan);
                header('location:' . BASE_URL_CLIENT . '?act=chi-tiet-san-pham&id=' . $id);
                exit();
            } else {
                $_SESSION['flash'] = true;
                $_SESSION['error'] = $error;
                header('location:' . BASE_URL_CLIENT . '?act=chi-tiet-san-pham&id=' . $id);
                exit();
            }
        }
    }
}