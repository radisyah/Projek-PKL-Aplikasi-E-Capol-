<?php
namespace App\Models;

use CodeIgniter\Model;

class ModelLaporan extends Model{

  public function DataHarian($tgl)
  {
    return $this->db->table('tbl_rinci')
      ->join('tbl_barang', 'tbl_barang.kode_barang = tbl_rinci.kode_barang')
      ->join('tbl_kategori', 'tbl_barang.id_kategori = tbl_kategori.id_kategori')
      ->join('tbl_transaksi', 'tbl_transaksi.no_faktur = tbl_rinci.no_faktur')
      ->where('tbl_transaksi.tanggal_pinjam', $tgl)
      ->select('tbl_barang.kode_barang')
      ->select('tbl_barang.nama_barang')
      ->select('tbl_kategori.nama_kategori')
      ->selectSum('tbl_rinci.qty')
      ->groupBy('tbl_barang.kode_barang')
      ->get()
      ->getResultArray();
  }

  // public function DataHarian($tgl)
  // {
  //   return $this->db->table('tbl_rinci')
  //     ->join('tbl_barang', 'tbl_barang.kode_barang = tbl_rinci.kode_barang')
  //     ->join('tbl_kategori', 'tbl_barang.id_kategori = tbl_kategori.id_kategori')
  //     ->join('tbl_transaksi', 'tbl_transaksi.no_faktur = tbl_rinci.no_faktur')
  //     ->where('tbl_transaksi.tanggal_pinjam', $tgl)
  //     ->select('tbl_transaksi.no_faktur')
  //     ->select('tbl_transaksi.username')
  //     ->select('tbl_barang.nama_barang')
  //     ->select('tbl_kategori.nama_kategori')
  //     ->select('tbl_transaksi.tanggal_pinjam')
  //     ->select('tbl_transaksi.jam_pinjam')
  //     ->select('tbl_transaksi.tanggal_kembali')
  //     ->select('tbl_transaksi.jam_kembali')
  //     ->select('tbl_rinci.qty')
  //     ->orderBy('no_faktur', 'ASC')
  //     ->get()
  //     ->getResultArray();
  // }

  public function DataBulanan($bulan,$tahun)
  {
    return $this->db->table('tbl_rinci')
      ->join('tbl_barang', 'tbl_barang.kode_barang = tbl_rinci.kode_barang')
      ->join('tbl_kategori', 'tbl_barang.id_kategori = tbl_kategori.id_kategori')
      ->join('tbl_transaksi', 'tbl_transaksi.no_faktur = tbl_rinci.no_faktur')
      ->where('month(tbl_transaksi.tanggal_pinjam)',$bulan)
      ->where('year(tbl_transaksi.tanggal_pinjam)',$tahun)
      ->select('tbl_transaksi.tanggal_pinjam')
      ->select('tbl_rinci.kode_barang')
      ->select('tbl_barang.nama_barang')
      ->selectSum('tbl_rinci.qty')
      ->groupBy('tbl_barang.kode_barang')
      ->get()
      ->getResultArray();
  }

  public function DataTahunan($tahun)
  {
    return $this->db->table('tbl_rinci')
      ->join('tbl_barang', 'tbl_barang.kode_barang = tbl_rinci.kode_barang')
      ->join('tbl_kategori', 'tbl_barang.id_kategori = tbl_kategori.id_kategori')
      ->join('tbl_transaksi', 'tbl_transaksi.no_faktur = tbl_rinci.no_faktur')
      ->where('year(tbl_transaksi.tanggal_pinjam)',$tahun)
      ->select('month(tbl_transaksi.tanggal_pinjam) as bulan')
      ->select('tbl_barang.nama_barang')
      ->selectSum('tbl_rinci.qty')
      ->groupBy('tbl_barang.kode_barang')
      ->get()
      ->getResultArray();
  }



}
