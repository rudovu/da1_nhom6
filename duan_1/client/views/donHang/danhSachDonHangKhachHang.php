<?php
require './views/layout/header.php';
require './views/layout/navbar.php';
?>

<?php
// Giả sử bạn lấy dữ liệu từ cơ sở dữ liệu và lưu vào biến $listDonHang
// Sắp xếp theo ngày đặt từ mới đến cũ (nếu chưa làm ở SQL)
usort($listDonHangKhachHang, function($a, $b) {
    return strtotime($b['ngay_dat']) - strtotime($a['ngay_dat']);
});
?>

<div class="container my-5">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h3>Đơn hàng</h3>
        </div>

        <div class="card-body">
            <!-- Tìm kiếm -->
            <div class="row mb-4">
                <div class="col-md-8"></div>
                <div class="col-md-4">
                    <form action="<?= BASE_URL_CLIENT . '?act=danh-sach-don-hang' ?>" method="POST" class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Tìm kiếm" style="border-radius: 5px;">
                        <button type="submit" class="btn btn-primary"><i class="bi bi-search"></i></button>
                    </form>
                </div>
            </div>

            <!-- Bảng đơn hàng -->
            <table id="example1" class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>Mã đơn hàng</th>
                        <th>Tên người nhận</th>
                        <th>Số điện thoại người nhận</th>
                        <th>Ngày đặt</th>
                        <th>Tổng tiền</th>
                        <th>Trạng thái</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($listDonHangKhachHang as $key => $donHang) : ?>
                        <tr>
                            <td><?= $donHang['ma_don_hang'] ?></td>
                            <td><?= $donHang['ten_nguoi_nhan'] ?></td>
                            <td><?= $donHang['sdt_nguoi_nhan'] ?></td>
                            <td><?= $donHang['ngay_dat'] ?></td>
                            <td><?= number_format($donHang['tong_tien'], 0, ',', '.') ?> VNĐ</td>
                            <td><?= $donHang['ten_trang_thai'] ?></td>
                            <td>
                                <a href="<?= BASE_URL_CLIENT . '?act=chi-tiet-don-hang&don_hang_id=' . $donHang['id'] ?>" class="btn btn-info btn-sm">
                                    <i class="bi bi-eye-fill"></i> Xem chi tiết
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>Mã đơn hàng</th>
                        <th>Tên người nhận</th>
                        <th>Số điện thoại người nhận</th>
                        <th>Ngày đặt</th>
                        <th>Tổng tiền</th>
                        <th>Trạng thái</th>
                        <th>Thao tác</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>

<?php require './views/layout/footer.php'; ?>
