<div class="col-md-12">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Add Barang</h3>
        
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <?php if (!empty(session()->getFlashdata('errors'))) : ?>
        <div class="alert alert-danger" role="alert">
            <h4>Periksa Entrian Form</h4>
            </hr />
            <?php echo session()->getFlashdata('errors'); ?>
        </div>
      <?php endif; ?>


      <?php
      helper('text');
      $kode_barang ='kdb-'.random_string('alnum',3);
      ?>

      <?php echo form_open_multipart('barang/save_insert/'); ?>
        <div class="form-group">
          <label>Kode Barang</label>
          <input  class="form-control" value="<?= $kode_barang ?>"  name="kode_barang" placeholder="Kode Barang" readonly>
        </div>
        
        <div class="form-group">
          <label>Nama Barang</label>
          <input  class="form-control" name="nama_barang" placeholder="Nama Barang" >
        </div>

         <div class="form-group">
          <label>Kategori</label>
          <select name="id_kategori" class="form-control"> 
            <option value=''>Pilih Kategori</option>
            <?php foreach ($kategori as $key => $value) { ?>
              <option value='<?= $value['id_kategori'] ?>'><?= $value['nama_kategori'] ?></option>
            <?php } ?>
          </select>
        </div>

        <div class="form-group">
          <label>Satuan</label>
          <select name="id_satuan" class="form-control"> 
            <option value=''>Pilih Satuan</option>
            <?php foreach ($satuan as $key => $value) { ?>
              <option value='<?= $value['id_satuan'] ?>'><?= $value['nama_satuan'] ?></option>
            <?php } ?>
          </select>
        </div>

        <div class="form-group">
          <label>Stok</label>
          <input  class="form-control" name="stok" placeholder="Stok" >
        </div>

        <div class="form-group">
          <label>Foto</label>
          <input name = "foto" class="form-control" type="file" >
        </div>

        <div class="form-group">
          <button type="submit" class="btn btn-primary">Simpan</button>
          <a href="<?= base_url('barang')?>" class="btn btn-success" >Kembali</a>
        </div>
      <?php echo form_close(); ?>
      
    </div>
    <!-- /.card-body -->
  </div>
</div>