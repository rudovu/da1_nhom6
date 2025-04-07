<?php 

class Home 
{
    public $conn;
     
    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function getAllUser(){
        try{
            $sql = "SELECT * FROM tai_khoans";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        }catch(Exception $e){
            echo "ERROR".$e->getMessage();
         
        }
    }
    public function getUser($username){
   
        try{
            $sql = "SELECT * FROM tai_khoans WHERE ten_dang_nhap = :username";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':username' => $username,
            ]);
            return $stmt->fetch();
        }catch(Exception $e){
            echo "ERROR".$e->getMessage();
         
        }
    }
   
    public function postTaiKhoan($ten_dang_nhap,$mat_khau,$ho_ten,$email,$so_dien_thoai,$dia_chi,$gioi_tinh,$hinh_anh,$ngay_sinh, $chuc_vu_id){
        try{
            $sql = "INSERT INTO tai_khoans (ten_dang_nhap, mat_khau, ho_ten, email, so_dien_thoai, dia_chi, gioi_tinh, hinh_anh, chuc_vu_id, ngay_sinh)
            VALUES (:ten_dang_nhap, :mat_khau, :ho_ten, :email, :so_dien_thoai, :dia_chi, :gioi_tinh, :hinh_anh, :chuc_vu_id ,:ngay_sinh)
            ";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':ten_dang_nhap' => $ten_dang_nhap,
                ':mat_khau' => $mat_khau,
                ':ho_ten' => $ho_ten,
                ':email' => $email,
                ':so_dien_thoai' => $so_dien_thoai,
                ':dia_chi' => $dia_chi,
                ':gioi_tinh' => $gioi_tinh,
                ':hinh_anh' => $hinh_anh,
                ':chuc_vu_id' => $chuc_vu_id,
                ':ngay_sinh' => $ngay_sinh
            ]);
            echo("Đăng ký thành công");
           return true;
        }catch(Exception $e){
            echo "ERROR".$e->getMessage();
         
        }
    }
}