<?php

// Kết nối CSDL qua PDO
function connectDB() {
    // Kết nối CSDL
    $host = DB_HOST;
    $port = DB_PORT;
    $dbname = DB_NAME;

    try {
        $conn = new PDO("mysql:host=$host;port=$port;dbname=$dbname", DB_USERNAME, DB_PASSWORD);

        // cài đặt chế độ báo lỗi là xử lý ngoại lệ
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // cài đặt chế độ trả dữ liệu
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    
        return $conn;
    } catch (PDOException $e) {
        echo ("Connection failed: " . $e->getMessage());
    }
}
function upLoad($file, $folder) {
    // Debug để kiểm tra
    error_log("Uploading file: " . print_r($file, true));
    error_log("Upload folder: " . $folder);
    
    // Kiểm tra nếu thư mục không tồn tại thì tạo mới
    $upload_dir = PATH_ROOT . $folder;
    if (!file_exists($upload_dir)) {
        mkdir($upload_dir, 0777, true);
        error_log("Created directory: " . $upload_dir);
    }
    
    // Kiểm tra file upload hợp lệ
    $allowed_types = ['image/jpeg', 'image/png', 'image/gif', 'image/jpg'];
    $max_size = 5 * 1024 * 1024; // 5MB
    
    // Kiểm tra định dạng file
    if (!in_array($file['type'], $allowed_types)) {
        $_SESSION['error']['hinh_anh'] = "Chỉ chấp nhận file ảnh (JPG, PNG, GIF)";
        return null;
    }
    
    // Kiểm tra kích thước file
    if ($file['size'] > $max_size) {
        $_SESSION['error']['hinh_anh'] = "Kích thước file không được vượt quá 5MB";
        return null;
    }
    
    // Tạo tên file ngẫu nhiên để tránh trùng lặp
    $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
    $filename = time() . '_' . rand(10000, 99999) . '.' . $extension;
    $pathStorage = $folder . $filename;
    
    $from = $file['tmp_name'];
    $to = PATH_ROOT . $pathStorage;
    
    error_log("Moving file from: " . $from . " to: " . $to);
    
    if (move_uploaded_file($from, $to)) {
        error_log("File uploaded successfully: " . $pathStorage);
        return $pathStorage; // Trả về đường dẫn tương đối từ thư mục gốc
    } else {
        error_log("Failed to upload file. Error: " . error_get_last()['message']);
        $_SESSION['error']['hinh_anh'] = "Lỗi khi upload file. Vui lòng thử lại.";
        return null;
    }
}
function deleteImg($file){
    if (empty($file)) return;
    
    $path = PATH_ROOT . $file;
    error_log("Attempting to delete file: " . $path);
    
    if(file_exists($path)){
        if (unlink($path)) {
            error_log("File deleted successfully: " . $path);
        } else {
            error_log("Failed to delete file: " . $path);
        }
    } else {
        error_log("File does not exist: " . $path);
    }
}
function debug($name){
    echo "<pre>";
    var_dump($name);die();
}
function deleteSessionError() {
    if (isset($_SESSION['flash']) && $_SESSION['flash'] === true) {
        unset($_SESSION['error']);
        unset($_SESSION['flash']);
    }
}
function formatDate($date){
    return date("d-m-Y", strtotime($date));
}
