<?php
require './views/layout/header.php';
require './views/layout/navbar.php';

?>







<div class="layout" style="background-color:  #f4f6f9;">
  <section style="margin:20px auto; width:90%;" class="content card">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="alert">
            <h3 class=""><i class="fas fa-info"></i>Quản lí đơn hàng</h3>
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
            <h5 style="color:black;">Trạng thái đơn hàng : <?= $detailDonHang['ten_trang_thai'] ?></h5>
          </div>
          <div class="form-group row col-md-12">
            <div class="col-md-1"></div>
            <form action="<?= BASE_URL_ADMIN . '?act=post-trang-thai&id_don_hang=' . $id ?>" method="POST" class="row ">
              <select name="trang_thai" id="">
                <?php foreach ($listTrangThai as $key => $trangThai): ?>

                  <option <?= $trangThai['id'] == $detailDonHang['trang_thai_id'] ? 'selected' : '' ?>   <?php
                             if (
                               $trangThai['id'] < $detailDonHang['trang_thai_id']
                               || $detailDonHang['trang_thai_id'] == 8
                               || $detailDonHang['trang_thai_id'] == 9
                               || $detailDonHang['trang_thai_id'] == 10

                             ) {
                               echo "disabled";
                             }


                             ?>
                    value="<?= $trangThai['id'] ?> "><?= $trangThai['ten_trang_thai'] ?></option>
                <?php endforeach; ?>
              </select>
              <button type="submit" class="btn btn-primary">Xác nhận</button>
            </form>

          </div>
          <!-- Main content -->
          <div class="invoice p-3 mb-3">
            <!-- title row -->
            <div class="row">
              <div class="col-12">
                <h4>
                  <i class="fas fa-globe"></i> Chi tiết đơn hàng : <?= $detailDonHang['ma_don_hang'] ?>
                  <small class="float-right">Ngày đặt: <?= formatDate($detailDonHang['ngay_dat']) ?></small>
                </h4>
              </div>
              <!-- /.col -->
            </div>
            <!-- info row -->
            <div class="row invoice-info">
              <div class="col-sm-4 invoice-col">

                <address>
                  <strong>Thông tin người đặt: </strong><br>
                  <b>Tên : </b> <?= $detailDonHang['ho_ten'] ?><br>
                  <b>Email :</b> <?= $detailDonHang['email'] ?><br>
                  <b>Số điện thoại :</b> <?= $detailDonHang['so_dien_thoai'] ?><br>
                  <b>Địa chỉ :</b> <?= $detailDonHang['dia_chi'] ?><br>

                </address>
              </div>
              <!-- /.col -->
              <div class="col-sm-4 invoice-col">

                <address>
                  <strong> Thông tin người nhận :</strong><br>
                  <b>Tên : </b> <?= $detailDonHang['ten_nguoi_nhan'] ?><br>
                  <b>Email :</b> <?= $detailDonHang['email_nguoi_nhan'] ?><br>
                  <b>Số điện thoại :</b> <?= $detailDonHang['sdt_nguoi_nhan'] ?><br>
                  <b>Địa chỉ :</b> <?= $detailDonHang['dia_chi_nguoi_nhan'] ?><br>
                </address>
              </div>
              <!-- /.col -->
              <div class="col-sm-4 invoice-col">
                <strong> Thông tin đơn hàng : <?= $detailDonHang['ma_don_hang'] ?></strong><br>


                <b>Tổng tiền : </b> <?= $detailDonHang['tong_tien'] ?><br>
                <b>Ghi chú : </b><?= $detailDonHang['ghi_chu'] ?><br>
                <b>Phương thức thanh toán : </b><?= $detailDonHang['ten_phuong_thuc'] ?><br>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- Table row -->
            <div class="row">
              <div class="col-12 table-responsive">
                <!-- <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>STT</th>
                      <th>Tên sản phẩm</th>
                      <th> Đơn giá</th>
                      <th>Số lượng</th>
                      <th>Thành tiền</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $thanhtien = 0; ?>
                    <?php if (!empty($listSanPhamDonhang)): ?>
                    <?php foreach ($listSanPhamDonhang as $key => $sanPham): ?>
                      <tr>
                        <td><?= $key ?></td>
                        <td><?= $sanPham['ten_san_pham'] ?></td>
                        <td><?= $sanPham['don_gia'] ?> vnđ</td>
                        <td><?= $sanPham['so_luong'] ?></td>
                        <td><?= $tong_tien = $sanPham['don_gia'] * $sanPham['so_luong'] ?> vnđ</td>

                      </tr>
                      <?php $thanhtien += $tong_tien; ?>
                    <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" style="text-align: center;">Không có sản phẩm nào.</td>
                        </tr>
                    <?php endif; ?>
                  </tbody>
                </table>  -->
                <table class="table tablestriped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Đơn giá</th>
                                        <th>Số lượng</th>
                                        <th>Thành tiền</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $tong_tien = 0; ?>
                                    <?php foreach ($listSanPhamDonhang as $key => $sanPham): ?>
                                        <tr>
                                            <td><?= $key + 1 ?></td>
                                            <td><?= $sanPham['ten_san_pham'] ?></td>
                                            <td><?= $sanPham['don_gia'] ?></td>
                                            <td><?= $sanPham['so_luong'] ?></td>
                                            <td><?= $sanPham['thanh_tien'] ?></td>
                                        </tr>
                                        <?php $tong_tien += $sanPham['thanh_tien']; ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>

              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->


            <div class="col-6">

              <div class="table-responsive">
                <table class="table">
                  <tr>
                    <th style="width:50%">Thành tiền:</th>
                    <td><?= $thanhtien ?> vnđ</td>
                  </tr>
                  <tr>
                    <th>Vận chuyển</th>
                    <td>30000 vnđ</td>
                  </tr>
                  <tr>
                    <th>Tổng tiền:</th>
                    <td> <?= $thanhtien += 30000 ?> vnđ</td>
                  </tr>

                </table>
              </div>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->

          <!-- this row will not appear when printing -->

        </div>
        <!-- /.invoice -->
      </div><!-- /.col -->
    </div><!-- /.row -->
</div><!-- /.container-fluid -->
</section>
</div>



















<?php require './views/layout/footer.php'; ?>