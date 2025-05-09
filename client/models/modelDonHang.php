<?php
class modelDonHang
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function getAllDonHang($tai_khoan_id)
    {
        try {
            $sql = "SELECT * ,don_hangs.id FROM don_hangs 
            INNER JOIN tai_khoans on tai_khoans.id = don_hangs.tai_khoan_id
            INNER JOIN trang_thai_don_hangs on trang_thai_don_hangs.id = don_hangs.trang_thai_id
         
            WHERE don_hangs.tai_khoan_id = :tai_khoan_id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':tai_khoan_id' => $tai_khoan_id
            ]);
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "ERROR" . $e->getMessage();
        }
    }
    public function getIdSanPham($don_hang_id)
    {
        try {
            $sql = "SELECT san_pham_id FROM chi_tiet_don_hangs 
                    WHERE don_hang_id = :don_hang_id 
                    LIMIT 1";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':don_hang_id' => $don_hang_id]);
    
            $result = $stmt->fetch(PDO::FETCH_ASSOC); // Tránh fetch mặc định (có thể trả về false)
    
            return $result ?: null; // Trả về null nếu không tìm thấy
        } catch (Exception $e) {
            echo "ERROR: " . $e->getMessage();
            return null;
        }
    }
    
    public function getDetailDonHang($id)
    {

        try {
            $sql = "SELECT don_hangs.*, 
            tai_khoans.ho_ten, tai_khoans.email, tai_khoans.so_dien_thoai, tai_khoans.dia_chi,
            phuong_thuc_thanh_toans.ten_phuong_thuc,
            trang_thai_don_hangs.ten_trang_thai,
            trang_thai_don_hangs.id as trang_thai_id,
            chi_tiet_don_hangs.so_luong,
            chi_tiet_don_hangs.san_pham_id
     FROM don_hangs 
     INNER JOIN tai_khoans ON tai_khoans.id = don_hangs.tai_khoan_id 
     INNER JOIN phuong_thuc_thanh_toans ON phuong_thuc_thanh_toans.id = don_hangs.phuong_thuc_thanh_toan_id
     INNER JOIN trang_thai_don_hangs ON trang_thai_don_hangs.id = don_hangs.trang_thai_id
     LEFT JOIN chi_tiet_don_hangs ON chi_tiet_don_hangs.don_hang_id = don_hangs.id
     WHERE don_hangs.id = :id
     LIMIT 1";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id
            ]);
            return $stmt->fetch();
        } catch (Exception $e) {
            echo "ERROR" . $e->getMessage();
        }
    }
    public function getListSPDonHang($id)
    {
        try {
            $sql = "SELECT 
                don_hangs.id as don_hang_id,
                chi_tiet_don_hangs.id as chi_tiet_id,
                chi_tiet_don_hangs.don_gia,
                chi_tiet_don_hangs.so_luong,
                chi_tiet_don_hangs.thanh_tien,
                san_phams.id as san_pham_id,
                san_phams.ten_san_pham,
                san_phams.mo_ta,
                san_phams.hinh_anh,
                san_phams.gia_san_pham,
                san_phams.gia_khuyen_mai
            FROM don_hangs 
            INNER JOIN chi_tiet_don_hangs ON chi_tiet_don_hangs.don_hang_id = don_hangs.id
            INNER JOIN san_phams ON san_phams.id = chi_tiet_don_hangs.san_pham_id 
            WHERE don_hangs.id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id
            ]);
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "ERROR" . $e->getMessage();
            return [];
        }
    }
    public function getAllTrangThai()
    {
        try {
            $sql = "SELECT * FROM trang_thai_don_hangs";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "ERROR" . $e->getMessage();
        }
    }
    public function upDateDonHang(
        $don_hang_id,
        $ten_nguoi_nhan,
        $email_nguoi_nhan,
        $sdt_nguoi_nhan,
        $dia_chi_nguoi_nhan,
        $ghi_chu

    ) {
        try {
            
            $sql = "UPDATE don_hangs SET 
                    
                    ten_nguoi_nhan = :ten_nguoi_nhan,
                    email_nguoi_nhan = :email_nguoi_nhan,
                    sdt_nguoi_nhan = :sdt_nguoi_nhan,
                    dia_chi_nguoi_nhan = :dia_chi_nguoi_nhan,
                    ghi_chu = :ghi_chu
             WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $don_hang_id,
                ':ten_nguoi_nhan' => $ten_nguoi_nhan,
                ':email_nguoi_nhan' => $email_nguoi_nhan,
                ':sdt_nguoi_nhan' => $sdt_nguoi_nhan,
                ':dia_chi_nguoi_nhan' => $dia_chi_nguoi_nhan,
                ':ghi_chu' => $ghi_chu
            ]);
            return true;
        } catch (Exception $e) {
            echo "ERROR" . $e->getMessage();
        }
    }
    public function getDetailSanPham($id)
    {

        try {
            $sql = "SELECT * FROM san_phams 
            
            WHERE san_phams.id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id
            ]);
            return $stmt->fetch();
        } catch (Exception $e) {
            echo "ERROR" . $e->getMessage();
        }
    }
    public function insertDonHang(
        $ma_don_hang,
        $tai_khoan_id,
        $ten_nguoi_nhan,
        $email_nguoi_nhan,
        $sdt_nguoi_nhan,
        $ngay_dat,
        $tong_tien,
        $ghi_chu,
        $phuong_thuc_thanh_toan_id,
        $trang_thai_id,
        $dia_chi_nguoi_nhan,
    ) {
        try {
            $sql = "INSERT INTO don_hangs
                 (
                 ma_don_hang,
                tai_khoan_id,
                ten_nguoi_nhan,
                email_nguoi_nhan,
                sdt_nguoi_nhan,
                ngay_dat,
                tong_tien,
                ghi_chu,
                phuong_thuc_thanh_toan_id,
                trang_thai_id,
                dia_chi_nguoi_nhan
                ) 
             VALUES ( :ma_don_hang, :tai_khoan_id, :ten_nguoi_nhan, :email_nguoi_nhan, :sdt_nguoi_nhan, :ngay_dat, :tong_tien, :ghi_chu, :phuong_thuc_thanh_toan_id, :trang_thai_id, :dia_chi_nguoi_nhan)";


            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                'ma_don_hang' => $ma_don_hang,
                'tai_khoan_id' => $tai_khoan_id,
                'ten_nguoi_nhan' => $ten_nguoi_nhan,
                'email_nguoi_nhan' => $email_nguoi_nhan,
                'sdt_nguoi_nhan' => $sdt_nguoi_nhan,
                'ngay_dat' => $ngay_dat,
                'tong_tien' => $tong_tien,
                'ghi_chu' => $ghi_chu,
                'phuong_thuc_thanh_toan_id' => $phuong_thuc_thanh_toan_id,
                'trang_thai_id' => $trang_thai_id,
                'dia_chi_nguoi_nhan' => $dia_chi_nguoi_nhan

            ]);
            return $this->conn->lastInsertId();
        } catch (Exception $e) {
            echo "ERROR" . $e->getMessage();
        }
    }
    public function insertIdGioHang($tai_khoan_id)
    {
        try {
            $sql = "INSERT INTO gio_hangs (tai_khoan_id) VALUES (:tai_khoan_id )";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([

                ':tai_khoan_id' => $tai_khoan_id,

            ]);
            return true;
        } catch (Exception $e) {
            echo "ERROR" . $e->getMessage();
        }
    }
    public function getPhuongThucThanhToan()
    {
        try {
            $sql = "SELECT * FROM phuong_thuc_thanh_toans";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "ERROR" . $e->getMessage();
        }
    }
    public function AllDonHang()
    {
        try {
            $sql = "SELECT * FROM don_hangs 
           
           ";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(
                
            );
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "ERROR" . $e->getMessage();
        }
    }
    public function insertChiTietDonHang($don_hang_id, $san_pham_id, $don_gia, $so_luong, $thanh_tien) {
        try {
            $sql = "INSERT INTO chi_tiet_don_hangs (don_hang_id, san_pham_id, don_gia, so_luong, thanh_tien)
                    VALUES (:don_hang_id, :san_pham_id, :don_gia, :so_luong, :thanh_tien)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                'don_hang_id' => $don_hang_id,
                'san_pham_id' => $san_pham_id,
                'don_gia' => $don_gia,
                'so_luong' => $so_luong,
                'thanh_tien' => $thanh_tien
            ]);
            return true;
        } catch (Exception $e) {
            echo "Lỗi khi thêm chi tiết đơn hàng: " . $e->getMessage();
            return false;
        }
    }
    
}
