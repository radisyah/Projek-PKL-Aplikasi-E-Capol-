<div class="col-md-12">
  <div class="card">
    
    <div class="card-header">
      <h3 class="card-title">Daftar Transaksi</h3>
      <div class="card-tools">
        <a class="btn btn-success btn-sm" href="DaftarTransaksi/Excel"><i class="fa fa-file-excel"></i> Excel</a>
        <button type="button" class="btn btn-primary btn-sm" onclick="NewWin=window.open('<?= base_url('DaftarTransaksi/PrintDaftarTransaksi') ?>','NewWin','toolbar=no' )" class="btn btn-success btn-sm btn-flat"><i class="fas fa-print"></i> Print</button>
      </div>
    </div>

    <!-- /.card-header -->
    <div class="card-body">
      <div class="form-row">
        <div class="col-lg-12">
          <table id="example1" class="table table-bordered table-striped text-sm text-center">
            <thead>
              <tr class="text-center">
                <th width="100px">No Transaksi</th>
                <th width="200px" >Nama Peminjam</th>
                <th width="200px">Nama Barang</th>
                <th>Kategori</th>
                <th width="200px">Tanggal Pinjam</th>
                <th width="200px">Tanggal Kembali</th>
                <th width="100px">Jumlah</th>
              </tr>
            </thead>
           
            <tbody>
            <?php foreach ($daftartransaksi as $key => $value) { ?>
              <tr class="text-center">
                <td width="100px"><?= $value['no_faktur'] ?></td>
                <td width="200px" ><?= $value['username'] ?></td>
                <td width="200px"><?= $value['nama_barang'] ?></td>
                <td width="200px"><?= $value['nama_kategori'] ?></td>
                <td><?= $value['tanggal_pinjam'] ?> <?= $value['jam_pinjam'] ?></td>
                <?php if ($value['tanggal_kembali']==null) { ?>
                  <td> <span class="badge badge-danger">Dipinjam</span></td>
                <?php } else { ?>
                  <td><?= $value['tanggal_kembali'] ?> <?= $value['jam_kembali'] ?></td>
                <?php } ?>
              
                <td width="100px"><?= $value['qty'] ?> <?=$value['nama_satuan']?></td>
              </tr>
            <?php } ?>
            </tbody>

          </table>
        </div>
      </div>
    </div>

    <!-- /.card-body -->
  </div>
</div>