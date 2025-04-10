<div class="footer">
    <div class="form-row">
        <div class="col-md-2"></div>
        <div class="form-group col-md-4">
            <ul>
                <li><p class="title">Thông tin liên hệ:</p></li>
                <li><p>Địa chỉ: Trịnh Văn Bô, Mỹ Đình, Nam Từ Liêm, Hà Nội</p></li>
                <li><p>Địa chỉ Email 1: tuannmph21062@fpt.edu.vn</p></li>
                <li><p>Số điện thoại: 0983869759</p></li>
            </ul>
        </div>

        <div class="form-group col-md-4">
            <ul class="row-2">
                <li><p class="title">Theo dõi chúng tôi tại:</p></li>
                <div class="form-group row">
                    <div class="form-group col-md-1"><a href="#"><i class="bi bi-facebook"></i></a></div>
                    <div class="form-group col-md-1"><a href="#"><i class="bi bi-tiktok"></i></a></div>
                    <div class="form-group col-md-1"><a href="#"><i class="bi bi-instagram"></i></a></div>
                    <div class="form-group col-md-1"><a href="#"><i class="bi bi-youtube"></i></a></div>
                    <div class="form-group col-md-1"><a href="#"><i class="bi bi-telegram"></i></a></div>
                    <div class="form-group col-md-1"><a href="#"><i class="bi bi-zalo"></i></a></div>
                </div>
            </ul>
        </div>
    </div>
</div>

</div> <!-- Đóng layout -->

<!-- Đảm bảo jQuery được tải trước Bootstrap -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
// Khởi tạo dropdown sử dụng Bootstrap 5
var dropdownElementList = [].slice.call(document.querySelectorAll('.dropdown-toggle'))
var dropdownList = dropdownElementList.map(function (dropdownToggleEl) {
  return new bootstrap.Dropdown(dropdownToggleEl)
})

// Debug script để kiểm tra Bootstrap
console.log('Bootstrap version:', typeof bootstrap);
</script>
</body>
</html>