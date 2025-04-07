<?php
class clientController
{
    public $modelClient;
    public function __construct()
    {
        $this->modelClient = new clientModel();
    }
    public function trangChu()
    {
        if (isset($_SESSION['username'])){
            $username = $_SESSION['username'];
            $user = $this->modelClient->getUser($username);
            require './views/clientViews/trangChu.php';
        }else{
            header('location:' . BASE_URL);
            exit;
        }
    }
    public function logout()
    {
        if (isset($_SESSION['username'])){
            unset($_SESSION['username']);
            session_unset();
            session_destroy();
            header('location:' . BASE_URL);
            exit;
        }
    }
}