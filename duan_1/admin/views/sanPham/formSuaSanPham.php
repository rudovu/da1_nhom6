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
                        <h3 class="card-title" T> Sửa sản phẩm</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="<?= BASE_URL_ADMIN . '?act=post-sua-san-pham' ?>" method="POST" enctype="multipart/form-data" >
                        <input type="date" name="ngay_nhap" id="" value="<?= $detailSanPham['ngay_nhap'] ?>" hidden>
                    <input type="text" name="id" value="<?= $detailSanPham['id'] ?>" hidden>
                    
                        <div class="card-body row">
                            <div class="form-group col-md-12">
                                <label>Tên danh mục</label>
                                <input type="text" class="form-control" name="ten_san_pham" placeholder="Nhập tên sản phẩm" value="<?= $detailSanPham['ten_san_pham'] ?>">
                                <p class="text-danger">
                                    <?php if (isset($_SESSION['error']['ten_san_pham'])) {
                                        echo $_SESSION['error']['ten_san_pham'];
                                    } ?>
                                </p>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Giá sản phẩm</label>
                                <input type="text" class="form-control" name="gia_san_pham" placeholder="Nhập giá sản phẩm" value="<?= $detailSanPham['gia_san_pham'] ?>">
                                <p class="text-danger">
                                    <?php if (isset($_SESSION['error']['gia_san_pham'])) {
                                        echo $_SESSION['error']['gia_san_pham'];
                                    } ?>
                                </p>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Giá khuyến mãi</label>
                                <input type="text" class="form-control" name="gia_khuyen_mai" placeholder="Nhập giá khuyến mãi" value="<?= $detailSanPham['gia_khuyen_mai'] ?>">
                                <p class="text-danger">
                                    <?php if (isset($_SESSION['error']['ten_san_pham'])) {
                                        echo $_SESSION['error']['ten_san_pham'];
                                    } ?>
                                </p>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Hình ảnh</label>
                                <input type="file" class="form-control" name="hinh_anh" placeholder="Chọn hình ảnh" >
                                <img style="width:50px; height:50px;" src="<?='.' . $detailSanPham['hinh_anh'] ?>" alt="">
                                <p class="text-danger">
                                    <?php if (isset($_SESSION['error']['hinh_anh'])) {
                                        echo $_SESSION['error']['hinh_anh'];
                                    } ?>
                                </p>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Số lượng</label>
                                <input type="text" class="form-control" name="so_luong" placeholder="Nhập số lượng" value="<?= $detailSanPham['so_luong'] ?>">
                                <p class="text-danger">
                                    <?php if (isset($_SESSION['error']['so_luong'])) {
                                        echo $_SESSION['error']['so_luong'];
                                    } ?>
                                </p>
                            </div>


                            <div class="form-group col-md-6">
                                <select name="danh_muc_id" class="form-select col-md-12 text-center" >
                                    <option selected value="">--Chọn danh mục--</option>
                                    <?php foreach ($listDanhMuc as $key => $danhMuc) : ?>
                                        <option value="<?= $danhMuc['id'] ?>" <?= $detailSanPham['danh_muc_id'] == $danhMuc['id'] ? 'selected' : '' ?>><?= $danhMuc['ten_danh_muc'] ?></option>
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
                                    <option value="2">Hết hàng</option>

                                </select>
                                <p class="text-danger">
                                    <?php if (isset($_SESSION['error']['trang_thai'])) {
                                        echo $_SESSION['error']['trang_thai'];
                                    } ?>
                                </p>
                            </div>



                            <div class="form-group col-md-12">
                                <label>Mô tả</label>
                                <textarea class="form-control" name="mo_ta" placeholder="Nhập tên mô tả"><?= $detailSanPham['mo_ta'] ?></textarea>
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