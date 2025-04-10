<?php
require './views/layout/header.php';
require './views/layout/navbar.php';

?>
<div class="banner position-relative">
    <img src="./assets/images/banner.jpg" alt="" style="width: 100%; height: 600px; object-fit: cover;">
    <div class="banner-text position-absolute text-white" style="top: 50%; left: 50%; transform: translate(-50%, -50%); text-align: center;">
        <h1 class="display-4 font-weight-bold">Chào mừng đến với Shop bán Nội thất</h1>
        <p class="lead">Khám phá ngay những sản phẩm hot nhất!</p>
        <a href="<?= BASE_URL_CLIENT . '?act=danh-sach-san-pham' ?>" class="btn btn-danger btn-lg">Xem sản phẩm</a>
    </div>
</div>
<h2 class="section-title text-center mt-4" style="font-size: xx-large; font-weight: bold; color: red;">SẢN PHẨM HOT</h2>
<div class="gioi-thieu">
    <div class="product-item hot">
        <div>
            <a href="<?= BASE_URL_CLIENT . '?act=danh-sach-san-pham' ?>"><img src="./assets/images/1.jpg" alt="" style="width: 251px; height: 201px;"></a>
            <div class="form-group col-md-6">
                <a class="title" href="" style="font-size: large;font-weight: bold; color: red;">Ghế tựa</a>
            </div>
        </div>

        <div>
            <a href="<?= BASE_URL_CLIENT . '?act=danh-sach-san-pham' ?>"><img src="./assets/images/2.jpg" alt="" style="width: 251px; height: 201px;"></a>
            <div class="form-group col-md-6">
                <a class="title" href="" style="font-size: large;font-weight: bold; color: red;">Bộ ghế sofa</a>
            </div>
        </div>

        <div>
            <a href="<?= BASE_URL_CLIENT . '?act=danh-sach-san-pham' ?>"><img src="./assets/images/3.jpg" alt="" style="width: 251px; height: 201px;"></a>
            <div class="form-group col-md-6">
                <a class="title" href="" style="font-size: large;font-weight: bold; color: red;">Bộ Sofa nỉ</a>
            </div>
        </div>

        <div>
            <a href="<?= BASE_URL_CLIENT . '?act=danh-sach-san-pham' ?>"><img src="./assets/images/4.jpg" alt="" style="width: 251px; height: 201px;"></a>
            <div class="form-group col-md-6">
                <a class="title" href="" style="font-size: large;font-weight: bold; color: red;">Bộ Sofa da</a>
            </div>
        </div>
    </div>
</div>
<div class="gioi-thieu">
    <div class="form-row ">
        <div class="form-group col-md-1"></div>
        <div class="form-group col-md-4 ">
            <img style="width: 440px; height:400px" src="./assets/images/4.jpg" alt="">
        </div>
        <div class="form-group col-md-6">
            <ul>
                <h3 class="title"><a href="<?= BASE_URL_CLIENT . '?act=danh-sach-san-pham' ?>">Đồ nội thất bằng da</a></h3>
                <li><i>Đồ nội thất bằng da thuộc được đánh giá là nguyên vật liệu có độ bền cao, dẻo dai và lâu bền với thời gian. Nó là thành phẩm được tạo nên từ quy trình thuộc da với nguyên liệu chính là da động vật như trâu, bò, nai, cá sấu, dê, cừu… Trong số đó, da bò được sản xuất với số lượng lớn và phong phú nhất.</i></li>
                <li><i>
                        
                    </i></li>
            </ul>
        </div>
    </div>
</div>
<div class="gioi-thieu">
    <div class="form-row ">
        <div class="form-group col-md-1"></div>
        <div class="form-group col-md-4 ">
            <img style="width: 440px; height:400px" src="./assets/images/5.jpg" alt="">
        </div>
        <div class="form-group col-md-6">
            <ul>
                <h3 class="title"><a href="<?= BASE_URL_CLIENT . '?act=danh-sach-san-pham' ?>">Đồ nội thất bằng gỗ</a></h3>
                <li><i>Đồ gỗ nội thất là một phạm trù để sử dụng để kể về những sản phẩm đồ dùng được sử dụng phục vụ cho cuộc sống gia đình với chất liệu bằng gỗ. Đây là các sản phẩm có lịch sử xuất hiện lâu đời và phát triển qua từng giai đoạn với từng đặc trưng khác nhau, mang đến những trải nghiệm sử dụng mới lạ cho con người.</i></li>
                <li><i></i></li>
            </ul>
        </div>
    </div>
</div>
<div class="gioi-thieu">
    <div class="form-row ">
        <div class="form-group col-md-1"></div>
        <div class="form-group col-md-4 ">
            <img style="width: 440px; height:400px" src="./assets/images/6.jpg" alt="">
        </div>
        <div class="form-group col-md-6">
            <ul>
                <h3 class="title"><a href="<?= BASE_URL_CLIENT . '?act=danh-sach-san-pham' ?>">đồ nội thất bằng vải nỉ</a></h3>
                <li><i>Vải nỉ là chất liệu mềm nên được sử dụng rộng rãi để may các đồ nội thất như rèm cửa, thảm trải sàn... Lớp này không chỉ bảo vệ đồ nội thất theo một cách nào đó mà còn giảm độ cứng khi sử dụng áo bọc ghế, giúp sờ vào thoải mái và êm ái hơn, không gây đau nhức lưng do ngồi lâu.
            </ul>
        </div>
    </div>
</div>
<?php require './views/layout/footer.php'; ?>