<div class="col-md-12">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title"><?= $judul ?></h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group row">
          
            <div class="col-10 input-group">
              <input
                name="tgl"
                class="form-control"
                type="date"
                id="tgl"
              />
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
    let tgl = $('#tgl').val();
    if (tgl=='') {
      Swal.fire({
        title: 'Tanggal Belum Dipilih!!',
        icon: 'error',
      });
    }else{
      $.ajax({
      type: "POST",
      url: "<?= base_url('Laporan/ViewLaporanHarian') ?>",
      data: {
       tgl: tgl,
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
    let tgl = $('#tgl').val();
    if (tgl=='') {
      Swal.fire({
        title: 'Tanggal Belum Dipilih!!',
        icon: 'error',
      });
    }else{
     NewWin=window.open('<?= base_url('Laporan/PrintLaporanHarian') ?>/'+ tgl,'NewWin','toolbar=no' );
    }
  }
</script>
