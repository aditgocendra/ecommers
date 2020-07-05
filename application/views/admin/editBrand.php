

        <!-- Begin Page Content -->
        <div class="container-fluid">
          <?= validation_errors();?>
          <?= $this->session->flashdata('message');?>

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $header ?></h1>

          <form class="" action="<?= base_url('admin/editBrand/').$select_brand['id_brand'];?>" method="post">


          <div class="form-group">
             <input type="text" name="id_brand" id="id_brand" readonly value="<?= $select_brand['id_brand']; ?>" class="form-control" id="id_baju" placeholder="ID Baju">
           </div>

           <div class="form-group">
              <input type="text" name="brand" id="brand" value="<?= $select_brand['brand']; ?>" class="form-control" id="merk" placeholder="Merk">
            </div>

            <button type="submit" class="btn bg-success mb-2 text-light">Edit Brand</button>
        </form>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
