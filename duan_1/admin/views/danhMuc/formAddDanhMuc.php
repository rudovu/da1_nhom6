<?php
require './views/layout/header.php';
require './views/layout/navbar.php';

?>



<section class="content">
    <div class="pl-400 container-fluid" style=" height: 400px; width: 1000px; margin:20px auto;">
        <div class="row">
            <div class="col-12">


                <div class="card card-primary ">
                    <div class="card-header">
                        <h3 class="card-title" > Thêm danh mục</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="<?= BASE_URL_ADMIN . '?act=post-them-danh-muc' ?>" method="POST">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Tên Dạnh Mục</label>
                                <input type="text" class="form-control" name="ten_danh_muc" placeholder="Nhập tên danh mục" fdprocessedid="Nhập tên danh mục">
                                <p class="text-danger">
                                    <?php if(isset($_SESSION['error']['ten_danh_muc'])){
                                        echo isset($_SESSION['error']['ten_danh_muc']) ? $_SESSION['error']['ten_danh_muc'] : '';
                                    } ?>
                                </p>
                            </div>
                            <div class="form-group">
                                <label>Mô tả</label>
                                <textarea class="form-control" name="mo_ta" placeholder="Nhập tên mô tả" fdprocessedid="Nhập tên danh mục"></textarea>
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