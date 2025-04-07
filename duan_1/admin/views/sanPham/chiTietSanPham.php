<?php
require './views/layout/header.php';
require './views/layout/navbar.php';

?>



<div class="card card-solid">
    <div class="card-body">
        <div class="row">
            <div class="col-12 col-sm-6">
                <h3 class="d-inline-block d-sm-none">LOWA Men’s Renegade GTX Mid Hiking Boots Review</h3>
                <div class="col-12">
                    <img style="width: 490; height:450px" src="<?= BASE_URL . $detailSanPham['hinh_anh'] ?>" class="product-image" alt="Product Image">
                </div>
              
            </div>




            <div class="col-12 col-sm-6">
                <h2 class="my-3 font-weight-bold">- Tên sản phẩm: <?= $detailSanPham['ten_san_pham']; ?></h2>
                <hr>
                <ul class="">

                    <h3>
                        <li>Giá tiền: <?= $detailSanPham['gia_san_pham'] . ' vnđ' ?></li>
                    </h3>
                    <h3>
                        <li>Giá Khuyến mãi: <?= $detailSanPham['gia_khuyen_mai'] . ' vnđ' ?></li>
                    </h3>
                    <h3>
                        <li>Số lượng: <?= $detailSanPham['so_luong'] ?></li>
                    </h3>
                    <h3>
                        <li>Lượt xem: <?= $detailSanPham['luot_xem'] ?></li>
                    </h3>
                    <h3>
                        <li>Ngày nhập: <?= $detailSanPham['ngay_nhap'] ?></li>
                    </h3>
                    <h3>
                        <li>Danh mục: <?= $detailSanPham['ten_danh_muc'] ?></li>
                    </h3>
                    <h3>
                        <li>Trạng thái: <?= $detailSanPham['trang_thai'] ?></li>
                    </h3>
                </ul>




            </div>
        </div>

        <ul class="nav nav-tabs row mt-4" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="home-tab" data-toggle="tab" data-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Bình luận</button>
            </li>

        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tên người bình luận</th>
                            <th>Nội dung</th>
                            <th>Ngày đăng</th>
                            <th>Trạng thái</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($binhLuan as $key => $value): ?>
                        <tr>
                            <td><?= $key + 1 ?></td>
                            <td><?= $value['ho_ten'] ?></td>
                            <td class="col-md-6"><?= $value['noi_dung'] ?></td>
                            <td><?= $value['ngay_dang'] ?></td>
                            <td><?= $value['trang_thai'] == 1 ? 'Hiện' : 'Ẩn' ?></td>
                           
                            <td>
                                <div class="btn-group row">
                                    <?php 
                                    if($value['trang_thai'] == 1){?>
                                        <a  style="margin-right:10px;" title="ẩn" href="<?= BASE_URL_ADMIN . '?act=an-binh-luan&id='.$value['id'] ?> "><button  class="btn btn-warning"><i class="bi bi-eye-slash-fill"></i></button></a>
                                    <?php }else{ ?>
                                        <a  style="margin-right:10px;" title="Hiện" href="<?= BASE_URL_ADMIN . '?act=hien-binh-luan&id='.$value['id'] ?> "><button  class="btn btn-warning"><i class="bi bi-eye-fill"></i></i></button></a>

                                        <?php } ?>
                                    <a title="Xóa" href="<?= BASE_URL_ADMIN . '?act=xoa-binh-luan&id='.$value['id'] ?> "><button class="btn btn-danger"><i class="bi bi-trash3-fill"></i></button></a>
                                </div> 
                            </td>
                        </tr>
                        <?php endforeach ; ?>
                        
                    </tbody>
                </table>
            </div>
        </div>




















        <?php require './views/layout/footer.php'; ?>