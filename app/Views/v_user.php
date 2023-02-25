<div class="col-md-12">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Daftar User</h3>
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
            <th>Nama User</th>
            <th>Password</th>
            <th>Level</th>
            <th width="100px">Aksi</th>
          </tr>
        </thead>
       
        <tbody>
        <?php $no=1; 
        foreach ($user as $key => $value) { ?>
          <tr>
            <td><?= $no++ ?></td>
            <td><?= $value['username'] ?></td>
            <td><?= $value['password'] ?></td>
            <td>
              <?php if ($value['level']==1) { ?>
                <sapan class="badge bg-success">Admin</sapan>
              <?php }  else { ?>
                <sapan class="badge bg-primary">User</sapan>
              <?php } ?>
             
            </td>
            <td>
            <button data-toggle="modal" data-target="#edit<?= $value['id_user'] ?>" class="btn btn-sm btn-warning">Edit</button>
            <button data-toggle="modal" data-target="#delete<?= $value['id_user'] ?>" class="btn btn-sm btn-danger">Delete</button>
            </td>
          </tr>
        <?php } ?>
        </tbody>
       
      </table>
    </div>
    <!-- /.card-body -->
  </div>
</div>

<div class="modal fade" id="add">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Add User</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php echo form_open('user/add')?>
        <div class="form-group">
          <label>Nama User</label>
          <input class="form-control" name="username" placeholder="Nama User" required>
        </div>

        <div class="form-group">
          <label>Password</label>
          <input class="form-control" type="password" name="password" placeholder="Password" required>
        </div>

        <div class="form-group">
          <label>Level</label>
          <select class="form-control" name="level">
            <option value='1'>Admin</option>
            <option value='2'>User</option>
          </select>
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

<?php foreach ($user as $key => $value){?>
<div class="modal fade" id="edit<?=  $value['id_user']; ?>">
  <div class="modal-dialog modal-danger">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Ubah User</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php echo form_open('user/update/'.$value['id_user']) ?>

        <div class="form-group">
          <label>Nama User</label>
          <input class="form-control" value="<?= $value['username'] ?>" name="username" placeholder="Nama User" required>
        </div>

        <div class="form-group">
          <label>Password</label>
          <input readonly class="form-control" name="password" value="<?= $value['password'] ?>" placeholder="Password" required>
        </div>

        <div class="form-group">
          <label>Level</label>
          <select class="form-control" name="level">
            <option value="1" <?= $value['level'] == 1 ? 'Selected': '' ?> >Admin</option>
            <option value="2" <?= $value['level'] == 2 ? 'Selected': '' ?> >User</option>
          </select>
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

<?php foreach ($user as $key => $value){?>
<div class="modal fade" id="delete<?=  $value['id_user']; ?>">
  <div class="modal-dialog modal-danger">
    <div class="modal-content bg-danger">
      <div class="modal-header">
        <h4 class="modal-title">Hapus User</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Apakah Anda Yakin ingin menghapus <?=  $value['username']; ?> ?
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-outline-light" data-dismiss="modal">Tidak</button>
        <a href="<?= base_url('user/delete/'.$value['id_user']) ?>" type="submit" class="btn btn-outline-light">Iya</a>
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
