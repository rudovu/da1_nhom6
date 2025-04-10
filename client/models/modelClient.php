<?php
    class modelClient{
        public $conn;

        public function __construct()
        {
            $this->conn = connectDB();

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

        public function getUserByUsername($username) {
            try {
                $sql = "SELECT * FROM tai_khoans WHERE ten_dang_nhap = :username";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute([
                    ':username' => $username
                ]);
                return $stmt->fetch();
            } catch (Exception $e) {
                echo "ERROR" . $e->getMessage();
            }
        }

        public function getUserById($id) {
            try {
                $sql = "SELECT * FROM tai_khoans WHERE id = :id";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute([
                    ':id' => $id
                ]);
                return $stmt->fetch();
            } catch (Exception $e) {
                error_log("ERROR getting user by ID: " . $e->getMessage());
                return false;
            }
        }

        public function updateUserInfo($id, $ho_ten, $email, $so_dien_thoai, $dia_chi, $gioi_tinh, $ngay_sinh, $hinh_anh = null) {
            try {
                // Nếu có cập nhật hình ảnh
                if ($hinh_anh) {
                    error_log("Updating user with new image: " . $hinh_anh);
                    
                    // Lấy hình ảnh cũ để xóa
                    $sql_old_image = "SELECT hinh_anh FROM tai_khoans WHERE id = :id";
                    $stmt_old_image = $this->conn->prepare($sql_old_image);
                    $stmt_old_image->execute([':id' => $id]);
                    $old_image = $stmt_old_image->fetch();
                    
                    // Xóa hình ảnh cũ nếu không phải ảnh mặc định
                    if ($old_image && isset($old_image['hinh_anh']) && $old_image['hinh_anh'] != 'default.png' && !empty($old_image['hinh_anh'])) {
                        error_log("Attempting to delete old image: " . $old_image['hinh_anh']);
                        deleteImg($old_image['hinh_anh']);
                    }
                    
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
                    error_log("User updated with new image: " . $hinh_anh);
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
                    error_log("User updated without changing image");
                }
                return true;
            } catch(Exception $e) {
                error_log("ERROR updating user: " . $e->getMessage());
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



