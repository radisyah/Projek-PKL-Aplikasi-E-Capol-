<?php namespace App\Controllers;
use App\Models\ModelUser;
use App\Models\ModelProfil;

class Setting extends BaseController
{

	public function __construct()
  {
    helper('form');
    $this->ModelProfil = new ModelProfil();
    $this->ModelUser = new ModelUser();
	}

	public function index()
	{
		$data = array(
			'menu' => 'set',
			'sub_menu' => '',
			'title' => 'Setting Profil',
			'sub_title' => 'Halaman Admin',
			'profil' => $this->ModelUser->all_data(),
			'user' => $this->ModelUser->all_data(),
			'judul' => 'Setting',
			'sub_judul' => '',
			'isi' => 'v_set'
		);
		return view('layout/v_wrapper', $data);

	}

	public function update($id_user)
	{
		$data = array(
			'id_user' => $id_user,
			'username' => $this->request->getPost('username'),
			'password' => $this->request->getPost('password'),
			'email' => $this->request->getPost('email'),
		);
		$this->ModelUser->update_data($data);
		session()->setFlashdata('pesanSukses','Data Berhasil Diupdate');
		return redirect()->to(base_url('setting'));
	}

	public function updateProfil($id_profil)
	{
		$data = array(
			'id_profil' => $id_profil,
			'nama' => $this->request->getPost('nama'),
			'no_telp' => $this->request->getPost('no_telp'),
		);
		$this->ModelProfil->update_data($data);
		session()->setFlashdata('pesanSukses','Data Berhasil Diupdate');
		return redirect()->to(base_url('setting'));
	}



	//--------------------------------------------------------------------

}
