<?php
require './views/layout/header.php';
require './views/layout/navbar.php';

?>









<div style="width: 1050px; margin:0px auto;" class="card-body">
    <div style="border:1px solid #f4f6f9" class=" form-group alert">

        <div class="form-group col-md-12   " style="padding:20px 0px;">
            <h3>Thống kê đơn hàng:</h3>
            <?php
            $tongDonHang = 0;
            $tongDonDaThanhToan = 0;
            $tongDonDaHuy = 0;
            $tongDonDangGiao = 0;
            foreach ($listDonHang as $key => $value) {
                $tongDonHang += 1;
                if ($value['trang_thai_id'] == 6) {
                    $tongDonDaThanhToan += 1;
                }
                if ($value['trang_thai_id'] == 10) {
                    $tongDonDaHuy += 1;
                }
                if ($value['trang_thai_id'] == 5) {
                    $tongDonDangGiao += 1;
                }
            }
            ?>

            <table class="table table-striped ">
                <thead>
                    <tr>
                        <th scope="col">Tổng đơn hàng</th>
                        <th scope="col">Tổng đơn đã hoàn thành</th>
                        <th scope="col">Tổng đơn đã hủy</th>
                        <th scope="col">Tổng đơn đang giao</th>
                    </tr>
                </thead>
                <tbody>


                    <tr>
                        <td><?= $tongDonHang ?></td>
                        <td><?= $tongDonDaThanhToan ?></td>
                        <td><?= $tongDonDaHuy ?></td>
                        <td><?= $tongDonDangGiao ?></td>

                    </tr>

                </tbody>
            </table>

        </div>
        <div class="form-group col-md-12   " style="padding:20px 0px;">
            <h3>Quản lý tài khoản:</h3>

            <?php
            $tongTaiKhoan = 0;
            $tongTaiKhoanHoatDong = 0;
            $tongTaiKhoanBiCam = 0;
            foreach ($listTaiKhoans as $key => $value) {
                $tongTaiKhoan = $key + 1;
                if ($value['trang_thai'] == 1) {
                    $tongTaiKhoanHoatDong += 1;
                }
                if ($value['trang_thai'] == 0) {
                    $tongTaiKhoanBiCam += 1;
                }
            }
            ?>

            <table class="table table-striped ">
                <thead>
                    <tr>
                        <th scope="col">Tổng tài khoản</th>
                        <th scope="col">Tài khoản còn hoạt động</th>
                        <th scope="col">Tài khoản bị cấm</th>
                    </tr>
                </thead>
                <tbody>


                    <tr>
                        <td><?= $tongTaiKhoan ?></td>
                        <td><?= $tongTaiKhoanHoatDong ?></td>
                        <td><?= $tongTaiKhoanBiCam ?></td>

                    </tr>
                </tbody>
            </table>
            <div class=" col-md-12 row alert">
                <div class="col-md-7">
                </div>
                <form style="display:flex;" class="col-md-5" action="<?= BASE_URL_ADMIN . '?act=thong-ke' ?>" class="row" method="POST">

                    <input style="border-radius:5px; height:27px; padding:0px 20px;" class="col-md-9" type="text" name="search" placeholder="Tìm kiếm">
                    <button style="height:27px; ;" type="submit" class="search col-md-3  btn-primary"><i class="bi bi-search"></i></button>

                </form>
            </div>
            <table class="table table-striped ">
                <thead>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Tên</th>
                        <th scope="col">Email</th>
                        <th scope="col">Số điện thoại</th>
                        <th scope="col">Giới tính</th>
                        <th scope="col">Trạng thái</th>
                        <th scope="col">Thao tác</th>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach ($listTaiKhoans as $key  => $value) : ?>
                        <tr>
                            <td><?= $key + 1 ?></td>
                            <td><?= $value['ho_ten'] ?></td>
                            <td><?= $value['email'] ?></td>
                            <td><?= $value['so_dien_thoai'] ?></td>
                            <td><?= $value['gioi_tinh'] ?></td>
                            <td><?= $value['trang_thai'] == 1 ? 'Hoạt động' : 'Bị cấm' ?></td>
                            <td>
                                <a title="Bỏ cấm" href="<?= BASE_URL_ADMIN . '?act=huy-cam-tai-khoan&id=' . $value['id'] ?>"><button class="btn btn-warning"><i class="bi bi-unlock-fill"></i></button></a>
                                <a title="Cấm" href="<?= BASE_URL_ADMIN . '?act=cam-tai-khoan&id=' . $value['id'] ?>"><button class="btn btn-danger"><i class="bi bi-ban"></i></button></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>
    </div>


</div>













<?php require './views/layout/footer.php'; ?>