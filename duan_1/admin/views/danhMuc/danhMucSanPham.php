<?php
require './views/layout/header.php';
require './views/layout/navbar.php';

?>




<div style="height: auto; width:1000px; margin:20px auto;" class="card">
   
    <div class=" col-md-12 row alert">
        <div class="col-md-7">
        <a href="<?= BASE_URL_ADMIN . '?act=form-them-danh-muc' ?>" style="margin:10px;"><button class="btn border">Thêm danh mục</button></a>

        </div>
        <form style="display:flex;" class="col-md-5" action="<?= BASE_URL_ADMIN . '?act=tim-kiem-danh-muc' ?>" class="row" method="POST">
            
            <input style="border-radius:5px; height:27px; padding:0px 20px;" class="col-md-9" type="text" name="search" placeholder="Tìm kiếm">
            <button style="height:27px; ;" type="submit" class="search col-md-3  btn-primary"><i class="bi bi-search"></i></button>

        </form>
    </div>
   
   
    <table class="table table-striped ">
        <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Tên danh mục</th>
                <th scope="col">Mô tả</th>
                <th scope="col">Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($listDanhMuc as $key => $danhMuc) : ?>

                <tr>
                    <td><?= $key + 1 ?></td>
                    <td><?= $danhMuc['ten_danh_muc'] ?></td>
                    <td><?= $danhMuc['mo_ta'] ?></td>
                    <td>
                        <a href="<?= BASE_URL_ADMIN . '?act=form-sua-danh-muc&id='.$danhMuc['id'] ?>"><button class="btn btn-warning">Sửa</button></a>
                        <a onclick="confirm('Bạn có xác nhận xóa')"  href="<?= BASE_URL_ADMIN . '?act=delete-danh-muc&id_danh_muc='.$danhMuc['id'] ?>"> <button  class="btn btn-danger">Xóa</button></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>




















<?php require './views/layout/footer.php'; ?>