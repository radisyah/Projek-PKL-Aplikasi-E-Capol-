<?php namespace App\Controllers;
use App\Models\ModelUser;


class User extends BaseController
{

	public function __construct() {
		helper('form');
		$this->ModelUser = new ModelUser();
	
	}

	public function index()
	{
		$data = array(
			'menu' => 'master',
			'sub_menu' => 'user',
			'title' => 'Manajemen User',
			'judul' => 'Master Data',
			'sub_judul' => 'Manajemen User',
			'user' => $this->ModelUser->all_data(),
			'profil' => $this->ModelUser->all_data(),
			'isi' => 'v_user'
		);
		return view('layout/v_wrapper', $data);		
	}

	public function add()
	{
		$data = array(
			'username' => $this->request->getPost('username'),
			'password' => $this->request->getPost('password'),
			'level' => $this->request->getPost('level'),
		);
		$this->ModelUser->add($data);
		session()->setFlashdata('pesanSukses','Data User Berhasil Ditambahkan');
		return redirect()->to(base_url('user'));
	}

	public function update($id_user)
	{
		$data = array(
			'id_user' => $id_user,
			'username' => $this->request->getPost('username'),
			'level' => $this->request->getPost('level'),
		);
		$this->ModelUser->update_data($data);
		session()->setFlashdata('pesanSukses','Data User Berhasil Diubah');
		return redirect()->to(base_url('user'));
	}

	public function delete($id_user)
	{
		$data = array(
			'id_user' => $id_user,
		);
		$this->ModelUser->delete_data($data);
		session()->setFlashdata('pesanSukses','Data User Berhasil Dihapus');
		return redirect()->to(base_url('user'));
	}

	//--------------------------------------------------------------------

}
