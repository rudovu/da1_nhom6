<?php include "./views/layout/header.php"; ?>
<div class="container mt-5">
    <?php if (isset($_SESSION['error_message'])): ?>
        <div class="alert alert-danger">
            <?= $_SESSION['error_message'] ?>
            <?php unset($_SESSION['error_message']); ?>
        </div>
    <?php endif; ?>

    <?php if (empty($listSanPham)): ?>
        <div class="alert alert-warning">
            Giỏ hàng của bạn đang trống. <a href="<?= BASE_URL_CLIENT ?>?act=danh-sach-san-pham" class="alert-link">Tiếp tục mua sắm</a>
        </div>
    <?php else: ?>
        <h2 class="text-center mb-4">Đặt hàng tất cả sản phẩm</h2>
        
        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-header">
                        <h5>Danh sách sản phẩm</h5>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Tên sản phẩm</th>
                                    <th>Giá</th>
                                    <th>Số lượng</th>
                                    <th>Thành tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $tongTien = 0;
                                foreach($listSanPham as $item):
                                    $donGia = isset($item['gia_khuyen_mai']) ? $item['gia_khuyen_mai'] : $item['gia_san_pham'];
                                    $thanhTien = $donGia * $item['so_luong'];
                                    $tongTien += $thanhTien;
                                ?>
                                <tr>
                                    <td><?= $item['ten_san_pham'] ?></td>
                                    <td><?= number_format($donGia) ?> đ</td>
                                    <td><?= $item['so_luong'] ?></td>
                                    <td><?= number_format($thanhTien) ?> đ</td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="3">Tổng cộng:</th>
                                    <th><?= number_format($tongTien) ?> đ</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5>Thông tin đặt hàng</h5>
                    </div>
                    <div class="card-body">
                        <form action="<?= BASE_URL_CLIENT ?>?act=post-dat-hang-tat-ca" method="POST">
                            <div class="mb-3">
                                <label for="ten_nguoi_nhan" class="form-label">Tên người nhận</label>
                                <input type="text" class="form-control" id="ten_nguoi_nhan" name="ten_nguoi_nhan" required>
                                <?php if (isset($_SESSION['error']['ten_nguoi_nhan'])) : ?>
                                    <span class="text-danger"><?= $_SESSION['error']['ten_nguoi_nhan'] ?></span>
                                <?php endif; ?>
                            </div>
                            
                            <div class="mb-3">
                                <label for="email_nguoi_nhan" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email_nguoi_nhan" name="email_nguoi_nhan" required>
                                <?php if (isset($_SESSION['error']['email_nguoi_nhan'])) : ?>
                                    <span class="text-danger"><?= $_SESSION['error']['email_nguoi_nhan'] ?></span>
                                <?php endif; ?>
                            </div>
                            
                            <div class="mb-3">
                                <label for="sdt_nguoi_nhan" class="form-label">Số điện thoại</label>
                                <input type="text" class="form-control" id="sdt_nguoi_nhan" name="sdt_nguoi_nhan" required>
                                <?php if (isset($_SESSION['error']['sdt_nguoi_nhan'])) : ?>
                                    <span class="text-danger"><?= $_SESSION['error']['sdt_nguoi_nhan'] ?></span>
                                <?php endif; ?>
                            </div>
                            
                            <div class="mb-3">
                                <label for="dia_chi_nguoi_nhan" class="form-label">Địa chỉ</label>
                                <textarea class="form-control" id="dia_chi_nguoi_nhan" name="dia_chi_nguoi_nhan" rows="3" required></textarea>
                                <?php if (isset($_SESSION['error']['dia_chi_nguoi_nhan'])) : ?>
                                    <span class="text-danger"><?= $_SESSION['error']['dia_chi_nguoi_nhan'] ?></span>
                                <?php endif; ?>
                            </div>
                            
                            <div class="mb-3">
                                <label for="ghi_chu" class="form-label">Ghi chú</label>
                                <textarea class="form-control" id="ghi_chu" name="ghi_chu" rows="3"></textarea>
                            </div>
                            
                            <div class="mb-3">
                                <label for="phuong_thuc_thanh_toan_id" class="form-label">Phương thức thanh toán</label>
                                <select class="form-select" id="phuong_thuc_thanh_toan_id" name="phuong_thuc_thanh_toan_id" required>
                                    <?php foreach($phuongThucThanhToan as $item): ?>
                                    <option value="<?= $item['id'] ?>"><?= $item['ten_phuong_thuc'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            
                            <button type="submit" class="btn btn-primary w-100">Đặt hàng</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>
<?php include "./views/layout/footer.php"; ?>