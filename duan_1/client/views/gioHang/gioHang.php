<?php
require './views/layout/header.php';
require './views/layout/navbar.php';
?>

<!-- main content -->
<div class="container my-5">
    <?php if (empty($listSanPham)) { ?>
        <div class="alert alert-primary text-center">
            Chưa có sản phẩm trong giỏ hàng
        </div>
    <?php } else { ?>
        <div class="card p-4 shadow">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="mb-0">Giỏ hàng</h3>
                <a href="<?= BASE_URL_CLIENT . '?act=dat-hang' ?>" class="btn btn-danger">Mua ngay tất cả</a>
            </div>

            <?php foreach ($listSanPham as $sanPham) : ?>
                <div class="row mb-4 border-bottom pb-4">
                    <div class="col-md-4 text-center">
                        <a href="<?= BASE_URL_CLIENT . '?act=chi-tiet-san-pham&id=' . $sanPham['id_san_pham'] ?>">
                            <img src="<?= '.' . $sanPham['hinh_anh'] ?>" alt="<?= $sanPham['ten_san_pham'] ?>" class="img-fluid rounded" style="height: 250px; object-fit: cover;">
                        </a>
                    </div>
                    <div class="col-md-8 d-flex flex-column justify-content-between">
                        <h5 class="font-weight-bold"><?= $sanPham['ten_san_pham'] ?></h5>
                        <p><?= $sanPham['mo_ta'] ?></p>
                        <div class="d-flex justify-content-between">
                            <p class="text-muted" style="text-decoration: line-through;">Giá: <?= number_format($sanPham['gia_san_pham']) ?> VNĐ</p>
                            <p class="text-danger font-weight-bold">Giá khuyến mãi: <?= number_format($sanPham['gia_khuyen_mai']) ?> VNĐ</p>
                        </div>
                        <p><b>Số lượng: <?= $sanPham['so_luong'] ?></b></p>
                        <div class="d-flex justify-content-end">
                            <a href="<?= BASE_URL_CLIENT . '?act=chi-tiet-san-pham&id=' . $sanPham['id_san_pham'] ?>" class="btn btn-primary mr-2" title="Chi tiết sản phẩm"><i class="bi bi-eye-fill"></i></a>
                            <a href="<?= BASE_URL_CLIENT . '?act=delete-gio-hang&id=' . $sanPham['id'] ?>" onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này không?')" class="btn btn-warning mr-2" title="Xóa sản phẩm"><i class="bi bi-trash3-fill"></i></a>
                            <a href="<?= BASE_URL_CLIENT . '?act=dat-hang&san_pham_id=' . $sanPham['id_san_pham'] ?>" class="btn btn-danger" title="Mua ngay"><i class="bi bi-cart-fill"></i> Mua ngay</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php } ?>
</div>

<!-- footer -->
<?php require './views/layout/footer.php'; ?>
