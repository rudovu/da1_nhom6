<?php
require './views/layout/header.php';
require './views/layout/navbar.php';
?>

<div class="container mt-5">
    <div class="card shadow">
        <div class="card-body">
            <div class="row">
                <!-- Cột hình ảnh sản phẩm -->
                <div class="col-md-6 d-flex justify-content-center">
                    <img style="max-width: 100%; height: auto;" src="<?= BASE_URL . $detailSanPham['hinh_anh'] ?>" class="img-fluid rounded" alt="Product Image">
                </div>

                <!-- Cột chi tiết sản phẩm -->
                <div class="col-md-6">
                    <h2 class="my-3 font-weight-bold"><?= $detailSanPham['ten_san_pham']; ?></h2>
                    <hr>
                    <ul class="list-unstyled">
                        <li class="mb-2"><strong>Giá tiền:</strong> <?= number_format($detailSanPham['gia_san_pham']) . ' VNĐ' ?></li>
                        <li class="mb-2"><strong>Giá khuyến mãi:</strong> <?= number_format($detailSanPham['gia_khuyen_mai']) . ' VNĐ' ?></li>
                        <li class="mb-2"><strong>Số lượng:</strong> <?= $detailSanPham['so_luong'] ?></li>
                        <li class="mb-2"><strong>Danh mục:</strong> <?= $detailSanPham['ten_danh_muc'] ?></li>
                        <li class="mb-2"><strong>Trạng thái:</strong> <?= $detailSanPham['trang_thai'] == 1 ? '<span class="text-success">Còn hàng</span>' : '<span class="text-danger">Hết hàng</span>' ?></li>
                    </ul>
                </div>
            </div>

            <!-- Tab bình luận -->
            <ul class="nav nav-tabs mt-4" id="myTab" role="tablist">
                <li class="nav-item">
                    <button class="nav-link active" id="comments-tab" data-toggle="tab" data-target="#comments" type="button" role="tab">Bình luận</button>
                </li>
            </ul>
            <div class="tab-content mt-3" id="myTabContent">
                <div class="tab-pane fade show active" id="comments" role="tabpanel">
                    <!-- Bảng hiển thị bình luận -->
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th>#</th>
                                    <th>Tên người bình luận</th>
                                    <th>Nội dung</th>
                                    <th>Ngày đăng</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($binhLuan as $key => $value) : ?>
                                    <tr <?= $value['trang_thai'] == 0 ? 'hidden' : '' ?>>
                                        <td><?= $key + 1 ?></td>
                                        <td><?= $value['ho_ten'] ?></td>
                                        <td><?= $value['noi_dung'] ?></td>
                                        <td><?= $value['ngay_dang'] ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>

                    <!-- Form bình luận -->
                    <form action="<?= BASE_URL_CLIENT . '?act=them-binh-luan' ?>" method="POST" class="mt-4">
                        <?php $currentTime = date('Y-m-d'); ?>
                        <input type="hidden" name="ngay_dang" value="<?= $currentTime ?>">
                        <input type="hidden" name="tai_khoan_id" value="<?= $idClient['id'] ?>">
                        <input type="hidden" name="id_san_pham" value="<?= $detailSanPham['id'] ?>">

                        <div class="form-group">
                            <textarea class="form-control" rows="4" name="binh_luan" placeholder="Viết bình luận..."></textarea>
                        </div>
                        <button class="btn btn-primary" type="submit">Gửi bình luận</button>
                        
                        <?php if (isset($_SESSION['error']['binh_luan'])): ?>
                            <p class="text-danger mt-2"><?= $_SESSION['error']['binh_luan']; ?></p>
                        <?php endif; ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require './views/layout/footer.php'; ?>
