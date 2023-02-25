<?php
namespace App\Models;

use CodeIgniter\Model;

class ModelDashboard extends Model{


  public function JumlahBarang()
  {
    return $this->db->table('tbl_barang')->countAll();
  }

  public function JumlahKategori()
  {
    return $this->db->table('tbl_kategori')->countAll();
  }

  public function JumlahTransaksi()
  {
    return $this->db->table('tbl_transaksi')->countAll();
  }

  public function JumlahUser()
  {
    return $this->db->table('tbl_user')->countAll();
  }

  public function PeminjamanHariIni()
  {
  
    return $this->db->table('tbl_rinci')
      ->join('tbl_transaksi', 'tbl_transaksi.no_faktur = tbl_rinci.no_faktur')
      ->where('tbl_transaksi.tanggal_pinjam', date('Y-m-d'))
      ->groupBy('tbl_transaksi.tanggal_pinjam')
      ->selectSum('tbl_rinci.qty')
      ->get()
      ->getRowArray();
    
  }

  public function PeminjamanBulanIni()
  {
    return $this->db->table('tbl_rinci')
      ->join('tbl_transaksi', 'tbl_transaksi.no_faktur = tbl_rinci.no_faktur')
      ->where('month(tbl_transaksi.tanggal_pinjam)', date('m'))
      ->where('year(tbl_transaksi.tanggal_pinjam)', date('Y'))
      ->groupBy('month(tbl_transaksi.tanggal_pinjam)')
      ->selectSum('tbl_rinci.qty')
      ->get()
      ->getRowArray();
  }

  public function PeminjamanTahunIni()
  {
    return $this->db->table('tbl_rinci')
      ->join('tbl_transaksi', 'tbl_transaksi.no_faktur = tbl_rinci.no_faktur')
      ->where('year(tbl_transaksi.tanggal_pinjam)', date('Y'))
      ->groupBy('year(tbl_transaksi.tanggal_pinjam)')
      ->selectSum('tbl_rinci.qty')
      ->get()
      ->getRowArray();
  }

  public function Grafik()
  {
    return $this->db->table('tbl_rinci')
      ->join('tbl_transaksi', 'tbl_transaksi.no_faktur = tbl_rinci.no_faktur')
      ->where('month(tbl_transaksi.tanggal_pinjam)',date('m'))
      ->where('year(tbl_transaksi.tanggal_pinjam)',date('Y'))
      ->select('tbl_transaksi.tanggal_pinjam')
      ->groupBy('tbl_transaksi.tanggal_pinjam')
      ->selectSum('tbl_rinci.qty')
      ->get()
      ->getResultArray();
  }

  public function GrafikT($k_K)
  {
    return $this->db->table('tbl_rinci')
      ->join('tbl_barang', 'tbl_barang.kode_barang = tbl_rinci.kode_barang')
      ->join('tbl_kategori', 'tbl_barang.id_kategori = tbl_kategori.id_kategori')
      ->join('tbl_satuan', 'tbl_barang.id_satuan = tbl_satuan.id_satuan')
      ->join('tbl_transaksi', 'tbl_transaksi.no_faktur = tbl_rinci.no_faktur')   
      ->where('tbl_barang.id_kategori', $k_K )
      ->where('tbl_transaksi.tanggal_kembali')
      ->select('tbl_transaksi.tanggal_pinjam')
      ->select('tbl_transaksi.tanggal_kembali')
      ->select('tbl_barang.kode_barang')
      ->select('tbl_barang.nama_barang')
      ->select('tbl_kategori.nama_kategori')
      ->selectSum('tbl_rinci.qty')
      ->select('tbl_barang.stok')
      ->groupBy('tbl_transaksi.tanggal_kembali')
      ->get()
      ->getResultArray();
  }

  public function GrafikM($k_M)
  {
    return $this->db->table('tbl_rinci')
      ->join('tbl_barang', 'tbl_barang.kode_barang = tbl_rinci.kode_barang')
      ->join('tbl_kategori', 'tbl_barang.id_kategori = tbl_kategori.id_kategori')
      ->join('tbl_satuan', 'tbl_barang.id_satuan = tbl_satuan.id_satuan')
      ->join('tbl_transaksi', 'tbl_transaksi.no_faktur = tbl_rinci.no_faktur')   
      ->where('tbl_barang.id_kategori', $k_M )
      ->where('tbl_transaksi.tanggal_kembali')
      ->select('tbl_transaksi.tanggal_kembali')
      ->groupBy('tbl_transaksi.tanggal_kembali')
      ->select('tbl_barang.stok')
      ->selectSum('tbl_rinci.qty')
      ->get()
      ->getResultArray();
  }

  public function AmbilStokM($k_M)
  {
    return $this->db->table('tbl_barang')
    ->where('tbl_barang.id_kategori', $k_M )
    ->selectSum('tbl_barang.stok')
    ->get()
    ->getRowArray();
  }


  public function GrafikK($k_K)
  {
    return $this->db->table('tbl_rinci')
      ->join('tbl_barang', 'tbl_barang.kode_barang = tbl_rinci.kode_barang')
      ->join('tbl_kategori', 'tbl_barang.id_kategori = tbl_kategori.id_kategori')
      ->join('tbl_satuan', 'tbl_barang.id_satuan = tbl_satuan.id_satuan')
      ->join('tbl_transaksi', 'tbl_transaksi.no_faktur = tbl_rinci.no_faktur')   
      ->where('tbl_barang.id_kategori', $k_K )
      ->where('tbl_transaksi.tanggal_kembali')
      ->select('tbl_transaksi.tanggal_kembali')
      ->groupBy('tbl_transaksi.tanggal_kembali')
      ->select('tbl_barang.stok')
      ->selectSum('tbl_rinci.qty')
      ->get()
      ->getResultArray();
  }

  public function AmbilStokK($k_K)
  {
    return $this->db->table('tbl_barang')
      ->where('tbl_barang.id_kategori', $k_K )
      ->selectSum('tbl_barang.stok')
      ->get()
      ->getRowArray();
  }

  public function GrafikKom($k_Kom)
  {
    return $this->db->table('tbl_rinci')
      ->join('tbl_barang', 'tbl_barang.kode_barang = tbl_rinci.kode_barang')
      ->join('tbl_kategori', 'tbl_barang.id_kategori = tbl_kategori.id_kategori')
      ->join('tbl_satuan', 'tbl_barang.id_satuan = tbl_satuan.id_satuan')
      ->join('tbl_transaksi', 'tbl_transaksi.no_faktur = tbl_rinci.no_faktur')   
      ->where('tbl_barang.id_kategori', $k_Kom )
      ->where('tbl_transaksi.tanggal_kembali')
      ->select('tbl_transaksi.tanggal_kembali')
      ->groupBy('tbl_transaksi.tanggal_kembali')
      ->select('tbl_barang.stok')
      ->selectSum('tbl_rinci.qty')
      ->get()
      ->getResultArray();
  }

  public function AmbilStokKom($k_Kom)
  {
    return $this->db->table('tbl_barang')
    ->where('tbl_barang.id_kategori', $k_Kom )
    ->selectSum('tbl_barang.stok')
    ->get()
    ->getRowArray();
  }


  

  // ->select('tbl_transaksi.tanggal_pinjam')
  // ->groupBy('tbl_transaksi.tanggal_pinjam')
  // ->selectSum('tbl_rinci.qty')
  // ->get()
  // ->getResultArray();




}

  
?>