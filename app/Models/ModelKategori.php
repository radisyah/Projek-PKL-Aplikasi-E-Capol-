<?php 
namespace App\Models;

use CodeIgniter\Model;

class ModelKategori extends Model{

  public function all_data()
  {
   return $this->db->table('tbl_kategori')
   ->orderBy('id_kategori', 'DESC')
   ->get()
   ->getResultArray();
  }

  public function add($data)
  {
    return $this->db->table('tbl_kategori')->insert($data);
  }

  public function update_data($data)
  {
    return $this->db->table('tbl_kategori')
    ->where('id_kategori',$data['id_kategori'])
    ->update($data);
  }

  public function delete_data($data)
  {
    return $this->db->table('tbl_kategori')
    ->where('id_kategori', $data['id_kategori'])
    ->delete($data);
  }

}

?>