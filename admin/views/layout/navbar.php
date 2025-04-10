<div class="navbar card">
    <div class="form-row col-md-12">
        <div class="col-md-10 row">
            <div class="form-group col-md-2">
                <!-- <img src="./assets/images/logo-shop.jpg" alt="ảnh"> -->
            </div>
            <div class="form-group col-md-10 row">
                <div class="form-group col-md-3 active">
                    <a href="<?= BASE_URL_ADMIN ?>">Danh mục</a>
                </div>
                <div class="form-group col-md-3 active">
                    <a href="<?= BASE_URL_ADMIN . '?act=danh-sach-san-pham' ?> " title="Danh sách sản phẩm">Sản phẩm</a>
                </div>
                <div class="form-group col-md-3 active">
                    <a href="<?= BASE_URL_ADMIN . '?act=danh-sach-don-hang' ?>">Đơn hàng</a>
                </div>
                <div class="form-group col-md-3 active">
                    <a href="<?= BASE_URL_ADMIN . '?act=thong-ke' ?>">Thống kê </a>
                </div>
            </div>
        </div>

        <div class="form-group col-md-1">
            <div class="avatar form-group col-md-12">
                <img style="width: 30px; height :30px; border-radius:50%;" title="Thông tin cá nhân" src="<?= '.' . $user['hinh_anh']; ?>" alt="" onerror="this.onerror=null; this.src= '../uploads/th.jpg'">
                <a href="<?= BASE_URL_ADMIN . '?act=logout' ?>" title="Đăng xuất"><i class="bi bi-box-arrow-right"></i></a>
            </div>
        </div>



    </div>

</div>