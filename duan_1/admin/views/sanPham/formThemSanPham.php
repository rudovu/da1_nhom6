<?php
require './views/layout/header.php';
require './views/layout/navbar.php';

?>



<section class="content" style="height: 1000px;">
    <div class="pl-400 container-fluid" style=" height: 400px; width: 1000px; margin:20px auto;">
        <div class="row">
            <div class="col-12">


                <div class="card card-primary ">
                    <div class="card-header">
                        <h3 class="card-title" T> Thêm sản phẩm</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="<?= BASE_URL_ADMIN . '?act=post-them-san-pham' ?>" method="POST" enctype="multipart/form-data">
                        <div class="card-body row">
                            <div class="form-group col-md-12">
                                <label>Tên sản phẩm</label>
                                <input type="text" class="form-control" name="ten_san_pham" placeholder="Nhập tên sản phẩm">
                                <p class="text-danger">
                                    <?php if (isset($_SESSION['error']['ten_san_pham'])) {
                                        echo $_SESSION['error']['ten_san_pham'];
                                    } ?>
                                </p>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Giá sản phẩm</label>
                                <input type="number" class="form-control" name="gia_san_pham" placeholder="Nhập giá sản phẩm">
                                <p class="text-danger">
                                    <?php if (isset($_SESSION['error']['gia_san_pham'])) {
                                        echo $_SESSION['error']['gia_san_pham'];
                                    } ?>
                                </p>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Giá khuyến mãi</label>
                                <input type="number" class="form-control" name="gia_khuyen_mai" placeholder="Nhập giá khuyến mãi">
                                <p class="text-danger">
                                    <?php if (isset($_SESSION['error']['ten_san_pham'])) {
                                        echo $_SESSION['error']['ten_san_pham'];
                                    } ?>
                                </p>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Hình ảnh</label>
                                <input type="file" class="form-control" name="hinh_anh" placeholder="Chọn hình ảnh">
                                <p class="text-danger">
                                    <?php if (isset($_SESSION['error']['hinh_anh'])) {
                                        echo $_SESSION['error']['hinh_anh'];
                                    } ?>
                                </p>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Số lượng</label>
                                <input type="text" class="form-control" name="so_luong" placeholder="Nhập số lượng">
                                <p class="text-danger">
                                    <?php if (isset($_SESSION['error']['so_luong'])) {
                                        echo $_SESSION['error']['so_luong'];
                                    } ?>
                                </p>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Ngày nhập</label>
                                <input type="date" class="form-control" name="ngay_nhap" placeholder="">
                                <p class="text-danger">
                                    <?php if (isset($_SESSION['error']['ngay_nhap'])) {
                                        echo $_SESSION['error']['ngay_nhap'];
                                    } ?>
                                </p>
                            </div>
                            <div class="form-group col-md-6">
                                <select name="danh_muc_id" class="form-select col-md-12 text-center">
                                    <option selected value="">--Chọn danh mục--</option>
                                    <?php foreach ($listDanhMuc as $key => $danhMuc) : ?>
                                        <option value="<?= $danhMuc['id'] ?>"><?= $danhMuc['ten_danh_muc'] ?></option>
                                    <?php endforeach ?>
                                </select>
                                <p class="text-danger">
                                    <?php if (isset($_SESSION['error']['danh_muc_id'])) {
                                        echo $_SESSION['error']['danh_muc_id'];
                                    } ?>
                                </p>
                            </div>
                            <div class="form-group col-md-6">
                                <select name="trang_thai" class="form-select col-md-12 text-center">
    

                                    <option value="1" selected>Còn hàng</option>
                                    <option value="0">Hết hàng</option>

                                </select>
                                <p class="text-danger">
                                    <?php if (isset($_SESSION['error']['trang_thai'])) {
                                        echo $_SESSION['error']['trang_thai'];
                                    } ?>
                                </p>
                            </div>



                            <div class="form-group col-md-12">
                                <label>Mô tả</label>
                                <textarea class="form-control" name="mo_ta" placeholder="Nhập tên mô tả"></textarea>
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



<?php require './views/layout/footer.php'; ?>