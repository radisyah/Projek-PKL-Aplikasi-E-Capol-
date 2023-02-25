<div class="col-12 ">
  <table id="example1" class="table table-bordered table-striped text-sm text-center">
    <thead>
      <tr class="text-center">
        <th width="200px">No Transaksi</th>
        <th width="200px" >Nama Peminjam</th>
        <th width="200px">Nama Barang</th>
        <th>Tanggal Pinjam</th>
        <th>Tanggal Kembali</th>
        <th width="100px">Jumlah</th>
      </tr>
    </thead>
    
    <tbody>
    <?php foreach ($daftartransaksi as $key => $value) { ?>
      <tr class="text-center">
        <td width="100px"><?= $value['no_faktur'] ?></td>
        <td width="200px" ><?= $value['username'] ?></td>
        <td width="200px"><?= $value['nama_barang'] ?></td>
        <td><?= $value['tanggal_pinjam'] ?> <?= $value['jam_pinjam'] ?></td>
        <td><?= $value['tanggal_kembali'] ?> <?= $value['jam_kembali'] ?></td>
        <td width="100px"><?= $value['qty'] ?></td>
      </tr>
    <?php } ?>
    </tbody>

  </table>
</div>