<?php
require './views/layout/header.php';
require './views/layout/navbar.php';
?>

<div class="container my-5">
    <?php if(isset($_SESSION['error_message'])): ?>
        <div class="alert alert-danger">
            <?= $_SESSION['error_message'] ?>
            <?php unset($_SESSION['error_message']); ?>
        </div>
    <?php endif; ?>

    <div class="card">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Cập nhật thông tin cá nhân</h4>
        </div>
        <div class="card-body">
            <form action="<?= BASE_URL_CLIENT ?>?act=post-update-profile" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $userInfo['id'] ?>">
                
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="ho_ten" class="form-label">Họ và tên</label>
                            <input type="text" class="form-control" id="ho_ten" name="ho_ten" value="<?= $userInfo['ho_ten'] ?>">
                            <?php if(isset($_SESSION['error']['ho_ten'])): ?>
                                <div class="text-danger"><?= $_SESSION['error']['ho_ten'] ?></div>
                            <?php endif; ?>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?= $userInfo['email'] ?>">
                            <?php if(isset($_SESSION['error']['email'])): ?>
                                <div class="text-danger"><?= $_SESSION['error']['email'] ?></div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="so_dien_thoai" class="form-label">Số điện thoại</label>
                            <input type="text" class="form-control" id="so_dien_thoai" name="so_dien_thoai" value="<?= $userInfo['so_dien_thoai'] ?>">
                            <?php if(isset($_SESSION['error']['so_dien_thoai'])): ?>
                                <div class="text-danger"><?= $_SESSION['error']['so_dien_thoai'] ?></div>
                            <?php endif; ?>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="ngay_sinh" class="form-label">Ngày sinh</label>
                            <input type="date" class="form-control" id="ngay_sinh" name="ngay_sinh" value="<?= $userInfo['ngay_sinh'] ?>">
                            <?php if(isset($_SESSION['error']['ngay_sinh'])): ?>
                                <div class="text-danger"><?= $_SESSION['error']['ngay_sinh'] ?></div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="gioi_tinh" class="form-label">Giới tính</label>
                            <select class="form-control" id="gioi_tinh" name="gioi_tinh">
                                <option value="chua_chon" <?= !isset($userInfo['gioi_tinh']) ? 'selected' : '' ?>>-- Chọn giới tính --</option>
                                <option value="0" <?= $userInfo['gioi_tinh'] == 0 ? 'selected' : '' ?>>Nam</option>
                                <option value="1" <?= $userInfo['gioi_tinh'] == 1 ? 'selected' : '' ?>>Nữ</option>
                                <option value="2" <?= $userInfo['gioi_tinh'] == 2 ? 'selected' : '' ?>>Khác</option>
                            </select>
                            <?php if(isset($_SESSION['error']['gioi_tinh'])): ?>
                                <div class="text-danger"><?= $_SESSION['error']['gioi_tinh'] ?></div>
                            <?php endif; ?>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
    <div class="form-group">
        <label for="hinh_anh" class="form-label">Ảnh đại diện</label>
        <div class="mb-2">
            <img id="preview-image"
                 src="../<?= isset($userInfo['hinh_anh']) && !empty($userInfo['hinh_anh']) ? '.' . $userInfo['hinh_anh'] : './uploads/users/th.jpg' ?>"
                 alt="Preview" class="img-thumbnail"
                 style="width: 100px; height: 100px; object-fit: cover;">
        </div>
        <input type="file" class="form-control" id="hinh_anh" name="hinh_anh" accept="image/*" onchange="previewImage(this)">
        <small class="form-text text-muted">Không chọn nếu không muốn thay đổi ảnh. Chỉ chấp nhận file JPG, PNG, GIF < 5MB</small>
        <?php if(isset($_SESSION['error']['hinh_anh'])): ?>
            <div class="text-danger"><?= $_SESSION['error']['hinh_anh'] ?></div>
        <?php endif; ?>
    </div>
</div>
                </div>
                
                <div class="form-group mb-3">
                    <label for="dia_chi" class="form-label">Địa chỉ</label>
                    <textarea class="form-control" id="dia_chi" name="dia_chi" rows="3"><?= $userInfo['dia_chi'] ?></textarea>
                    <?php if(isset($_SESSION['error']['dia_chi'])): ?>
                        <div class="text-danger"><?= $_SESSION['error']['dia_chi'] ?></div>
                    <?php endif; ?>
                </div>
                
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-primary">Cập nhật thông tin</button>
                    <a href="<?= BASE_URL_CLIENT ?>?act=profile" class="btn btn-secondary ml-2">Hủy</a>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function previewImage(input) {
    const file = input.files[0];
    const preview = document.getElementById('preview-image');

    if (file) {
        const reader = new FileReader();
        reader.onload = function (e) {
            preview.src = e.target.result;
        };
        reader.readAsDataURL(file);
    }
}
</script>


<?php require './views/layout/footer.php'; ?>