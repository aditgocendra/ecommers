<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    <div class="sidebar-brand-icon rotate-n-15">
       <i class="fas fa-cart-arrow-down"></i>
    </div>
    <div class="sidebar-brand-text mx-3">DBS Admin</div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <div class="sidebar-heading text-light">
    Administrator
  </div>


  <!-- Nav Item - Charts -->
  <li class="nav-item">
    <a class="nav-link" href="<?= base_url('admin');?>">
      <i class="fas fa-fw fa-id-card"></i>
      <span>Admin Profile</span></a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="<?= base_url('admin/kategori');?>">
      <i class="fas fa-list"></i>
      <span>Kategori</span></a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="<?= base_url('admin/brand');?>">
      <i class="fas fa-copyright"></i>
      <span>Brand</span></a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="<?= base_url('admin/baju');?>">
      <i class="fas fa-tshirt"></i>
      <span>Baju</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <li class="nav-item">
    <a class="nav-link" href="<?= base_url('auth/logout');?>">
      <i class="fas fa-sign-out-alt"></i>
      <span>Logout</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>
<!-- End of Sidebar -->
