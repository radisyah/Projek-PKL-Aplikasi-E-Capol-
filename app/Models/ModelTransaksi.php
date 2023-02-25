<?php
namespace App\Models;

use CodeIgniter\Model;

class ModelTransaksi extends Model{

  public function cek()
  {
    return $this->db->table('tbl_transaksi')
    ->join('tbl_user', 'tbl_user.id_user = tbl_transaksi.id_user' )
    ->get()
    ->getResultArray();
  }

  public function noFaktur()
  {
    $kode_transaksi ='IT-';
    $query = $this->db->query("SELECT MAX(RIGHT(no_faktur,4)) as no_urut from tbl_transaksi ");
    $hasil = $query->getRowArray();
    if ($hasil['no_urut']>0) {
      $tmp = $hasil['no_urut'] + 1;
      $kd = sprintf("%04s",$tmp);
    }else {
      $kd = "0001";
    }
    $no_faktur = $kode_transaksi.$kd;
    return $no_faktur;
  }

  public function CekBarang($kode_barang)
  {
    return $this->db->table('tbl_barang')
      ->join('tbl_kategori', 'tbl_kategori.id_kategori = tbl_barang.id_kategori' )
      ->join('tbl_satuan', 'tbl_satuan.id_satuan = tbl_barang.id_satuan' )
      ->where('kode_barang', $kode_barang)
      ->get()
      ->getRowArray();
  }

  public function ViewBarang()
  {
    return $this->db->table('tbl_transaksi')
      ->join('tbl_barang', 'tbl_barang.kode_barang = tbl_rinci.kode_barang' )
      ->where('tbl_rinci.no_faktur')
      ->select('tbl_rinci.qty')
      ->select('tbl_rinci.no_faktur')
      ->select('tbl_barang.nama_barang')
      ->get()
      ->getResultArray();
  }

  public function KembaliRinci($data)
  {
    return $this->db->table('tbl_rinci')
    ->where('no_faktur',$data['no_faktur'])
    ->update($data);
  }

  public function KembaliTransaksi($data)
  {
    return $this->db->table('tbl_transaksi')
    ->where('no_faktur',$data['no_faktur'])
    ->update($data);
  }


  public function BarangPinjam($id_user)
  {
    return $this->db->table('tbl_transaksi')
    ->join('tbl_rinci', 'tbl_rinci.no_faktur = tbl_transaksi.no_faktur')
    ->join('tbl_barang', 'tbl_barang.kode_barang = tbl_rinci.kode_barang')
    ->where('tbl_transaksi.id_user',$id_user)
    ->groupBy('tbl_transaksi.no_faktur')
    ->get()
    ->getResultArray();
  }

  public function all_data()
  {
    $query = $this->db->query("SELECT * FROM `tbl_barang` WHERE stok > 0");
    $hasil = $query->getResultArray();
    return $hasil;
  }

  public function InsertPinjam($data)
  {
    $this->db->table('tbl_transaksi')->insert($data);
  }

  public function InsertRinciPinjam($data)
  {
    $this->db->table('tbl_rinci')->insert($data);
  }

  public function LihatBarang($no_faktur)
  {
    return $this->db->table('tbl_rinci')  
    ->join('tbl_barang', 'tbl_barang.kode_barang = tbl_rinci.kode_barang')
    ->join('tbl_satuan', 'tbl_barang.id_satuan = tbl_satuan.id_satuan')
    ->join('tbl_kategori', 'tbl_barang.id_kategori = tbl_kategori.id_kategori')
    ->join('tbl_transaksi', 'tbl_transaksi.no_faktur = tbl_rinci.no_faktur')
    ->where('tbl_rinci.no_faktur', $no_faktur)
    ->select('tbl_rinci.no_faktur')
    ->select('tbl_barang.nama_barang')
    ->select('tbl_kategori.nama_kategori')
    ->select('tbl_satuan.nama_satuan')
    ->select('tbl_rinci.qty')
    ->get()
    ->getResultArray();
  }

  public function AmbilStok($stok){
    return $this->db->table('tbl_barang')
    ->where([
      'stok' => $stok,
    ])
    ->select('tbl_barang.stok')
    ->get()
    ->getResultArray();
  }



}

?>