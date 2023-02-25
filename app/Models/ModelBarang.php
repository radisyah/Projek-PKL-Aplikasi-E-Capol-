<?php 
namespace App\Models;

use CodeIgniter\Model;

class ModelBarang extends Model{

  public function all_data()
  {
    return $this->db->table('tbl_barang')
      ->join('tbl_kategori', 'tbl_kategori.id_kategori = tbl_barang.id_kategori' )
      ->join('tbl_satuan', 'tbl_satuan.id_satuan = tbl_barang.id_satuan' )
      ->orderBy('id_barang', 'DESC')
      ->get()
      ->getResultArray();
  }

  public function detail_data($id_barang)
  {
    return $this->db->table('tbl_barang')
      ->join('tbl_kategori', 'tbl_kategori.id_kategori = tbl_barang.id_kategori' )
      ->join('tbl_satuan', 'tbl_satuan.id_satuan = tbl_barang.id_satuan' )
      ->where('id_barang', $id_barang)
      ->get()
      ->getRowArray();
  }

  public function add($data)
  {
    return $this->db->table('tbl_barang')
      ->insert($data);
  }

  public function update_data($data)
  {
    return $this->db->table('tbl_barang')
      ->where('id_barang',$data['id_barang'])
      ->update($data);
  }

  public function delete_data($data)
  {
    return $this->db->table('tbl_barang')
      ->where('id_barang', $data['id_barang'])
      ->delete($data);
  }

}

?>