<?php
require './views/layout/header.php';
require './views/layout/navbar.php';
?>
<section class="content card" style="height: auto;">
    <div style="margin-top: 20px; width: 90%; margin-bottom:20px;margin-left: 70px;" class="product-item card">
        <div class="form-row">
            <div class="form-group col-md-1"></div>
            <div class="form-group col-md-4">
                <div class="col-md-11 d-flex align-items-center">
                    <img style="height: 100%; width: 100%;" src="<?= '.' . $detailSanPham['hinh_anh'] ?>" class="img-fluid rounded" alt="<?= $detailSanPham['ten_san_pham'] ?>" >
                </div>
            </div>
            <div class="form-group col-md-6">
                <form action="<?= BASE_URL_CLIENT . '?act=post-dat-hang' ?>" method="POST" enctype="multipart/form-data">
                    <ul>
                        <div class="card-title alert alert-primary">
                            <h3>Thông tin sản phẩm</h3>
                        </div>
                        <div class="col-md-7">
                            <div class="card-body">
                                <h3 class="card-title text-primary"><?= $detailSanPham['ten_san_pham'] ?></h3>
                                <p class="card-text"><?= $detailSanPham['mo_ta'] ?></p>
                                <p class="text-danger font-weight-bold h5">
                                    Giá:
                                    <?php if (!is_null($detailSanPham['gia_khuyen_mai'])) : ?>
                                        <?= number_format($detailSanPham['gia_khuyen_mai']) . ' VNĐ' ?>
                                    <?php else : ?>
                                        Chưa cập nhật
                                    <?php endif; ?>
                                </p>

                                <div class="form-group row align-items-center">
                                    <label class="col-md-4 col-form-label">Số lượng:</label>
                                    <div class="col-md-5">
                                        <input type="number" class="form-control" name="so_luong" min="1" value="1">
                                        <p class="text-danger">
                                            <?php if (isset($_SESSION['error']['so_luong'])) {
                                                echo $_SESSION['error']['so_luong'];
                                            } ?>
                                        </p>
                                    </div>
                                </div>
                                <input type="hidden" name="don_gia" value="<?= $detailSanPham['gia_khuyen_mai'] ?>">
                                <input type="hidden" name="san_pham_id" value="<?= $detailSanPham['id'] ?>">

                                <label for="">Phương thức thanh toán</label>
                                <select class="form-control" name="phuong_thuc_thanh_toan_id">
                                    <?php foreach ($phuongThucThanhToan as $value) : ?>
                                        <option <?= $value['id'] == 1 ? 'selected' : '' ?> value="<?= $value['id'] ?>"><?= $value['ten_phuong_thuc'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </ul>
            </div>
        </div>
    </div>
    <div class="pl-400 container-fluid" style="height: auto; width: 1000px; margin:20px auto;">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Thông tin người nhận</h3>
                    </div>

                    <div class="card-body row">
                        <div class="form-group col-md-12">
                            <label>Tên người nhận</label>
                            <input type="text" class="form-control" name="ten_nguoi_nhan" placeholder="Nhập tên người nhận">
                            <p class="text-danger">
                                <?php if (isset($_SESSION['error']['ten_nguoi_nhan'])) {
                                    echo $_SESSION['error']['ten_nguoi_nhan'];
                                } ?>
                            </p>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Email</label>
                            <input type="text" class="form-control" name="email_nguoi_nhan" placeholder="Nhập email">
                            <p class="text-danger">
                                <?php if (isset($_SESSION['error']['email_nguoi_nhan'])) {
                                    echo $_SESSION['error']['email_nguoi_nhan'];
                                } ?>
                            </p>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Số điện thoại</label>
                            <input type="text" class="form-control" name="sdt_nguoi_nhan" placeholder="Nhập số điện thoại">
                            <p class="text-danger">
                                <?php if (isset($_SESSION['error']['sdt_nguoi_nhan'])) {
                                    echo $_SESSION['error']['sdt_nguoi_nhan'];
                                } ?>
                            </p>
                        </div>
                        <div class="form-group col-md-12">
                            <label>Địa chỉ</label>
                            <input type="text" class="form-control" name="dia_chi_nguoi_nhan" placeholder="Nhập địa chỉ">
                            <p class="text-danger">
                                <?php if (isset($_SESSION['error']['dia_chi_nguoi_nhan'])) {
                                    echo $_SESSION['error']['dia_chi_nguoi_nhan'];
                                } ?>
                            </p>
                        </div>
                        <div class="form-group col-md-12">
                            <label>Ghi chú</label>
                            <textarea class="form-control" name="ghi_chu" placeholder="Nhập ghi chú"></textarea>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Đặt hàng</button>
                    </div>
                </div> <!-- /.card -->
            </div> <!-- /.col -->
        </div> <!-- /.row -->
    </div> <!-- /.container-fluid -->
    </form>
</section>

<?php require './views/layout/footer.php'; ?>
