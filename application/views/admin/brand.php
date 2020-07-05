
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800"><?= $header; ?></h1>
          <!-- DataTales Example -->
          <?= validation_errors();?>
          <?= $this->session->flashdata('message');?>

          <a type="button" class="btn bg-success mb-2 text-light" data-toggle="modal" data-target="#newBrand">Tambah brand</a>
          <table class="table table-sm table-dark">
            <thead>
              <tr class = "text-center">
                <th scope="col">No</th>
                <th scope="col">ID Brand</th>
                <th scope="col">Nama Brand</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 1; ?>
              <?php foreach($brand as $brnd) : ?>
              <tr class = "text-center">
                <td><?=$i;?></td>
                <td><?= $brnd['id_brand']; ?></td>
                <td><?= $brnd['brand']; ?></td>
                <td>
                  <a class="badge badge-success" href="<?= base_url('admin/editBrand/'). $brnd['id_brand'];?>" >Edit</a>
                  <a class="badge badge-danger" href="<?= base_url('admin/deleteBrand/'). $brnd['id_brand'];?>" >Delete</a>
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
<div class="modal fade" id="newBrand" tabindex="-1" role="dialog" aria-labelledby="newBrand" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newBrandLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form class="" action="<?= base_url('admin/brand'); ?>" method="post">
        <div class="modal-body">

          <div class="form-group">
             <input type="number" name="idbrand" class="form-control" id="idbrand" placeholder="ID Brand">
              <small class="form-text text-muted pl-2">ID kategori harus angka</small>
           </div>

           <div class="form-group">
              <input type="text" name="brand" class="form-control" id="brand" placeholder="Nama Brand">
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
