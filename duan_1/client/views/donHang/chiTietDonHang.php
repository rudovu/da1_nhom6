<?php
require './views/layout/header.php';
require './views/layout/navbar.php';
?>

<div class="layout" style="background-color:  #f4f6f9;">
  <section style="margin:20px auto; width:90%;" class="content card">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="alert alert-info">
            <h3><i class="fas fa-info"></i> Chi tiết đơn hàng</h3>
          </div>
          <?php
          $bgcolor = '';
          if ($detailDonHang['trang_thai_id'] <= 3) {
            $bgcolor = 'primary';
          } elseif ($detailDonHang['trang_thai_id'] <= 7) {
            $bgcolor = 'warning';
          } elseif ($detailDonHang['trang_thai_id'] <= 8) {
            $bgcolor = 'success';
          } elseif ($detailDonHang['trang_thai_id'] <= 9) {
            $bgcolor = 'warning';
          } elseif ($detailDonHang['trang_thai_id'] <= 10) {
            $bgcolor = 'danger';
          }
          ?>

          <div class="alert alert-<?= $bgcolor ?>">
            <h5 style="color:black;">Trạng thái đơn hàng: <?= $detailDonHang['ten_trang_thai'] ?></h5>
          </div>
          <div class="form-group row col-md-12">
            <div class="col-md-10"></div>
            <a href="<?= BASE_URL_CLIENT . '?act=sua-thong-tin-nguoi-nhan&don_hang_id=' . $detailDonHang['id'] ?>" class="btn btn-primary <?= $detailDonHang['trang_thai_id'] >= 3 ? 'disabled' : '' ?>">Sửa thông tin người nhận</a>
          </div>

          <div class="invoice p-3 mb-3">
            <div class="row">
              <div class="col-12">
                <h4>
                  <i class="fas fa-globe"></i> Chi tiết đơn hàng: <?= $detailDonHang['ma_don_hang'] ?>
                  <small class="float-right">Ngày đặt: <?= formatDate($detailDonHang['ngay_dat']) ?></small>
                </h4>
              </div>
            </div>

            <div class="row invoice-info">
              <div class="col-sm-4 invoice-col">
                <strong>Thông tin người đặt:</strong><br>
                <b>Tên:</b> <?= $detailDonHang['ho_ten'] ?><br>
                <b>Email:</b> <?= $detailDonHang['email'] ?><br>
                <b>Số điện thoại:</b> <?= $detailDonHang['so_dien_thoai'] ?><br>
                <b>Địa chỉ:</b> <?= $detailDonHang['dia_chi'] ?><br>
              </div>

              <div class="col-sm-4 invoice-col">
                <strong>Thông tin người nhận:</strong><br>
                <b>Tên:</b> <?= $detailDonHang['ten_nguoi_nhan'] ?><br>
                <b>Email:</b> <?= $detailDonHang['email_nguoi_nhan'] ?><br>
                <b>Số điện thoại:</b> <?= $detailDonHang['sdt_nguoi_nhan'] ?><br>
                <b>Địa chỉ:</b> <?= $detailDonHang['dia_chi_nguoi_nhan'] ?><br>
              </div>

              <div class="col-sm-4 invoice-col">
                <strong>Thông tin đơn hàng: <?= $detailDonHang['ma_don_hang'] ?></strong><br>
                <b>Tổng tiền:</b> <?= number_format($detailDonHang['tong_tien']) . ' VNĐ' ?><br>
                <b>Ghi chú:</b> <?= $detailDonHang['ghi_chu'] ?><br>
                <b>Phương thức thanh toán:</b> <?= $detailDonHang['ten_phuong_thuc'] ?><br>
              </div>
            </div>

            <div class="product-item card" style="margin-top: 20px; width: 90%; margin-bottom:20px; margin-left: 55px;">
              <div class="form-row">
                <div class="form-group col-md-1"></div>
                <div class="form-group col-md-4">
                <div class="col-md-11 d-flex align-items-center">
                    <img style="height: 100%; width: 100%;" src="<?= '.' . $detailSanPham['hinh_anh'] ?>" class="img-fluid rounded" alt="<?= $detailSanPham['ten_san_pham'] ?>" >
                </div>
                </div>

                <div class="form-group col-md-6">
                <div class="card-title alert alert-primary">
                        <h3>Thông tin sản phẩm</h3>
                    </div>
                    <div class="col-md-7">
                        <div class="card-body">
                            <h3 class="card-title text-primary"><?= $detailSanPham['ten_san_pham'] ?></h3>
                            <p class="card-text"><?= $detailSanPham['mo_ta'] ?></p>
                            <p class="text-danger font-weight-bold h5">Giá: <?= number_format($detailSanPham['gia_khuyen_mai']) . ' VNĐ' ?></p>
                        </div>
                        <div class="col-md-12">
                          <label for="">Số lượng:</label>
                          <input class="form-control" min="1" type="number" name="so_luong" value="<?= $detailDonHang['so_luong'] ?>" disabled>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
</div>

<?php require './views/layout/footer.php'; ?>