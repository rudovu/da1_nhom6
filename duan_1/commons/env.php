<?php 

// Biến môi trường, dùng chung toàn hệ thống
// Khai báo dưới dạng HẰNG SỐ để không phải dùng $GLOBALS

define('BASE_URL'       , 'http://localhost/da1_nhom6/');
define('BASE_URL_ADMIN' , 'http://localhost/da1_nhom6/admin/');
define('BASE_URL_CLIENT' , 'http://localhost/da1_nhom6/client/');

define('DB_HOST'    , 'localhost');
define('DB_PORT'    , 3306);
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME'    , 'duanmau');  // Tên database

define('PATH_ROOT'    , __DIR__ . '/../');
