<div class="container-fluid">
  <div class="row">
    <div class="col-md-5">
      <?php foreach ($profil as $key => $value) { ?>
        <?php if ($value['id_user']==session()->get('id_user')) { ?>
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">My Profil</h3>
            </div>
            <div class="card-body box-profile">
              <div class="text-center">
                <img
                  width="150px"
                  class="img-thumbnail"
                  src="<?= base_url('img/'. $value['foto'])?>"
                  alt="User profile picture"
                />
              </div>

              <h3 class="profile-username text-center"><?= $value['nama'] ?></h3>
              <p class="text-muted text-center">
                <?= $value['username'] ?>
                |
                <?= $value['email'] ?>
                |
                <?= $value['no_telp'] ?>
              </p>
              <a href="<?= base_url('profil/edit/'.$value['id_profil']) ?>"  class="btn btn-primary btn-block">Edit</a>
            </div>
            <!-- /.card-body -->
          </div>
        <?php } ?>
      <?php } ?>
    </div>

    <div class="col-md-7">
      <?php foreach ($profil as $key => $value) { ?>
        <?php if ($value['id_user']==session()->get('id_user')) { ?>
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">My Akun</h3>
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
            <div class="card-body box-profile">
              <div class="form-group">
                <label>username</label>
                <input  value="<?= $value['username'] ?>" name="username" class="form-control"readonly />
              </div>
              <div class="form-group">
                <label>email</label>
                <input  value="<?= $value['email'] ?>" name="email" class="form-control" readonly />
              </div>
              <div class="form-group">
                <label>password</label>
                <input type="password" value="<?= $value['password'] ?>" name="password" class="form-control" readonly />
              </div>
              <button data-toggle="modal" data-target="#edit<?= $value['id_user'] ?>"  class="btn btn-primary btn-block">Edit</button>
            </div>
            <!-- /.card-body -->
          </div>
        <?php } ?>
      <?php } ?>
    </div>
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
        <?php echo form_open('setting/update/'.$value['id_user']) ?>

        <div class="form-group">
          <label>Nama User</label>
          <input class="form-control" value="<?= $value['username'] ?>" name="username" placeholder="Nama User" required>
        </div>

        <div class="form-group">
          <label>Email</label>
          <input class="form-control"  name="email" value="<?= $value['email'] ?>" placeholder="Email" required>
        </div>

        <div class="form-group">
          <label>Password</label>
          <input class="form-control" name="password" value="<?= $value['password'] ?>" placeholder="Password" required>
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



