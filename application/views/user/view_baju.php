<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Semua jadi mudah</title>
  <link rel = "icon" href ="<?= base_url('assets/img/logo_big_shop.png');?>"type = "image/x-icon">

  <!-- Custom fonts for this template-->
  <link href="<?= base_url('assets/');?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?= base_url('assets/');?>css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
          <button class="navbar-toggler" type="button" data-toggle="#collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon">hello</span>
          </button>
          <a class="navbar-brand" href="<?= base_url('user');?>">
            <img src="<?= base_url('assets/img/logo_big_shop.png') ?>" width="75" height="60" alt="" loading="lazy">
          </a>

          <ul class="nav">
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Kategori</span>
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <?php foreach ($kategori as $ktg) :?>
                <a class="dropdown-item" href="<?= base_url('user/view_kategori/').$ktg['idkategori']; ?>">
                  <?= $ktg['kategori'] ?>
                </a>
              <?php endforeach; ?>
            </li>
          </ul>

          <!-- Topbar Search -->
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-success" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>


            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $user['name_user'];?></span>
                <img class="img-profile rounded-circle" src="<?= base_url('assets/img/default.png') ?>">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="<?= base_url('user/edit_profile');?>">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->



        <!-- content -->
        <br>
        <div class="container mt-3 mb-5">
          <h3 class="font-weight-bold">Terbaru</h3>
          <div class="row pt-2">

            <div class="col-5">
              <div class="card h-100 border-0 shadow">
                <div class="card-img-top">
                  <div class="embed-responsive embed-responsive-4by3">
                    <div class="embed-responsive-item">
                      <img src="<?= base_url('assets/item_img/').$select_baju['image'];?>" alt="item image" class="img-fluid w-100" />
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <p class="font-weight-bold text-black"><?= $select_baju['merk'];?></p>
                  <p class="text-success"> Rp. <?= $select_baju['harga'];?></p>
                  <p class="text-black text-right"> Terjual <?= $select_baju['terjual'];?></p>
                </div>
              </div>
            </div>

            <div class="col-7">
              <div class="card h-100 border-0 shadow">
                <div class="card-img-top">
                  <div class="embed-responsive embed-responsive-4by3">
                    <div class="embed-responsive-item mt-3 ml-3">
                      <h2>Deskripsi</h2>
                      <h5 class="mt-3"><?= $select_baju['deskripsi'];?></h5>
                    </div>
                  </div>
                </div>
                <div class="card-body mb-2">
                   <a href="mailto:dianagustianam@gmail.com" class="btn btn-primary stretched-link">Pesan Sekarang</a>
                </div>
              </div>
            </div>

          </div>
        </div>


        <!-- end content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; DIAN AM 2020</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->



  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="<?= base_url('auth/logout');?>">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?= base_url('assets/');?>vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url('assets/');?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?= base_url('assets/');?>vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?= base_url('assets/');?>js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="<?= base_url('assets/');?>vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="<?= base_url('assets/');?>js/demo/chart-area-demo.js"></script>
  <script src="<?= base_url('assets/');?>js/demo/chart-pie-demo.js"></script>

</body>

</html>