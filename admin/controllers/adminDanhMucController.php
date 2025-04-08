<?php

class adminDanhMucController
{

    public $modelDanhMuc;

    public function __construct()
    {
        $this->modelDanhMuc = new modelDanhMuc;
    }
    public function danhMucSanPham()
    {
        if (
            $_SERVER['REQUEST_METHOD'] === 'POST'
        ) {
            $search = $_POST['search'];
            $listDanhMuc = [];
            $danhMuc = $this->modelDanhMuc->getAllDanhMuc();

            foreach ($danhMuc as $key => $value) {
             
                    if (strpos(strtolower($value['ten_danh_muc']), strtolower($search)) !== false) {
                        $listDanhMuc[] = $value;
                    
                    }
                
            }
        } else {
            $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();
        }

        require './views/danhMuc/danhMucSanPham.php';
        
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
    public function formThemDanhMuc()
    {
        require './views/danhMuc/formAddDanhMuc.php';
        deleteSessionError();
    }
    public function postThemDanhMuc()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $ten_danh_muc = $_POST['ten_danh_muc'];
            $mo_ta = $_POST['mo_ta'];

            $error = [];
            if ($ten_danh_muc == '') {
                $error['ten_danh_muc'] = 'Không để trống tên danh mục';
            }
            $_SESSION['error'] = $error;
            if (empty($error)) {

                $this->modelDanhMuc->addDanhMuc($ten_danh_muc, $mo_ta);
                header('location:' . BASE_URL_ADMIN);

                exit();
            } else {

                $_SESSION['flash'] = true;
                header('location: ' . BASE_URL_ADMIN . '?act=form-them-danh-muc');

                exit();
            }
        }
    }
    public function deleteDanhmuc()
    {
        $id = $_GET['id_danh_muc'];
        $this->modelDanhMuc->modelDelete($id);
        header('location:' . BASE_URL_ADMIN);
        exit();
    }
    public function formSuaDanhMuc()
    {
        $id = $_GET['id'];
        $detailDanhMuc = $this->modelDanhMuc->getDetailDanhMuc($id);
        require './views/danhMuc/formSuaDanhMuc.php';
        deleteSessionError();
    }

    public function postSuaDanhMuc()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $ten_danh_muc = $_POST['ten_danh_muc'];
            $mo_ta = $_POST['mo_ta'];
            $error = [];
            if (empty($ten_danh_muc)) {
                $error['ten_danh_muc'] = 'Không để trống tên danh mục';
            }
            $_SESSION['error'] = $error;
            if (empty($error)) {

                $this->modelDanhMuc->suaDanhMuc($id, $ten_danh_muc, $mo_ta);

                header('location:' . BASE_URL_ADMIN);
                exit();
            } else {


                $_SESSION['flash'] = true;
                header('location:' . BASE_URL_ADMIN . '?act=form-sua-danh-muc&id=' . $id);
                exit();
            }
        }
    }
}
