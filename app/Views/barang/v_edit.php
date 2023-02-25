<div class="col-md-12">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Edit Barang</h3>
        
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
      
      <?php echo form_open_multipart('barang/save_edit/'.$barang['id_barang']); ?>

        <div class="form-group">
          <label>Kode Barang</label>
          <input  class="form-control" value="<?= $barang['kode_barang'] ?>" name="kode_barang" placeholder="Kode Barang" readonly>
        </div>
        
        <div class="form-group">
          <label>Nama Barang</label>
          <input  class="form-control" value="<?= $barang['nama_barang'] ?>" name="nama_barang" placeholder="Nama Barang" >
        </div>

        <div class="form-group">
          <label>Kategori</label>
          <select  class="form-control" name="id_kategori">
            <option  value="<?= $barang['id_kategori'] ?>"><?= $barang['nama_kategori'] ?></option>
            <?php foreach($kategori as $key => $value) { ?>
              <option value="<?= $value['id_kategori']; ?>">
              <?= $value['nama_kategori']; ?>
              </option>
            <?php } ?>
          </select>
        </div>

        <div class="form-group">
          <label>Satuan</label>
          <select  class="form-control" name="id_satuan">
            <option  value="<?= $barang['id_satuan'] ?>"><?= $barang['nama_satuan'] ?></option>
            <?php foreach($satuan as $key => $value) { ?>
              <option value="<?= $value['id_satuan']; ?>">
              <?= $value['nama_satuan']; ?>
              </option>
            <?php } ?>
          </select>
        </div>

        <div class="form-group">
          <label>Stok</label>
          <input value="<?= $barang['stok'] ?>"  class="form-control" name="stok" placeholder="Stok" >
        </div>

        <div class="form-group">
          <label>Gambar Yang Sudah Ada</label> 
          <br>
          <img src="<?= base_url('img/'.$barang['foto'])?>" class="img-thumbnail" style="width: 20%" >
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