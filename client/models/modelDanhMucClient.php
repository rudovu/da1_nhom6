<?php
class modelDangMucClient
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function getAllDanhMuc()
    {
        try {
            $sql = "SELECT * FROM danh_mucs";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "ERROR" . $e->getMessage();
        }
    }
    public function sanPhamTheoDanhMuc($danh_muc_id)
    {
        $sql = "SELECT `id`, `ten_san_pham`, `gia_san_pham`, `gia_khuyen_mai`, `hinh_anh`, `so_luong`, `luot_xem`, `mo_ta`, danh_mucs.ten_danh_muc 
            FROM `san_phams` JOIN danh_mucs ON san_phams.danh_muc_id = danh_mucs.id WHERE san_phams.danh_muc_id = :danh_muc_id ORDER BY id DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':danh_muc_id', $danh_muc_id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Trả về tất cả sản phẩm trong danh mục
    }
}