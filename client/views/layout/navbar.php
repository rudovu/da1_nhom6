<div class="navbar navbar-expand-lg navbar-light bg-light rounded shadow-sm p-3">
  <div class="container-fluid d-flex justify-content-center align-items-center">
    <!-- Logo hoặc hình ảnh -->
    <a class="navbar-brand" href="<?= BASE_URL_CLIENT ?>">
      <!-- <img src="./assets/images/petshop.jpg" alt="Logo" width="50" height="50" class="rounded-circle"> -->
    </a>
    
    <!-- Nút toggle trên màn hình nhỏ -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <!-- Menu điều hướng -->
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav d-flex justify-content-around flex-grow-1">
        <li class="nav-item">
          <a class="nav-link active" href="<?= BASE_URL_CLIENT ?>">Trang chủ</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= BASE_URL_CLIENT . '?act=danh-sach-san-pham' ?>">Sản phẩm</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= BASE_URL_CLIENT . '?act=gio-hang' ?>">Giỏ hàng</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= BASE_URL_CLIENT . '?act=danh-sach-don-hang' ?>">Đơn hàng</a>
        </li>
        
        <!-- Thêm vào mục dropdown tài khoản trong navbar -->
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <?= $_SESSION['username'] ?>
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="<?= BASE_URL_CLIENT ?>?act=profile">Thông tin cá nhân</a></li>
                <li><a class="dropdown-item" href="<?= BASE_URL_CLIENT ?>?act=danh-sach-don-hang">Đơn hàng của tôi</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="<?= BASE_URL_CLIENT ?>?act=logout">Đăng xuất</a></li>
            </ul>
        </li>
      </ul>
      
      <!-- Form tìm kiếm -->
      <form class="d-flex ms-3" action="<?= BASE_URL_CLIENT . '?act=danh-sach-san-pham' ?>" method="POST">
        <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-primary" type="submit">
          <i class="bi bi-search"></i>
        </button>
      </form>
      
      <!-- Thông tin người dùng -->
      <div class="d-flex align-items-center ms-3">
        <a href="<?= BASE_URL_CLIENT .'?act=logout'?>" class="btn btn-link text-danger ms-2" title="Đăng xuất">
          <i class="bi bi-box-arrow-right"></i>
        </a>
      </div>
    </div>
  </div>
</div>
