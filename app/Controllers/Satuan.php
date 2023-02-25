<?php namespace App\Controllers;
use App\Models\ModelSatuan;
use App\Models\ModelUser;



class Satuan extends BaseController{

  public function __construct()
  {
   helper('form');
   $this->ModelSatuan = new ModelSatuan();
   $this->ModelUser = new ModelUser();

  }

  public function index()
  {
    $data = array(
      'menu' => 'master',
      'sub_menu' => 'satuan',
      'title' => 'Manajemen Satuan',
      'judul' => 'Master Data',
      'sub_judul' =>'Manajemen Satuan',
      'isi' => 'v_satuan',
			'profil' => $this->ModelUser->all_data(),
      'satuan' => $this->ModelSatuan->all_data(),
    );
    return view('layout/v_wrapper', $data);

  }

  public function add()
  {
   $data = array(
    'nama_satuan' => $this->request->getPost('nama_satuan'),
   );
   $this->ModelSatuan->add($data);
   session()->setFlashdata('pesanSukses', 'Data Satuan Berhasil Ditambahkan');
   return redirect()->to(base_url('satuan'));

  }

  public function update($id_satuan)
  {
    $data = array(
      'id_satuan' => $id_satuan,
      'nama_satuan' => $this->request->getPost('nama_satuan'),
    );
    $this->ModelSatuan->update_data($data);
    session()->setFlashdata('pesanSukses', 'Data Satuan Berhasil Diubah');
    return redirect()->to(base_url('satuan'));
  }

  public function delete($id_satuan)
	{
		$data = array(
			'id_satuan' => $id_satuan,
		);
		$this->ModelSatuan->delete_data($data);
		session()->setFlashdata('pesanSukses','Data Satuan Berhasil Dihapus');
		return redirect()->to(base_url('satuan'));
	}


}
  
