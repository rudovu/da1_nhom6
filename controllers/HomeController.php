<?php

class HomeController
{
    public $model;

    public function __construct()
    {
        $this->model = new Home;
    }
    ////////////////////////////// Xử lí đăng nhập
    public function login()
    {
        require './views/login.php';
        if (isset($_SESSION['flash'])) {
            deleteSessionError();
        }
    }
    public function postLogin()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            session_start();
            $username = $_POST['username'];
            $password = $_POST['password'];

            $listUsers = $this->model->getAllUser();
            $error = [];
            if (empty($username)) {
                $error['username'] = "Không để trống tên đăng nhập";
            }
            if (empty($password)) {
                $error['password'] = "Không để trống tên mật khẩu";
            }



            // check pass
            $User = $this->model->getUser($username);
            if ($User == false) {
                $error['username'] = "Tài khoản không chính xác";
            }

            if ($User['mat_khau'] != $password) {
            
                $error['password'] = 'Mật khẩu không chính xác';
            }



            if (empty($error)) {

                // mật khẩu với tải khoản người dùng nhập vào và thực hiện so sánh


                if($User['trang_thai'] == 1){
                    if ($User['chuc_vu_id'] === 1) {
                        $_SESSION['username'] = $username;
                        header('location: ' . BASE_URL_ADMIN);
                        exit();
                    }
                    if ($User['chuc_vu_id'] === 0) {
                        $_SESSION['username'] = $username;
                        header('location: ' . BASE_URL_CLIENT);
                        exit();
                    }
                }else{
                    $error['trang_thai'] = 'Tài khoản của bạn đã bị cấm';
                    $_SESSION['error'] = $error;
                    $_SESSION['flash'] = true;
                    header('location: ' . BASE_URL);
                    exit();
                }
                
                    
                
            } else {


                $_SESSION['error'] = $error;
                $_SESSION['flash'] = true;
                header('location: ' . BASE_URL);
                exit();
            }
        }
    }
    ////////////////////////////// end Xử lí đăng nhập



    ////////////////////////////// Xử lí đăng kí
    public function formDangky()
    {

        require './views/formDangKy.php';
        if (isset($_SESSION['flash'])) {
            deleteSessionError();
        }
    }

    public function postDangKy()
    {
        if (isset($_POST['return-login'])) {
            header('location:' . BASE_URL);
            exit();
        }
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            session_start();
            $ten_dang_nhap = $_POST['ten_dang_nhap'];
            $mat_khau = $_POST['mat_khau'];
            $xac_nhan_mat_khau = $_POST['xac_nhan_mat_khau'];
            $ho_ten = $_POST['ho_ten'];
            $email = $_POST['email'];
            $so_dien_thoai = $_POST['so_dien_thoai'];
            $dia_chi = $_POST['dia_chi'];
            $gioi_tinh = $_POST['gioi_tinh'];
            $ngay_sinh = $_POST['ngay_sinh'];
            $chuc_vu_id = $_POST['chuc_vu_id'];
    
            // Mặc định ảnh nếu không upload
            $hinh_anh = 'default.png';
    
            $listUsers = $this->model->getAllUser();
            $error = [];
    
            // Validate
            if (empty($ten_dang_nhap)) {
                $error['ten_dang_nhap'] = "Không để trống tên đăng nhập";
            }
            if (empty($mat_khau)) {
                $error['mat_khau'] = "Không để trống mật khẩu";
            }
            if (empty($xac_nhan_mat_khau)) {
                $error['xac_nhan_mat_khau'] = "Không để trống xác nhận mật khẩu";
            }
            if (empty($ho_ten)) {
                $error['ho_ten'] = "Không để trống họ tên";
            }
            if (empty($email)) {
                $error['email'] = "Không để trống email";
            }
            if (empty($so_dien_thoai)) {
                $error['so_dien_thoai'] = "Không để trống số điện thoại";
            }
            if (empty($dia_chi)) {
                $error['dia_chi'] = "Không để trống địa chỉ";
            }
            if (empty($ngay_sinh)) {
                $error['ngay_sinh'] = "Không để trống ngày sinh";
            }
            if ($gioi_tinh == 'chua_chon') {
                $error['gioi_tinh'] = "Bạn phải chọn giới tính";
            }
    
            if ($mat_khau !== $xac_nhan_mat_khau) {
                $error['xac_nhan_mat_khau'] = "Xác nhận mật khẩu không chính xác";
            }
    
            foreach ($listUsers as $user) {
                if ($ten_dang_nhap === $user['ten_dang_nhap']) {
                    $error['ten_dang_nhap'] = "Tài khoản đã tồn tại";
                    break;
                }
            }
    
            $regex_phone = '/^[0-9]+$/';
            if (!preg_match($regex_phone, $so_dien_thoai)) {
                $error['so_dien_thoai'] = 'Số điện thoại chỉ được chứa số!';
            }
    
            if (empty($error)) {
                // Gọi model thêm tài khoản
                $this->model->postTaiKhoan($ten_dang_nhap, $mat_khau, $ho_ten, $email, $so_dien_thoai, $dia_chi, $gioi_tinh, $hinh_anh, $ngay_sinh, $chuc_vu_id);
                $_SESSION['success'] = "Đăng ký thành công!";
                header('location: ' . BASE_URL);
                exit();
            } else {
                $_SESSION['error'] = $error;
                $_SESSION['flash'] = true;
                header('location: ' . BASE_URL . '?act=form-dang-ky');
                exit();
            }
        }
    }
    

    /////////////////////////// end Xử lí đăng kí













}
