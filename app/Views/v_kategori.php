<div class="col-md-12">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Daftar Kategori</h3>
        <div class="card-tools">
          <button type="button" data-toggle="modal" data-target="#add" class="btn btn-primary btn-sm btn-flat"><i class="fas fa-plus"></i>Add</button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">

      <div class="swal" data-swal="<?= session()->getFlashdata('pesanSukses') ?>">
      </div>

      <table id="example1" class="table table-bordered table-striped text-center">
        <thead>
          <tr>
            <th width="50px">No</th>
            <th>Kategori</th>
            <th width="100px">Aksi</th>
          </tr>
        </thead>
       
        <tbody>
        <?php $no=1; 
        foreach ($kategori as $key => $value) { ?>
          <tr>
            <td><?= $no++ ?></td>
            <td><?= $value['nama_kategori'] ?></td>
            <td>
            <button data-toggle="modal" data-target="#edit<?= $value['id_kategori'] ?>" class="btn btn-sm btn-warning">Edit</button>
            <button data-toggle="modal" data-target="#delete<?= $value['id_kategori'] ?>" class="btn btn-sm btn-danger">Delete</button>
            </td>
          </tr>
        <?php } ?>
        </tbody>
       
      </table>
      
    </div>
    <!-- /.card-body -->
  </div>
</div>


<!-- Modal Add.Kategori -->
<div class="modal fade" id="add">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Add Kategori</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php echo form_open('kategori/add')?>
        <div class="form-group">
          <label>Nama Kategori</label>
          <input class="form-control" name="nama_kategori" placeholder="Nama Kategori" required>
        </div>
      
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
        <?php echo form_close() ?>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
</div>
<!-- /.AKHIR modal-ADD -->

<!-- Modal EDIT -->
<?php foreach ($kategori as $key => $value){?>
<div class="modal fade" id="edit<?=  $value['id_kategori']; ?>">
  <div class="modal-dialog modal-danger">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Ubah Kategori</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php echo form_open('kategori/update/'.$value['id_kategori']) ?>
        <div class="form-group">
          <label>Ubah Kategori</label>
          <input class="form-control" value="<?=  $value['nama_kategori']; ?>" name="nama_kategori" placeholder="Nama Kategori" required>
          </div>
          <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Update</button>
        </div>
        <?php echo form_close() ?>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
</div>
<!-- /.AKHIR  -->
<?php } ?>

<!-- Modal EDIT.Hapus -->
<?php foreach ($kategori as $key => $value){?>
<div class="modal fade" id="delete<?=  $value['id_kategori']; ?>">
  <div class="modal-dialog modal-danger">
    <div class="modal-content bg-danger">
      <div class="modal-header">
        <h4 class="modal-title">Hapus Kategori</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Apakah Anda Yakin ingin menghapus <?=  $value['nama_kategori']; ?> ?
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-outline-light" data-dismiss="modal">Tidak</button>
        <a href="<?= base_url('kategori/delete/'.$value['id_kategori']) ?>" type="submit" class="btn btn-outline-light">Iya</a>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
</div>
<!-- /.AKHIR modal-Hapus -->
<?php } ?>


<script>

  const swal = $('.swal').data('swal');
  if (swal) {
    Swal.fire({
      title: "SUKSES !!",
      text: swal,
      icon: 'success'
    })
  }
  
</script>

