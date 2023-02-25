<div class="col-12 ">
  <table id="example1" class="table table-bordered table-striped text-center">
    <thead>
      <tr >
        <th width="50px">No</th>
        <th>Kode Barang</th>
        <th>Nama Barang</th>
        <th>Kategori</th>
        <th>Satuan</th>
        <th>Stok</th>
      </tr>
    </thead>
    
    <tbody>
    <?php $no=1; 
    foreach ($barang as $key => $value) { ?>
      <tr class="<?= $value['stok'] == 0 ? "text-danger" : ""  ?>">
        <td><?= $no++ ?></td>
        <td><?= $value['kode_barang'] ?></td>
        <td><?= $value['nama_barang'] ?></td>
        <td><?= $value['nama_kategori'] ?></td>
        <td><?= $value['nama_satuan'] ?></td>
        <td><?= $value['stok'] ?></td>
      </tr>
    <?php } ?>
    </tbody>
    <b>Print Date : <?= date('d M Y H:i:s') ?> <b>
    
  </table>
</div>