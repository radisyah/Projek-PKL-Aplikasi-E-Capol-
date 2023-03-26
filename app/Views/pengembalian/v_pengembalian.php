<div class="col-md-12">
  <div class="card">
    
    <div class="card-header">
      <h3 class="card-title">Barang Pengembalian</h3>
      <div class="card-tools"></div>
    </div>
    
    <div class="swal" data-swal="<?= session()->getFlashdata('pesanSukses') ?>">
    </div>
    

    <!-- /.card-header -->
    <div class="card-body">
      <div class="form-row">
        <div class="col-lg-12">
          <table id="example1" class="table table-bordered table-striped text-sm text-center">
            <thead>
              <tr class="text-center">
                <th width="100px">No Transaksi <?=  session()->get('no_faktur')?></th>
                <th width="200px" >Tanggal Pinjam</th>
                <th width="200px">Tanggal Kembali</th>
                <th>Keterangan</th>
                <th width="100px">Aksi</th>
              </tr>
            </thead>
           
            <tbody>
              <?php foreach ($barangpinjam as $key => $value) { ?>
              <tr>
                <td><?= $value['no_faktur'] ?></td>
                <td><?= $value['tanggal_pinjam'] ?> <?= $value['jam_pinjam'] ?></td>
                <td><?= $value['tanggal_kembali'] ?> <?= $value['jam_kembali'] ?></td>
                <td><?= $value['ket'] ?></td>
                <td>
                  <?php if (empty($value['tanggal_kembali'])) { ?>
                    <button data-toggle="modal" data-target="#simpan<?= $value['no_faktur'] ?>" class="btn btn-sm btn-success ">Selesai</button>
                  <?php } else{ ?>
                    <a>Selesai</a>
                  <?php } ?>
                </td>
              </tr>
              <?php } ?>
            </tbody>
            <?php echo form_close() ?>

          </table>
        </div>
      </div>
    </div>

    <!-- /.card-body -->
  </div>
</div>



<div class="col-md-12">
  <div class="card">
    
    <div class="card-header">
      <h3 class="card-title">Lihat Barang Peminjaman</h3>
      <div class="card-tools"></div>
    </div>

    <!-- /.card-header -->
    <div class="card-body">
      <div class="form-row">
        <div class="col-lg-12">
          <div class="form-group">
            <label>No Transaksi</label>
            <div class="col-10 input-group">
              <select name="no_faktur"  id="no_faktur" class="form-control"> 
                <option value=''>Pilih No Transaksi</option>
                <?php foreach ($barangpinjam as $key => $value) { ?>
                  <option value='<?= $value['no_faktur'] ?>'><?= $value['no_faktur'] ?></option>
                <?php } ?>
              </select>
              <span class="input-group-append">
              <button
                  onclick="ViewTabelBarangPinjam()"
                  class="btn btn-primary btn-flat"
                >
                  <i style="color: white" class="fas fa-eye"></i>
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

<?php foreach ($barangpinjam as $key => $value) { ?>
<div class="modal fade" id="simpan<?=  $value['no_faktur']; ?>">
  <div class="modal-dialog">
    <div class="modal-content bg-info">
      <div class="modal-header">
        <h4 class="modal-title">Lanjutkan Transaksi Pengembalian Barang</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h5>Apakah Anda Yakin ?</h5>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-outline-light" data-dismiss="modal">Tidak</button>
        <a href="<?= base_url('pengembalian/SimpanPengembalian/'.$value['no_faktur']) ?>" type="submit" class="btn btn-outline-light">Iya</a>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
</div>
<?php } ?>

<script>
  function ViewTabelBarangPinjam() {
    let no_faktur = $('#no_faktur').val();
    if (no_faktur=='') {
      Swal.fire({
        title: 'No Transaksi Belum Dipilih!!',
        icon: 'error',
      });
    }else{
      $.ajax({
      type: "POST",
      url: "<?= base_url('Pengembalian/ViewDataBarang') ?>",
      data: {
       no_faktur: no_faktur,
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

  

  const swal = $('.swal').data('swal');
  if (swal) {
    Swal.fire({
      title: "SELAMAT !!",
      text: swal,
      icon: 'success'
    })
  }



</script>







     




