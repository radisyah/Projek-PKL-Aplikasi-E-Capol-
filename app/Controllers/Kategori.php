<?php namespace App\Controllers;
use App\Models\ModelKategori;
use App\Models\ModelUser;



class Kategori extends BaseController{

  public function __construct()
  {
   helper('form');
   $this->ModelKategori = new ModelKategori();
   $this->ModelUser = new ModelUser();
  }

  public function index()
  {
    $data = array(
      'menu' => 'master',
      'sub_menu' => 'kategori',
      'title' => 'Manajemen Kategori',
      'judul' => 'Master Data',
      'sub_judul' =>'Manajemen Kategori',
      'isi' => 'v_kategori',
			'profil' => $this->ModelUser->all_data(),
      'kategori' => $this->ModelKategori->all_data(),
    );
    return view('layout/v_wrapper', $data);

  }

  public function add()
  {
    $data = array(
      'nama_kategori' => $this->request->getPost('nama_kategori'),
    );
    $this->ModelKategori->add($data);
    session()->setFlashdata('pesanSukses', 'Data Kategori Berhasil Ditambahkan');
    return redirect()->to(base_url('kategori'));
  }

  public function update($id_kategori)
  {
    $data = array(
      'id_kategori' => $id_kategori,
      'nama_kategori' => $this->request->getPost('nama_kategori'),
    );
    $this->ModelKategori->update_data($data);
    session()->setFlashdata('pesanSukses', 'Data Kategori Berhasil Diubah');
    return redirect()->to(base_url('kategori'));
  }

  public function delete($id_kategori)
  {
    $data = array(
      'id_kategori' => $id_kategori,
    );
    $this->ModelKategori->delete_data($data);
    session()->setFlashdata('pesanSukses', 'Data Kategori Berhasil Dihapus');
    return redirect()->to(base_url('kategori'));
  }


}
  
