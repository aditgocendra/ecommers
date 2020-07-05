

        <!-- Begin Page Content -->
        <div class="container-fluid">
          <?= validation_errors();?>
          <?= $this->session->flashdata('message');?>

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $header ?></h1>

          <form class="" action="<?= base_url('admin/editKategori/').$select_kategori['idkategori']; ; ?>" method="post">


          <div class="form-group">
             <input type="text" name="id_kategori" id="id_kategori" readonly value="<?= $select_kategori['idkategori']; ?>" class="form-control" id="id_baju" placeholder="ID Baju">
           </div>

           <div class="form-group">
              <input type="text" name="kategori" id="kategori" value="<?= $select_kategori['kategori']; ?>" class="form-control" id="merk" placeholder="Merk">
            </div>

            <button type="submit" class="btn bg-success mb-2 text-light">Edit kategori</a>
        </form>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
