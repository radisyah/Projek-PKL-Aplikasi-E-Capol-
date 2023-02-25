<?php
namespace App\Models;

use CodeIgniter\Model;

class ModelDaftarTransaksi extends Model{


  public function DaftarTransaksi()
  {
    return $this->db->table('tbl_rinci')
      ->join('tbl_barang', 'tbl_barang.kode_barang = tbl_rinci.kode_barang')
      ->join('tbl_kategori', 'tbl_barang.id_kategori = tbl_kategori.id_kategori')
      ->join('tbl_satuan', 'tbl_barang.id_satuan = tbl_satuan.id_satuan')
      ->join('tbl_transaksi', 'tbl_transaksi.no_faktur = tbl_rinci.no_faktur')
      ->select('tbl_transaksi.no_faktur')
      ->select('tbl_transaksi.username')
      ->select('tbl_barang.nama_barang')
      ->select('tbl_kategori.nama_kategori')
      ->select('tbl_satuan.nama_satuan')
      ->select('tbl_transaksi.tanggal_pinjam')
      ->select('tbl_transaksi.jam_pinjam')
      ->select('tbl_transaksi.tanggal_kembali')
      ->select('tbl_transaksi.jam_kembali')
      ->select('tbl_rinci.qty')
      ->orderBy('no_faktur', 'ASC')
      ->get()
      ->getResultArray();
  }

  public function LivePinjam()
  {
    return $this->db->table('tbl_rinci')
      ->join('tbl_barang', 'tbl_barang.kode_barang = tbl_rinci.kode_barang')
      ->join('tbl_kategori', 'tbl_barang.id_kategori = tbl_kategori.id_kategori')
      ->join('tbl_satuan', 'tbl_barang.id_satuan = tbl_satuan.id_satuan')
      ->join('tbl_transaksi', 'tbl_transaksi.no_faktur = tbl_rinci.no_faktur')
      ->where('tbl_transaksi.tanggal_kembali')
      ->select('tbl_transaksi.no_faktur')
      ->select('tbl_transaksi.username')
      ->select('tbl_barang.nama_barang')
      ->select('tbl_kategori.nama_kategori')
      ->select('tbl_satuan.nama_satuan')
      ->select('tbl_transaksi.tanggal_pinjam')
      ->select('tbl_transaksi.jam_pinjam')
      ->select('tbl_rinci.qty')
      ->orderBy('no_faktur', 'ASC')
      ->get()
      ->getResultArray();
  }


}
