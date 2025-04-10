<?php session_start(); ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styleLogin.css">
</head>


<body>
    <div class="container">
        <div class="card-body text-center">
            <h3>Đăng Nhập</h3>
    
           
                <h4 class="text-danger"> <?php echo !empty($_SESSION['error']['trang_thai']) ? $_SESSION['error']['trang_thai'] . ' Liên hệ: Zalo 0983869759 để được hỗ trợ': ''; ?> </h4>

         
            <form action="<?= BASE_URL . '?act=post-login' ?>" method="POST" >
                <div class="form-group">
                    <input class="col-md-11" type="text" name="username" placeholder="Username" auto>
                    <p class="text-danger"> <?php echo !empty($_SESSION['error']['username']) ? $_SESSION['error']['username'] : ''; ?></p>
                    <div class="form-group">

                    </div>
                    <input class="col-md-11" type="password" name="password" placeholder="Password">
                    <p class="text-danger"> <?php echo !empty($_SESSION['error']['password']) ? $_SESSION['error']['password'] : ''; ?></p>
                </div>
                <br>
                <button class="col-4" type="submit">Đăng nhập</button>
            </form>
            <div class="row">
                <a class="col-6 text" href="<?= BASE_URL . '?act=form-dang-ky' ?>">Đăng ký</a>
                <a class="col-6 text" href="#">Quên mật khẩu</a>
            </div>
        </div>
    </div>

</body>

</html>