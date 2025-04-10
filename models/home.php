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

    public function getUserById($id){
        try{
            $sql = "SELECT * FROM tai_khoans WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id,
            ]);
            return $stmt->fetch();
        }catch(Exception $e){
            echo "ERROR".$e->getMessage();
        }
    }

    public function updateUserInfo($id, $ho_ten, $email, $so_dien_thoai, $dia_chi, $gioi_tinh, $ngay_sinh, $hinh_anh = null) {
        try {
            // Nếu có cập nhật hình ảnh
            if ($hinh_anh) {
                $sql = "UPDATE tai_khoans SET 
                        ho_ten = :ho_ten, 
                        email = :email, 
                        so_dien_thoai = :so_dien_thoai, 
                        dia_chi = :dia_chi, 
                        gioi_tinh = :gioi_tinh,
                        ngay_sinh = :ngay_sinh,
                        hinh_anh = :hinh_anh
                        WHERE id = :id";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute([
                    ':id' => $id,
                    ':ho_ten' => $ho_ten,
                    ':email' => $email,
                    ':so_dien_thoai' => $so_dien_thoai,
                    ':dia_chi' => $dia_chi,
                    ':gioi_tinh' => $gioi_tinh,
                    ':ngay_sinh' => $ngay_sinh,
                    ':hinh_anh' => $hinh_anh
                ]);
            } else {
                // Không cập nhật hình ảnh
                $sql = "UPDATE tai_khoans SET 
                        ho_ten = :ho_ten, 
                        email = :email, 
                        so_dien_thoai = :so_dien_thoai, 
                        dia_chi = :dia_chi, 
                        gioi_tinh = :gioi_tinh,
                        ngay_sinh = :ngay_sinh
                        WHERE id = :id";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute([
                    ':id' => $id,
                    ':ho_ten' => $ho_ten,
                    ':email' => $email,
                    ':so_dien_thoai' => $so_dien_thoai,
                    ':dia_chi' => $dia_chi,
                    ':gioi_tinh' => $gioi_tinh,
                    ':ngay_sinh' => $ngay_sinh
                ]);
            }
            return true;
        } catch(Exception $e) {
            echo "ERROR" . $e->getMessage();
            return false;
        }
    }

    public function updatePassword($id, $mat_khau_moi) {
        try {
            $sql = "UPDATE tai_khoans SET mat_khau = :mat_khau WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id,
                ':mat_khau' => $mat_khau_moi
            ]);
            return true;
        } catch(Exception $e) {
            echo "ERROR" . $e->getMessage();
            return false;
        }
    }
}