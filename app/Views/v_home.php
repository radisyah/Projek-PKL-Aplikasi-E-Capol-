<div class="col-lg-3 col-6">
  <!-- small card -->
  <div class="small-box bg-info">
    <div class="inner">
      <h3><?= $j_barang ?></h3>

      <p>Total Barang</p>
    </div>
    <div class="icon">
      <i class="fas fa-boxes"></i>
    </div>
    <a href="<?= base_url('barang') ?>" class="small-box-footer">
     Telusuri <i class="fas fa-arrow-circle-right"></i>
    </a>
  </div>
</div>

<div class="col-lg-3 col-6">
  <!-- small card -->
  <div class="small-box bg-success">
    <div class="inner">
      <h3><?= $j_kategori ?><sup style="font-size: 20px"></sup></h3>

      <p>Total Kategori</p>
    </div>
    <div class="icon">
      <i class="fas fa-bookmark"></i>
    </div>
    <a href="<?= base_url('kategori') ?>" class="small-box-footer">
     Telusuri <i class="fas fa-arrow-circle-right"></i>
    </a>
  </div>
</div>

<div class="col-lg-3 col-6">
  <!-- small card -->
  <div class="small-box bg-warning">
    <div class="inner">
      <h3><?= $j_transaksi ?></h3>

      <p>Total Transaksi</p>
    </div>
    <div class="icon">
      <i class="fas fa-weight"></i>
    </div>
    <a href="<?= base_url('daftartransaksi') ?>" class="small-box-footer">
     Telusuri <i class="fas fa-arrow-circle-right"></i>
    </a>
  </div>
</div>

<div class="col-lg-3 col-6">
  <!-- small card -->
  <div class="small-box bg-danger">
    <div class="inner">
      <h3><?= $j_user ?></h3>

      <p>Total User</p>
    </div>
    <div class="icon">
      <i class="fas fa-users"></i>
    </div>
    <a href="<?= base_url('user') ?>" class="small-box-footer">
     Telusuri <i class="fas fa-arrow-circle-right"></i>
    </a>
  </div>
</div>

<div class="col-md-4">
  <!-- Info Boxes Style 2 -->
  <div class="info-box mb-3 bg-navy">
    <span class="info-box-icon"><i class="fas fa-box"></i></span>

    <div class="info-box-content">
      <span class="info-box-text">Total Barang Dipinjam Hari Ini</span>
      <span class="info-box-number"><?= $p_hari_ini['qty'] ?></span>
    </div>
    <!-- /.info-box-content -->
  </div>
</div>

<div class="col-md-4">
  <!-- Info Boxes Style 2 -->
  <div class="info-box mb-3 bg-indigo">
    <span class="info-box-icon"><i class="fas fa-box"></i></span>

    <div class="info-box-content">
      <span class="info-box-text">Total Barang Dipinjam Bulan Ini</span>
      <span class="info-box-number"><?= $p_bulan_ini['qty'] ?></span>
    </div>
    <!-- /.info-box-content -->
  </div>
</div>

<div class="col-md-4">
  <!-- Info Boxes Style 2 -->
  <div class="info-box mb-3 bg-fuchsia">
    <span class="info-box-icon"><i class="fas fa-box"></i></span>

    <div class="info-box-content">
      <span class="info-box-text">Total Barang Dipinjam Tahun Ini </span>
      <span class="info-box-number"><?= $p_tahun_ini['qty'] ?></span>
    </div>
    <!-- /.info-box-content -->
  </div>
</div>


<br>

<div class="col-md-12">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Live Report Transaksi Peminjaman Barang</h3>
       
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <div class="table-responsive">
        <table class="table m-0">
          <thead>
          <tr>
            <th>No Transaksi</th>
            <th>Nama Peminjam</th>
            <th>Nama Barang</th>
            <th>Kategori</th>
            <th>Tanggal Pinjam</th>
            <th>Qty</th>
            <th>Status</th>
          </tr>
          </thead>
          <tbody>
          <?php foreach ($livePinjam as $key => $value) { ?>
            <tr>
              <td><?= $value['no_faktur'] ?></td>
              <td><?= $value['username'] ?></td>
              <td><?= $value['nama_barang'] ?></td>
              <td><?= $value['nama_kategori'] ?></td>
              <td><?= $value['tanggal_pinjam'] ?></td>
              <td><?= $value['qty'] ?></td>
              <td>
              <span class="badge badge-danger">Dipinjam</span>
              </td>
            </tr>
          <?php }?>
          </tbody>
        </table>
      </div>
      <!-- /.table-responsive -->
    </div>
              <!-- /.card-body -->
    <!-- /.card-body -->
  </div>
</div>

<br>

<div class="col-md-4">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Komputerisasi</h3>
       
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <canvas id="chartK" width="100%" height="35px"></canvas>

    

      
    </div>
    <!-- /.card-body -->
  </div>
</div>

<div class="col-md-4">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Multimedia</h3>
       
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <canvas id="chartM" width="100%" height="35px"></canvas>

      
      
    </div>
    <!-- /.card-body -->
  </div>
</div>
<div class="col-md-4">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Komunikasi</h3>
       
    </div>
    <!-- /.card-header -->
    <div class="card-body">
    <canvas id="chartKom" width="100%" height="35px"></canvas>
      
    </div>
    <!-- /.card-body -->
  </div>
</div>

<?php 
  if ($grafikK==null) {
    $stok[] = $stokK['stok'];
    $qty[] = '';
    
  }else{
    foreach ($grafikK as $key => $value) {
      $stok[] = $value['stok'];
      $qty[] = $value['qty'];
  }
  
} ?>

<?php 
  if ($grafikM==null) {
    $stok2[] = $stokM['stok'];
    $qty2[] = '';
    
  }else{
    foreach ($grafikM as $key => $value) {
      $stok2[] = $value['stok'];
      $qty2[] = $value['qty'];
  }
  
} ?>

<?php 
  if ($grafikKom==null) {
    $stok3[] = $stokKom['stok'];
    $qty3[] = '';
    
  }else{
    foreach ($grafikKom as $key => $value) {
      $stok3[] = $value['stok'];
      $qty3[] = $value['qty'];
  }
  
} ?>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  const cK = document.getElementById('chartK');
  const cM = document.getElementById('chartM');
  const cKom = document.getElementById('chartKom');


  

  new Chart(cK, {
    type: 'pie',
    data: {
      labels: ['Stok', 'Dipinjam'],
      datasets: [{
        label: 'Jumlah',
        data: [<?= json_encode($stok) ?>, <?= json_encode($qty) ?>],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });

  new Chart(cM, {
    type: 'pie',
    data: {
      labels:  ['Stok', 'Dipinjam'],
      datasets: [{
        label: 'Jumlah',
        data: [<?= json_encode($stok2) ?>, <?= json_encode($qty2) ?>],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });

  new Chart(cKom, {
    type: 'pie',
    data: {
      labels:  ['Stok', 'Dipinjam'],
      datasets: [{
        label: 'Jumlah',
        data: [<?= json_encode($stok3) ?>, <?= json_encode($qty3) ?>],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script>


  