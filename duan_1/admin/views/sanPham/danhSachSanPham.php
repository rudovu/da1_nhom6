<?php
require './views/layout/header.php';
require './views/layout/navbar.php';

?>




<div style="height: auto; width:1000px; margin:20px auto;" class="card">



    <div class=" col-md-12 row alert">
        <div class="col-md-7">
            <a href="<?= BASE_URL_ADMIN . '?act=form-them-san-pham' ?>" style="margin:10px;"><button class="btn border">Thêm sản phẩm</button></a>

        </div>
        <form style="display:flex;" class="col-md-5" action="<?= BASE_URL_ADMIN . '?act=tim-kiem-san-pham' ?>" class="row" method="POST">
            
            <input style="border-radius:5px; height:27px; padding:0px 20px;" class="col-md-9" type="text" name="search" placeholder="Tìm kiếm">
            <button style="height:27px; ;" type="submit" class="search col-md-3  btn-primary"><i class="bi bi-search"></i></button>

        </form>
    </div>


    <table class="table table-striped ">
        <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Tên sản phẩm</th>
                <th scope="col">Hình ảnh</th>
                <th scope="col">Ngày nhập</th>
                <th scope="col">Danh mục</th>
                <th scope="col">Trạng thái</th>
                <th scope="col">Mô tả</th>
                <th scope="col">Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($listSanPham as $key => $sanPham) : ?>

                <tr>
                    <td><?= $key + 1 ?></td>
                    <td class="col-md-2"><?= $sanPham['ten_san_pham'] ?></td>
                    <td class="col-md-1"><img style="width: 80px; height:80px;" src="<?= '.' . $sanPham['hinh_anh'] ?>" alt="" onerror="this.onerror=null; this.src= 'https://tse1.mm.bing.net/th?id=OIP.UA3OcFrmkPI6nMRJVzhFtQHaHa&pid=Api&P=0&h=220'" ;></td>
                    <td ><?= $sanPham['ngay_nhap'] ?></td>
                    <td ><?= $sanPham['ten_danh_muc'] ?></td>
                    <td><?php echo $sanPham['trang_thai'] == 1 ? "Còn hàng" : "Hết hàng" ?></td>
                    <td class="col-md-2"><?= $sanPham['mo_ta'] ?></td>


                    <td class="col-md-2">
                        <a href="<?= BASE_URL_ADMIN . '?act=chi-tiet-san-pham&id=' . $sanPham['id'] ?>"><button class="btn btn-primary" title="Chi tiết sản phẩm"><i class="bi bi-eye-fill"></i></button></a>
                        <a href="<?= BASE_URL_ADMIN . '?act=form-sua-san-pham&id=' . $sanPham['id'] ?>"><button title="Sửa sản phẩm" class="btn btn-warning"><i class="bi bi-gear"></i></button></a>
                        <a onclick="confirm('Bạn có xác nhận xóa')" href="<?= BASE_URL_ADMIN . '?act=delete-san-pham&id=' . $sanPham['id'] ?>"> <button title="Xóa sản phẩm" class="btn btn-danger"><i class="bi bi-trash3-fill"></i></button></a>
                    </td>

                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>




















<?php require './views/layout/footer.php'; ?>