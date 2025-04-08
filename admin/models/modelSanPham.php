<?php

class modelSanPham
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function getAllSanPham()
    {
        try {
            $sql = "SELECT *,danh_mucs.ten_danh_muc,san_phams.id FROM san_phams INNER JOIN danh_mucs on danh_mucs.id = san_phams.danh_muc_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "ERROR" . $e->getMessage();
        }
    }
    public function insertSanPham(
        $ten_san_pham,
        $gia_san_pham,
        $gia_khuyen_mai,
        $so_luong,
        $ngay_nhap,
        $danh_muc_id,
        $trang_thai,
        $mo_ta,
        $hinh_anh
    ) {
        try {
            $sql = "INSERT INTO san_phams ( ten_san_pham, gia_san_pham, gia_khuyen_mai, so_luong, ngay_nhap, danh_muc_id, trang_thai, mo_ta, hinh_anh) 
            VALUES ( :ten_san_pham, :gia_san_pham, :gia_khuyen_mai, :so_luong, :ngay_nhap, :danh_muc_id, :trang_thai, :mo_ta, :hinh_anh)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':ten_san_pham' => $ten_san_pham,
                ':gia_san_pham' => $gia_san_pham,
                ':gia_khuyen_mai' => $gia_khuyen_mai,
                ':so_luong' => $so_luong,
                ':ngay_nhap' => $ngay_nhap,
                ':danh_muc_id' => $danh_muc_id,
                ':trang_thai' => $trang_thai,
                ':mo_ta' => $mo_ta,
                ':hinh_anh' => $hinh_anh
            ]);
            return true;
        } catch (Exception $e) {
            echo "ERROR" . $e->getMessage();
        }
    }
    public function deleteSanPham($id)
    {

        try {
            $sql = "DELETE FROM san_phams WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id
            ]);
            return true;
        } catch (Exception $e) {
            echo "ERROR" . $e->getMessage();
        }
    }
    public function getDetailSanPham($id)
    {

        try {
            $sql = "SELECT * FROM san_phams WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id
            ]);
            return $stmt->fetch();
        } catch (Exception $e) {
            echo "ERROR" . $e->getMessage();
        }
    }
    public function suaSanPham(
        $id,
        $ten_san_pham,
        $gia_san_pham,
        $gia_khuyen_mai,
        $so_luong,
        $ngay_nhap,
        $danh_muc_id,
        $trang_thai,
        $mo_ta,
        $hinh_anh
    ) {
        try {
            $sql = "UPDATE san_phams SET 
                    ten_san_pham = :ten_san_pham,
                    gia_san_pham = :gia_san_pham,
                    gia_khuyen_mai = :gia_khuyen_mai,
                    so_luong = :so_luong,
                    ngay_nhap = :ngay_nhap,
                    danh_muc_id = :danh_muc_id,
                    trang_thai = :trang_thai,
                    mo_ta = :mo_ta,
                    hinh_anh = :hinh_anh
             WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id,
                ':ten_san_pham' => $ten_san_pham,
                ':gia_san_pham' => $gia_san_pham,
                ':gia_khuyen_mai' => $gia_khuyen_mai,
                ':so_luong' => $so_luong,
                ':ngay_nhap' => $ngay_nhap,
                ':danh_muc_id' => $danh_muc_id,
                ':trang_thai' => $trang_thai,
                ':mo_ta' => $mo_ta,
                ':hinh_anh' => $hinh_anh
            ]);
            return true;
        } catch (Exception $e) {
            echo "ERROR" . $e->getMessage();
        }
    }
    public function getSanPhamChiTiet($id)
    {

        try {
            $sql = "SELECT *,danh_mucs.ten_danh_muc,san_phams.id FROM san_phams INNER JOIN danh_mucs on danh_mucs.id = san_phams.danh_muc_id WHERE san_phams.id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id
            ]);
            return $stmt->fetch();
        } catch (Exception $e) {
            echo "ERROR" . $e->getMessage();
        }
    }
    public function getAllBinhLuan($id){
        try{
            $sql = "SELECT binh_luans.id, noi_dung, ngay_dang, binh_luans.trang_thai, tai_khoans.ho_ten FROM binh_luans 
            INNER JOIN tai_khoans on tai_khoans.id = binh_luans.tai_khoan_id
            
            WHERE san_pham_id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id,
            ]);
            return $stmt->fetchAll();
        }catch (Exception $e) {
            echo "ERROR" . $e->getMessage();
        }
    }

    public function trangThaiBinhLuan($id, $trang_thai){
        try{
            $sql = " UPDATE binh_luans SET trang_thai = :trang_thai
            
            WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id,
                ':trang_thai' => $trang_thai
            ]);
            return $stmt->fetchAll();
        }catch (Exception $e) {
            echo "ERROR" . $e->getMessage();
        }
    }

    public function getIdSanPham($id){
        try {
            $sql = "SELECT * FROM binh_luans  WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id
            ]);
            return $stmt->fetch();
        } catch (Exception $e) {
            echo "ERROR" . $e->getMessage();
        }
    }
    public function deleteBinhLuan($id){
        try {
            $sql = "DELETE FROM binh_luans  WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id
            ]);
            return $stmt->fetch();
        } catch (Exception $e) {
            echo "ERROR" . $e->getMessage();
        }
    }
}
