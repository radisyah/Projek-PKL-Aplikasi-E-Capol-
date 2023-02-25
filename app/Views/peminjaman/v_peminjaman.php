<div class="col-md-12">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Input Barang Masuk</h3>
      <div class="card-tools"></div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <div class="form-row">
        <div class="form-group col-md-3">
          <label>No Transaksi Peminjaman</label>
          <label class="form-control text-center text-danger">
           <?= $no_faktur ?>
          </label>
        </div>
        <div class="form-group col-md-3">
          <label>Tangal</label>
          <label class="form-control text-center">
            <?= date('d M Y') ?>
          </label>
        </div>
        <div class="form-group col-md-3">
          <label>Jam</label>
          <label id="jam"  class="form-control text-center"></label>
        </div>
        <div class="form-group col-md-3">
          <label>Nama Peminjam</label>
          <label class="form-control text-center">
          <?=session()->get('username')?>
          </label>
        </div>
      </div>

      <div class="card">
        <div class="card-header bg-primary">
          <h3 class="card-title">Input Faktur Barang Masuk</h3>
        </div>
        <div class="card-body">
          <div class="col-lg-12">
            <div class="row"> 
              <?php echo form_open('Peminjaman/AddCart') ?>
                <div class="form-row">
                  <div class="form-group col-md-2">
                    <label>Kode Barang</label>
                    <div class="input-group mb-2">
                      <input
                        name="kode_barang"
                        class="form-control"
                        placeholder="Kode Barang"
                        autocomplete="off"
                        id= "kode_barang"
                        required
                      />
                      <div class="input-group-append">
                        <a class="btn btn-primary btn-flat" data-toggle="modal" data-target="#cari-barang">
                          <i style="color: white" class="fas fa-search"></i>
                        </a>
                        <button type="reset" class="btn btn-danger btn-flat">
                          <i class="fas fa-times"></i>
                        </button>
                      </div>
                    </div>
                  </div>
                  <div class="form-group col-md-2">
                    <label>Nama Barang</label>
                    <input
                      type="text"
                      class="form-control"
                      placeholder="Nama Barang"
                      name="nama_barang"
                      readonly
                    />
                  </div>
                  <div class="form-group col-md-2">
                    <label>Kategori</label>
                    <input
                      type="text"
                      class="form-control"
                      placeholder="Kategori"
                      name="nama_kategori"
                      readonly
                    />
                  </div>
                  <div class="form-group col-md-2">
                    <label>Satuan </label>
                    <input
                      type="text"
                      class="form-control"
                      name="nama_satuan"
                      placeholder="Satuan"
                      readonly

                    />
                  </div>
                  <div class="form-group col-md-1">
                    <label>Jumlah</label>
                    <input
                      type="number"
                      class="form-control"
                      placeholder="Jumlah"
                      name="qty"
                      id="qty"
                      min="1"
                      value="1"
                      required
                    />
                  </div>
                  <div class="form-group col-md-3">
                    <label>Aksi</label>
                    <div class="input-group">
                      <button
                        type="submit"
                        id="tombolTambahItem"
                        class="btn btn-sm btn-primary"
                      >
                        <i class="fa fa-plus-square"> Tambah</i></button
                      >&nbsp;
                      <a 
                        href="<?=  base_url('peminjaman/ResetCart')?>"
                        id="tombolReload"
                        class="btn btn-sm btn-warning"
                      >
                        <i class="fa fa-sync-alt"> Ulang</i>
                      </a>&nbsp;
                      <a
                        type="submit"
                        id="tombolTambahItem"
                        class="btn btn-sm btn-success"
                        data-toggle="modal" 
                        onclick="peminjaman()" 
                        data-target="#peminjaman"
                      >
                        <i class="fas fa-cart-plus" style="color: white"> Pinjam</i></a
                      >
                    </div>
                  </div>
                </div>
              <?php echo form_close() ?>
            </div>
            <div class="form-row">
              <div  class="col-lg-12">
                <div class="table-responsive">
                  <table class="table m-0">
                    <thead>
                      <tr>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Kategori</th>
                        <th>QTY</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($cart as $key => $value) { ?>
                        <tr>
                        <td><?= $value['id'] ?></td>
                        <td><?= $value['name'] ?></td>
                        <td><?= $value['options']['nama_kategori'] ?></td>
                        <td><?= $value['qty'] ?> <?= $value['options']['nama_satuan'] ?></td>
                        <td >
                          <a href="<?= base_url("peminjaman/RemoveItem/".$value['rowid']) ?>" class="btn btn-flat btn-danger btn-sm">  <i class="fa fa-times text-white"> </i> </a>
                        </td>
                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

        
          <br>
          
         
        </div>
      </div>

      <?php
      $pesanGagal = session()->getFlashdata('pesanGagal');
      $pesanSukses = session()->getFlashdata('pesanSukses');
      if ( $pesanGagal) { ?>
        <div class="swal" data-swal="<?= session()->getFlashdata('pesanGagal') ?>">
        </div>
      <?php } elseif ($pesanSukses) { ?>
        <div class="swal2" data-swal2="<?= session()->getFlashdata('pesanSukses') ?>">
        </div>
      <?php } ?>

    


     
     
    </div>

    <!-- /.card-body -->
  </div>
</div>

<!-- Modal Pencarian Barang -->
<div class="modal fade " id="cari-barang">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Pencarian Data Barang</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table id="example1" class="table table-bordered table-striped text-sm text-center">
          <thead>
            <tr >
              <th >No</th>
              <th >Kode</th>
              <th >Nama</th>
              <th >Stok</th>
              <th >Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1; 
            foreach ($barang as $key => $value) { ?>
            <tr>
              <td style=" width:30px"><?= $no++ ?></td>
              <td style=" width:30px"><?= $value['kode_barang'] ?></td> 
              <td style=" width:30px"><?= $value['nama_barang'] ?></td>
              <td style=" width:30px"><?= $value['stok'] ?></td>
              <td style=" width:30px"><button onclick="PilihBarang('<?= $value['kode_barang']?>')" class="btn btn-success btn-xs">Piih</button></td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
     
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /Modal Pencarian Barang -->

<!-- Modal Peminjaman Barang -->
<div class="modal fade " id="peminjaman">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <label class="modal-title">Transaksi Peminjaman</label>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php echo form_open('peminjaman/SimpanTransaksi') ?>
      <div class="modal-body">
        <div class="form-group">
          <label>Keterangan Peminjaman</label>
          <textarea class="form-control" name="ket" rows="5" required></textarea>
        </div>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary btn-flat"><i class="fas fa-save"></i> Simpan Transaksi</button>
      </div>
      <?php echo form_close() ?>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /Modal Peminjaman Barang -->

<script>
  $(document).ready(function() {
   
    $('#kode_barang').focus();

    $('#kode_barang').keydown(function (e) {
      let kode_barang = $('#kode_barang').val();
      if (e.keyCode == 13) {
        e.preventDefault();
        if (kode_barang == '') {
          Swal.fire({
            title: 'Kode Barang Tidak Ditemukan',
            icon: 'error',
          });
        } else {
          CekBarang();
        }
      }
    });
  });

  function CekBarang() {
    $.ajax({
      type: "POST",
      url: "<?= base_url('Peminjaman/CekBarang') ?>",
      data: {
        kode_barang: $('#kode_barang').val(),
      },
      dataType: "JSON",
      success: function(response) {
        if (response.nama_barang == '') {
          Swal.fire({
            title: 'Kode Barang Tidak Terdaftar',
            icon: 'error',
          });
        }else{
          $('[name="nama_barang"]').val(response.nama_barang);
          $('[name="nama_kategori"]').val(response.nama_kategori);
          $('[name="nama_satuan"]').val(response.nama_satuan);
          $('#qty').focus();
         
        }
      }

    });
  }

  function PilihBarang(kode_barang) {
    $('#kode_barang').val(kode_barang);
    $('#cari-barang').modal('hide');
    $('#kode_barang').focus();
  }

  function peminjaman() {
    if (kode_barang == '') {
      Swal.fire({
        title: 'Data Peminjaman Kosong',
        icon: 'error',
      });
    } else {
      $('#peminjaman').modal('show'); 
    }
   
   
  }


  
</script>

<script>
  window.onload = function() {
    startTime();
  }
  function startTime() {
    var today = new Date();
    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();
    m= checkTime(m);
    s= checkTime(s);
    document.getElementById('jam').innerHTML = h + ':' + m + ':' + s;
    var t = setTimeout(function(){
      startTime();
    },500);
   
  }
   
  function checkTime(i) {
    if (i<10) {
      i = '0' + i;
    }
    return i;
  }

  const swal = $('.swal').data('swal');

  const swal2 = $('.swal2').data('swal2');

  if (swal) {
    Swal.fire({
      title: "MAAF !!",
      text: swal,
      icon: 'error'
    })
  }else if (swal2) {
    Swal.fire({
      title: "SELAMAT !!",
      text: swal2,
      icon: 'success'
    })
  }
  
</script>
