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
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Register</h1>
              </div>
              <form class="user" method="post" action="<?= base_url('auth/register')?>">

              <div class="form-group">
                  <input type="text" name="username" class="form-control" id="username"
                  placeholder="Nama Anda", value="<?= set_value('username');?>">
                <?= form_error('username', '<small class="text-danger pl-3">', '</small>');?>
                </div>

                <div class="form-group">
                  <input type="email" name="email" class="form-control" id="email"
                  placeholder="Masukkan Email", value="<?= set_value('email');?>">
                  <?= form_error('email', '<small class="text-danger pl-3">', '</small>');?>
                </div>

                <div class="form-group">
                  <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                  <?= form_error('password', '<small class="text-danger pl-3">', '</small>');?>
                </div>

                <div class="form-group">
                  <input type="password" name="password2" class="form-control" id="password2" placeholder="Konfirmasi Password">
                </div>


                <button type="submit" class="btn btn-success btn-block">
                  Register
                </button>

              </form>
              <hr>
              <div class="text-center">
                <a class="small text-dark" href="<?= base_url();?>auth">Sudah memiliki akun ? Login</a>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

</div>

</div>
