<div class="container-fluid">
  <div class="col-md-12">
    <div class="card card-primary card-outline">
      <div class="card-header">
        <h3 class="card-title">Edit Profil</h3>
      </div>
      <?php 
      if(session()->getFlashdata('pesanSukses')){
        echo '<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-check"></i> Success! - ';
        echo session()->getFlashdata('pesanSukses');
        echo '</h5></div>';
      }
      ?>
       <?php echo form_open_multipart('profil/save_edit/'.$editProfil['id_profil']); ?>
        <div class="card-body box-profile">
        <div class="form-group">
          <label>Nama</label>
          <input  value="<?= $editProfil['nama'] ?>" name="nama" class="form-control" required />
        </div>
        <div class="form-group">
          <label>No Telp</label>
          <input  value="<?= $editProfil['no_telp'] ?>" name="no_telp" class="form-control" required />
        </div>
        <div class="form-group">
          <label for="foto" class="form-label">Foto</label>
          <input type="file"  class="form-control" id="foto" name="foto">
        </div>
      
        <button type="submit" href="#" class="btn btn-success "><b>Edit</b></button type="submit">
        <a  href="<?= base_url('setting') ?>" class="btn btn-primary "><b>Kembali</b></a type="submit">
      </div>    
      <!-- /.card-body -->
    <?php echo form_close() ?>
    </div>

  </div>
</div>

