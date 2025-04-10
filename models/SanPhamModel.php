<?php
class SanPhamModel {
    private $db; // Biến lưu trữ kết nối DB

    // Hàm khởi tạo để nhận kết nối từ bên ngoài
    public function __construct($dbConnection) {
        $this->db = $dbConnection;
    }

    // Hàm lấy tất cả sản phẩm
    public function layTatCaSanPham() {
        $query = "SELECT * FROM san_pham"; // Giả sử bảng tên 'san_pham'
        $result = mysqli_query($this->db, $query); // Thực thi câu lệnh SQL

        if (!$result) {
            die("Lỗi truy vấn: " . mysqli_error($this->db)); // Xử lý lỗi truy vấn
        }

        $sanPhamArray = []; // Khởi tạo mảng chứa dữ liệu sản phẩm

        // Lặp qua kết quả và lưu vào mảng
        while ($row = mysqli_fetch_assoc($result)) {
            $sanPhamArray[] = $row;
        }

        return $sanPhamArray; // Trả về mảng sản phẩm
    }
}
?>
