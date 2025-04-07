<?php
class modelSanPham
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function getAllSanPham(){
        try{
            $sql = "SELECT * FROM san_phams";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        }catch (Exception $e){
            echo "ERROR". $e->getMessage();
        }

    }
    public function getSanPhamChiTiet($id)
    {

        try {
            $sql = "SELECT * ,san_phams.mo_ta,danh_mucs.ten_danh_muc,san_phams.id FROM san_phams INNER JOIN danh_mucs on danh_mucs.id = san_phams.danh_muc_id WHERE san_phams.id = :id";
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
    public function getIdClient($username){
        try{
            $sql = "SELECT id FROM tai_khoans 
            
            
            WHERE ten_dang_nhap = :username";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':username' => $username,
            ]);
            return $stmt->fetch();
        }catch (Exception $e) {
            echo "ERROR" . $e->getMessage();
        }
    }
    public function addBinhLuan($san_pham_id, $tai_khoan_id, $ngay_dang, $noi_dung){
     
        try{
            $sql = "INSERT INTO binh_luans ( san_pham_id , tai_khoan_id, noi_dung, ngay_dang) VALUES (:san_pham_id, :tai_khoan_id, :noi_dung, :ngay_dang )";
            
            
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':san_pham_id' => $san_pham_id,
                ':tai_khoan_id' => $tai_khoan_id,
                ':ngay_dang' => $ngay_dang,
                ':noi_dung' => $noi_dung,
               
            ]);
            return true;
            
        }catch (Exception $e) {
            echo "ERROR" . $e->getMessage();
        }
    
}
public function luotXem($id){
    try{
        $sql = "UPDATE san_phams SET luot_xem = luot_xem + 1 WHERE id = :id";
        
        
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':id' => $id
          
           
        ]);
       
        return $stmt->fetch();
    }catch (Exception $e) {
        echo "ERROR" . $e->getMessage();
    }
}
}