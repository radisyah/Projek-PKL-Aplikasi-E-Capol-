<div class="col-md-12">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title"><?= $judul ?></h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <div class="row">
        <div class="col-sm-2">
          <div class="form-group">
            <label>Bulan</label>
            <select name="bulan" id="bulan" class="form-control">
              <option value="">Bulan</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>
              <option value="9">9</option>
              <option value="10">10</option>
              <option value="11">11</option>
              <option value="12">12</option>
            </select>
          </div>
        </div>

        <div class="col-sm-5">
          <div class="form-group">
            <label>Tahun</label>
            <div class="col-10 input-group">
              <select name="tahun" id="tahun" class="form-control">
                <option value="">Tahun</option>
                <option value="2020">2020</option>
                <option value="2021">2021</option>
                <option value="2022">2022</option>
                <option value="2023">2023</option>
                <option value="2024">2024</option>
              </select>
              <span class="input-group-append">
                <button
                  onclick="ViewTabelLaporan()"
                  class="btn btn-primary btn-flat"
                  data-toggle="modal"
                  data-target="#cari-produk"
                >
                  <i style="color: white" class="fas fa-file-alt"></i>
                </button>
                <button
                 class="btn btn-success btn-flat"
                 onclick="PrintLaporan()"
                 >
                  <i class="fas fa-print"></i>
                </button>
              </span>
            </div>
          </div>
        </div>

        <div class="col-sm-12">
          <hr>
          <div class="Tabel">
          

          </div>
        </div>
        
      </div>
      
    </div>
    <!-- /.card-body -->
  </div>
</div>

<script>
  function ViewTabelLaporan() {
    let bulan = $('#bulan').val();
    let tahun = $('#tahun').val();
    if (bulan=='') {
      Swal.fire({
        title: 'Bulan Belum Dipilih!!',
        icon: 'error',
      });
    }else if(tahun==''){
      Swal.fire({
        title: 'Tahun Belum Dipilih!!',
        icon: 'error',
      });
    }else{
      $.ajax({
      type: "POST",
      url: "<?= base_url('Laporan/ViewLaporanBulanan') ?>",
      data: {
        bulan:  bulan,
        tahun: tahun,
      },
      dataType: "JSON",
      success: function(response) {
        if (response.data) {
          $('.Tabel').html(response.data);
        }
      }

    });
    }
    
  }

  function PrintLaporan() {
    let bulan = $('#bulan').val();
    let tahun = $('#tahun').val();
    if (bulan=='') {
      Swal.fire({
        title: 'Bulan Belum Dipilih!!',
        icon: 'error',
      });
    }else if(tahun==''){
      Swal.fire({
        title: 'Tahun Belum Dipilih!!',
        icon: 'error',
      });
    }else{
     NewWin=window.open('<?= base_url('Laporan/PrintLaporanBulanan') ?>/'+ bulan + '/' +tahun,'NewWin','toolbar=no' );
    }
  }
</script>


