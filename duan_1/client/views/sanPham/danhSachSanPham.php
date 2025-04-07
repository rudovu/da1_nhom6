<?php
require './views/layout/header.php';
require './views/layout/navbar.php';


?>
<!-- navbar -->



<!-- main content -->



<div class="container">
    <div class="container">
        <!-- Thêm thanh lọc danh mục sản phẩm -->
        <div class="d-flex justify-content-between align-items-center my-4">
            <h3 class="mb-0">Danh sách sản phẩm</h3>
            <form method="GET" action="<?= BASE_URL_CLIENT . '?act=san-pham-theo-danh-muc' ?>">
                <select name="danh_muc" class="form-select" onchange="this.form.submit()">
                    <option value="">Tất cả</option>
                    <?php foreach ($listDanhMuc as $danhMuc) : ?>
                        <option value="<?= $danhMuc['id'] ?>" <?= (isset($_GET['danh_muc']) && $_GET['danh_muc'] == $danhMuc['id']) ? 'selected' : '' ?>>
                            <?= $danhMuc['ten_danh_muc'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </form>
        </div>
        <div class="row">
            <?php foreach ($listSanPham as $key => $sanPham) : ?>
                <div class="col-md-3 mb-4"> <!-- Mỗi sản phẩm chiếm 1/3 chiều rộng trên màn hình medium trở lên -->
                    <div class="card h-100"> <!-- Sử dụng card để đồng bộ chiều cao -->
                        <a href="<?= BASE_URL_CLIENT . '?act=chi-tiet-san-pham&id=' . $sanPham['id'] ?>">
                            <img src="<?= '.' . $sanPham['hinh_anh'] ?>" class="card-img-top"
                                alt="Product Image"
                                style="height: 200px; width: 100%; object-fit: contain;">
                        </a>

                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">
                                <a href="<?= BASE_URL_CLIENT . '?act=chi-tiet-san-pham&id=' . $sanPham['id'] ?>"><?= $sanPham['ten_san_pham'] ?></a>
                            </h5>
                            <p class="card-text"><?= $sanPham['mo_ta'] ?></p>
                            <div class="mt-auto">
                                <p class="text-muted" style="text-decoration: line-through;">Giá: <?= number_format($sanPham['gia_san_pham']) ?> VNĐ</p>
                                <p class="text-danger font-weight-bold">Giá khuyến mãi: <?= number_format($sanPham['gia_khuyen_mai']) ?> VNĐ</p>
                            </div>
                        </div>
                        <div class="card-footer text-center">
                            <a href="<?= BASE_URL_CLIENT . '?act=them-gio-hang&id=' . $sanPham['id'] ?>" class="btn btn-warning"><i class="bi bi-cart-plus-fill"></i></a>
                            <a href="<?= BASE_URL_CLIENT . '?act=chi-tiet-san-pham&id=' . $sanPham['id'] ?>" class="btn btn-primary"><i class="bi bi-eye-fill"></i></a>
                            <a href="<?= BASE_URL_CLIENT . '?act=dat-hang&san_pham_id=' . $sanPham['id'] ?>" class="btn btn-danger">Mua ngay</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- end content -->


    <!-- footer -->
    <?php require './views/layout/footer.php'; ?>