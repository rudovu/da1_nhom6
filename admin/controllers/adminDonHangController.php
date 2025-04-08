<?php

class adminDonHangController
{

    public $modelDonHang;

    public function __construct()
    {
        $this->modelDonHang = new modelDonHang;
    }
    public function danhSachDonHang()
    {
        

            
            if($_SERVER['REQUEST_METHOD'] === 'POST'){
                $listSearch = $this->modelDonHang->getAllDonHang();
                $listDonHang = [];
                $search = $_POST['search'];
                foreach ($listSearch as $key => $value){
                  
                    
                        if(
                            strpos(strtolower($value['ma_don_hang']), strtolower($search)) !== false
                            || strpos(strtolower($value['ten_nguoi_nhan']), strtolower($search)) !== false
                            || strpos(strtolower($value['sdt_nguoi_nhan']), strtolower($search)) !== false
                            
                        ){

                            $listDonHang[] = $value;
                           
                        }
                  
                    
                }
            }else{
                $listDonHang = $this->modelDonHang->getAllDonHang();
            }
            require './views/donHang/danhSachDonHang.php';
      
    }
    public function chiTietDonHang(){
        $id = $_GET['don_hang_id'];
        $detailDonHang = $this->modelDonHang->getDetailDonHang($id);
        $listSanPhamDonhang = $this->modelDonHang->getListSPDonHang($id);
        $listTrangThai = $this->modelDonHang->getAllTrangThai();
        require './views/donHang/chiTietDonHang.php';
    }

    public function postTrangThai(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $id = $_GET['id_don_hang'];
            $trang_thai_id = $_POST['trang_thai'];

            if($this->modelDonHang->suaTrangThai($id, $trang_thai_id)){
                header('location:'. BASE_URL_ADMIN . '?act=chi-tiet-don-hang&don_hang_id='.$id);
                exit();
            }
        }
    }

    public function thongKe(){
        $listDonHang = $this->modelDonHang->getAllDonHang();
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $search = $_POST['search'];
            $list = $this->modelDonHang->getAllTaiKhoan();
             $listTaiKhoans = [];


            foreach($list as $key => $value){
                if(strpos(strtolower($value['ho_ten']), strtolower($search))){
                    $listTaiKhoans[] = $value;
                }
            }

        }else{
            $listTaiKhoans = $this->modelDonHang->getAllTaiKhoan();
        }
        
        require './views/donHang/thongKe.php';
    }
    public function boCamTaiKhoan(){
        $id = $_GET['id'];
        $this->modelDonHang->thayDoiTrangThai($id, 0);
        header('location:' . BASE_URL_ADMIN . '?act=thong-ke');
        exit();
    }
    public function camTaiKhoan(){
        $id = $_GET['id'];
        $this->modelDonHang->thayDoiTrangThai($id, 0);
        header('location:' . BASE_URL_ADMIN . '?act=thong-ke');
        exit();
    }
    
}
