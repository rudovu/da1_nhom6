<?php
require './views/layout/header.php';
require './views/layout/navbar.php';
?>

<div class="container my-5">
    <?php if(isset($_SESSION['success_message'])): ?>
        <div class="alert alert-success">
            <?= $_SESSION['success_message'] ?>
            <?php unset($_SESSION['success_message']); ?>
        </div>
    <?php endif; ?>

    <div class="row">
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Ảnh đại diện</h4>
                </div>
                <div class="card-body text-center">
                    <?php
                    // Sửa đường dẫn tệp ảnh
                    $displayPath = (!empty($userInfo['hinh_anh'])) 
                        ? str_replace('/uploads/', '../uploads/', $userInfo['hinh_anh']) 
                        : '../uploads/users/default.png';
                    
                    // Kiểm tra thực tế nếu file tồn tại trên server
                    $fullPath = PATH_ROOT . ((!empty($userInfo['hinh_anh'])) ? $userInfo['hinh_anh'] : '/uploads/users/default.png');
                    $imageExists = file_exists($fullPath);
                    error_log("Full path check: $fullPath, Exists: " . ($imageExists ? "Yes" : "No"));
                    
                    // Debug: In ra tất cả đường dẫn để kiểm tra
                    error_log("Original path in DB: " . $userInfo['hinh_anh']);
                    error_log("Display path: " . $displayPath);
                    
                    // Nếu ảnh không tồn tại, sử dụng ảnh mặc định
                    if (!$imageExists && !empty($userInfo['hinh_anh'])) {
                        $displayPath = '../uploads/users/default.png';
                    }
                    ?>

                    <img src="<?= $displayPath ?>" 
                         alt="Ảnh đại diện" 
                         class="img-fluid rounded-circle mb-3" 
                         style="width: 150px; height: 150px; object-fit: cover;">
                    <h5 class="card-title"><?= $userInfo['ho_ten'] ?></h5>
                    <p class="card-text text-muted"><?= $userInfo['ten_dang_nhap'] ?></p>
                    <div class="mt-3">
                        <a href="<?= BASE_URL_CLIENT ?>?act=update-profile" class="btn btn-primary">Cập nhật thông tin</a>
                        <a href="<?= BASE_URL_CLIENT ?>?act=change-password" class="btn btn-secondary mt-2">Đổi mật khẩu</a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Thông tin cá nhân</h4>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <th style="width: 30%">Họ và tên:</th>
                                <td><?= $userInfo['ho_ten'] ?></td>
                            </tr>
                            <tr>
                                <th>Email:</th>
                                <td><?= $userInfo['email'] ?></td>
                            </tr>
                            <tr>
                                <th>Số điện thoại:</th>
                                <td><?= $userInfo['so_dien_thoai'] ?></td>
                            </tr>
                            <tr>
                                <th>Địa chỉ:</th>
                                <td><?= $userInfo['dia_chi'] ?></td>
                            </tr>
                            <tr>
                                <th>Giới tính:</th>
                                <td>
                                    <?php 
                                    if($userInfo['gioi_tinh'] == 0) {
                                        echo "Nam";
                                    } elseif($userInfo['gioi_tinh'] == 1) {
                                        echo "Nữ";
                                    } else {
                                        echo "Khác";
                                    }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Ngày sinh:</th>
                                <td><?= formatDate($userInfo['ngay_sinh']) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require './views/layout/footer.php'; ?>