<div class="col-md-12">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Daftar Barang</h3>
        <div class="card-tools">
          <a type="button" href="<?= base_url('barang/add') ?>" class="btn btn-primary btn-sm btn-flat"><i class="fas fa-plus"></i>Add</a>
          <button type="button" onclick="NewWin=window.open('<?= base_url('laporan/PrintProduk') ?>','NewWin','toolbar=no' )" class="btn btn-success btn-sm btn-flat"><i class="fas fa-print"></i> Print</button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">

      <div class="swal" data-swal="<?= session()->getFlashdata('pesanSukses') ?>">
      </div>

      <table id="example1" class="table table-bordered table-striped">        
        <thead>
          <tr>
            <th width="50px">No</th>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Satuan</th>
            <th>Kategori</th>
            <th>Jumlah</th>
            <th width="100px">Aksi</th>
          </tr>
        </thead>
       
        <tbody>
        <?php $no=1; 
        foreach ($barang as $key => $value) { ?>
          <tr class="<?= $value['stok'] == 0 ? "bg bg-danger" : ""  ?>">
            <td><?= $no++ ?></td>
            <td><?= $value['kode_barang'] ?></td>
            <td><?= $value['nama_barang'] ?></td>
            <td><?= $value['nama_satuan'] ?></td>
            <td><?= $value['nama_kategori'] ?></td>
            <td><?= $value['stok'] ?></td>
            <td>
            <a href="<?= base_url('barang/edit/'.$value['id_barang']) ?>" class="btn btn-sm btn-warning">Edit</a>
            <button data-toggle="modal" data-target="#delete<?= $value['id_barang'] ?>" class="btn btn-sm btn-danger">Delete</button>
            </td>
          </tr>
        <?php } ?>
        </tbody>
       
      </table>
      
    </div>
    <!-- /.card-body -->
  </div>
</div>

<!-- Modal EDIT.Hapus -->
<?php foreach ($barang as $key => $value){?>
<div class="modal fade" id="delete<?=  $value['id_barang']; ?>">
  <div class="modal-dialog modal-danger">
    <div class="modal-content bg-danger">
      <div class="modal-header">
        <h4 class="modal-title">Hapus Barang</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Apakah Anda Yakin ingin menghapus <?=  $value['nama_barang']; ?> ?
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-outline-light" data-dismiss="modal">Tidak</button>
        <a href="<?= base_url('barang/delete/'.$value['id_barang']) ?>" type="submit" class="btn btn-outline-light">Iya</a>
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


