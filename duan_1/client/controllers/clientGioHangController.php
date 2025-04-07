<?php 
class clientGioHangController{
    public $modelGioHang;
    public $modelSanPham;
    public function __construct()
    {
        $this->modelGioHang = new modelGioHang;
        $this->modelSanPham = new modelSanPham;
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
}