<table class="table table-bordered table-striped">
	<tr class="text-center bg-gray">
		<th>No</th>
		<th>Tanggal Pinjam</th>
		<th>Nama Barang</th>
		<th>Total Jumlah Barang Dipinjam</th>
	</tr>
  <?php $no=1; $nomor=1; 
    foreach ($databulan as $key => $value) { 
      $grandtotal[] = $value['qty'];

    ?>
    <tr class="text-center">
      <td><?=$nomor++?></td>
      <td><?=$value['tanggal_pinjam']?></td>
      <td><?=$value['nama_barang']?></td>
      <td><?=$value['qty']?></td>
    </tr>
    <?php } ?>
    <tr class="text-center bg-gray">
        <td class="tg-0lax" colspan="3"><h5>Grand Total</h5></td>
        <td class="tg-0lax" ><?= $databulan == null ? '' : number_format(array_sum($grandtotal),0)  ?></td>

    </tr>
   
</table>
