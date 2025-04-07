<?php
class modelGioHang
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function getIdGioHang($tai_khoan_id){
        try{
            $sql = "SELECT id FROM gio_hangs WHERE tai_khoan_id = :tai_khoan_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':tai_khoan_id' => $tai_khoan_id
            ]);
            return $stmt->fetch();
        }catch(Exception $e){
            echo "ERROR".$e->getMessage();
        }
    }
    public function insertChiTietGioHang($gio_hang_id, $san_pham_id, $so_luong){
        try{
            $sql = "INSERT INTO chi_tiet_gio_hangs (gio_hang_id, san_pham_id, so_luong) VALUES (:gio_hang_id, :san_pham_id, :so_luong )";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':gio_hang_id' => $gio_hang_id,
                ':san_pham_id' => $san_pham_id,
                ':so_luong' => $so_luong,
                
            ]);
            return true;
        }catch(Exception $e){
            echo "ERROR".$e->getMessage();
        }
    }
    public function insertIdGioHang($tai_khoan_id){
        try{
            $sql = "INSERT INTO gio_hangs (tai_khoan_id) VALUES (:tai_khoan_id )";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                
                ':tai_khoan_id' => $tai_khoan_id,
                
            ]);
            return true;
        }catch(Exception $e){
            echo "ERROR".$e->getMessage();
        }
    }
    public function getAllSanPham($gio_hang_id){
        try{
            $sql = "SELECT *,chi_tiet_gio_hangs.id,chi_tiet_gio_hangs.so_luong, san_phams.id as id_san_pham FROM chi_tiet_gio_hangs 
            INNER JOIN san_phams on san_phams.id = chi_tiet_gio_hangs.san_pham_id
            WHERE gio_hang_id = :gio_hang_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':gio_hang_id' => $gio_hang_id
            ]);
            return $stmt->fetchAll();
        }catch(Exception $e){
            echo "ERROR".$e->getMessage();
        }
    }
    public function deleteGiohang($id){
        try{
            $sql = "DELETE FROM chi_tiet_gio_hangs WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id
            ]);
            return true;
        }catch(Exception $e){
            echo "ERROR".$e->getMessage();
        }
    }
}