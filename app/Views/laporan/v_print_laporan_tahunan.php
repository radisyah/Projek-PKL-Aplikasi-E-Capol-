<div class="col-12 ">
  <table class="table table-bordered table-striped">
    <tr class="text-center">
      <th>No</th>
      <th>Bulan</th>
      <th>Nama Barang</th>
      <th>Total Jumlah Barang Dipinjam</th>
    </tr>
    <?php $no=1; $nomor=1; 
      foreach ($datatahunan as $key => $value) { 
          $grandqty[] = $value['qty'];
      ?>
      <tr class="text-center">
        <td><?=$nomor++?></td>
        <td><?=$value['bulan']?></td>
        <td><?=$value['nama_barang'] ?></td>
        <td><?=$value['qty']?></td>
      </tr>
      <?php } ?>
      <tr class="text-center">
        <td class="tg-0lax" colspan="3"><h5>Grand Total</h5></td>
        <td class="tg-0lax" ><?= $datatahunan == null ? '' : number_format(array_sum($grandqty),0)  ?></td>
      </tr>
    
  </table>
</div>

