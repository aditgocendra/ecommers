
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800"><?= $header; ?></h1>
          <!-- DataTales Example -->
          <?= validation_errors();?>
          <?= $this->session->flashdata('message');?>

          <a type="button" class="btn bg-success mb-2 text-light" data-toggle="modal" data-target="#newKategori">Tambah kategori</a>
          <table class="table table-sm table-dark">
            <thead>
              <tr class = "text-center">
                <th scope="col">No</th>
                <th scope="col">ID Kategori</th>
                <th scope="col">Kategori</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 1; ?>
              <?php foreach($kategori as $ktg) : ?>
              <tr class = "text-center">
                <td><?=$i;?></td>
                <td><?= $ktg['idkategori']; ?></td>
                <td><?= $ktg['kategori']; ?></td>
                <td>
                  <a class="badge badge-success" href="<?= base_url('admin/editKategori/'). $ktg['idkategori'];?>" >Edit</a>
                  <a class="badge badge-danger" href="<?= base_url('admin/deleteKategori/'). $ktg['idkategori'];?>" >Delete</a>
                </td>
              </tr>
              <?php $i++ ?>
            <?php endforeach; ?>
          </tbody>
        </table>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->


      <!-- modal -->


<!-- Modal -->
<div class="modal fade" id="newKategori" tabindex="-1" role="dialog" aria-labelledby="newKategoriLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newKategoriLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form class="" action="<?= base_url('admin/kategori'); ?>" method="post">
        <div class="modal-body">

          <div class="form-group">
             <input type="number" name="idkategori" class="form-control" id="idkategori" placeholder="ID Kategori">
              <small class="form-text text-muted pl-2">ID kategori harus angka</small>
           </div>

           <div class="form-group">
              <input type="text" name="kategori" class="form-control" id="kategori" placeholder="Nama Kategori">
            </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Tambah</button>
        </div>
      </form>

    </div>
  </div>
</div>
