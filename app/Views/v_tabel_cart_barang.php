<table class="table table-bordered table-striped">
	<tr class="text-center">
		<th>Nama Barang</th>
		<th>Kategori</th>
		<th>Qty</th>
	</tr>
  <?php foreach ($databarang as $key => $value) { ?>
    <tr class="text-center">
      <td><?=$value['nama_barang']?></td>
      <td><?=$value['nama_kategori']?></td>
      <td><?=$value['qty']?> <?=$value['nama_satuan']?></td>
    </tr>
  <?php } ?>
    
</table>
