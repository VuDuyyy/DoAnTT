<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
    <div class="sidebar-brand-icon">
      <img src="https://zpsocial-f47-org.zadn.vn/7fab2b88e1380e665729.jpg">
    </div>
    <div class="sidebar-brand-text mx-3">Duy Đẹp Trai</div>
  </a>
  <hr class="sidebar-divider my-0">
  <li class="nav-item active">
    <a class="nav-link" href="dashboard.php">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Bảng Điều Khiển</span></a>
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
      Chức Năng
    </div>

   <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#packageForm" aria-expanded="true" aria-controls="collapseForm">
      <i class="fab fa-fw fa-wpforms"></i>
      <span>Quản Lý Địa Điểm</span>
    </a>
    <div id="packageForm" class="collapse" aria-labelledby="headingForm" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Địa Điểm</h6>
        <a class="collapse-item" href="create_package.php">Tạo Địa Diểm</a>
        <a class="collapse-item" href="manage_packages.php">Chỉnh Sửa Địa Điểm</a>
      </div>
    </div>
  </li>
   <li class="nav-item">
    <a class="nav-link" href="manage_bookings.php">
      <i class="fas fa-fw fa-chart-area"></i>
      <span>Đặt chổ</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="manage_users.php">
      <i class="fas fa-fw fa-user"></i>
      <span>Người Dùng</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="manage_enquires.php">
      <i class="fas fa-fw fa-user"></i>
      <span>Các Khiếu nại</span>
    </a>
  </li>
   <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#users" aria-expanded="true" aria-controls="collapseTable">
      <i class="fas fa-fw fa-users"></i>
      <span>Quản Lý Người Dùng</span>
    </a>
    <div id="users" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Người Dùng</h6>
        <a class="collapse-item" href="user_register.php">Quản lý Người Dùng</a>
        <a class="collapse-item" href="Permissions.php">Chỉnh Sửa Quyền</a>
      </div>
    </div>
  </li>
</ul>