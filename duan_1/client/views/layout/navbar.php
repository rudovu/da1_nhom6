<div class="navbar navbar-expand-lg navbar-light bg-light rounded shadow-sm p-3">
  <div class="container-fluid d-flex justify-content-center align-items-center"> <!-- Thêm 'justify-content-center' và 'align-items-center' -->
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
      <ul class="navbar-nav d-flex justify-content-around flex-grow-1"> <!-- Sử dụng 'd-flex' và 'justify-content-around' để căn đều các phần tử -->
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
        <img src="<?= '.' . $user['hinh_anh']; ?>" alt="Avatar" width="40" height="40" class="rounded-circle border border-secondary" onerror="this.onerror=null; this.src='../uploads/th.jpg'">
        <a href="<?= BASE_URL_CLIENT .'?act=logout'?>" class="btn btn-link text-danger ms-2" title="Đăng xuất">
          <i class="bi bi-box-arrow-right"></i>
        </a>
      </div>
    </div>
  </div>
</div>
