

        <!-- Begin Page Content -->
        <div class="container-fluid">
          <?= validation_errors();?>
          <?= $this->session->flashdata('message');?>

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $header ?></h1>

            <?= form_open_multipart('admin/editBaju/').$select_baju['id_baju'];?>

            <div class="form-group">
               <input type="text" name="id_baju" value="<?=$select_baju['id_baju']; ?>" readonly class="form-control" id="id_baju" placeholder="ID Baju">
                <small class="form-text text-muted pl-2">Maksimum 6 character</small>
             </div>

             <div class="form-group">
                <input type="text" name="merk" value="<?=$select_baju['merk']; ?>" class="form-control" id="merk" placeholder="Merk">
              </div>

              <div class="row">
                <div class="col-sm-3">
                  <img src="<?= base_url('assets/item_img/'.$select_baju['image']);?>" class="img-thumbnail">
                </div>
                <div class="col-sm-9">
                  <div class="custom-file">
                      <input type="file" name="image_item" id="image_item" class="custom-file-input">
                      <label class="custom-file-label" for="image">Choose file</label>
                    </div>
                </div>
              </div>

            <div class="form-group">
                 <input type="number" name="harga" value="<?=$select_baju['harga'];?>" class="form-control" id="harga" placeholder="Harga">
              </div>

            <div class="form-group">
                 <input type="number" name="terjual" value="<?=$select_baju['terjual'];?>" class="form-control" id="terjual" placeholder="Terjual">
              </div>

            <div class="form-group">
                 <input type="text" name="deskripsi" value="<?=$select_baju['deskripsi'];?>" class="form-control" id="deskripsi" placeholder="Deskripsi">
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

        <button type="submit" class="btn bg-success mb-2 text-light">Edit Baju</button>
        </form>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
