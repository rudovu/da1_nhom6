<?php session_start(); ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<style>
    .layout {
        width: 980px;
        margin: 0px auto;
        border: 1px solid;
        padding: 50px;
        margin-top: 60px;
        border-radius: 15px;
        box-shadow: 0 0 15px black;

    }
    .form-control, .form-slected{
        border: 1px solid black;
        box-shadow: 2px 2px 4px gray inset;
    }
</style>

<body>
    <div class="layout">
        <h1 class="text-center">Đăng ký</h1>
        <form action="<?= BASE_URL .'?act=post-dang-ky'?>" method="POST" enctype="multipart/form-data">
            <div class="form-row">
                <input type="text" name="chuc_vu_id" value="0" hidden>
                <div class="form-group col-md-12">
                    <label for="">Tên đăng nhập</label>
                    <input type="text" class="form-control" name="ten_dang_nhap" placeholder="Tên đăng nhập" autofocus>
                    <p class="text-danger"> <?php echo !empty($_SESSION['error']['ten_dang_nhap']) ? $_SESSION['error']['ten_dang_nhap'] : '';?></p>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Mật khẩu</label>
                    <input type="password" class="form-control" name="mat_khau" placeholder="Mật khẩu">
                    <p class="text-danger"> <?php echo !empty($_SESSION['error']['mat_khau']) ? $_SESSION['error']['mat_khau'] : '';?></p>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Xác nhận mật khẩu</label>
                    <input type="password" class="form-control" name="xac_nhan_mat_khau" placeholder="Xác nhận mật khẩu">
                    <p class="text-danger"> <?php echo !empty($_SESSION['error']['xac_nhan_mat_khau']) ? $_SESSION['error']['xac_nhan_mat_khau'] : '';?></p>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Họ và tên</label>
                    <input type="text" class="form-control" name="ho_ten" placeholder="Họ và tên">
                    <p class="text-danger"> <?php echo !empty($_SESSION['error']['ho_ten']) ? $_SESSION['error']['ho_ten'] : '';?></p>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Email</label>
                    <input type="email" class="form-control" name="email" placeholder="email">
                    <p class="text-danger"> <?php echo !empty($_SESSION['error']['email']) ? $_SESSION['error']['email'] : '';?></p>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Số điện thoại</label>
                    <input type="text" class="form-control" name="so_dien_thoai" placeholder="Số điện thoại" >
                    <p class="text-danger"> <?php echo !empty($_SESSION['error']['so_dien_thoai']) ? $_SESSION['error']['so_dien_thoai'] : '';?></p>
                </div>
                <div class="form-group col-md-12">
                    <label for="inputEmail4">Địa chỉ</label>
                    <input type="text" class="form-control" name="dia_chi" placeholder="Địa chỉ">
                    <p class="text-danger"> <?php echo !empty($_SESSION['error']['dia_chi']) ? $_SESSION['error']['dia_chi'] : '';?></p>
                </div>
                <div class="form-group col-md-8">
                    <label for="">Giới tính</label>
                    <select class="form-select col-md-12" aria-label="Default select example" name="gioi_tinh">
                        <option selected value="chua_chon">Giới tính</option>
                        <option value="Nam">Nam</option>
                        <option value="Nữ">Nữ</option>
                        <option value="Khác">Khác</option>
                    </select>
                    <p class="text-danger"> <?php echo !empty($_SESSION['error']['gioi_tinh']) ? $_SESSION['error']['gioi_tinh'] : '';?></p>
                </div>
                <div class="form-group col-md-4">
                    <label for="inputEmail4">Ngày sinh</label>
                    <input type="date" class="form-control" name="ngay_sinh" placeholder="Ngày sinh">
                    <p class="text-danger"> <?php echo !empty($_SESSION['error']['ngay_sinh']) ? $_SESSION['error']['ngay_sinh'] : '';?></p>
                </div>

              <div class="col-md-10">
              <button type="submit" class="btn btn-primary">Đăng ký</button>
              </div>
              
              <button type="submit" name="return-login" class="btn btn-primary">Đăng nhập</button>
        </form>
    </div>

</body>

</html>