<body class="bg-gradient-success">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-lg-7">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">

              <div class="col-lg">
                  <img src="<?= base_url('assets/img/logo_big_shop.png') ?>" class="rounded mx-auto d-block pt-4" alt="logo_toko">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Login</h1>
                  </div>

                  <?= $this->session->flashdata('message');?>


                  <form class="user" method="post" action="<?= base_url('auth');?>">
                    <div class="form-group">
                      <input type="email" name="email" class="form-control" id="email" value="<?= set_value('email');?>" placeholder="Enter Email Address...">
                      <?= form_error('email', '<small class="text-danger pl-3">', '</small>');?>
                    </div>
                    <div class="form-group">
                      <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                      <?= form_error('password', '<small class="text-danger pl-3">', '</small>');?>
                    </div>

                    <button type="submit" class="btn btn-success btn-block">
                      Login
                    </button>

                  </form>
                  <hr>
                  <!-- <div class="text-center">
                    <a class="small text-dark" href="forgot-password.html">Lupa password</a>
                  </div> -->
                  <div class="text-center">
                    <a class="small text-dark" href="<?= base_url();?>auth/register">Buat akun baru ?</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>
