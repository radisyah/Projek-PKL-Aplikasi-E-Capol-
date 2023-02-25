<table class="table table-bordered table-striped">
    <tr class="text-center bg-gray">
      <th>No</th>
      <th>Nama Barang</th>
      <th>Jumlah Barang Dipinjam</th>
    </tr>
    <?php $nomor=1;
      foreach ($dataharian as $key => $value) { 
        $grandtotal[] = $value['qty'];
      ?>
      <tr class="text-center">
        <td><?=$nomor++?></td>
        <td><?=$value['nama_barang']?></td>
        <td><?=$value['qty']?></td>
      </tr>
      <?php } ?>
      <tr class="text-center bg-gray">
          <td class="tg-0lax" colspan="2"><h5>Grand Total</h5></td>
          <td class="tg-0lax" ><?= $dataharian == null ? '' : number_format(array_sum($grandtotal),0)  ?></td>

      </tr>
  </table>
