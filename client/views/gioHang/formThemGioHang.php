<?php
require './views/layout/header.php';
require './views/layout/navbar.php';


?>
<!-- navbar -->



<!-- main content -->



<div class="container my-4">
    <div class="card product-item p-3 shadow">
        <div class="row">
            <div class="col-md-5">
                <a href="#">
                    <img src="<?= '.' . $sanPham['hinh_anh'] ?>" alt="<?= $sanPham['ten_san_pham'] ?>" class="img-fluid" style="height: 300px; object-fit: cover;">
                </a>
            </div>
            <div class="col-md-7 d-flex flex-column">
                <h4 class="title mb-3"><a href="#" class="text-dark"><?= $sanPham['ten_san_pham'] ?></a></h4>
                <p class="text-justify flex-grow-1"><?= $sanPham['mo_ta'] ?></p>
                
                <div>
                    <p class="text-muted" style="text-decoration: line-through;">Giá: <?= number_format($sanPham['gia_san_pham']) ?> VNĐ</p>
                    <p class="text-danger font-weight-bold">Giá khuyến mãi: <?= number_format($sanPham['gia_khuyen_mai']) ?> VNĐ</p>
                </div>

                <form action="<?= BASE_URL_CLIENT . '?act=post-them-gio-hang' ?>" method="POST" class="mt-3 d-flex align-items-center">
                    <input type="hidden" name="tai_khoan_id" value="<?= $tai_khoan_id['id'] ?>">
                    <input type="hidden" name="san_pham_id" value="<?= $sanPham['id'] ?>">
                    
                    <label for="so_luong" class="mr-2 mb-0">Số lượng:</label>
                    <input type="number" name="so_luong" min="1" max="<?= $sanPham['so_luong'] ?>" value="1" class="form-control w-25 mr-3">
                    
                    <button type="submit" class="btn btn-warning"><i class="bi bi-cart-plus-fill"></i> Thêm vào giỏ hàng</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- end content -->


<!-- footer -->
<?php require './views/layout/footer.php'; ?>