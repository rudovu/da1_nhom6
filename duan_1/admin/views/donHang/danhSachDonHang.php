<?php
require './views/layout/header.php';
require './views/layout/navbar.php';

?>


<?php
// Giả sử bạn lấy dữ liệu từ cơ sở dữ liệu và lưu vào biến $listDonHang
// Sắp xếp theo ngày đặt từ mới đến cũ (nếu chưa làm ở SQL)
usort($listDonHang, function($a, $b) {
    return strtotime($b['ngay_dat']) - strtotime($a['ngay_dat']);
});
?>






<div style="width: 1050px; margin:0px auto;" class="card-body">
  <div style="border:1px solid #f4f6f9" class=" form-group alert" >

    <div class="form-group col-md-12   ">
      <form action="<?= BASE_URL_ADMIN . '?act=danh-sach-don-hang' ?>" class="row" method="POST">
        <div class="col-md-8"></div>
        <input style="border-radius:5px; padding:0px 20px;" class="col-md-3" type="text" name="search" placeholder="Tìm kiếm">
        <button type="submit" class="search col-md-1  btn-primary"><i class="bi bi-search"></i></button>

      </form>
    </div>
  </div>
  <table id="example1" class="table table-bordered table-striped">
    <thead>
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
      <?php foreach ($listDonHang as $key => $donHang) : ?>
        <tr>
          <td><?= $donHang['ma_don_hang'] ?></td>
          <td><?= $donHang['ten_nguoi_nhan'] ?></td>
          <td><?= $donHang['sdt_nguoi_nhan'] ?></td>
          <td><?= $donHang['ngay_dat'] ?></td>
          <td><?= $donHang['tong_tien'] ?></td>
          <td><?= $donHang['ten_trang_thai'] ?></td>
          <td>
            <div class="btn-group">
              <a href="<?= BASE_URL_ADMIN . '?act=chi-tiet-don-hang&don_hang_id=' . $donHang['id'] ?>">
                <button class="btn btn-primary"><i class="bi bi-eye-fill"></i></button></a>
              

            </div>

          </td>
        </tr>

      <?php endforeach; ?>
    </tbody>
    <tfoot>
      <tr>
        <th>Mã đơn hàng</th>
        <th>Tên người nhận</th>
        <th>Số điện thoại</th>
        <th>Ngày đặt</th>
        <th>Tổng tiền</th>
        <th>Trạng thái</th>
        <th>Thao tác</th>
      </tr>
    </tfoot>
  </table>

</div>













<?php require './views/layout/footer.php'; ?>