<?php
namespace App\Models;

use CodeIgniter\Model;

class ModelUser extends Model{

  public function all_data()
  {
   return $this->db->table('tbl_user')
   
   ->orderBy('id_user', 'DESC')
   ->get()
   ->getResultArray();
  }

  public function add($data)
  {
   return $this->db->table('tbl_user')->insert($data);
  }

  public function update_data($data)
  {
   return $this->db->table('tbl_user')
   ->where('id_user', $data['id_user'])
   ->update($data);
  }

  public function delete_data($data)
  {
   return $this->db->table('tbl_user')
   ->where('id_user', $data['id_user'])
   ->delete($data);
  }


}

  
?>