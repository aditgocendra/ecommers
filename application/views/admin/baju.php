
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800"><?= $header; ?></h1>
          <!-- DataTales Example -->
          <?= validation_errors();?>
          <?= $this->session->flashdata('message');?>

          <a type="button" class="btn bg-success mb-2 text-light" data-toggle="modal" data-target="#newBaju">Tambah baju</a>
          <table class="table table-sm table-dark">
            <thead>
              <tr class = "text-center">
                <th scope="col">No</th>
                <th scope="col">ID Baju</th>
                <th scope="col">Merk</th>
                <th scope="col">Image</th>
                <th scope="col">Harga</th>
                <th scope="col">Terjual</th>
                <th scope="col">Deskripsi</th>
                <th scope="col">Kategori</th>
                <th scope="col">Brand</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 1; ?>
              <?php foreach($baju as $bj) : ?>
              <tr class = "text-center">
                <td><?=$i;?></td>
                <td><?= $bj['id_baju']; ?></td>
                <td><?= $bj['merk']; ?></td>
                <td><?= $bj['image']; ?></td>
                <td><?= $bj['harga']; ?></td>
                <td><?= $bj['terjual']; ?></td>
                <td><?= $bj['deskripsi']; ?></td>
                <td><?= $bj['kategori']; ?></td>
                <td><?= $bj['brand']; ?></td>
                <td>
                  <a class="badge badge-success" href="<?= base_url('admin/editBaju/'). $bj['id_baju'];?>" >Edit</a>
                  <a class="badge badge-danger" href="<?= base_url('admin/deleteBaju/'). $bj['id_baju'];?>" >Delete</a>
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
<div class="modal fade" id="newBaju" tabindex="-1" role="dialog" aria-labelledby="newBaju" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newBajuLabel">Tambah Baju</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <?= form_open_multipart('admin/baju');?>
        <div class="modal-body">

          <div class="form-group">
             <input type="text" name="id_baju" class="form-control" id="id_baju" placeholder="ID Baju">
              <small class="form-text text-muted pl-2">Maksimum 6 character</small>
           </div>

           <div class="form-group">
              <input type="text" name="merk" class="form-control" id="merk" placeholder="Merk">
            </div>

            <div class="row">
              <div class="col-sm-3">
                <img src="<?= base_url('assets/img/'.$user['image_profile']);?>" class="img-thumbnail">
              </div>
              <div class="col-sm-9">
                <div class="custom-file">
                    <input type="file" name="image_item" id="image_item" class="custom-file-input">
                    <label class="custom-file-label" for="image">Choose file</label>
                  </div>
              </div>
            </div>

          <div class="form-group">
               <input type="number" name="harga" class="form-control" id="harga" placeholder="Harga">
            </div>

          <div class="form-group">
               <input type="number" name="terjual" class="form-control" id="terjual" placeholder="Terjual">
            </div>

          <div class="form-group">
               <input type="text" name="deskripsi" class="form-control" id="deskripsi" placeholder="Deskripsi">
            </div>

          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <label class="input-group-text" for="inputGroupSelect01">Kategori</label>
            </div>
            <select class="custom-select" id="kategori" name="kategori">
              <?php foreach ($kategori as $ktg) : ?>
                <option value="<?= $ktg['idkategori'];?>"><?= $ktg['kategori'];?></option>
              <?php endforeach; ?>
            </select>
        </div>

        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <label class="input-group-text" for="inputGroupSelect01">Brand</label>
          </div>
          <select class="custom-select" id="brand" name="brand">
            <?php foreach ($brand as $brnd) : ?>
              <option value="<?= $brnd['id_brand'];?>"><?= $brnd['brand'];?></option>
            <?php endforeach; ?>
          </select>
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
