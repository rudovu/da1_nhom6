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
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $search = isset($_POST['search']) ? trim($_POST['search']) : '';
            $listDanhMuc = [];

            // Lấy tất cả danh mục từ model
            $danhMuc = $this->modelDanhMucClient->getAllDanhMuc();

            // Lọc danh mục dựa trên từ khóa tìm kiếm
            if (!empty($search)) {
                $listDanhMuc = array_filter($danhMuc, function ($value) use ($search) {
                    return strpos(strtolower($value['ten_danh_muc']), strtolower($search)) !== false;
                });
            } else {
                $listDanhMuc = $danhMuc;
            }
        } else {
            // Không tìm kiếm, lấy tất cả danh mục
            $listDanhMuc = $this->modelDanhMucClient->getAllDanhMuc();
        }

        // Trả dữ liệu về View
        include './client/views/sanPham/danhSachSanPham.php';
    }
    public function filter()
    {
        $id_dm = $_GET['danh_muc_id'] ?? null;
        if ($id_dm) {
            $products = (new modelDanhMucClient)->sanPhamTheoDanhMuc($id_dm);
        } else {
            $products = (new modelSanPham)->getAllSanPham(); // Lấy tất cả sản phẩm
        }

    }
}
