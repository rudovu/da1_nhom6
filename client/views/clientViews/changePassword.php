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

    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Đổi mật khẩu</h4>
                </div>
                <div class="card-body">
                    <form action="<?= BASE_URL_CLIENT ?>?act=post-change-password" method="POST">
                        <div class="form-group mb-3">
                            <label for="mat_khau_cu" class="form-label">Mật khẩu hiện tại</label>
                            <input type="password" class="form-control" id="mat_khau_cu" name="mat_khau_cu">
                            <?php if(isset($_SESSION['error']['mat_khau_cu'])): ?>
                                <div class="text-danger"><?= $_SESSION['error']['mat_khau_cu'] ?></div>
                            <?php endif; ?>
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="mat_khau_moi" class="form-label">Mật khẩu mới</label>
                            <input type="password" class="form-control" id="mat_khau_moi" name="mat_khau_moi">
                            <?php if(isset($_SESSION['error']['mat_khau_moi'])): ?>
                                <div class="text-danger"><?= $_SESSION['error']['mat_khau_moi'] ?></div>
                            <?php endif; ?>
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="xac_nhan_mat_khau" class="form-label">Xác nhận mật khẩu mới</label>
                            <input type="password" class="form-control" id="xac_nhan_mat_khau" name="xac_nhan_mat_khau">
                            <?php if(isset($_SESSION['error']['xac_nhan_mat_khau'])): ?>
                                <div class="text-danger"><?= $_SESSION['error']['xac_nhan_mat_khau'] ?></div>
                            <?php endif; ?>
                        </div>
                        
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary">Đổi mật khẩu</button>
                            <a href="<?= BASE_URL_CLIENT ?>?act=profile" class="btn btn-secondary ml-2">Hủy</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require './views/layout/footer.php'; ?>