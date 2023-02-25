<?php
namespace App\Models;


use CodeIgniter\Model;

class ModelSatuan extends Model{

  public function all_data()
  {
   return $this->db->table('tbl_satuan')
   ->orderBy('id_satuan', 'DESC')
   ->get()
   ->getResultArray();
  }

  public function add($data)
  {
    return $this->db->table('tbl_satuan')->insert($data);
  }

  public function update_data($data)
  {
    return $this->db->table('tbl_satuan')
    ->where('id_satuan',$data['id_satuan'])
    ->update($data);
  }

  public function delete_data($data)
  {
   return $this->db->table('tbl_satuan')
   ->where('id_satuan', $data['id_satuan'])
   ->delete($data);
  }


}

?>