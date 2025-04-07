<?php
require './views/layout/header.php';
require './views/layout/navbar.php';


?>
<!-- navbar -->

<!-- main content -->
<!-- <div class="banner">
    <img src="./assets/images/bannner.jpg" alt="" style="width: 1530px; height: 600px;">
</div> -->

<div class="banner position-relative">
    <img src="./assets/images/bannner.jpg" alt="" style="width: 100%; height: 600px; object-fit: cover;">
    <div class="banner-text position-absolute text-white" style="top: 50%; left: 50%; transform: translate(-50%, -50%); text-align: center;">
        <h1 class="display-4 font-weight-bold">Chào mừng đến với Shop Ăn Vặt!</h1>
        <p class="lead">Khám phá ngay những món ăn ngon nhất!</p>
        <a href="<?= BASE_URL_CLIENT . '?act=danh-sach-san-pham' ?>" class="btn btn-danger btn-lg">Xem sản phẩm</a>
    </div>
</div>
<h2 class="section-title text-center mt-4" style="font-size: xx-large; font-weight: bold; color: red;">SẢN PHẨM HOT</h2>
<div class="gioi-thieu">
    <div class="product-item hot">
        <div>
            <a href="<?= BASE_URL_CLIENT . '?act=danh-sach-san-pham' ?>"><img src="./assets/images/Kho-ga-xe-la-chanh.jpg" alt="" style="width: 251px; height: 201px;"></a>
            <!-- Thông tin sản phẩm -->
            <div class="form-group col-md-6">
                <a class="title" href="" style="font-size: large;font-weight: bold; color: red;">Khô gà</a>
            </div>
        </div>

        <div>
            <a href="<?= BASE_URL_CLIENT . '?act=danh-sach-san-pham' ?>"><img src="./assets/images/kho-heo.jpg" alt="" style="width: 251px; height: 201px;"></a>
            <!-- Thông tin sản phẩm -->
            <div class="form-group col-md-6">
                <a class="title" href="" style="font-size: large;font-weight: bold; color: red;">Khô heo</a>
            </div>
        </div>

        <div>
            <a href="<?= BASE_URL_CLIENT . '?act=danh-sach-san-pham' ?>"><img src="./assets/images/kho-bo.jpg" alt="" style="width: 251px; height: 201px;"></a>
            <!-- Thông tin sản phẩm -->
            <div class="form-group col-md-6">
                <a class="title" href="" style="font-size: large;font-weight: bold; color: red;">Khô bò</a>
            </div>
        </div>

        <div>
            <a href="<?= BASE_URL_CLIENT . '?act=danh-sach-san-pham' ?>"><img src="./assets/images/muc-rim-me.jpg" alt="" style="width: 251px; height: 201px;"></a>
            <!-- Thông tin sản phẩm -->
            <div class="form-group col-md-6">
                <a class="title" href="" style="font-size: large;font-weight: bold; color: red;">Mực rim</a>
            </div>
        </div>
    </div>

</div>
<div class="gioi-thieu">
    <div class="form-row ">
        <div class="form-group col-md-1"></div>
        <div class="form-group col-md-4 ">
            <img style="width: 440px; height:400px" src="./assets/images/do-an-dong-hop.jpg" alt="">
        </div>
        <div class="form-group col-md-6">
            <ul>
                <h3 class="title"><a href="<?= BASE_URL_CLIENT . '?act=danh-sach-san-pham' ?>">ĐỒ ĂN ĐÓNG HỘP</a></h3>
                <li><i>Đồ ăn vặt đóng hộp là các loại thực phẩm ăn nhanh được chế biến sẵn và đóng gói trong các loại hộp kín (thường là hộp nhựa, kim loại, hoặc thủy tinh) để bảo quản được lâu mà không làm mất đi hương vị hoặc chất lượng. Những loại đồ ăn này thường được thiết kế để tiện lợi cho việc sử dụng mà không cần chế biến thêm.</i></li>
                <li><i>
                        Lợi ích của đồ ăn vặt đóng hộp: <br>
                        Tiện lợi: Dễ mang theo, phù hợp cho các chuyến đi, văn phòng hoặc làm đồ ăn nhẹ. <br>
                        Bảo quản lâu: Được đóng gói kỹ lưỡng nên hạn sử dụng dài. <br>
                        An toàn vệ sinh: Quy trình đóng gói hiện đại đảm bảo vệ sinh và chất lượng sản phẩm. <br>
                        Đa dạng hương vị: Phù hợp với sở thích của nhiều người.
                    </i></li>
            </ul>
        </div>
    </div>
</div>

<div class="gioi-thieu">
    <div class="form-row ">
        <div class="form-group col-md-1"></div>
        <div class="form-group col-md-4 ">
            <img style="width: 440px; height:400px" src="./assets/images/snack.jpg" alt="">
        </div>
        <div class="form-group col-md-6">
            <ul>
                <h3 class="title"><a href="<?= BASE_URL_CLIENT . '?act=danh-sach-san-pham' ?>">SNACK</a></h3>
                <li><i>Snack là chỉ các loại đồ ăn nhẹ hoặc ăn vặt, thường được dùng giữa các bữa ăn chính để lót dạ hoặc thưởng thức. Snack có thể là món mặn, ngọt, giòn, dai, hoặc mềm, tùy thuộc vào loại thực phẩm và cách chế biến.</i></li>
                <li><i>Đặc điểm của snack: <br>
                        Kích thước nhỏ gọn: Thường được đóng gói trong túi, hộp, hoặc chai nhỏ tiện lợi. <br>
                        Dễ ăn: Không cần chế biến, có thể ăn trực tiếp. <br>
                        Hương vị đa dạng: Có thể là vị mặn, ngọt, chua, cay, hoặc kết hợp nhiều vị. <br>
                        Thành phần phong phú: Làm từ nguyên liệu như bột, khoai tây, ngũ cốc, trái cây, hoặc thịt sấy khô.</i></li>
            </ul>
        </div>
    </div>
</div>

<div class="gioi-thieu">
    <div class="form-row ">
        <div class="form-group col-md-1"></div>
        <div class="form-group col-md-4 ">
            <img style="width: 440px; height:400px" src="./assets/images/trai-cay-say.jpg" alt="">
        </div>
        <div class="form-group col-md-6">
            <ul>
                <h3 class="title"><a href="<?= BASE_URL_CLIENT . '?act=danh-sach-san-pham' ?>">HOA QUẢ SẤY</a></h3>
                <li><i>Trái cây sấy là các loại trái cây tươi được chế biến qua phương pháp sấy khô để loại bỏ độ ẩm, giúp bảo quản được lâu hơn mà vẫn giữ được hương vị và các chất dinh dưỡng cơ bản. Trái cây sấy thường có vị ngọt tự nhiên, dai hoặc giòn, và là một món ăn vặt bổ dưỡng, tiện lợi.</i></li>
                <li><i>Phương pháp chế biến trái cây sấy: <br>
                        Sấy khô tự nhiên: Dùng ánh nắng mặt trời hoặc không khí để làm khô trái cây. <br>
                        Sấy bằng nhiệt: Dùng nhiệt độ cao từ lò sấy hoặc máy móc để rút nước. <br>
                        Sấy lạnh (sấy thăng hoa): Sử dụng nhiệt độ thấp để giữ được nguyên chất dinh dưỡng, mùi vị và màu sắc. <br>
                        Sấy dẻo: Kết hợp nhiệt và độ ẩm để tạo ra trái cây mềm, dẻo.</i></i></li>
            </ul>
        </div>
    </div>
</div>
<!-- end content -->


<!-- footer -->
<?php require './views/layout/footer.php'; ?>