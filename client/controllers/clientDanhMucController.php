<?php
class clientDanhMucController
{
    public $modelDanhMucClient;
    public function __construct()
    {
        $this->modelDanhMucClient = new modelDanhMucClient();
    }
    public function danhMucSanPham()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            $search = isset($_POST['search']) ? trim($_POST['search']) : '';
            $listDanhMuc = [];

            $danhMuc = $this->modelDanhMucClient->getAllDanhMuc();

            if (!empty($search)) {
                $listDanhMuc = array_filter($danhMuc, function ($value) use ($search){
                    return strops(strtolower($value['ten_danh_muc']), strtolower($search)) !== false;
                });
            } else {
                $listDanhMuc = $danhMuc;
            } 
        } else {
                $listDanhMuc = $this->modelDanhMucClient->getAllDanhMuc();
            }
            include './client/views/sanPham/danhSachSanPham.php';
        }
        public function filter(){
            $id_dm = $_GET['danh_muc_id'] ?? null;
            if ($id_dm){
                $products = (new modelDanhMucClient)->sanPhamTheoDanhMuc($id_dm);
            } else {
                $products = (new modelSanPham)->getAllSanPham();
            }
        }
    }
