<?php

class clientController
{
    public $modelClient;
    public function __construct()
    {
        $this->modelClient = new modelClient;
    }
    public function trangChu()
    {
        if (isset($_SESSION['username'])) {
            $username = $_SESSION['username'];
            $user = $this->modelClient->getUser($username);
            require './views/clientViews/trangChu.php';
        } else {
            header('location:' . BASE_URL);
            exit();
        }
    }
    public function logout()
    {
        if (isset($_SESSION['username'])) {
            unset($_SESSION['username']);
            session_unset();
            session_destroy();
            header('location: ' . BASE_URL);
            exit();
        }
    }

    public function profileInfo() {
        // Lấy thông tin người dùng hiện tại
        $username = $_SESSION['username'];
        $userInfo = $this->modelClient->getUserByUsername($username);
        
        // Debug để kiểm tra thông tin user
        error_log("User info for " . $username . ": " . print_r($userInfo, true));
        error_log("Image path: " . (isset($userInfo['hinh_anh']) ? '.' . $userInfo['hinh_anh'] : 'default.png'));
        
        require './views/clientViews/profile.php';
        deleteSessionError();
    }

    public function updateProfileForm() {
        $username = $_SESSION['username'];
        $userInfo = $this->modelClient->getUserByUsername($username);
        
        require './views/clientViews/updateProfile.php';
        deleteSessionError();
    }

    public function postUpdateProfile() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $ho_ten = $_POST['ho_ten'];
            $email = $_POST['email'];
            $so_dien_thoai = $_POST['so_dien_thoai'];
            $dia_chi = $_POST['dia_chi'];
            $gioi_tinh = $_POST['gioi_tinh'];
            $ngay_sinh = $_POST['ngay_sinh'];
            
            $error = [];
            
            // Validate
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
            
            $regex_phone = '/^[0-9]+$/';
            if (!preg_match($regex_phone, $so_dien_thoai)) {
                $error['so_dien_thoai'] = 'Số điện thoại chỉ được chứa số!';
            }
            
            // Xử lý upload ảnh
            $hinh_anh = null;
            if (isset($_FILES['hinh_anh']) && $_FILES['hinh_anh']['error'] === 0) {
                // Debug thông tin file
                error_log("Processing file upload for user ID: " . $id);
                error_log("File info: " . print_r($_FILES['hinh_anh'], true));
                
                $hinh_anh = upLoad($_FILES['hinh_anh'], '/uploads/users/');
                
                if (!$hinh_anh) {
                    $error['hinh_anh'] = isset($_SESSION['error']['hinh_anh']) 
                        ? $_SESSION['error']['hinh_anh'] 
                        : "Lỗi khi tải lên hình ảnh";
                } else {
                    error_log("File uploaded successfully to: " . $hinh_anh);
                }
            }
            
            if (empty($error)) {
                // Cập nhật thông tin người dùng
                $result = $this->modelClient->updateUserInfo($id, $ho_ten, $email, $so_dien_thoai, $dia_chi, $gioi_tinh, $ngay_sinh, $hinh_anh);
                
                if ($result) {
                    $_SESSION['success_message'] = "Cập nhật thông tin thành công!";
                    // Cập nhật lại session nếu có ảnh mới
                    if ($hinh_anh) {
                        $userInfo = $this->modelClient->getUserById($id);
                        $_SESSION['user_avatar'] = $userInfo['hinh_anh'];
                    }
                    header('location:' . BASE_URL_CLIENT . '?act=profile');
                    exit();
                } else {
                    $_SESSION['error_message'] = "Có lỗi xảy ra khi cập nhật thông tin!";
                    header('location:' . BASE_URL_CLIENT . '?act=update-profile');
                    exit();
                }
            } else {
                $_SESSION['error'] = $error;
                $_SESSION['flash'] = true;
                header('location:' . BASE_URL_CLIENT . '?act=update-profile');
                exit();
            }
        }
    }

    public function changePasswordForm() {
        require './views/clientViews/changePassword.php';
        deleteSessionError();
    }

    public function postChangePassword() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_SESSION['username'];
            $userInfo = $this->modelClient->getUserByUsername($username);
            
            $id = $userInfo['id'];
            $mat_khau_cu = $_POST['mat_khau_cu'];
            $mat_khau_moi = $_POST['mat_khau_moi'];
            $xac_nhan_mat_khau = $_POST['xac_nhan_mat_khau'];
            
            $error = [];
            
            // Validate
            if (empty($mat_khau_cu)) {
                $error['mat_khau_cu'] = "Không để trống mật khẩu cũ";
            }
            if (empty($mat_khau_moi)) {
                $error['mat_khau_moi'] = "Không để trống mật khẩu mới";
            }
            if (empty($xac_nhan_mat_khau)) {
                $error['xac_nhan_mat_khau'] = "Không để trống xác nhận mật khẩu";
            }
            
            // Kiểm tra mật khẩu cũ có đúng không
            if ($mat_khau_cu !== $userInfo['mat_khau']) {
                $error['mat_khau_cu'] = "Mật khẩu cũ không chính xác";
            }
            
            // Kiểm tra mật khẩu mới và xác nhận mật khẩu
            if ($mat_khau_moi !== $xac_nhan_mat_khau) {
                $error['xac_nhan_mat_khau'] = "Xác nhận mật khẩu không chính xác";
            }
            
            if (empty($error)) {
                // Cập nhật mật khẩu
                $result = $this->modelClient->updatePassword($id, $mat_khau_moi);
                
                if ($result) {
                    $_SESSION['success_message'] = "Cập nhật mật khẩu thành công!";
                    header('location:' . BASE_URL_CLIENT . '?act=profile');
                    exit();
                } else {
                    $_SESSION['error_message'] = "Có lỗi xảy ra khi cập nhật mật khẩu!";
                    header('location:' . BASE_URL_CLIENT . '?act=change-password');
                    exit();
                }
            } else {
                $_SESSION['error'] = $error;
                $_SESSION['flash'] = true;
                header('location:' . BASE_URL_CLIENT . '?act=change-password');
                exit();
            }
        }
    }
}
