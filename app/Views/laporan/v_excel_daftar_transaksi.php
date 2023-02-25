<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data Daftar Transaksi.xls");
?>

<html>
  <body>
    <table border=1>
      <thead>
        <tr>
          <th>No Transaksi</th>
          <th >Nama Peminjam</th>
          <th>Nama Barang</th>
          <th>Kategori</th>
          <th >Tanggal Pinjam</th>
          <th >Tanggal Kembali</th>
          <th>Jumlah</th>
        </tr>
      </thead>
      
      <tbody>
      <?php foreach ($daftartransaksi as $key => $value) { ?>
        <tr>
          <td><?= $value['no_faktur'] ?></td>
          <td ><?= $value['username'] ?></td>
          <td ><?= $value['nama_barang'] ?></td>
          <td ><?= $value['nama_kategori'] ?></td>
          <td><?= $value['tanggal_pinjam'] ?> <?= $value['jam_pinjam'] ?></td>
          <td><?= $value['tanggal_kembali'] ?> <?= $value['jam_kembali'] ?></td>
          <td><?= $value['qty'] ?> <?=$value['nama_satuan']?></td>
        </tr>
      <?php } ?>
      </tbody>

    </table>
  </body>
</html>