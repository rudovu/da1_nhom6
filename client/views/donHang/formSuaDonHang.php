<?php
require './views/layout/header.php';
require './views/layout/navbar.php';

?>



<section class="content" style="height: auto;">
    <div class="pl-400 container-fluid" style=" height: 400px; width: 1000px; margin:20px auto;">
        <div class="row">
            <div class="col-12">


                <div class="card card-primary ">
                    <div class="card-header">
                        <h3 class="card-title" T> Sửa thông tin người nhận</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="<?= BASE_URL_CLIENT . '?act=post-sua-thong-tin-nguoi-nhan' ?>" method="POST" enctype="multipart/form-data" >
                        <input type="text" name="don_hang_id" id="" value="<?= $detailDonHang['id'] ?>" hidden>
                   
                    
                        <div class="card-body row">
                            <div class="form-group col-md-12">
                                <label>Tên người nhận</label>
                                <input type="text" class="form-control" name="ten_nguoi_nhan" placeholder="Nhập tên người nhận" value="<? $detailDonHang['ten_nguoi_nhan'] ?>">
                                <p class="text-danger">
                                    <?php if (isset($_SESSION['error']['ten_nguoi_nhan'])) {
                                        echo $_SESSION['error']['ten_nguoi_nhan'];
                                    } ?>
                                </p>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Email</label>
                                <input type="text" class="form-control" name="email_nguoi_nhan" placeholder="Nhập email" value="<?= $detailDonHang['email_nguoi_nhan'] ?>">
                                <p class="text-danger">
                                    <?php if (isset($_SESSION['error']['email_nguoi_nhan'])) {
                                        echo $_SESSION['error']['email_nguoi_nhan'];
                                    } ?>
                                </p>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Số điện thoại</label>
                                <input type="text" class="form-control" name="sdt_nguoi_nhan" placeholder="Nhập số điện thoại" value="<?= $detailDonHang['sdt_nguoi_nhan'] ?>">
                                <p class="text-danger">
                                    <?php if (isset($_SESSION['error']['sdt_nguoi_nhan'])) {
                                        echo $_SESSION['error']['sdt_nguoi_nhan'];
                                    } ?>
                                </p>
                            </div>
                            <div class="form-group col-md-12">
                            <label>Địa chỉ</label>
                                <input type="text" class="form-control" name="dia_chi_nguoi_nhan" placeholder="Nhập địa chỉ" value="<?= $detailDonHang['dia_chi_nguoi_nhan'] ?>">
                                <p class="text-danger">
                                    <?php if (isset($_SESSION['error']['dia_chi_nguoi_nhan'])) {
                                        echo $_SESSION['error']['dia_chi_nguoi_nhan'];
                                    } ?>
                                </p>
                            </div>
                                    
                           
                            <div class="form-group col-md-12">
                                <label>Ghi chú</label>
                                <textarea class="form-control" name="ghi_chu" placeholder="Nhập ghi chú"><?= $detailDonHang['ghi_chu'] ?></textarea>
                            </div>

                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary" fdprocessedid="x1fkij">Submit</button>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>